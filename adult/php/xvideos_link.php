#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$html = file_get_contents($link);
$t1=explode("HTML5Player",$html);
$t2=explode("http://",$t1[1]);
$t3=explode("'",$t2[2]);
if (!$t3[0]) $t3=explode("'",$t2[1]);
$link="http://".$t3[0];
//$link=str_replace("&amp;","&",$link);
print $link;
?>
