#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
header('Content-type: video/mp4');
//header('Content-type: application/vnd.apple.mpegURL');
error_reporting(0);
set_time_limit(0);
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function getSiteHost($siteLink) {
		// parse url and get different components
		$siteParts = parse_url($siteLink);
		$port=$siteParts['port'];
		if (!$port || $port==80)
          $port="";
        else
          $port=":".$port;
		// extract full host components and return host
		return $siteParts['scheme'].'://'.$siteParts['host'].$port;
}
$id = $_GET["file"];
//$id="14";
//$cookie="C://Temp/filmon.txt";
/*
$l="http://www.filmon.com/tv/htmlmain";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 5 Build/LMY48B; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.65 Mobile Safari/537.36');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
*/
$cookie="/tmp/filmon.txt";
$base="";
$l_ts=array();
$m=array();
while(true) {
$l="http://www.filmon.com/ajax/getChannelInfo";
//channel_id=14&quality=low
$post="channel_id=".$id."&quality=low";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch,CURLOPT_REFERER,"http://www.filmon.com/");
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8","X-Requested-With: XMLHttpRequest", "Content-Length: ".strlen($post)));
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h=curl_exec($ch);
  curl_close($ch);
  

$l=str_between($h,'quality":"high","url":"','"');
$out=str_replace("\\","",$l);
if (!preg_match("/\.m3u8/i",$out)) die();
//echo $out."\n";
//die();
if (!$base) $base=str_replace(strrchr($out, "/"),"/",$out);
$t1=explode("id=",$out);
$id1=$t1[1];
$out=$base."playlist.m3u8?id=".$id1;
//echo $out."\n";
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $out);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //$h = curl_exec($ch);
      //curl_close($ch);
      //echo $h."\n";

      //die();
$link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);

while (true) {
  $h = curl_exec($ch);
  if (!preg_match("/\.ts|\.mp4/",$h)) break;

$s="/[\.\d\w\-\.\/\\\:\?\&\#\%\_\=\,]*(\.ts|\.mp4)/";
$l_ts=$m[0];
$m=array();
preg_match_all($s,$h,$m);
//print_r ($m);
$c=count($m[0]);
for ($n=0;$n<$c;$n++) {
$file= $base.$m[0][$n];
if (!in_array($m[0][$n], $l_ts)) {
curl_setopt($link, CURLOPT_URL, $file);
curl_exec($link);
}
}
}
//}
curl_close($ch);
curl_close($link);
}
?>
