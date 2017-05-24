#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
//include ("y.php");
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
############################################################################
# Copyright: ©2011, ©2012 wencaS <wenca.S@seznam.cz>
# This file is part of xListPlay.
# licence GNU GPL v2
############################################################################
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$a_itags=array(37,22,18);

$file=urldecode($_GET["file"]);
if(preg_match('/youtube\.com\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $file, $match)) {
  $id = $match[2];
  $l = "http://keepvid.com/?url=?https://www.youtube.com/watch?v=".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4; Nexus 7 Build/KOT24) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.105 Safari/537.36');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $html = curl_exec($ch);
  curl_close($ch);
  $t1=explode('downloadConfirm',$html);
  $t2=explode('href="',$t1[1]);
  $t3=explode('"',$t2[1]);
  $link = $t3[0];
}


$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
//$link="http://127.0.0.1/cgi-bin/scripts/util/curl.cgi?".$link;
//$link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$link;
//}
print $link;


/*
$link=str_replace("https","http",$link);
$link="http://127.0.0.1/cgi-bin/scripts/util/w.cgi?".$link;
print $link;
*/
//https://r11---sn-4g57kn6r.googlevideo.com/videoplayback?ipbits=0&sver=3&expire=1407096169&ratebypass=yes&signature=B5F261ED7B68980A78154F424E4A4295C55B3746.932AB47B7B1F1A4D28CA94BAD6E6780C6ED17175&mws=yes&itag=18&fexp=900235%2C902408%2C910830%2C914100%2C927622%2C930817%2C931983%2C934024%2C934030%2C934923%2C946008&nh=IgpwcjAxLmZyYTAzKgkxMjcuMC4wLjE&key=yt5&mime=video%2Fmp4&initcwndbps=2605000&upn=Fe9xkaU-jv8&source=youtube&mm=31&id=o-AKM3jv2J0GQAsl81kU7pVgZqoxJmSznmZ-gFP2Gc5Q18&requiressl=yes&ip=78.96.189.71&sparams=id%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Cmime%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&mv=m&mt=1407074505&ms=au&cmbypass=yes
?>
