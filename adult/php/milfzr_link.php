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
  $a1=explode("Download MP4",$html);
  $a2=explode('href="',$a1[1]);
  $a3=explode('"',$a2[1]);
  $link1=$a3[0];
*/
$link1=str_between($html,'sources":[{"file":"','"');
if (!$link1) {
  $t1=explode('href="/videos-up',$html);
  $t2=explode('"',$t1[1]);
  $link1="http://milfzr.com/videos-up".$t2[0];
}
print $link1;
?>
