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


$serv=file_get_contents("/tmp/serv.txt");
$tok=file_get_contents("/tmp/tok.txt");
//$serv="http://r2.fr.web.xn--8oux7cpmf3du51f21q.xn--3ds443g";
$l="http://".$serv.":25461/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok;

$base=getSiteHost($l);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
//$ua="Mozilla/5.0 (Windows NT 10.0; rv:57.0) Gecko/20100101 Firefox/57.0";

$l_ts=array();
$m=array();
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_USERAGENT, $ua);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $l);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
while (true) {
   $h = curl_exec($ch);

   //if (!preg_match("/#EXTINF/i",$h)) break;
   $s="/[\/hlsr][\.\d\w\-\.\/\\\:\?\&\#\%\_\=\,]*(\.ts|\.mp4)/";
   $l_ts=$m[0];
   $m=array();
   preg_match_all($s,$h,$m);
   $c=count($m[0]);
   for ($n=0;$n<$c;$n++) {
    $file= $base.$m[0][$n];
    if (!in_array($m[0][$n], $l_ts)) {
     curl_setopt($ch1, CURLOPT_URL, $file);
     curl_exec($ch1);

    }
  }
}
curl_close($ch);
curl_close($ch1);
   //$k++;
//}



?>
