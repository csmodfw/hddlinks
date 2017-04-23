#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
//$html = file_get_contents($link);
$ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
/*
$t1=explode("vpVideoSource",$html);
$t2=explode('"',$t1[1]);
$t3=explode('"',$t2[1]);
$out=str_replace("\/","/",$t3[0]);
*/
$t1=explode('source src="',$html);
$t2=explode('"',$t1[1]);
//$t3=explode("'",$t2[2]);
$out=$t2[0];
//if (strpos($out,"http") === false) $out="http:".$out;
if (strpos($out,"http") === false) $out="https:".$out;
$out=str_replace("&amp;","&",$out);
$out=str_replace("https","http",$out);
print $out;
?>
