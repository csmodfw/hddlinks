#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$html = file_get_contents($link);
/*
$link = str_between($html, 'encodeURIComponentSub("', '"');
$html = file_get_contents($link);
$link1 = str_between($html, "<url>", "</url>");
$link1=str_replace("&amp;","&",$link1);
*/
//$link1=urldecode(str_between($html,'flashvars.video_url = "','"'));
//$link1=urldecode(str_between($html,'vidSource = unescape("','"'));
//echo $html;
$t1=explode('playerData.cdnPath480',$html);
$t2=explode("'",$t1[1]);
$t3=explode("'",$t2[1]);
$link1=$t3[0];
//echo $link1;
//$t1=explode("encodeURIComponent('",$link1);
//$link=$t1[1];
print $link1;
?>
