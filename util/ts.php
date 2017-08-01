#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
header('Content-type: video/mp4');
//header('Content-type: application/vnd.apple.mpegURL');
error_reporting(0);
set_time_limit(0);
$l = urldecode($_GET["file"]);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
//$ua="Mozilla/5.0 (Windows NT 10.0; rv:54.0) Gecko/20100101 Firefox/54.0";
//$l="http://79.172.78.199:4022/udp/239.255.10.157:5500";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch, CURLOPT_VERBOSE,1);
      curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_NOBODY,1);

      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      $info=curl_getinfo($ch);
      curl_close($ch);
      //print_r ($info);
      //echo $h;
      //die();
      if (!preg_match("/video|audio|octet-stream/",$h) && !preg_match("/\/udp\//",$l)) die();

      //if (strpos($h,"200 OK") === false) die();
if (preg_match("/\.ts/",$l)) {
while (1) {
$link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($link, CURLOPT_URL, $l);
curl_setopt($link, CURLOPT_FOLLOWLOCATION  ,1);
curl_exec($link);
curl_close($link);
sleep (2);
}
} else {
$link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($link, CURLOPT_URL, $l);
curl_setopt($link, CURLOPT_FOLLOWLOCATION  ,1);
curl_exec($link);
curl_close($link);
}
?>
