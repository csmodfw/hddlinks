#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://assets.sport.ro/assets/sport/2013/06/17/videos/67933/fulgerul.mp4?start=0
//http://assets.sport.ro/assets/sport/2013/06/17/videos/67933/fulgerul.jpg
$link = $_GET["file"];
$l = urldecode($link);
//$html = file_get_contents($link);
/*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_REFERER, "https://www.sport.ro");
  $html = curl_exec($ch);
  curl_close($ch);
  */
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
/*
$t1=explode("http://www.sport.ro/video/get-video",$html);
$t2=explode("&",$t1[1]);
$l1="http://www.sport.ro/video/get-video".$t2[0];
$html = file_get_contents($l1);
//$link = str_between($html, 'url":"', '"');
$link=str_between($html,'url: "','"');
$link = str_replace("\\","",$link);
if (!$link) {
  $link=str_between($html,'var image_file = "','"');
  $link=str_replace("jpg","mp4",$link);
}
*/
$link=str_between($html,'og:video" content="','"');
$link=str_replace("https","http",$link);
print $link;
?>
