#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
header('Content-type: video/mp4');
//header('Content-type: application/vnd.apple.mpegURL');
error_reporting(0);
set_time_limit(0);
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//$link = urldecode($_GET["file"]);
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = urldecode($queryArr[0]);
   $buf = $queryArr[1];
}
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
$id=str_between($html,'iframe src="','"');
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $id);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
//echo $html;

//$l=str_between($html,"video src='","'");
$t1=explode("<video",$html);
$l=str_between($t1[1],'src="','"');
//$l="http://1047.cdn.easyhost.com/origin02.hostway.ro/protected/tr01/npt/output/20180119120934_4CCE606CB47D442EBEACB782CA362714/20180119120934_4CCE606CB47D442EBEACB782CA362714.m3u8?st=uo41U-19VkZRee0i64-w5Q&e=1516524271";
$base=str_replace(strrchr($l, "/"),"/",$l);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://adevarul.ro");
      $h = curl_exec($ch);
      curl_close($ch);
      //echo $h;
      //$a1=explode("\n",$h);
      //print_r ($a1);
if (preg_match("/\.m3u8/",$h)) {
  preg_match_all("/RESOLUTION\=(\d+)/i",$h,$m);
  //print_r ($m);
  $max_res=max($m[1]);
  //echo $max_res."\n";
  $arr_max=array_keys($m[1], $max_res);
  $key_max=$arr_max[0];
  $buf = $key_max;
  //echo $buf;
preg_match_all("/(\d+)k\.m3u8/",$h,$m);
//print_r ($m);
//die();
$find = substr(strrchr($l, "/"), 1);
//echo $l."<BR>";
$base=str_replace($find,"",$l);
//$l=str_replace(".m3u8","-1128k.m3u8",$l);
//528k
$l=str_replace(".m3u8","-".$m[0][$buf],$l);
//echo $l;
//die();
$q=$m[1][$buf];
//$base=str_replace($find,"",$l);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://adevarul.ro");
      $h = curl_exec($ch);
      curl_close($ch);
      //echo $h;
      //die();
}

$out="";
preg_match_all("/.*ts.*/",$h,$m);
//echo $base.$m[0][0];
//die();
$out="";
$link = curl_init();
curl_setopt($link, CURLOPT_USERAGENT, $ua);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
for ($k=0;$k<count($m[0]);$k++) {
  //$out .=$base.$m[0][$k]."\r\n";

curl_setopt($link, CURLOPT_URL, $base.$m[0][$k]);
//curl_setopt($link, CURLOPT_REFERER, $file);

//curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
curl_exec($link);

}
curl_close($link);
?>
