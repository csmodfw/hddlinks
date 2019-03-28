#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
//include ("y.php");
function _splice($a,$b) {
	return  array_slice($a,$b);
}

function _reverse($a,$b) {
	return  array_reverse($a);
}

function _slice($a,$b) {
	$tS = $a[0];
	$a[0] = $a[$b % count($a)];
	$a[$b] = $tS;
	return  $a;
}
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
############################################################################
# Copyright: ©2011, ©2012 wencaS <wenca.S@seznam.cz>
# This file is part of xListPlay.
# licence GNU GPL v2
############################################################################
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$a_itags=array(37,22,18);

$file=$_GET["file"];
//for ($k=0;$k<2;$k++) {
if(preg_match('/youtube\.com\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $file, $match)) {
  $id = $match[2];
  $l = "https://www.youtube.com/watch?v=".$id;
  //$html   = file_get_contents($link);
}
  $html="";
  $p=0;
  while($html == "" && $p<100) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  $p++;
  }
  //echo $html;
  $html = str_between($html,'ytplayer.config = ',';ytplayer.load');
  $parts = json_decode($html,1);
  if ($parts['args']['livestream']== 1) {
    $r1=json_decode($parts['args']['player_response'],1);
    //print_r ($r1);
    $l=$r1['streamingData']["hlsManifestUrl"];
    $link="http://127.0.0.1/cgi-bin/scripts/util/m3u8yt.php?file=".urlencode($l);
    print $link;
  } else {
    $videos = explode(',', $parts['args']['url_encoded_fmt_stream_map']);
foreach ($videos as $video) {
		parse_str($video, $output);
		if (in_array($output['itag'], $a_itags)) break;
	}
//}
//print_r ($output);
	if (isset($output['type']))          unset($output['type']);
	if (isset($output['mv']))            unset($output['mv']);
	if (isset($output['sver']))          unset($output['sver']);
	if (isset($output['mt']))            unset($output['mt']);
	if (isset($output['ms']))            unset($output['ms']);
	if (isset($output['quality']))       unset($output['quality']);
	if (isset($output['codecs']))        unset($output['codecs']);
	if (isset($output['fallback_host'])) unset($output['fallback_host']);
	//sparams

    //$out=str_replace("sig=","signature=",$output['url']);
    $out=$output['url'];
	if (isset($output['sig'])) {
		$signature=($output['sig']);

	} else {
  $sA="";
  $s=$output["s"];
  //echo $s;
  $l = "https://s.ytimg.com".$parts['assets']['js'];
  //echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  $html1=str_replace("\n","",$html);
  //echo $html1;
  //die();
  preg_match('/([A-Za-z]{2})=function\(a\){a=a\.split\(\"\"\)/',$html1,$m);
  //print_r ($m);  //UK
  //$sig=$m["name"];
  $sig=$m[1];
  $find='/\s?'.$sig.'=function\((?P<parameter>[^)]+)\)\s?\{\s?(?P<body>[^}]+)\s?\}/';
  preg_match($find,$html1,$m1);
  //print_r ($m1);  //UK=function(a){a=a.split("")
  //[parameter] = a
  //[body] = a=a.split("");TK.z6(a,23);TK.p8(a,2);TK.d4(a,55);TK.z6(a,6);return a.join("")
  //z6:function(a,b){var c=a[0];a[0]=a[b%a.length];  ----> _slice($sA,23)
  //var TK={p8:function(a,b){a.splice(0,b)} splice($sA,2)
  //d4:function(a){a.reverse()}}
  //z6:function(a,b){var c=a[0];a[0]=a[b%a.length];  ---> _slice($sA,6);

  // caut foate functiile de genul XY:function(a,b)
  preg_match_all("/\w{2}\:function\(\w,\w\)\{[\w\s\=\[\]\=\%\.\;\(\)\,]*\}/",$html1,$m3);

  $a=array(); // funtii gasite $a[XY]= splice etc
  for ($k=0;$k<count($m3[0]);$k++) {
    preg_match("/(\w{2})(\:function\(\w,\w\)\{)([\w\s\=\[\]\=\%\.\;\(\)\,]*)\}/",$m3[0][$k],$m4);
    //print_r ($m4);
    $a[$m4[1]]=$m4[3];
  }

  // caut toate functiile de genul XY:function(a)
  preg_match_all("/\w{2}\:function\(\w\)\{[\;\.\s\w\,\"\:\(\)\{\{]*\}/",$html1,$m2);
  //print_r ($m2);
  for ($k=0;$k<count($m2[0]);$k++) {
     preg_match("/(\w{2})(\:function\(\w\)\{)([\;\.\s\w\,\"\:\(\)\{\{]*)\}/",$m2[0][$k],$m5);
     $a[$m5[1]]=$m5[3];
  }
  //print_r ($a);

  $x3 = preg_replace("/\w{2}\./","",$m1["body"]);
  $f=explode(";",$x3);
  //print_r ($f);
  //b.Sl(a)
  for ($k=0;$k<count($f);$k++) {
    if (preg_match("/split/",$f[$k]))
      $sA = str_split($s);
    elseif (preg_match("/join/",$f[$k]))
      $sA = implode($sA);
    elseif (preg_match("/(\w+)\(\w+,(\d+)/",$f[$k],$r1)) { //AT(a,33)
       //print_r ($r);
       if (!$a[$r1[1]]) //daca nu exista nicio functie..... nu cred ca e cazul
          $sA = _slice($sA,$r1[2]); //????
       else {
         if (preg_match("/splice/",$a[$r1[1]]))
            $sA = _splice($sA,$r1[2]);
         elseif (preg_match("/reverse/",$a[$r1[1]]))
            $sA = _reverse($sA,$r1[2]);
         elseif (preg_match("/\w%\w\.length/",$a[$r1[1]]))
            $sA = _slice($sA,$r1[2]);
       }
    }
  }
  $signature = $sA;
}
$link=$out."&signature=".$signature;
if ($html) {
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
//$link="http://127.0.0.1/cgi-bin/scripts/util/curl.cgi?".$link;
//$link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$link;
//}
print $link;
}
}
?>
