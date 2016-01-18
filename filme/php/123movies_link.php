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
$query = $_GET["file"];
if ($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $id=$queryArr[1];
   $id_t=$queryArr[2];
}
if (strpos($link,"blogspot") !== false) {
$link=str_replace('=m22',"=m18",$link);
$linkhd=str_replace('=m18',"=m22",$link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $linkhd);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $html = curl_exec($ch);
  curl_close($ch);
  if (strpos($html,"404 Not Found") !== false)
  $linkhd=$link;
} elseif (strpos($link,"123movies") !== false) {
  $movie=$link;
}
exec ("rm -f /tmp/test.xml");

if ($id_t=="")
   $file="http://uphero.xpresso.eu/123movies/m/".$id.".srt";
else
   $file="http://uphero.xpresso.eu/srt/m/".$id_t.".srt";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $file);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $h = curl_exec($ch);
  curl_close($ch);

if(preg_match('/(\d\d):(\d\d):(\d\d),(\d\d\d) --> (\d\d):(\d\d):(\d\d),(\d\d\d)/', $h))
{
$ttxml     = '';
$full_line = '';
$sub_max = 53;
$last_end=0;
if($file_array = file($file))
{
  foreach($file_array as $line)
  {
    $line = rtrim($line);
    $line = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line);
        if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $line, $match))
        {
          $begin = round_fix(3600 * $match[1] + 60 * $match[2] + $match[3] + $match[5]/1000);
          $end   = round_fix(3600 *$match[6] + 60 * $match[7] + $match[8] + $match[10]/1000);
          $line1 = '';
          $line2 = '';
          $line3 = '';
          if ($begin > $last_end)
          {
           $ttxml .=$last_end."\n";
           $ttxml .=$begin."\n";
           $ttxml .="\n";
           $ttxml .="\n";
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
          $ttxml .=$begin."\n";
          $ttxml .=$end."\n";
          $ttxml .=$line2."\n";
          $ttxml .=$line1."\n";
        } else {
          $ttxml .=$begin."\n";
          $ttxml .=$end."\n";
          $ttxml .=$line1."\n";
          $ttxml .=$line2."\n";
        }
          $line1 = '';
          $line2 = '';
          $line3 = '';
        }
      }

//dummy sub
if ($end > 0) {
   $ttxml .=$end."\n";
$ttxml .="10002"."\n";
$ttxml .="\n";
$ttxml .="\n";
}
//echo $ttxml;
$new_file = "/tmp/test.xml";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
}
}
if (strpos($link,"blogspot") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $linkhd);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
$t1=explode("Location:",$html);
$t2=explode("\n",$t1[1]);
$movie=trim($t2[0]);
if ($movie) {
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "'.$movie.'"';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
//$link="http://127.0.0.1/cgi-bin/scripts/util/curl.cgi?".$link;
//$link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$link;
//}
}

}
print $link;
?>
