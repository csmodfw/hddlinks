#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
preg_match('/openload\.co\/(f\/|watch\?v=|embed\/)([\w\-]+)/', $link, $match);
$file = $match[2];
   $key="3E1G6Mjs";
   $login="de2a2a3fe31fdb89";
   $ticket="https://api.openload.co/1/file/dlticket?file=".$file."&login=".$login."&key=".$key;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ticket);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $ret = curl_exec($ch);
      curl_close($ch);
      //echo $ret;
 $t=str_between($ret,'ticket":"','"');
    $captcha="";
   //$invalid_t=false;
  $dl="https://api.openload.co/1/file/dl?file=".$file."&ticket=".$t."&captcha_response=".$captcha;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $dl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $ret = curl_exec($ch);
      curl_close($ch);
      //echo $ret;
  $link=str_between($ret,'url":"','"');
  $link=str_replace("\/","/",$link);
  $out=str_replace("https","http",$link);
//$html = file_get_contents($link);
/*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $html = curl_exec($ch);
  curl_close($ch);
$out=str_between($html,"player.swf?config=",'"');
//echo $out;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $out);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $out=trim(str_between($html,"<filehd>","</filehd>"));
  if (!$out) $out=trim(str_between($html,"<file>","</file>"));
*/
print $out;
?>
