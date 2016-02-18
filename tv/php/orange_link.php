#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}

$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $pin = urldecode($queryArr[0]);
   $srv = $queryArr[1];
}
$link="http://stream-01.vty.dailymotion.com/".$srv."/dc/1/".$pin."/live.isml/manifest";
$html=file_get_contents($link);
//$n=0;
$aud = str_between($html,'<!-- Created with Unified Streaming Platform(version=1.5.6) -->','</SmoothStreamingMedia>');
$vid = str_between($html,'Type="video"','</SmoothStreamingMedia>');
$vid = str_between($vid,'Index="2"','</SmoothStreamingMedia>');
$live=trim(str_between($aud,'Url="Events(live-',')'));
$audio=trim(str_between($aud,'Bitrate="','"'));
$video=trim(str_between($vid,'Bitrate="','"'));


$out="http://stream-01.vty.dailymotion.com/".$srv."/dc/1/".$pin."/live.isml/events(live-".$live.")/live-audio%3D".$audio."-video%3D".$video.".m3u8";

print $out;
?>
