<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$ip = $_SERVER['REMOTE_ADDR'];
$id= $_GET["id"];
$page = $_SERVER['PHP_SELF'];
$sec = "12";
header("Refresh: $sec; url=$page?id=$id");
$out="http://telekomtv.ro.edgesuite.net/shls/LIVE$".$id."/6.m3u8/Level(545259)?start=LIVE&end=END";
$out = file_get_contents("".$out."");
$out=str_replace("Level","http://telekomtv.ro.edgesuite.net/shls/LIVE$".$id."/6.m3u8/Level",$out);
echo $out=str_replace("#EXT-X-VERSION:4","#EXT-X-VERSION:3",$out);

?>