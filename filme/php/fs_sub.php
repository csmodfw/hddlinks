#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
   function generateResponse($request)
    {
        $context  = stream_context_create(
            array(
                'http' => array(
                    'method'  => "POST",
                    'header'  => "Content-Type: text/xml",
                    'content' => $request
                )
            )
        );
        $response     = file_get_contents("http://api.opensubtitles.org/xml-rpc", false, $context);
        return $response;
    }
function round_fix($s) {
 $i=(int)($s);
 if (($s-$i) < 1/2)
   $r=$i;
 else
   $r=$i+1;
 return $r;
}
//error_reporting(0);
$f="/tmp/opensub.txt";
$token=file_get_contents($f);
exec ("rm -f /tmp/test.xml");
$file = $_GET["file"];
//$file=urldecode($file);
//$file = str_replace(' ','%20',$file);
//$file = str_replace('[','%5B',$file);
//$file = str_replace(']','%5D',$file);
$file=str_replace("%3A",":",$file);
$file=str_replace("%2F","/",$file);
//echo $file;
$ttxml     = '';
$full_line = '';
$sub_max = 53;
$last_end=0;
$request="<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>
<methodCall>
<methodName>DownloadSubtitles</methodName>
<params>
 <param>
  <value>
   <string>".$token."</string>
  </value>
 </param>
 <param>
  <value>
   <array>
    <data>
     <value>
      <string>".$file."</string>
     </value>
    </data>
   </array>
  </value>
 </param>
</params>
</methodCall>";
//echo $request;
$response = generateResponse($request);
//echo $response;
$t1=explode("data",$response);
$data=str_between($t1[3],"<string>","</string>");
//echo $data;
//$h = gzinflate(base64_decode($data));
//$h = gzinflate(substr(base64_decode($data),10));
$a1=base64_decode($data);
$f="/tmp/opensub.srt.gz";
file_put_contents($f,$a1);
$exec="/usr/local/bin/Resource/www/cgi-bin/scripts/funzip /tmp/opensub.srt.gz";
$h = shell_exec($exec);
  $file_array=explode("\n",$h);
//echo $h;
if($file_array)
{
$k=0;
if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $h)) {
  //print_r ($file_array);
  foreach($file_array as $line)
  {
    $line = trim($line);
    //print $line."<BR>";
    $line = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line);
        if(preg_match('/(\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d) --> (\d\d):(\d\d):(\d\d)(\.|,)(\d\d\d)/', $line, $match))
        {
          //print_r ($match);
          $k++;
          $begin = round_fix(3600 * $match[1] + 60 * $match[2] + $match[3] + $match[5]/1000);
          $end   = round_fix(3600 *$match[6] + 60 * $match[7] + $match[8] + $match[10]/1000);
          $line1 = '';
          $line2 = '';
          $line3 = '';
          //print $begin. "-".$end;
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
if ($k>5) {
$new_file = "/tmp/test.xml";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
}
} else {
//echo $h;
$videos = explode('<p', $h);
if (count($videos) > 1) {
unset($videos[0]);
$videos = array_values($videos);
$n=1;
foreach($videos as $video) {
$t1=explode('begin="',$video);
$t2=explode('"',$t1[1]);
$start=$t2[0];
$time1=explode(":",$start);
if (!$time1[2])
 $begin = 60*$time1[0] + $time1[1];
else
  $begin=round(3600*$time1[0] + 60*$time1[1] + $time1[2]);
$t1=explode('end="',$video);
$t2=explode('"',$t1[1]);
$endtime=$t2[0];
$time1=explode(":",$endtime);
if (!$time1[2])
 $end = 60*$time1[0] + $time1[1];
else
 $end=round(3600*$time1[0] + 60*$time1[1] + $time1[2]);
if ($begin > $last_end)
 {
   $ttxml .=$last_end."\n";
   $ttxml .=$begin."\n";
   $ttxml .="\n";
   $ttxml .="\n";
 }
 $last_end=$end;

$line=str_between($t1[1],">","</p");
$l=explode("<br/>",$line);
$line1=$l[0];
$line2=$l[1];
$line1 = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line1);
$line2 = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line2);
 if (strlen($line1) >= $sub_max || strlen($line2) >=$sub_max) {
    $newtext = $line1." ".$line2;
    $newtext=str_replace("  "," ",$newtext);
    $newtext = wordwrap($newtext, $sub_max, "<br>");
    $t1=explode("<br>",$newtext);
    $line1=$t1[0];
    $line2=$t1[1];
 }
if ($line2=="")
{
$line2=$line1;
$line1="";
}
$ttxml .=$begin."\n";
$ttxml .=$end."\n";
$ttxml .=$line1."\n";
$ttxml .=$line2."\n";
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
}
?>
