#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);

}

$file = $_GET["file"];

$exec='../../util/sbon.sh k=yes > /dev/null 2>/dev/null';
exec($exec);

$exec='../../util/sbon.sh c='.$file.' > /dev/null 2>/dev/null &';
exec($exec);

$streaming="";
$strm_stat="/tmp/streaming";
// started, ready , streaming
while (trim($streaming)<>"streaming") {
if (file_exists($strm_stat)) {
  $handle = fopen($strm_stat, "r");
  $streaming = fread($handle, filesize($strm_stat));
  fclose($handle);
  echo streaming;
  sleep (1);
 }
}

?>
