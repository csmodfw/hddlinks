#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$l = $link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://www.spankwire.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
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
if (strpos($link1,"http") === false) $link1="http:".$link1;
$link1=str_replace("https","http",$link1);
//echo $link1;
//$t1=explode("encodeURIComponent('",$link1);
//$link=$t1[1];
print $link1;
?>
