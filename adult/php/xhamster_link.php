#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
/*
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://xhamster.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  */
  
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
//echo $html;
//die();
//$link = urldecode(str_between($html, "flv_url=", "&"));
//if (!$link) {
$t1=explode("sources",$html);
$html=$t1[1];
$html=str_replace("\\","",$html);
//echo $html;
//preg_match('/[\d+p":"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $html, $m);
//print_r ($m);
//die();
//$link = urldecode(str_between($html, "flv_url=", "&"));
//if (!$link) {
$t1=explode('720p":"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
if (!$link) {
$t1=explode('480p":"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
}
if (!$link) {
$t1=explode('360p":"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
}
if (!$link) {
$t1=explode('240p":"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
}
$link1=str_replace("\\","",$link);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $link1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0');
      curl_setopt($ch, CURLOPT_REFERER, "https://xhamster.com");
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_NOBODY,true);
      curl_setopt($ch, CURLOPT_HEADER,1);
      $ret = curl_exec($ch);
      curl_close($ch);
      //echo $ret;
      $t1=explode("Location:",$ret);
      $t2=explode("\n",$t1[1]);
      $link=trim($t2[0]);
      if (!$link) $link=$link1;
/*
if (strpos($link,"https") === false)
   $link=str_replace("https","http",$link);
*/
//else {
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --referer="https://xhamster.com" --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
//}
print $link;
?>
