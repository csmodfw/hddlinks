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
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="streamroyale.com";
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $imdb = $queryArr[0];
   $delay = $queryArr[1];
   $tip=$queryArr[2];
   $q=$queryArr[3];
   $mirror=$queryArr[4];
   $se=$queryArr[5];
}
$l="https://".$server."/api/v1/title/".$imdb;
$cookie="/tmp/royale.txt";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'"  --no-check-certificate "'.$l.'" -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$r=json_decode($html,1);
//print_r ($r["cc"]);
//$file=$r["cc"][0][0]["src"];
//echo $file;
if (file_exists("/tmp/s.srt"))
  $file="/tmp/s.srt";
else {
if ($tip=="movie")
  $file=str_between($html,'"src":"','"');
else
  $file=$r["cc"][$se][0]["src"];
}
//$dom=$r["domain"]["suffix"];
//$prefix=$r["domain"]["prefix"];
if ($tip=="movie") {
  $arr=$r["files"]["movie"][$q][0];
  $dom=$arr["hostname"];
  $dom=str_replace("\$ID",$mirror,$dom);
  $l=$arr["url"];
  $movie="http://".$dom.$l;
} else {
  $arr=$r["files"][$se][$q][0];
  $dom=$arr["hostname"];
  $dom=str_replace("\$ID",$mirror,$dom);
  $l=$arr["url"];
  $movie="http://".$dom.$l;
}
if ($delay=="600") $movie=$movie."&start=600";
//////////////////////////////////////////////////////////////////
exec ("rm -f /tmp/test.xml");
if ($file) {
if (file_exists("/tmp/s.srt"))
  $h=file_get_contents($file);
else {
$file="https://".$server.$file;
//$h= file_get_contents("http://uphero.xpresso.eu/movietv/m3.php?file=".$file."&res=".$res);
$exec = '-q --load-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$file.'" --no-check-certificate "'.$file.'" -O -';
$exec = $exec_path.$exec;
$h=shell_exec($exec);
}
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

          $begin = round_fix(3600 * $match[1] + 60 * $match[2] + $match[3] + $match[5]/1000) - $delay;
          if ($begin <0) $begin=0;
          $end   = round_fix(3600 *$match[6] + 60 * $match[7] + $match[8] + $match[10]/1000) - $delay;
          if ($end <0) $end=0;
          if ($end==0) $line="    ";
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
