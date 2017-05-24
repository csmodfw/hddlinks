#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$l= urldecode($_GET["file"]);
if (strpos($l,"digiedge") !== false)
  $com="-c --tries=0 --read-timeout=10 --wait=5";
else
  $com="";
//$link = urldecode($_GET["file"]);
exec("rm -f /tmp/list.txt");
//$l="http://hls.protv.md/hls/protv.m3u8";
$base=str_replace(strrchr($l, "/"),"/",$l);
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
if (preg_match("/chunklist(\w+)\.m3u8/",$h,$m)) {
$l=$base.$m[0].$base2;
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
}
//echo $h;
  $l1=str_between($h,'URI="','"');
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  $m=unpack("H*",$html);
  //print_r ($m);
  $key=$m[1];
if ($key)
  $exec2='| /opt/bin/openssl aes-128-cbc -d -iv 00000000000000000000000000000001 -K '.$key.' -nosalt';
else
  $exec2="";
preg_match("/#EXT-X-MEDIA-SEQUENCE:(\d+)/",$h,$m);
$base_inc=$m[1];
$s="/(\w+?(-|_))".$m[1]."(\.ts|\.mp4)/";
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
  $out .=$base.$m[1].($base_inc+$n).$m[3].$base2."\r\n";
}
//echo $out;
//die();
file_put_contents("/tmp/list.txt",$out);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q '.$com.' -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O - '.$exec2;
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
print $link;
?>
