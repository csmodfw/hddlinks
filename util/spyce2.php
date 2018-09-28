#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//error_reporting(0);
$link=$_GET["file"];
$f="/usr/local/etc/dvdplayer/dev.txt";
if (file_exists($f))
  $dev=trim(file_get_contents($f));
else {
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f))
  $pass=trim(file_get_contents($f));
else
  $pass="";
$lp="http://hd4all.ml/d/gazv.php?c=".$pass;
$dev = file_get_contents("".$lp."");
}
$link="http://iptvmac.cf:8080/live".$dev."/".$link.".m3u8";
//$out2="http://iptvmac.cf:8080/live".$dev."/".$link.".ts";
echo $link;
?>
