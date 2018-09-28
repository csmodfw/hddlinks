#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$l=urldecode($link);
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q  -U "'.$ua.'"  --no-check-certificate "'.$l.'" -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$link=str_between($html,'<source src="','"');
if (!$link) {
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $html, $m);
  $link=$m[1];
}
$link=str_replace("https","http",$link);
print $link;
?>
