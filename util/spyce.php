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
$id= urldecode($_GET["file"]);
//$id="55.m3u8";
$alip = '149.202.196.52';//allip
$alport = '25461';//allport
//$dev = file_get_contents("http://mxcore.forithost.com/dev.txt");
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f))
  $pass=trim(file_get_contents($f));
else
  $pass="";
$lp="http://hd4all.ml/d/gazv.php?c=".$pass;
$dev = file_get_contents("".$lp."");
$all="http://www.seenow.ro/test/LG/proxy.php?url=play.core1.qazwsx.work:25461/live".$dev."1.m3u8";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $all);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,'ip='.$alip.'&port='.$alport);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);
$htm = curl_exec($ch);
curl_close($ch);
$r= json_decode($htm,1);
//print_r ($r);
//die();
//
//$out = file_get_contents($htm);
$tok = str_between($htm,'token=','\r' );
$serv = str_between($htm,'Location: http:\/\/','\/' );
$tok=str_replace(" ","",$tok);
$out="http://".$serv."/live".$dev."".$id."?token=".$tok."";
//for ($z=0;$z<100;$z++) {
$l="http://".$serv."/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok."";
$base=getSiteHost($l);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
$l_ts=array();
$m=array();
while (true) {
   $h = curl_exec($ch);
   if (!preg_match("/#EXTINF/i",$h)) break;
   $s="/[\/hlsr][\.\d\w\-\.\/\\\:\?\&\#\%\_\=\,]*(\.ts|\.mp4)/";
   $l_ts=$m[0];
   $m=array();
   preg_match_all($s,$h,$m);
   $c=count($m[0]);
   for ($n=0;$n<$c;$n++) {
    $file= $base.$m[0][$n];
    if (!in_array($m[0][$n], $l_ts)) {
     curl_setopt($link, CURLOPT_URL, $file);
     curl_exec($link);
    }
   }
}
curl_close($ch);
curl_close($link);
?>
