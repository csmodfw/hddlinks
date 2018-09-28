#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://anybunny.com/");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
$id=str_between($html,"embed/",'"');
$l="https://vartuc.com/embed/".$id;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_REFERER,"https://vartuc.com/");
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
  //die();
  $t1=explode("player.php",$h);
  $t2=explode("'",$t1[1]);
  $ll="https://vartuc.com//kt_player/player.php".$t2[0];
//echo $ll;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $ll);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_REFERER,"https://vartuc.com/");
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h1 = curl_exec($ch);
  curl_close($ch);
  //echo $h1;
preg_match("/video_url:([^}]+)/",$h1,$m);
//echo $m[0];
preg_match_all('/(gh\w\w\w)="([^"]+)/',$h1,$m1);
//print_r ($m1);
for ($i=0 ; $i<count($m1[0]);$i++) {
  $link=str_replace($m1[1],$m1[2],$m[0]);
}
//preg_match_all('/(ghc\w\w)="([^"]+)/',$h1,$m1);
//print_r ($m1);

$link=str_replace('"',"",$link);
$link=str_replace("+","",$link);
//echo $link;
//die();
$t1=explode("video_html5_url:",$link);
$link1=trim($t1[1]);
if (!$link1) {
  $t2=explode("video_url:",$link);
  $t3=explode(",video_html5",$t2[1]);
  $link1=$t3[0];
}
$t1=explode("video_url:",$link);
$t2=explode(",video_html5_url",$t1[1]);
$link11=$t2[0];
if (strpos($link1,"xhcdn") !== false) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $link1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0');
      curl_setopt($ch, CURLOPT_REFERER, "http://xhamster.com");
      curl_setopt($ch, CURLOPT_NOBODY,true);
      curl_setopt($ch, CURLOPT_HEADER,1);
      $ret = curl_exec($ch);
      curl_close($ch);
      $t1=explode("Location:",$ret);
      $t2=explode("\n",$t1[1]);
      $link2=trim($t2[0]);
      //echo $ret;
      //die();
      if (!$link2)
        $out=$link1;
      else
       $out=$link2;
} else {
  $out=$link1;
}
if (strpos($out,"xvideos") === false || strpos($out,"xnxx") === false)
  $out=str_replace("https","http",$out);
else {
$ua1="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$out1='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua1.'" "'.$out.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out1);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$out="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
}
print $out;
?>
