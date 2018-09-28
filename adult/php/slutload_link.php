#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$search3 = $_GET["file"];
//$html = file_get_contents($link);
$ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$search3.'" --no-check-certificate "'.$search3.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
  //echo $html;
$link1 = urldecode(str_between($html, 'data-url="', '"'));
$out=str_replace("&amp;","&",$link1);
if (strpos($out,"http") === false) $out="https:".$out;
$out=str_replace("&amp;","&",$out);
$out=str_replace("https","http",$out);
print $out;
?>
