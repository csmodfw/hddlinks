#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["file"];
//$query=str_replace("|",",",$query);
$queryArr = explode(',', $query);
$tit = $queryArr[0];
$tit=str_replace("^",",",$tit);
$tit=str_replace("\\","",$tit);
$link = $queryArr[1];
$link=str_replace("|",",",$link);
$subtitle = $queryArr[2];
$server = $queryArr[3];
$hd = $queryArr[4];
$tv= $queryArr[5];
$imdb= $queryArr[6];

$ttxml="";
$ttxml .=$tit."\n"; //title
$ttxml .= $link."\n";     //an
$ttxml .=$subtitle."\n"; //image
$ttxml .=$server."\n"; //gen
$ttxml .=$hd."\n"; //regie
$ttxml .=$tv."\n"; //imdb
$ttxml .=$imdb."\n"; //imdb

//echo $ttxml;
$new_file = "/tmp/fs.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

