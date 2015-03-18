#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function enc($string) {
  $local3="";
  $arg1=strlen($string);
  $arg2="mediadirect";
  $l_arg2=strlen($arg2);
  $local4=0;
  while ($local4 < $arg1) {
    $m1=ord($string[$local4]);
    $m2=ord($arg2[$local4 % $l_arg2]);
    $local3=$local3.chr($m1 ^ $m2);
    $local4++;
  }
  return $local3;
}
//http://www.dolcetv.ro/emisiune-tv-Tanase-si-Dinescu-1-109-19145?ajaxrequest=1
$link = $_GET["file"];
$link=urldecode($link)."?ajaxrequest=1";
$html = file_get_contents($link);
if (strpos($html,"class") === false) {
$new_file="D://dolce.gz";
$new_file="/tmp/dolce.gz";
$fh = fopen($new_file, 'w');
fwrite($fh, $html);
fclose($fh);
$zd = gzopen($new_file, "r");
$html = gzread($zd, filesize($new_file));
gzclose($zd);
}
$html=str_replace("\\","",$html);
//flashvars.str="     ----->>>> mp4:Ep.824_Trasnitii_low.mp4
//$t1=explode('flashvars.str="',$html);
$t1=explode('"playerStream":"',$html);
$t2=explode('"',$t1[1]);
$f=$t2[0];
$t1=base64_decode($f);
$str=enc($t1);
$str=str_replace("_low","",$str);
//flashvars.app="  ------>>>> {0}/primatv
$t1=explode('flashvars.app="',$html);
$t2=explode('"',$t1[1]);
$f=$t2[0];
$t1=base64_decode($f);
$app=enc($t1);
$t1=explode("/",$app);
$app=$t1[1];
//flashvars.data="   ----->>>>> dolce_video
$t1=explode('flashvars.data="',$html);
$t2=explode('"',$t1[1]);
$f=$t2[0];
$t1=base64_decode($f);
$data=enc($t1);
//flashvars.publisher="  ---->>>> 2
$t1=explode('flashvars.publisher="',$html);
$t2=explode('"',$t1[1]);
$f=$t2[0];
$t1=base64_decode($f);
$publisher=enc($t1);
$l="http://index.mediadirect.ro/getUrl?file=".$str."&app=".$app."&publisher=".$publisher;
$h = file_get_contents($l);
$t1=explode('server=',$h);
$t2=explode('&',$t1[1]);
$serv=$t2[0];
//http://ads.mediadirect.ro/dolce/default/index/get-ads/type/video/id_unic/10668839/stream/mp4:Ep.824_Trasnitii_low.mp4/vod/true/referral/www.dolcetv.ro/category//live/true/postroll/true/campaign
$id="10668839";
$link="rtmpe://".$serv."/".$app."?id=".$id."/".$str;
print $link;
?>
