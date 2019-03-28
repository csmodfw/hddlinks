#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
//header('Content-type: video/mp4');
//header('Content-type: application/vnd.apple.mpegURL');
$cookie="/tmp/filmbox.dat";
require_once("../../filme/php/JavaScriptUnpacker.php");
$ua     =   $_SERVER['HTTP_USER_AGENT'];
error_reporting(0);
set_time_limit(0);
$l = urldecode($_GET["file"]);
$link="https://www.arconaitv.us/stream.php?id=".$l;
//$l="https://5845e42425cc9.streamlock.net/live/rictv/playlist.m3u8";
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
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' -O - -U "'.$ua.'" --no-check-certificate "'.$link.'"';
$exec = $exec_path.$exec;
$response=shell_exec($exec);
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($response);
  //echo $out;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.m3u8))/', $out, $m);
  $l=$m[1];
//echo $l;
//die();
$head=array(
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Accept-Encoding: gzip, deflate, br',
'Referer: https://www.arconaitv.us/stream.php?id=16',
'X-CustomHeader: videojs',
'Origin: https://www.arconaitv.us',
'Connection: keep-alive'
);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
      //curl_setopt($ch,CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt ($ch, CURLINFO_HEADER_OUT, true);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
      //curl_setopt($ch, CURLOPT_REFERER, "https://www.arconaitv.us/");
      //$h = curl_exec($ch);
      //curl_close($ch);
      //echo $h;
      $link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
$l_ts=array();
$ts=array();
$k++;
while (true) {
//while ($k<2) {
  $h = curl_exec($ch);
  //echo $h;
  //die();
  if (!preg_match("/#EXTINF/i",$h)) break;
  $a1=explode("\n",$h);
  $l_ts=$ts;
  $ts=array();
  for ($k=0;$k<count($a1);$k++) {
      if ($a1[$k][0] !="#" && $a1[$k]) $ts[]=trim($a1[$k]);
  }
  $c=count($ts);
  for ($n=0;$n<$c;$n++) {
    if (!in_array($ts[$n], $l_ts)) {
      //echo $base.$ts[$n].$base3."<BR>";

      curl_setopt($link, CURLOPT_URL, $ts[$n]);
      curl_exec($link);

    }
  }
  $k++;
  //break;
}
curl_close($ch);
curl_close($link);
?>
