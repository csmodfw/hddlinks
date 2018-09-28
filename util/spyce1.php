#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
//header('Content-type: video/mp4');
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
		// extract full host components and return host
		return $siteParts['scheme'].'://'.$siteParts['host'].":".$siteParts['port'];
	}
$id= urldecode($_GET["file"]);
//$id="55.m3u8";
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f))
  $pass=trim(file_get_contents($f));
else
  $pass="";
$l="http://hd4all.ml/d/gasvk.php?c=".$pass;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; rv:57.0) Gecko/20100101 Firefox/57.0");
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h = curl_exec($ch);
      curl_close($ch);
$tok = str_between($h,'tok="','"');
$serv = str_between($h,'url="','"' );
if (!$tok) die();
if (!$serv) die();
$l="http://r1.fr.web.xn--8oux7cpmf3du51f21q.xn--3ds443g:25461/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok1;
$l="http://r2.fr.web.xn--8oux7cpmf3du51f21q.xn--3ds443g:25461/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok1;
//if !($serv && $tok)  die();
 $l="http://".$serv.":25461/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok;
$base=getSiteHost($l);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
      //if (strpos($h,"200 OK") === false) die();
//echo $h;
//die();

$s="/[\/hlsr][\.\d\w\-\.\/\\\:\?\&\#\%\_\=\,]*(\.ts|\.mp4)/";
preg_match_all($s,$h,$m);
//print_r ($m);
$c=count($m[0]);
//die();
$s=$m[1];
$out1="";
for ($n=0;$n<$c;$n++) {
$file= $base.$m[0][$n];
 $out1 .=$file."\r\n";
}
//}
file_put_contents("/tmp/list.txt",$out1);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O - ';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
print $link;
?>
