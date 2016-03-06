<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$id = urldecode($_GET["id"]);
$title = urldecode($_GET["title"]);
    $title1=strtolower($title);
    $t1=explode("(",$title1);
    $title1=trim($t1[0]);
    $title1=str_replace(" ","-",$title1);

if (!$id) 
	$id=trim(file_get_contents("/tmp/play.id.dat"));
	$out=trim(file_get_contents("/tmp/www/".$id.".m3u8"));

$t2 =  explode("\n", $out);
//print_r($t2);
$idc = substr(str_between($t2[6],'Segment(',').ts'), -7);
$time1 = substr(str_between($t2[6],'Segment(',').ts'),0 , -7);
$time2 = $time1 + 6;
$t1 = time() - 6;
if ($t1 > $time2) {
$t1 = $time2;
//echo $t1;
//die();
$t3 =  explode(":", $t2[4]);
$seq = $t3[1] + 1;

//5280720 - DisneyChannel
//7275180 - EurosportHD2
$out='#EXTM3U
#EXT-X-VERSION:3
#EXT-X-TARGETDURATION:6
#EXT-X-PROGRAM-DATE-TIME:'.date("Y-m-d").'T'.date("H:i:s").'Z
#EXT-X-MEDIA-SEQUENCE:'.$seq.'
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.$t1.$idc.').ts
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.($t1+6).$idc.').ts
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.($t1+12).$idc.').ts
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.($t1+18).$idc.').ts
#EXTINF:6,
http://telekomtv.ro.edgesuite.net/shls/LIVE$'.$id.'/6.m3u8/Level(545259)/Segment('.($t1+24).$idc.').ts
';

//echo $out;
if ($id) {
  $movie_file="/tmp/www/".$id.".m3u8";
   $fh = fopen($movie_file, 'w');
   fwrite($fh, $out, strlen($out));
   fclose($fh);
}
}
?>
