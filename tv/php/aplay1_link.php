#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id= urldecode($_GET["file"]);
$link=file_get_contents("http://aplay.dev.digitalag.ro/ajaxs/embedlive?channelid=21");
//$l=str_between($link,"liveEmbedHTML5('","'");
$tok = str_between($link,"?","',");
$l="".$id."?".$tok."";
$link="http://127.0.0.1/cgi-bin/scripts/util/m3u8.php?file=".urlencode($l);
print $link;
?>
