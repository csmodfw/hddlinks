#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//exec ("rm -f /tmp/test.xml");
$id = $_GET["file"];
$file="http://panel.erstream.com/api/er/Get?cid=".$id."&format=8&customerid=16&action=redirect&id=".$id."";
/*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $file);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch,CURLOPT_REFERER,"http://www.filmon.com/");
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,0);
  //curl_setopt($ch, CURLOPT_NOBODY  ,1);
  curl_setopt($ch, CURLOPT_HEADER  ,1);
  $r=curl_exec($ch);
  curl_close($ch);
  //echo $r;
*/
  $r=file_get_contents($file);
  //echo $r;
  $link=str_between($r,'<id>','</id>');
  $l="http://w-bk1.ercdn.net:1935/filmbox/_definst_/smil:".$link."/manifest.m3u8";
  $link1="http://127.0.0.1/cgi-bin/scripts/util/m3u8.php?file=".urlencode($l);

print $link1;
?>
