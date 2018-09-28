#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$l= urldecode($_GET["file"]);
//$l=urldecode("http%3A%2F%2Fteleviziune.cf%2Ftvr%2Ftvr1.php");
$ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_NOBODY,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
//echo $h;
$t1=explode("Location:",$h);
$t2=explode("\n",$t1[1]);
$l11=trim($t2[0]);
if ($l11)
  $l=$l11;

//die();
if (preg_match("/tvr/",$l)) {
  $l1="http://127.0.0.1/cgi-bin/scripts/util/m3u8tvr.php?file=".urlencode($l);
} elseif (preg_match("/\.m3u8|\.php/",$l)) {
  $l1="http://127.0.0.1/cgi-bin/scripts/util/m3u8.php?file=".urlencode($l);
} elseif (preg_match("/rtmp(e)?:\//",$l)) {
  $l1="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$l;
} elseif (preg_match("/mms(h)?:\//",$l)) {
  $l1="http://127.0.0.1/cgi-bin/translate?stream,,".$l;
} else {
  $l1="http://127.0.0.1/cgi-bin/scripts/util/ts.php?file=".urlencode($l);
}
print $l1;
?>
