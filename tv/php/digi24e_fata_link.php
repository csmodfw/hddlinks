#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://www.digi24.ro/js/init.onedb.js?v=21
//http://s1.digi24.ro//onedb:transcode/51e4230795f9cff067000000.480p.mp4
//s2.digi24.ro
//s6.digi24.ro
//onedb/51e4230795f9cff067000000
$link = $_GET["file"];
$cookie="/tmp/digi.dat";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://www.digi-online.ro");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  //die();
//http://s1.digi24.ro/onedb/transcode/5794a369682ccfd2588b4567.480p.mp4

$out=str_replace("\\","",str_between($html,'480p.mp4":"','"'));
$out=str_replace("https","http",$out);
print $out;
?>
