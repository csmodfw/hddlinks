#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
exec ("rm -f /tmp/test.xml");
$link = $_GET["file"];
$l="http://www.tvseries.net".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  if (strpos($link,"/tvshows") !== false || strpos($link,"/tvplay") !== false) {
  $t1=explode('checkurl_tv.php',$html);
  $t2=explode('"',$t1[1]);
  $l1="http://www.tvseries.net/checkurl_tv.php".$t2[0];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $movie = curl_exec($ch);
  curl_close($ch);
  } else {
  $t1=explode('movieplay_size.php',$html);
  $t2=explode('"',$t1[1]);
  $l1="http://www.tvseries.net/movieplay_size.php".$t2[0];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $movie = curl_exec($ch);
  curl_close($ch);
  }
  $movie=str_replace("play2.vip","play.vip",$movie);
print $movie;
?>
