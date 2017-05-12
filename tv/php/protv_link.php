#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function mylink($string){
$html = file_get_contents($string);
$l = str_between($html,'value=&quot;','&');
if ($l <> "") {
$file = get_headers($l);
 foreach ($file as $key => $value)
   {
    if (strstr($value,"Location"))
     {
      $url = ltrim($value,"Location: ");
      $link1 = str_between($url,"file=","&");
     } // end if
   } // end foreach
   if ($link1 <> "") {
   return $link1;
}
}
}
//http://assets.sport.ro/assets/protv/2012/07/27/videos/18872/varciu_beta.flv?start=0
//echo urldecode("http%3A%2F%2Fwww.protv.ro%2Fvideo-cop%2Fget-video%2Fvideo_id%2F18872%2Fvideo_player_div%2FminiPlayerVideo%2Fvideo_player%2Fcme%2Fplayer_dimension%2F600X338%2Fvideo_key%2Fhappy-hour%2Fkey_id%2F%2Farticle_category_url_identifier%2Fmultimedia");
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $image = $queryArr[1];
}
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
$cookie="D:\protv.txt";
$cookie="/tmp/protv.txt";
$l = "http://protvplus.ro".urldecode($link);
//echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://protvplus.ro");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
preg_match("/http(.*?)m3u8/",$h,$m);

$l=$m[0];
//$l="http://cdn.drm.protv.ro/protvplus.ro/2016/12/13/8797692d046b8af35c2f41f6ab253b27.ism/8797692d046b8af35c2f41f6ab253b27.m3u8";
$base=str_replace(strrchr($l, "/"),"/",$l);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://protvplus.ro");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
//echo $h;

preg_match_all("/([a-z0-9A-Z=-]+)\.m3u8/",$h,$m);
//print_r ($m);
$l=$base.$m[0][0];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://protvplus.ro");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
//echo $h;
$l1=str_between($h,'URI="','"')."";
//echo $l1;
$l2="http://drmapi.protv.ro/hlsengine/prepare/";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l2);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://protvplus.ro");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h2 = curl_exec($ch);
  curl_close($ch);
//61307613
//$l1="http://voyo.ro/lbin/mplay/eshop/ws/getAesKey.php?id=61307613";
//$l1="http://drmapi.protv.ro/hlsengine/prepare/";
//   'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
$head =array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');
  $head = array('Accept: */*',
   'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
   'Accept-Encoding: deflate',
   'Origin: http://protvplus.ro'
  );
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://protvplus.ro");
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h1 = curl_exec($ch);
  curl_close($ch);
  $m=unpack("H*",$h1);
  //print_r ($m);
  $key=$m[1];
if ($key)
  $exec2='| /opt/bin/openssl aes-128-cbc -d -iv 00000000000000000000000000000001 -K '.$key.' -nosalt';
else
  $exec2="";
$s="/([a-z0-9A-Z=-]+)(\.ts|\.mp4)/";
preg_match_all($s,$h,$m);
//print_r ($m);

$out="";
for ($k=0;$k<count($m[0]);$k++) {
  $out .=$base.$m[0][$k]."\r\n";
}
/*
for ($k=0;$k<10;$k++) {
  $out .=$base.$m[0][$k]."\r\n";
}
*/
file_put_contents("/tmp/list.txt",$out);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O - '.$exec2;
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
print $link;

?>
