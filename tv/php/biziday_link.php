#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$link=urldecode($link);
$html=file_get_contents($link);
$l=str_between($html,'<iframe src="','"');
$cookie="/tmp/vimeo.txt";
if (strpos($l,"vimeo") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$l);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
  //die;
  $t1=explode('url":"',$h);
  $t2=explode($t1[2],'"');
  $mobile=$t2[2];
  //$t3=explode('"',$t1[3]);
  //$link=$t3[0];
  $a1=explode('mime":"video/mp4"',$h);
  $n=count($a1);
  $a2=explode('url":"',$a1[$n-1]);
  $a3=explode('"',$a2[1]);
  $link=str_replace("https","http",$a3[0]);
} elseif (strpos($l,"digi24") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $h=curl_exec($ch);
  curl_close($ch);
$id=str_between($h,'data-src="','"');
$id=str_replace("onedb","onedb:transcode",$id);
$link= "http://s1.digi24.ro//" .$id.".480p.mp4";
}
print $link;
?>
