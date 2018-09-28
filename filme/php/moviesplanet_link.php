#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function round_fix($s) {
 $i=(int)($s);
 if (($s-$i) < 1/2)
   $r=$i;
 else
   $r=$i+1;
 return $r;
}
//$cookie="D://m.txt";
error_reporting(0);
set_time_limit(60);
$l= $_GET["file"];

$cookie="/tmp/moviesplanet.txt";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$t1=explode("embeds[",$html);
$t2=explode('src="',$t1[1]);
$t3=explode('"',$t2[1]);
$l=$t3[0];
$x1=explode("?",$l);
$base_sub=$x1[0];
//echo $l;
$exec = '-q --load-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$t1=explode('sources:',$html);
$t2=explode('http',$t1[1]);
$t3=explode('"',$t2[1]);
$movie=str_replace("https","http","http".$t3[0]);
$t1=explode("&end",$movie);
$movie=$t1[0];
//echo $movie;
//if (!$movie) $movie=str_replace("https","http",str_between($html,'source src= "','"'));
//echo $movie;
//if (!$movie) $movie=str_between($html,'file: "','"');
//echo $movie;
preg_match('/([http|https][\/\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(_en\.(srt|vtt)))/', $html, $m);
//print_r ($m);
$file=$m[1];

if (strpos($file,"http") === false) {
//$x1=str_between($html,"sub/",'"');
$file="https://www.moviesplanet.tv/media/".$file;
}
//echo $file;
if (strpos($movie,"end=900") !== false) $movie=str_replace("end=900","",$movie);
$t1=explode("&end",$movie);
$movie=$t1[0];
if (strpos($movie,"google") !== false || strpos($movie,"blogspot.com") !== false) {
  //echo $html;
  $link = str_replace("https","http",$movie);
  $link = str_replace("http","https",$link);
  //echo $link;
  //preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(=m\d{2}))/', $movie, $m);
  //$l=$m[0];

  //$link=$l;
  //echo $l;
   /*
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $l);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $l);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode("Location:",$h);
   $t2=explode("\n",$t1[1]);
   $link=trim($t2[0]);
   */
   //echo $link;
//echo $link;
$ua1="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua1.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$movie="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
}
//////////////////////////////////////////////////////////////////
exec ("rm -f /tmp/test.xml");
if ($file) {
//$h= file_get_contents("http://uphero.xpresso.eu/movietv/m3.php?file=".$file."&res=".$res);
$exec = '-q --load-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$file.'" --no-check-certificate "'.$file.'" -O -';
$exec = $exec_path.$exec;
$h=shell_exec($exec);
if (strpos($h,"WEBVTT") !== false) {
  //convert to srt;
    function split_vtt($contents)
    {
        $lines = explode("\n", $contents);
        if (count($lines) === 1) {
            $lines = explode("\r\n", $contents);
            if (count($lines) === 1) {
                $lines = explode("\r", $contents);
            }
        }
        return $lines;
    }
    function convert_vtt($contents)
    {
        $lines = split_vtt($contents);
        array_shift($lines); // removes the WEBVTT header
        $output = '';
        $i = 0;
        foreach ($lines as $line) {
            /*
             * at last version subtitle numbers are not working
             * as you can see that way is trustful than older
             *
             *
             * */
            $pattern1 = '#(\d{2}):(\d{2}):(\d{2})\.(\d{3})#'; // '01:52:52.554'
            $pattern2 = '#(\d{2}):(\d{2})\.(\d{3})#'; // '00:08.301'
            $m1 = preg_match($pattern1, $line);
            if (is_numeric($m1) && $m1 > 0) {
                $i++;
                $output .= $i;
                $output .= PHP_EOL;
                $line = preg_replace($pattern1, '$1:$2:$3,$4' , $line);
            }
            else {
                $m2 = preg_match($pattern2, $line);
                if (is_numeric($m2) && $m2 > 0) {
                    $i++;
                    $output .= $i;
                    $output .= PHP_EOL;
                    $line = preg_replace($pattern2, '00:$1:$2,$3', $line);
                }
            }
            $output .= $line . PHP_EOL;
        }
        return $output;
    }
    $h=convert_vtt($h);
}
$file_array=explode("\n",$h);
if($file_array)
{
$k=0;
$m=0;
$ttxml     = '';
$index="";
$full_line = '';
$sub_max = 53;
$last_end=0;
if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $h)) {
  //print_r ($file_array);
  foreach($file_array as $line)
  {
    $line = trim($line);

    //print $line."<BR>";
    $line = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line);
    if (preg_match("/opensubtitles|produsul dvs.sau a unei marci/i",$line)) $line="   ";
        if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $line, $match))
        {
          //print_r ($match);

          $begin = round_fix(3600 * $match[1] + 60 * $match[2] + $match[3] + $match[5]/1000);
          $end   = round_fix(3600 *$match[6] + 60 * $match[7] + $match[8] + $match[10]/1000);
          $line1 = '';
          $line2 = '';
          $line3 = '';
          //print $begin. "-".$end;
          if ($begin > $last_end)
          {
           for ($i=$last_end;$i<$begin;$i++) {
           //$ttxml .=$last_end."\n";
           //$ttxml .=$i."\n";
           //$ttxml .=$begin."\n";
           //$ttxml .=($i+1)."\n";
           //$index .="time=".$k." index file=".$m." text=nimic"."\n";
           $index .=$m."\n";
           $k++;
           }
           $ttxml .="\n";
           $ttxml .="\n";
           $m = $m+2;
          }

          $last_end=$end;
        }
        // if the next line is not blank, get the text
        elseif($line != '')
        {
          if (!$line1)
             $line1=$line;
          else if($line1  && !$line2)
            $line2=$line;
          else if ($line1 && $line2)
            $line3=$line;
        }

        // if the next line is blank, write
        if($line == '')
        //if (preg_match("/opensubtitles|produsul dvs.sau a unei marci/i",$line1)) $line1="";
        //if (preg_match("/opensubtitles|produsul dvs.sau a unei marci/i",$line2)) $line2="";
        {
        if (strlen($line1) >= $sub_max) {
         $newtext = $line1." ".$line2." ".$line3;
         $newtext=trim(str_replace("  "," ",$newtext));
         $newtext = wordwrap($newtext, $sub_max, "<br>");
         $t1=explode("<br>",$newtext);
         $line1=$t1[0];
         $line2=$t1[1];
        } else if ($line3 && strlen($line2) < $sub_max) {
         $line2 = $line2." ".$line3;
         $line2=trim(str_replace("  "," ",$line));
        } else if (strlen($line2) >= $sub_max) {
         $newtext = $line1." ".$line2." ".$line3;
         $newtext=trim(str_replace("  "," ",$newtext));
         $newtext = wordwrap($newtext, $sub_max, "<br>");
         $t1=explode("<br>",$newtext);
         $line1=$t1[0];
         $line2=$t1[1];
        }
        if ($line2=="") {
          for ($i=$begin;$i<$last_end;$i++) {
          //$ttxml .=$i."\n";
          //$ttxml .=($i+1)."\n";
          //$index .="time=".$k."index file=".$m."text=".$line2." ".$line1."\n";
          $index .=$m."\n";
          $k++;
          }
          $ttxml .=$line2."\n";
          $ttxml .=$line1."\n";
          $m =$m+2;
        } else {
          for ($i=$begin;$i<$last_end;$i++) {
          //$ttxml .=$i."\n";
          //$ttxml .=($i+1)."\n";
          //$index .=$begin."\n";
          //$index .="time=".$k."index file=".$m."text=".$line2." ".$line1."\n";
          $index .=$m."\n";
          $k++;
          }
          $ttxml .=$line1."\n";
          $ttxml .=$line2."\n";
          $m =$m+2;
        }
          $line1 = '';
          $line2 = '';
          $line3 = '';
        }
      //if ($k>1000) break;
      }
//dummy sub
//if ($end > 0) {
$index .=$m."\n";
$index .=$m."\n";
$index .=$m."\n";
$index .=$m."\n";
$ttxml .="\n";
$ttxml .="\n";
$ttxml .="\n";
$ttxml .="\n";
//}
//echo ($k/1)."\n";
//echo $index;
$t1=explode("\n",$index);
$c=count($t1);
$index =$c."\n".$index;
//print_r ($t1);
$t2=explode("\n",$ttxml);

//die();
if ($k>5) {
$new_file = "/tmp/test.xml";
//$new_file = "sub.txt";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
$new_file = "/tmp/index.xml";
//$new_file = "index.txt";
$fh = fopen($new_file, 'w');
fwrite($fh, $index);
fclose($fh);
}
}
}
}
print $movie;
?>
