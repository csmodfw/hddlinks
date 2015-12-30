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
function prep($b) {
$c=urlencode($b);
$c=str_replace("%C3%83%C2%A2","â",$c);
$c=str_replace("%C3%84%C2%83","ã",$c);
$c=str_replace("%C3%85%C2%A3","þ",$c);
$c=str_replace("%C3%83%C2%AE","î",$c);
$c=str_replace("%C3%85%C2%A2","ª",$c);
$c=str_replace("%C3%85%C2%9F","º",$c);
$c=str_replace("%C3%85%C2%9E","ª",$c);
$c=str_replace("%C3%83%C2%8E","Î",$c);
$c=str_replace("%C2%83%2C","ã",$c);
$c=str_replace("%C3%8E","Î",$c);
$c=str_replace("%C2%A2","â",$c);
$c=str_replace("%C4%83","ã",$c);
$c=str_replace("%C4%82","Ã",$c);
$c=str_replace("%C5%9F","º",$c);
$c=str_replace("%C5%A3","þ",$c);
$c=str_replace("%C3%AE","î",$c);
$c=str_replace("%C5%A2","Þ",$c);
$c=str_replace("%C5%9E","ª",$c);
$c=str_replace("%C5%9F","º",$c);
$c=str_replace("%C3%AE","î",$c);
$c=str_replace("%C3%A2","â",$c);
$c=str_replace("%C3%A3","ã",$c);
$c=str_replace("%C8%9A","Þ",$c);
$c=str_replace("%C8%9B","þ",$c);
$c=str_replace("%C8%99","º",$c);
$c=str_replace("%C8%98","ª",$c);
//$c=str_replace("%C8%98"
//echo $start."<BR>".$c."<BR>";
//$c=str_replace("%C3%83%C2%AE","Î",$c);
$c=urldecode($c);

$c=str_replace("Ä","a",$c);
$c=str_replace("A*?","t",$c);
return $c;
}
$link = $_GET["file"];
exec ("rm -f /tmp/test.xml");

$html = file_get_contents($link);
$t1=explode("file: '",$html);
$t2=explode("'",$t1[1]);
$movie=$t2[0];
$t3=explode("'",$t1[2]);
$srt=$t3[0];
if ($srt) {
$ttxml ="";
$full_line = '';
$last_end=0;
$sub_max = 53;
//$html = file_get_contents($srt);

//echo $html;
/*
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $srt);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   $html=curl_exec($ch);
   curl_close($ch);
*/
//if(preg_match('/(\d\d):(\d\d):(\d\d)\.(\d\d\d) --> (\d\d):(\d\d):(\d\d)\.(\d\d\d)/', $html)) {
$ttxml     = '';
$full_line = '';
$sub_max = 53;
$last_end=0;
if($file_array = file($srt))
{
  foreach($file_array as $line)
  {
    $line = rtrim($line);
    $line = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line);
    $line=prep($line);
        if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $line, $match))
        {
//        print_r ($match);
/*
    [0] => 00:37:03.309 --> 00:37:06.869
    [1] => 00
    [2] => 37
    [3] => 03
    [4] => .
    [5] => 309
    [6] => 00
    [7] => 37
    [8] => 06
    [9] => .
    [10] => 869
*/
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
//}
}
//echo $ttxml;
print $movie;
?>
