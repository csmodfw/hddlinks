#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$html = file_get_contents($link);
$link1 = urldecode(str_between($html, 'flv_url=', '&'));
if (!$link1) $link1=str_between($html,"html5player.setVideoUrlHigh('","'");
if (!$link1) $link1=str_between($html,"setVideoUrlLow('","'");
//$link=str_replace("&amp;","&",$link);
print $link1;
?>
