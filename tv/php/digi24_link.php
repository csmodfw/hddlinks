#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://www.digi24.ro/js/init.onedb.js?v=21
//http://s1.digi24.ro//onedb:transcode/51e4230795f9cff067000000.480p.mp4
//s2.digi24.ro
//s6.digi24.ro
//onedb/51e4230795f9cff067000000
$link = $_GET["file"];
$link=str_replace(" ","+",$link);
//echo $link;
$cookie="/tmp/digi.dat";
  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q -U "'.$ua.'"   --no-check-certificate "'.$link.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $html=shell_exec($exec);
  //echo $html;
  //die();
//http://s1.digi24.ro/onedb/transcode/5794a369682ccfd2588b4567.480p.mp4

$movie=str_replace("\\","",str_between($html,'480p.mp4":"','"'));
$movie=str_replace("https","http",$movie);
print $movie;
?>
