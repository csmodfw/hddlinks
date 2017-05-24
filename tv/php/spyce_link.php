#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
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
exec("rm -f /tmp/list.txt");
$id= urldecode($_GET["file"]);
$alip = '149.202.196.52';//allip
$alport = '25461';//allport
$dev = file_get_contents("http://mxcore.forithost.com/dev.txt");
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

//
//$out = file_get_contents($htm);
$tok = str_between($htm,'token=','\r' );
$serv = str_between($htm,'Location: http:\/\/','\/' );
$tok=str_replace(" ","",$tok);
$out="http://".$serv."/live".$dev."".$id."?token=".$tok."";
$l="http://".$serv."/live/I02CzDS14C/EHdAiyOOS0/".$id."?token=".$tok."";
//echo $l;
//$l="http://hls.protv.md/hls/protv.m3u8";
$base=getSiteHost($l);
$t1=explode("?",$l);
if (sizeof ($t1) > 1 )
  $base2="?".$t1[1];
else
  $base2="";
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
//echo $h;
//die();

preg_match("/#EXT-X-MEDIA-SEQUENCE:(\d+)/",$h,$m);
$base_inc=$m[1];
$s="/[\/hlsr][\.\d\w\-\.\/\\\:\?\&\#\%\_\=,]*(".$m[1].")(\.ts|\.mp4)/";
preg_match("/#EXT-X-TARGETDURATION:(\d+)/",$h,$m);
$sec=$m[1];
$total=intval(3600/$sec);
//echo $total;
preg_match($s,$h,$m);
//print_r ($m);
//die();
$s=$m[1];
$out="";
for ($n=0;$n<$total;$n++) {
  $out .=$base.str_replace("_".$m[1],"_".($m[1]+$n),$m[0])."\r\n";
}
//echo $out;
file_put_contents("/tmp/list.txt",$out);
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
