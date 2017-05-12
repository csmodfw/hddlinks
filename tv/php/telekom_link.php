#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id= urldecode($_GET["file"]);
if (strpos($l,"digiedge") !== false)
  $com="-c --tries=0 --read-timeout=10 --wait=5";
else
  $com="";
//$link = urldecode($_GET["file"]);
exec("rm -f /tmp/list.txt");
//$l="http://hls.protv.md/hls/protv.m3u8";
$l="http://telekomtv.ro.edgesuite.net/shls/LIVE$".$id."/index.m3u8/S\$d2ESSExTLUxJVkUtUEMtU0QtQ0xSEgaf/Level(1677721)?start=LIVE&end=END";
//$out="http://telekomtv.ro.edgesuite.net/shls/LIVE$".$id."/index.m3u8/S\$d2EdSExTLUxJVkUtQW5kcm9pZFRhYmxldC1TRC1FTkMSBp8_/Level(1677721)?start=LIVE&end=END";
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
//echo $h."\r\n";
$base=str_replace(strrchr($l, "/"),"/",$l);
$t1=explode("?",$l);
if (sizeof ($t1) > 1 )
  $base2="?".$t1[1];
else
  $base2="";
preg_match("/#EXT-X-MEDIA-SEQUENCE:(\d+)/",$h,$m);
$base_inc=$m[1];
$s="/([a-z0-9A-Z=-]+)(\.ts|\.mp4)/";
preg_match("/#EXT-X-TARGETDURATION:(\d+)/",$h,$m);
$sec=$m[1];
//Level(1677721)/Segment(14940982928943140).ts
//echo $base_inc." ".$sec."\r\n";
$s="/Level\((\d+)\)\/Segment\((\d+)\)\.ts/";
preg_match_all($s,$h,$m);
//print_r ($m);
//$rest = substr("abcdef", 0, -1);  // returns "abcde"
//echo $m[2][0];
$part1 = substr($m[2][0], 0, -7);
//echo $part1."\r\n";;
//$rest = substr("abcdef", -2);    // returns "ef"
$part2 = substr($m[2][0], -7);
//echo $part2."\r\n";
$out="";
$total=intval(3600/$sec);
for ($k=0;$k<$total;$k++) {
$out .=$base."Level(".$m[1][0].")/Segment(".($part1 + $sec*$k).$part2.").ts"."\r\n";
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
