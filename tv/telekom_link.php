#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
date_default_timezone_set('Europe/Athens');
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}

$query = $_GET["file"];
$title = "";
$add = "";
if($query) {
   $queryArr = explode(',', $query);
   $id = urldecode($queryArr[0]);
   if (sizeof($queryArr)>1)$title = $queryArr[1];
}
if ( file_exists("/tmp/www/cgi-bin/scripts/util/kks.cgi") ) {
unlink("/tmp/www/cgi-bin/scripts/util/kk.cgi");
unlink("/tmp/www/cgi-bin/scripts/util/kks.cgi");
unlink("/tmp/www/cgi-bin/scripts/tv/telekom_link.php");
unlink("/tmp/www/cgi-bin/scripts/tv/telekom_m3u8.php");
}

  $test_file="/tmp/www/".$add."play.id.dat";
   $fh = fopen($test_file, 'w');
   fwrite($fh, $id, strlen($id));
   fclose($fh);
   
if ( ! file_exists("/tmp/www/play.id.dat") ) $add = "cgi-bin/scripts/util/";

  $test_file="/tmp/www/".$add."play.id.dat";
   $fh = fopen($test_file, 'w');
   fwrite($fh, $id, strlen($id));
   fclose($fh);

if ( ! file_exists("/tmp/www/".$add."/play.id.dat") ) $done = exec('mount -o remount,rw /');


$list = glob("/tmp/www/".$add."*.m3u8");
   foreach ($list as $l) {
    str_replace(" ","%20",$l);
    unlink($l);
}

$link = "http://restrictions.directone.ro/timestamp.php";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $time = curl_exec($ch);
  curl_close($ch);

$link = "http://www.alltv.96.lt/tk/extkk.php?id=".$id;
//$out=file_get_contents($link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $out = curl_exec($ch);
  curl_close($ch);

$t2 =  explode("\n", $out);
$idc = substr(str_between($t2[6],'Segment(',').ts'), -7);
$time1 = substr(str_between($t2[6],'Segment(',').ts'),0 , -7);
$time2 = substr(str_between($t2[8],'Segment(',').ts'),0 , -7);

$t1 = time - 6;
if ($t1 > $time2)
$t1 = $time2;
else 
$t1 = $time1;
$t3 =  explode(":", $t2[4]);
$seq = $t3[1] + 1;

$playtime=900;
if ($title) $playtime=300;

//5280720 - DisneyChannel
//7275180 - EurosportHD2
$out='#EXTM3U
#EXT-X-VERSION:3
#EXT-X-TARGETDURATION:6
#EXT-X-PROGRAM-DATE-TIME:'.date("Y-m-d").'T'.date("H:i:s").'Z
#EXT-X-MEDIA-SEQUENCE:'.$seq.'
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.$t1.$idc.').ts
';
for( $i=1; $i<$playtime; $i++ ) {
$k=$t1+$i*6;
$out=$out.'#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.($k).$idc.').ts
';
}

// echo $out
  $channel_file="/tmp/www/".$add.$id.".m3u8";
   $fh = fopen($channel_file, 'w');
   fwrite($fh, $out, strlen($out));
   fclose($fh);

$out="http://127.0.0.1/".$add.$id.".m3u8";

if ($title) {
header('Content-type: application/vnd.apple.mpegURL');
header('Content-Disposition: attachment; filename="'.$title.'".m3u8"');
header("Location: $out");
} else

print $out;

?>
