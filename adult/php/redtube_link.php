#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
//$html = file_get_contents($link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://www.redtube.com/");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
/*
$t1=explode("vpVideoSource",$html);
$t2=explode('"',$t1[1]);
$t3=explode('"',$t2[1]);
$out=str_replace("\/","/",$t3[0]);
*/
$t1=explode('videoUrl":"',$html);
$t2=explode('"',$t1[1]);
if (!$t2[0])
  $t2=explode('"',$t1[2]);
$out=$t2[0];
$out=str_replace("\\","",$out);
$out=str_replace("https","http",$out);
print $out;
?>
