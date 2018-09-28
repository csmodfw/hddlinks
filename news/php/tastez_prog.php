#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
//error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$id = $_GET["file"];

function c($title) {
     $title = htmlentities($title);
     $title = str_replace("&ordm;","s",$title);
     $title = str_replace("&Ordm;","S",$title);
     $title = str_replace("&thorn;","t",$title);
     $title = str_replace("&Thorn;","T",$title);
     $title = str_replace("&icirc;","i",$title);
     $title = str_replace("&Icirc;","I",$title);
     $title = str_replace("&atilde;","a",$title);
     $title = str_replace("&Atilde;","I",$title);
     $title = str_replace("&ordf;","S",$title);
     $title = str_replace("&acirc;","a",$title);
     $title = str_replace("&Acirc;","A",$title);
     $title = str_replace("&oacute;","o",$title);
     $title = str_replace("&amp;", "&",$title);
     return $title;
}
$l="http://tastez.ro/program.php?go=guide&chn=".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://tastez.ro");
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);

$t1=explode("</form>",$html);
$html1=$t1[1];
//echo $html;
if (strpos($html,'<div class="check"') !== false) {
  //$t1=explode('<div class="check"',$html);
  $html=str_between($html,'<div class="check">','</html');
  }

$videos = explode("<u>", $html);

unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
 $t1=explode("<",$video);
 $ora=$t1[0];
 $title=str_between($video,'<b>','</b>');
 $title = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$title);
print $ora.' '.$title."\n\r";
}

?>

