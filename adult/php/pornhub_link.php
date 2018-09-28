#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$l = $_GET["file"];
//$html = file_get_contents($link);
$link="https://www.pornhub.com/embed/".$l;
//echo $link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
//echo $html;
$l=str_between($html,'quality":"480","videoUrl":"','"');
$l=str_replace('\\',"",$l);
//echo $l;
//die();
$h=substr(trim(str_between($html,'var flashvars =','utmSourc')),0,-1);
//echo $h;
$r=json_decode($h,1);
//print_r ($r);

foreach($r as $key => $r1) {
 //echo $r1;
 if (strpos($key,'quality_') !== false) {
   $out=$r1;
   break;
 }

}
$out=str_replace("https","http",$out);
print $out;
?>
