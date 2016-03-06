#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}

$query = $_GET["file"];
$title = "";
if($query) {
   $queryArr = explode(',', $query);
   $pin = urldecode($queryArr[0]);
   $srv = $queryArr[1];
   if (sizeof($queryArr)>2)$title = $queryArr[2];
}
$offline=0;
$s=mt_rand(1,9);
$link="http://stream-0".$s.".vty.dailymotion.com/".$srv."/dc/1/".$pin."/live.isml/manifest";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);


if (strpos($html,'HTTP/1.1 404') !== false) {

for( $n=29; $n>=20; $n-- ) {
$srv=$n;
$link="http://stream-0".$s.".vty.dailymotion.com/".$srv."/dc/1/".$pin."/live.isml/manifest";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);

if (strpos($html,'HTTP/1.1 200') !== false) {
$n=0;
$offline=0;
} else {
$offline=1;
}

}
}
if ($offline != 0) {
echo "Channel offline ".$title."\n\r";
die();
}
//$n=0;
$aud = str_between($html,'<!-- Created with Unified Streaming Platform(version=1.5.6) -->','</SmoothStreamingMedia>');
$vid = str_between($html,'Type="video"','</SmoothStreamingMedia>');
$videos = explode('Index="',$vid);
unset($videos[0]);
$videos = array_values($videos);
$t1 = explode('"',$videos[sizeof($videos)-1]);
$vid = str_between($vid,'Index="'.$t1[0].'"','</StreamIndex>');
$live=trim(str_between($aud,'Url="Events(live-',')'));
$audio=trim(str_between($aud,'Bitrate="','"'));
$video=trim(str_between($vid,'Bitrate="','"'));


$out="http://stream-0".$s.".vty.dailymotion.com/".$srv."/dc/1/".$pin."/live.isml/events(live-".$live.")/live-audio%3D".$audio."-video%3D".$video.".m3u8";	

if ($title) {
header('Content-type: application/vnd.apple.mpegURL');
header('Content-Disposition: attachment; filename="'.$title.'".m3u8"');
header("Location: $out");
} else

print $out;

?>
