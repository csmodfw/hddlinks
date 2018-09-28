#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$l="https://player.vimeo.com/video/".$link;
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
  //preg_match('/[url":"]([http|https][\-\~\%\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4\"))/', $h, $m);
  //print_r ($m);
  $t1=explode('url":"',$h);
  for ($k=1;$k<count($t1);$k++) {
    $t2=explode('"',$t1[$k]);
    $movie=$t2[0];

    if (strpos($movie,".mp4") !== false) break;
  }
$movie=str_replace("https","http",$movie);
print $movie;
?>
