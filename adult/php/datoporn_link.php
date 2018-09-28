#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
require_once("../../filme/php/JavaScriptUnpacker.php");
$link = $_GET["file"];
$link=str_replace("https","http",$link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://datoporn.co");
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
/*
  $usr_login=str_between($html,'usr_login" value="','"');
  $id=str_between($html,'id" value="','"');
  $fname=urlencode(str_between($html,'fname" value="','"'));
  $hash=str_between($html,'hash" value="','"');
//$l="http://datoporn.co/wlkpqrlnjhng";
$post="op=download1&usr_login=".$usr_login."&id=".$id."&fname=".$fname."&referer=&hash=".$hash."&imhuman=: undefined";
//echo $post;
sleep(5);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
  //die();
*/
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($html);
  //echo $out;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
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
$link1="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
print $link1;
?>
