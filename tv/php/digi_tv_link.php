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
   $id = urldecode($queryArr[0]);
   $buf = $queryArr[1];
}

$l="http://balancer.digi24.ro/?scope=".$id."&type=rtmp&quality=hq&outputFormat=jsonp&callback=jsonp_callback_".$buf;
//echo $l;
$h=file_get_contents($l);
$h=str_replace("\/","/",$h);
$t1=explode('streamer":"',$h);
$t2=explode('"',$t1[1]);
$rtmp=$t2[0];
$t1=explode("/",$rtmp);
$app=$t1[3];
$t1=explode('file":"',$h);
$t2=explode('"',$t1[1]);
$str=$t2[0];
$l="Rtmp-options:";
$l=$l." -a ".$app;
$l=$l." -p http://www.digi-online.ro ";
$l=$l."-y ".$str;
$l=$l.",".$rtmp;
$l=str_replace(" ","%20",$l);
print $l;
?>
