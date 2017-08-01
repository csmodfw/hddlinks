#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
require_once("../../filme/php/JavaScriptUnpacker.php");
$ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
$jsu = new JavaScriptUnpacker();
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}

$l = urldecode($_GET["file"]);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
if (strpos($h,"script") === false) {
  if (!function_exists("gzdecode")) {
    file_put_contents("/tmp/ok.gz",$h);
    $exec="/usr/local/bin/Resource/www/cgi-bin/scripts/funzip /tmp/ok.gz";
    $html = shell_exec($exec);
  } else {
    $html=gzdecode($h);
  }
} else
  $html=$h;
$t1=explode("idds=",$html);
$t2=explode("'",$t1[1]);
$l="http://oklivetv.com/xplay/xplay.php?idds=".$t2[0];
//echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h3 = curl_exec($ch);
  curl_close($ch);
if (strpos($h3,"script") === false) {
  if (!function_exists("gzdecode")) {
    file_put_contents("/tmp/ok.gz",$h3);
    $exec="/usr/local/bin/Resource/www/cgi-bin/scripts/funzip /tmp/ok.gz";
    $h = shell_exec($exec);
  } else {
    $h=gzdecode($h3);
  }
} else
  $h=$h3;

  $l="";
  $out=$h;
$t1=explode('eval(function',$h);
$c=count($t1);
for ($k=1;$k<$c;$k++) {
  $in="eval(function".$t1[$k];
  $out .= $jsu->Unpack($in);
  //echo $out."\r\n"."\r\n";
}
if (strpos("tabs.php",$h) !== false) {
 $videos = explode('href="tabs.php', $h);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode('"',$video);
  $link="http://oklivetv.com/xplay/tabs.php".$t1[0];
  //echo $link."\r\n"."\r\n";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h1 = curl_exec($ch);
  curl_close($ch);
if (strpos($h,"script") === false) {
  if (!function_exists("gzdecode")) {
    file_put_contents("/tmp/ok.gz",$h1);
    $exec="/usr/local/bin/Resource/www/cgi-bin/scripts/funzip /tmp/ok.gz";
    $h2 = shell_exec($exec);
  } else {
    $h2=gzdecode($h1);
  }
} else
  $h2=$h1;
  //echo $h2;
  //echo $h2."\r\n"."\r\n";
  $out .= $jsu->Unpack($h2);

}
}
 //echo $out."\r\n"."\r\n";
$l="";
$t1=explode('setup({file:"',$out);
$t2=explode('"',$t1[1]);
$l=$t2[0];
if (!$l) {
  $t1=explode('streamURL="',$out);
  $t2=explode('"',$t1[1]);
  $l=$t2[0];
}
//$l="rtmpe://asasass";
if (preg_match("/\.m3u8/",$l)) {
  $l="http://127.0.0.1/cgi-bin/scripts/util/m3u8.php?file=".urlencode($l);
} elseif (preg_match("/rtmp(e)?:\//",$l)) {
  $l="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$l;
} elseif (preg_match("/mms(h)?:\//",$l)) {
  $l="http://127.0.0.1/cgi-bin/translate?stream,,".$l;
}
print $l;
?>
