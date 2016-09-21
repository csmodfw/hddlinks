#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function mylink($string){
$html = file_get_contents($string);
$l = str_between($html,'value=&quot;','&');
if ($l <> "") {
$file = get_headers($l);
 foreach ($file as $key => $value)
   {
    if (strstr($value,"Location"))
     {
      $url = ltrim($value,"Location: ");
      $link1 = str_between($url,"file=","&");
     } // end if
   } // end foreach
   if ($link1 <> "") {
   return $link1;
}
}
}
//http://assets.sport.ro/assets/protv/2012/07/27/videos/18872/varciu_beta.flv?start=0
//echo urldecode("http%3A%2F%2Fwww.protv.ro%2Fvideo-cop%2Fget-video%2Fvideo_id%2F18872%2Fvideo_player_div%2FminiPlayerVideo%2Fvideo_player%2Fcme%2Fplayer_dimension%2F600X338%2Fvideo_key%2Fhappy-hour%2Fkey_id%2F%2Farticle_category_url_identifier%2Fmultimedia");
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $image = $queryArr[1];
}
$h = file_get_contents("http://protvplus.ro".urldecode($link));
//echo $h;
$rtmp = str_between($h,'rtmp: "','"')."/";
//$rtmp="rtmp://185.133.64.234/avod/";
//$t1 = str_between($h,'$.ajax(','$f(');
//$t1=explode("$.ajax({",$h);
//$linkajax=str_between($t1[1],'url: "','"');
//$linkajax="/lbin/ajax/config1.php?site=94000&realSite=94000&subsite=753&section=20720&media=61288956&jsVar=fltfm&mute=0&size=&pWidth=700&pHeight=435";
//$h = file_get_contents("http://protvplus.ro/".$linkajax);

//$h = str_replace("\\","",$h);
//echo $h;
//$id = str_between($h,'"url": "','"');
//$id=str_replace("x","_HD",$id);
$t1=explode('src: "',$h);
$t2=explode('"',$t1[2]);
$y=$t2[0];
$title =  str_between($h,'<title>','</title>');
//$y = $id."-HD-1.mp4";
//$y="172873-HD-1.mp4";
//$y="RGT_160514-HD-1.mp4";
//$y=str_between($h,'"url": "','"');
//$t1=explode('"url": "',$h);
//$t2=explode('"',$t1[2]);
//$y=$t2[0];

     $w="http://d1.a4w.ro/videoplayer/drm/605/flowplayer.swf";
     $p="http://protvplus.ro";
     //rtmp://vod.protv.ro/vod_all/
     $t1=explode("/",$rtmp);
     $a=$t1[3]."/";
     $l="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-W http://d1.a4w.ro/videoplayer/drm/605/flowplayer.swf -p http://protvplus.ro -a ".$a;
     $l=$l." -y ".$y.",".$rtmp;
     $video=str_replace(" ","%20",$l);
preg_match("/http(.*?)m3u8/",$h,$m);

$l=$m[0];
$base=str_replace("playlist.m3u8","",$l);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
preg_match("/chunklist_(\w+)/",$html,$m);
$l=str_replace("playlist.m3u8",$m[0].".m3u8",$l);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
$out="";
preg_match_all("/.*ts.*/",$html,$m);
$out="";
for ($k=0;$k<count($m[0]);$k++) {
  $out .=$base.$m[0][$k]."\r\n";
}
file_put_contents("/tmp/list.txt",$out);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
print $link;

?>
