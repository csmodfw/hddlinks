#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//rtmp://ro.privesc.eu/storage/
exec("rm -f /tmp/list.txt");
$link = $_GET["file"];
//$html = file_get_contents($link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $html = curl_exec($ch);
  curl_close($ch);
//echo $html;
$id=str_between($html,"widget/live/",'"');
$l="http://www.privesc.eu/api/live/".$id;
//echo $l;
$h=file_get_contents($l);
//echo $h;
$link_mp4=trim(str_between($h,'mp4":"','"'));
$l=trim(str_between($h,'hls":"','"'));
//http://cache.privesc.eu/storage/20170516-06-10tv-sfatul-tarii.mp4/playlist.m3u8
//echo $l;
//$t1=explode("'file': '",$html);
//$t2=explode("'",$t1[1]);
//$y="mp4:".$t2[0];
//rtmp://videostar.privesc.eu/10tv/myStream

//$rtmp=str_between($h,'rtmp":"','"');
//$rtmp="rtmp://ro.privesc.eu/storage/";
//$opt="Rtmp-options:-W http://vjs.zencdn.net/swf/5.2.0/video-js.swf -p http://www.privesc.eu";

//$opt=str_replace(" ","%20",$opt);
//$opt=$opt.",".$rtmp;
//print $opt;
//print $link_mp4;
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
if (preg_match("/chunklist?(\w+)\.m3u8/",$h,$m)) {
$l=$base.$m[0].$base2;
//echo $l;
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
$s="/(\w+?(-|_))(\.ts|\.mp4)/";

//echo $total;
//preg_match_all($s,$h,$m);
preg_match_all("/.*ts.*/",$h,$m);
//print_r ($m);

$out="";
for ($k=0;$k<count($m[0]);$k++) {
  $out .=$base.$m[0][$k]."\r\n";
}
file_put_contents("/tmp/list.txt",$out);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand()."-".$q;
print $link;
?>
