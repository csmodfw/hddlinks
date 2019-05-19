#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
function decode_entities($text) {
    $text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
    $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
    $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
    return $text;
}
$filelink = $_GET["file"];
$filelink=urldecode($filelink);
//echo $filelink;
//$filelink="https://thevideo.me/embed-afdtxrbc8wrg.html";
exec ("rm -f /tmp/test.xml");
//echo $filelink;
if (strpos($filelink,"is.gd") !==false) {
 $a = @get_headers($filelink);
 //print_r ($a);
 $l=$a[6];
 $a1=explode("Location:",$l);
 $filelink=trim($a1[1]);
}
  if (strpos($filelink,"goo.gl") !== false) {
  $l=$filelink;
  //echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  $t1=explode("Location:",$h2);
  $t2=explode("\n",$t1[1]);
  $filelink=trim($t2[0]);

  }
if (strpos($filelink,"adf.ly") !==false) {
 $h1=file_get_contents($filelink);
 $temp=$filelink;
 $filelink=str_between($h1,"var eu = '","'");
 if (!$filelink)
   $filelink=str_between($h1,"var zzz = '","'");
 if (!$filelink) {
  $filelink=str_between($h1,"var url = '","'");

  if (strpos($filelink,"adf.ly") === false)
    $filelink = "http://adf.ly".$filelink;
 $a = @get_headers($filelink);
 //print_r ($a);
 $l=$a[9];
 $a1=explode("Location:",$l);
 $filelink=trim($a1[1]);
 if (!$filelink)
  $filelink="http".str_between($h1,"self.location = 'http","'");
 }
}
if (strpos($filelink,"moovie.cc") !== false) {
 $a = @get_headers($filelink);
 $l=$a[10];
 $a1=explode("Location:",$l);
$filelink=trim($a1[1]);
}
if (strpos($filelink,"putlocker.tl") !== false) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_HEADER, true);
   //curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode('Base64.decode("',$h);
   $t2=explode('"',$t1[1]);
   $l2=base64_decode($t2[0]);
   $t1=explode('src="',$l2);
   $t2=explode('"',$t1[1]);
   $filelink=$t2[0];
   //echo $filelink;
   //die();
}
if (strpos($filelink,"gowatchfreemovies") !== false) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode("Location:",$h);
   $t2=explode("\n",$t1[1]);
   $filelink=trim($t2[0]);
}
if (strpos($filelink,"watchseries") !== false) {
//echo $filelink;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_HEADER, true);
   //curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode('class="video_player',$h);
   $t2=explode('href="',$t1[1]);
   $t3=explode('"',$t2[1]);
   $filelink=trim($t3[0]);
   if (strpos($filelink,"external/") !== false) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_HEADER, true);
   //curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   //echo $h;
   $t1=explode('class="video_player',$h);
   $t2=explode('href="',$t1[1]);
   $t3=explode('"',$t2[1]);
   $filelink=trim($t3[0]);
   }
}
if (strpos($filelink,"stareanatiei.ro") !== false) {
   $referer="https://www.stareanatiei.ro";
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_HEADER, true);
   //curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode('video-embed">',$h);
   $t2=explode('src="',$t1[1]);
   $t3=explode('"',$t2[1]);
   $filelink=$t3[0];
   //echo $filelink;
}
function unpack_DivXBrowserPlugin($n_func,$html_cod,$sub=false) {
  $f=explode("return p}",$html_cod);
  $e=explode("'.split",$f[$n_func]);
  $ls=$e[0];
  //echo $ls;
  $a=explode(";",$ls);
  //print_r($a); //for debug only
  $a1=explode("'",$a[count($a)-1]); //char list for replace
  $b1=explode(",",$a1[1]);
  $base_enc=$b1[1];
  //echo $base_enc;
  $w=explode("|",$a1[2]);
  //print_r ($w);
  $ch="0123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz";
  $ch="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $ch="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $fl="";
  for ($i=0;$i<count($a)-1;$i++) {
    $fl=$fl.$a[$i];
  }
  $r="";
  $x=strlen($fl);
  for ($i=0;$i<strlen($fl);$i++) {
    if (!preg_match('/[A-Za-z0-9]/',$fl[$i])) { //nu e alfanumeric
       $r=$r.$fl[$i];
    } elseif (($i<$x) && (preg_match('/[A-Za-z0-9]/',$fl[$i])) && (preg_match('/[A-Za-z0-9]/',$fl[$i+1]))) {
       $pos=strpos($ch,$fl[$i+1]);
       $pos=$base_enc*$fl[$i] + $pos;
       if ($w[$pos] <> "")
         $r=$r.$w[$pos];
       else
         $r=$r.$fl[$i].$fl[$i+1];
     } elseif (($i>0) && (preg_match('/[A-Za-z0-9]/',$fl[$i])) && (preg_match('/[A-Za-z0-9]/',$fl[$i-1]))) {
       // nothing
     } else {
       $pos=strpos($ch,$fl[$i]);
        if ($w[$pos] <> "")
          $r=$r.$w[$pos];
        else
          $r=$r.$fl[$i];
     }
  }
  $r=str_replace("\\","",$r);
  //echo $r;
  $ret_val=str_between($r,'param name="src"value="','"');
  if ($ret_val == "")
    $ret_val = str_between($r,"file','","'");
  if ($ret_val == "")
    $ret_val = str_between($r,"playlist=","&");  //nosvideo
  if ($ret_val == "")
    $ret_val=str_between($r,'file:"','"');
  if ($ret_val=="")
    $ret_val=str_between($r,'attr("src","','"');
  if ($sub==true) {
    $srt=str_between($r,"captions.file','","'");
    $srt = str_replace(" ","%20",$srt);
    $ret_val=$ret_val.",".$srt;
  }
  if ($ret_val == "") $ret_val=$r;
  return $ret_val;
}
function unpack_DivXBrowserPlugin1($n_func,$html_cod,$sub=false) {
  $f=explode("return p}",$html_cod);
  $e=explode("'.split",$f[$n_func]);
  $ls=$e[0];
  //echo $ls;
  $a=explode(",",$ls);
  //print_r($a); //for debug only
  $a1=explode("'",$a[count($a)-1]); //char list for replace
  $b1=explode(",",$a1[1]);
  $base_enc=$a1[1];

  $base_enc=$a[count($a)-2];
  //echo $base_enc;
  $w=explode("|",$a1[1]);
  //print_r ($w);
  $ch="0123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz";
  $ch="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $ch="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $fl="";
  for ($i=0;$i<count($a)-1;$i++) {
    $fl=$fl.$a[$i];
  }
  $r="";
  $x=strlen($fl);
  //echo $fl;
  for ($i=0;$i<strlen($fl);$i++) {
    if (!preg_match('/[A-Za-z0-9]/',$fl[$i])) { //nu e alfanumeric
       $r=$r.$fl[$i];
    } elseif (($i<$x) && (preg_match('/[A-Za-z0-9]/',$fl[$i])) && (preg_match('/[A-Za-z0-9]/',$fl[$i+1]))) {
       $pos=strpos($ch,$fl[$i+1]);
       $pos=$base_enc*$fl[$i] + $pos;
       if ($w[$pos] <> "")
         $r=$r.$w[$pos];
       else
         $r=$r.$fl[$i].$fl[$i+1];
     } elseif (($i>0) && (preg_match('/[A-Za-z0-9]/',$fl[$i])) && (preg_match('/[A-Za-z0-9]/',$fl[$i-1]))) {
       // nothing
     } else {
       $pos=strpos($ch,$fl[$i]);
        if ($w[$pos] <> "")
          $r=$r.$w[$pos];
        else
          $r=$r.$fl[$i];
     }
  }
  $r=str_replace("\\","",$r);
  //echo $r;
  $ret_val=str_between($r,'param name="src"value="','"');
  if ($ret_val == "")
    $ret_val = str_between($r,"file','","'");
  if ($ret_val == "")
    $ret_val = str_between($r,"playlist=","&");  //nosvideo
  if ($ret_val == "")
    $ret_val=str_between($r,'file:"','"');
  if ($ret_val=="")
    $ret_val=str_between($r,'attr("src","','"');
  if ($ret_val=="")
    $ret_val=str_between($r,'attr("src""','"');
  if ($sub==true) {
    $srt=str_between($r,"captions.file','","'");
    $srt = str_replace(" ","%20",$srt);
    $ret_val=$ret_val.",".$srt;
  }

  return $ret_val;
}

function str_prep($string){
  $string = str_replace(' ','%20',$string);
  $string = str_replace('[','%5B',$string);
  $string = str_replace(']','%5D',$string);
  $string = str_replace('%3A',':',$string);
  $string = str_replace('%2F','/',$string);
  $string = str_replace('#038;','',$string);
  $string = str_replace('&amp;','&',$string);
  return $string;
}
//peteava
function r() {
$i=mt_rand(4096,0xffff);
$j=mt_rand(4096,0xffff);
return  dechex($i).dechex($j);
}
function zeroFill($a,$b) {
    if ($a >= 0) {
        return bindec(decbin($a>>$b)); //simply right shift for positive number
    }
    $bin = decbin($a>>$b);
    $bin = substr($bin, $b); // zero fill on the left side
    $o = bindec($bin);
    return $o;
}
function crunch($arg1,$arg2) {
  $local4 = strlen($arg2);
  while ($local5 < $local4) {
   $local3 = ord(substr($arg2,$local5));
   $arg1=$arg1^$local3;
   $local3=$local3%32;
   $arg1 = ((($arg1 << $local3) & 0xFFFFFFFF) | zeroFill($arg1,(32 - $local3)));
   $local5++;
  }
  return $arg1;
}
function peteava($movie) {
  $seedfile=file_get_contents("http://content.peteava.ro/seed/seed.txt");
  $t1=explode("=",$seedfile);
  $seed=$t1[1];
  if ($seed == "") {
     return "";
  }
  $r=r();
  $s = hexdec($seed);
  $local3 = crunch($s,$movie);
  $local3 = crunch($local3,"0");
  $local3 = crunch($local3,$r);
  return strtolower(dechex($local3)).$r;
}
/** end peteava **/

function vk($string) {
  if (strpos($string,"video_ext.php") === false) {
  //echo $string;
	$h = file_get_contents($string);
	$t1=explode("nvar vars",$h);
	$l=$t1[1];
	$uid=str_between($l,'\"uid\":\"','\"');
	$host=str_between($l,'"host\":\"','\"');
	$host=str_replace("\\/","/",$host);
	$host=str_replace("\\/","/",$host);
	$host=str_replace("\/","/",$host);
	$vtag=str_between($l,'"vtag\":\"','\"');
	$r=$host."u".$uid."/videos/".$vtag.".360.mp4";
 } else {
    $baza = file_get_contents($string);
    //echo $string."<BR>";
    preg_match("/hd=\d{1}/",$string,$m);
    //print_r ($m);
    $host = str_between($baza,"var video_host = '","'");
    $uid = str_between($baza,"var video_uid = '","'");
    $vtag = str_between($baza,"var video_vtag = '","'");
    //$hd = str_between($baza,"var video_max_hd = '","'");
    $t1=explode("hd=",$m[0]);
    $hd=trim($t1[1]);
    //echo $hd;
    if ($hd == "0") {
      $r = $host."u".$uid."/videos/".$vtag.".240.mp4";
    } elseif ($hd=="3") {
      $r = $host."u".$uid."/videos/".$vtag.".720.mp4";
    } elseif ($hd=="2") {
      $r = $host."u".$uid."/videos/".$vtag.".480.mp4";
      $test = $host."u".$uid."/videos/".$vtag.".480.mp4";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $test);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      $h1 = curl_exec($ch);
      curl_close($ch);
      if (strpos($h1,"200 OK") === false)
       $r= $host."u".$uid."/videos/".$vtag.".360.mp4";
    } elseif ($hd=="1") {
      $r = $host."u".$uid."/videos/".$vtag.".360.mp4";
    } else {
      $r = $host."u".$uid."/videos/".$vtag.".360.mp4";
      $test = $host."u".$uid."/videos/".$vtag.".480.mp4";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $test);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      $h1 = curl_exec($ch);
      curl_close($ch);
      if (strpos($h1,"200 OK") !== false)
       $r=$test;
    }
 }
  return $r;
}
function youtube($file) {
if (preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $file, $match)) {
    $l ="http://www.youtube.com/watch?v=".$match[1];
    //echo $l;
    $r=file_get_contents("http://127.0.0.1/cgi-bin/scripts/util/yt.php?file=".urlencode($l));
}
return $r;
}
function uploadc($string) {
$ch = curl_init($string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$h = curl_exec($ch);
$ipcount_val=str_between($h,'"ipcount_val" value="','"');
$id=str_between($h,'"id" value="','"');
$fname=str_between($h,'"fname" value="','"');
$post="ipcount_val=".$ipcount_val."&op=download2&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Slow+access";
//ipcount_val=10&op=download2&usr_login=&id=a2baprw26l3m&fname=np-prophezeiung-xvid.avi&referer=&method_free=Slow+access
//ipcount_val=10&op=download2&usr_login=&id=pia0ng8rrzqk&fname=om-die.geschichte.vom.goldenen.taler-xvid.avi&referer=&method_free=Slow+access
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
$r=unpack_DivXBrowserPlugin(2,$h);
return $r;
}
//***************Here we start**************************************
$filelink=str_prep($filelink);
$base_sub="/tmp/";

//http://allmyvideos.net/70qfg347g2ro
if (strpos($filelink,"cloudy.ec") !== false) {
  //$filelink="https://www.cloudy.ec/embed.php?id=338825dd18014";
  $filelink=str_replace("https:","http:",$filelink);
  //echo $filelink;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
    'Accept-Encoding: deflate'
    ));
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:42.0) Gecko/20100101 Firefox/42.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  //https://www.cloudy.ec/api/player.api.php?numOfErrors=0&file=%3B338825dd18014&cid2=&cid3=&key=82%2E210%2E178%2E129%2D598c714bfb57c2cde9d90f5972f60266%2D&user=&pass=&cid=1
  $key=str_between($h2,'key: "','"');
  //echo urlencode("/");
  $key=str_replace(".","%2E",$key);
  $key=str_replace("-","%2D",$key);
  $file=str_between($h2,'file:"','"');
  $l="https://www.cloudy.ec/api/player.api.php?numOfErrors=0&file=".urlencode($file)."&cid2=&cid3=&key=".$key."&user=&pass=&cid=1";
  //echo $l;
  //die();
  $l=str_replace("https:","http:",$l);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //$t1=explode("url=",$h2);
  //$t2=explode("&",$t1[1]);
  //$link=$t2[0];
  //echo $link;
  //die();
  $link=urldecode(str_between($h2,"url=","&"));
} elseif (strpos($filelink,"flashservice.xvideos.com") !== false) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   $h = curl_exec($ch);
   curl_close($ch);
   $link=str_between($h,"html5player.setVideoUrlHigh('","'");
   if (!$link)  $link=str_between($h,"html5player.setVideoUrlLow('","'");
} elseif (strpos($filelink,"xhamster.com") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://xhamster.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
//echo $html;
//die();
//$link = urldecode(str_between($html, "flv_url=", "&"));
//if (!$link) {
$t1=explode('720p\":[\"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
if (!$link) {
$t1=explode('480p\":[\"',$html);
$t2=explode('"',$t1[1]);
$link=$t2[0];
}
if (!$link) {
$t1=explode('240p\":[\"',$html);
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
      $t1=explode("Location:",$ret);
      $t2=explode("\n",$t1[1]);
      $link=trim($t2[0]);
      if (!$link) $link=$link1;
$link=str_replace("https","http",$link);
} elseif (strpos($filelink,"grab.php?link1=") !== false) {   //zfilme
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode("Location:",$h);
   $t2=explode("\n",$t1[1]);
   $link=trim($t2[0]);

   //echo $link;
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
} elseif (strpos($filelink,"facebook") !== false) {
$pattern = '/(video_id=|videos\/)([0-9a-zA-Z]+)/';
preg_match($pattern,$filelink,$m);
$filelink="https://www.facebook.com/video/embed?video_id=".$m[2];
      $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h1 = curl_exec($ch);
      curl_close($ch);
      //echo $h1;
      $h1=str_replace("\\","",$h1);
      preg_match('/(?:hd_src|sd_src)\":\"([\w\-\.\_\/\&\=\:\?]+)/',$h1,$m);
      //print_r ($m);
      $link=$m[1];
      //echo $link;
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
} elseif (strpos($filelink,"verystream") !== false) {
  $t1=explode("/",$filelink);
  $filelink="https://verystream.com/e/".$t1[4];
  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q -U "'.$ua.'"  --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $h1=shell_exec($exec);
      if (preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h1, $m))
         $srt=$m[1];
      if ($srt) {
         if (strpos($srt,"http") === false)
         $srt="https://verystream.com".$srt;
         $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
         //echo $l_srt;
         $h=file_get_contents($l_srt);
      }
      $t1=explode('id="videolink">',$h1);
      if (isset($t1[1])) {
      $t2=explode('<',$t1[1]);
      $id=$t2[0];
      $l="https://verystream.com/gettoken/".$id."?mime=true";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "https://verystream.com");
      curl_setopt($ch, CURLOPT_NOBODY,1);
      curl_setopt($ch, CURLOPT_HEADER,1);
      $ret = curl_exec($ch);
      curl_close($ch);
      $t1=explode("Location:",$ret);
      $t2=explode("?",$t1[1]);
      $link=urldecode(trim($t2[0]));
      $movie_file=substr(strrchr(urldecode($link), "/"), 1);
      $movie_file1=substr($movie_file, 0, -4);
      $movie_file2 = preg_replace('/[^A-Za-z0-9_]/','_',$movie_file1);
      $link=str_replace($movie_file1,$movie_file2,$link);
      $link=str_replace("https","http",$link).".mp4";
      }
} elseif (strpos($filelink,"streamango") !== false) {
function indexOf($hack,$pos) {
    $ret= strpos($hack,$pos);
    return ($ret === FALSE) ? -1 : $ret;
}
  //https://streamango.com/embed/pkcnrallrffnaapp/
  //https://streamango.com/embed/kboadradtlfrndnq

  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q -U "'.$ua.'"  --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $h2=shell_exec($exec);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h2, $m);
  $srt=$m[1];

   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
      /*
      $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h2 = curl_exec($ch);
      curl_close($ch);
      */
  //echo $h2;
$t1=explode('video/mp4"',$h2);
$t2=explode("src:d('",$t1[1]);
$t3=explode("'",$t2[1]);
$a16=$t3[0];
$t4=explode(",",$t3[1]);
$t5=explode(")",$t4[1]);
$a17=(int) $t5[0];
$a86=0x0;
$a84=explode("|","4|6|5|0|7|3|2|1|8");

 for ($zz=0;$zz<count($a84);$zz++)
		{
		switch($a84[$a86++])
			{
			case'0':
            //$a89,$a90,$a91,$a92;
            $a92=0;
            $a89=0;
            $a91=0;
            $a92=0;
			continue;
			case'1':
     //echo $a94;
             //die();
             while ( $a94 < strlen($a16))
				{
				$a96 = explode("|","6|2|9|8|5|4|7|10|0|3|1");
				$a98=0;
                for ($yy=0;$yy<count($a96);$yy++)
					{
					switch($a96[$a98++])
						{
						case'0':
                         $a101=$a101.chr($a104);
						continue;
						case'1':
                         if($a92!=0x40)
							{
							$a101=$a101.chr($a110);
						}
						continue;
						case'2':
                         //a90=k[c2('0xb')](a16[c2('0xc')](a94++));
                         //$a90 = k[indexOf.a16.charAt(a94++)] ????????
                         $a90=indexOf($k,$a16[$a94++]);
						continue;
						case'3':
                         if ($a91!=0x40)
							{
							$a101=$a101.chr($a119);
						}
						continue;
						case'4':
                          //a119=a18[c2('0xe')](a18[c2('0xf')](a18[c2('0x10')](a90,0xf),0x4),a18[c2('0x11')](a91,0x2));
                          //a119 = a45|a46   a50<<a51  a55&a56   a60>>a61  a50<<a51=a90&0xf << 0x4
                          //a119 = (a90&0xf << 0x4)|(a91>>0x02) ceva = x1 << a90&0xf
                          $a119 = (($a90&0xf) << 0x4)|($a91>>0x02);
						continue;
						case'5':
                          //a104=a18[c2('0x12')](a18[c2('0xf')](a89,0x2),a18[c2('0x11')](a90,0x4));
                          $a104 = ($a89<<0x2)|($a90>>0x4);
						continue;
						case'6':
                          //a89=k[c2('0xb')](a16['charAt'](a94++));
                          //k[indexOf.a16.charAt(a94++)]
                          $a89=indexOf($k,$a16[$a94++]);
                          //echo $a89."\n";
                          //die();
						continue;
						case'7':
                          //a110=a18[c2('0x13')](a18[c2('0x14')](a91,0x3),0x6)|a92;
                          //a91&0x3<<0x6|a92
                          $a110=(($a91&0x3)<<0x6)|$a92;
						continue;
						case'8':
                          //a92=k['indexOf'](a16['charAt'](a94++));
                          $a92=indexof($k,$a16[$a94++]);
						continue;
						case'9':
                          //a91=k['indexOf'](a16[c2('0xc')](a94++));
                          $a91=indexof($k,$a16[$a94++]);
						continue;
						case'10':
                          //a104=a18[c2('0x15')](a104,a17); a104 = a104^a17
                          $a104 = $a104^$a17;
						continue;
					}
					//break
				}
			}
			continue;
			case'2':
              //a16=a16[c2('0x16')](/[^A-Za-z0-9\+\/\=]/g,''); replace
              $a16=preg_replace("/[^A-Za-z0-9\+\/\=]/",'',$a16);
			  continue;
			case'3':
              //k=k[c2('0x4')]('')[c2('0x17')]()['join'](''); split reverse
              $k="=/+9876543210zyxwvutsrqponmlkjihgfedcbaZYXWVUTSRQPONMLKJIHGFEDCBA";
			continue;
			case'4':
              $k="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
			  continue;
			case'5':
              //$a104,$a119,$a110;
              $a104=0;
              $a119=0;
              $a110=0;
			  continue;
			case'6':
              $a101='';
			  continue;
			case'7':
              $a94=0x0;
			  continue;
			case'8':
              $dec = $a101;
			  continue;
		}
		//break
	}
	$l=$dec;
	if (strpos($l,"http") === false) $l="https:".$l;
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua.'" "'.$l.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
	//echo $l;
	//die();
      /*
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h = curl_exec($ch);
      curl_close($ch);
      */
/*
      $ua=$_SERVER['HTTP_USER_AGENT'];
   $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  //$exec_path = "D:/Temp/wget ";
  $exec = '--spider --content-on-error -q -U "'.$ua.'" -S --no-check-certificate "'.$l.'" 2>&1';
  $exec = $exec_path.$exec;
  $h=shell_exec($exec);
  //echo $h;
      $t1=explode("ocation:",$h);
      $t2=explode("\n",$t1[1]);
      $link=trim($t2[0]);
      //$link=str_replace("https","http",$link);
  $exec = '--spider --content-on-error -q -U "'.$ua.'" -S --no-check-certificate "'.$l.'" 2>&1';
  $exec = $exec_path.$exec;
  $h=shell_exec($exec);
  //echo $h;
      $t1=explode("ocation:",$h);
      $t2=explode("\n",$t1[1]);
      $link=trim($t2[0]);
      $link=str_replace("https","http",$link);
*/
} elseif (strpos($filelink,"fembed.") !== false) {
  //https://www.fembed.com/v/4lo0jr-px9q
     preg_match("/v\/([\w\-]*)/",$filelink,$m);
     //print_r ($m);
     $id=$m[1];
     $l="https://www.fembed.com/api/source/".$id;
  $post="r=";
  //echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_ENCODING, "");
  curl_setopt($ch,CURLOPT_REFERER,"https://www.fembed.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h3 = curl_exec($ch);
  curl_close($ch);
  $r=json_decode($h3,1);
  //print_r ($r);
  //die();
  $c = count($r["data"]);
  if (strpos($r["data"][$c-1]["file"],"http") === false)
   $l1="https://www.fembed.com".$r["data"][$c-1]["file"];
  else
   $l1=$r["data"][$c-1]["file"];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_ENCODING, "");
  curl_setopt($ch,CURLOPT_REFERER,"https://www.fembed.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch,CURLOPT_HEADER,1);
  curl_setopt($ch,CURLOPT_NOBODY,1);
  $h4 = curl_exec($ch);
  curl_close($ch);
  $t1=explode("Location:",$h4);
  $t2=explode("\n",$t1[1]);
  $link=trim($t2[0]);
  $link=str_replace("https","http",$link);
} elseif (strpos($filelink,"streamcherry.com") !== false) {
  //https://streamcherry.com/embed/pdslqaopmlomfrql/
function indexOf($hack,$pos) {
    $ret= strpos($hack,$pos);
    return ($ret === FALSE) ? -1 : $ret;
}
function decode($encoded, $code) {

    $a1 = "";
    $k="=/+9876543210zyxwvutsrqponmlkjihgfedcbaZYXWVUTSRQPONMLKJIHGFEDCBA";

    $count = 0;

    //for index in range(0, len(encoded) - 1):
    for ($index=0;$index<strlen($encoded);$index++) {
        while ($count <= strlen($encoded) - 1) {
            $b1 = indexOf($k,$encoded[$count]);
            //echo $b1."\n";
            $count++;
            $b2  = indexOf($k,$encoded[$count]);
            $count++;
            $b3  = indexOf($k,$encoded[$count]);
            $count++;
            $b4  = indexOf($k,$encoded[$count]);
            $count++;

            $c1 = (($b1 << 2) | ($b2 >> 4));
            $c2 = ((($b2 & 15) << 4) | ($b3 >> 2));
            $c3 = (($b3 & 3) << 6) | $b4;
            $c1 = $c1 ^ $code;

            $a1 = $a1.chr($c1);

            if ($b3 != 64)
                $a1 = $a1.chr($c2);
            if ($b3 != 64)
                $a1 = $a1.chr($c3);
      }
  }
return $a1;
}
$ua=$_SERVER['HTTP_USER_AGENT'];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch,CURLOPT_ENCODING, '');
      curl_setopt($ch, CURLOPT_REFERER, "https://streamcherry.com");
      $h1 = curl_exec($ch);
      curl_close($ch);
if (preg_match("@type:\"video/([^\"]+)\",src:d\('([^']+)',(.*?)\).+?height:(\d+)@",$h1,$m)) {
//print_r ($m);
$a=$m[2];
$b=$m[3];
$rez=decode($a,$b);
$rez=str_replace("@","",$rez);
if (strpos($rez,"http") === false) $rez="http:".$rez;
} else {
$rez="";
}
$link=$rez;
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
} elseif (strpos($filelink,"veehd.com") !== false) {
  //http://veehd.com/video/4511675_Bewitched-S1E1-I-Darrin-Take-This-Witch-Samantha
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h1 = curl_exec($ch);
  curl_close($ch);
  $l1=str_between($h1,'vpi?h=','"');
  $l1="http://veehd.com/vpi?h=".$l1;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  preg_match('/<embed.+?src="([^"]+)"/',$h2,$m);
  //print_r ($m);
  $link=$m[1];
  if (!$link) {
  preg_match('/,"url":"([^"]+)","scaling":"fit"}/',$h2,$m);
  //print_r ($m);
  $link=$m[1];
  }
  $link=urldecode($link);
} elseif (strpos($filelink,"fastplay.cc") !== false || strpos($filelink,"fastplay.to") !== false) {
//https://fastplay.to/embed-w8otpn4cahx9.html
require_once("JavaScriptUnpacker.php");
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  */
  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q -U "'.$ua.'"  --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $h2=shell_exec($exec);

  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h2);
  $out .=$h2;
  //echo $out;
  preg_match_all('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  //print_r ($m);
  $link=$m[1][count($m[1]) -1];
  if (preg_match('/([http|https]?[\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $out, $s)) {
  $srt=$s[1]; if (strpos($srt,"http") === false) $srt="https://fastplay.to".$srt;
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h_srt=file_get_contents($l_srt);
  }
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  echo $h2;
  die();
  */
  //echo $link;
  //$link=str_replace("https","http",$link);
$ua="Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0";
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget -q --referer="'.$filelink.'" --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
} elseif (strpos($filelink,"gounlimited.to") !== false) {
require_once("JavaScriptUnpacker.php");
  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q -U "'.$ua.'"  --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $h2=shell_exec($exec);
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h2);
  //echo $out;
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
  $link=str_replace("https","http",$link);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h2.$out, $m);
  $srt=$m[1];

   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
  //https://gounlimited.to/embed-lh2hj584lgos.html
} elseif (strpos($filelink,"vidlox") !== false) {
  //$filelink="https://vidlox.tv/embed-kyt8zfi3edsj.html";
  if (strpos($filelink,"https") === false) $filelink=str_replace("http","https",$filelink);
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  //--no-check-certificate --user-agent=AGENT --referer=URL --max-redirect
  $exec = '-q --user-agent= "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;

  $h2=shell_exec($exec);
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h2, $m);
  $link=$m[1];
  $link=str_replace("https","http",$link);

  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h2, $m);
  $srt=$m[1];
  
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
} elseif (strpos($filelink,"vidoza.net") !== false) {
//echo $filelink;
  //https://vidoza.net/embed-sqzn6x38v6p6.html
  if (strpos($filelink,"https") === false) $filelink=str_replace("http","https",$filelink);
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  //--no-check-certificate --user-agent=AGENT --referer=URL --max-redirect
  $exec = '-q --user-agent= "'.$ua.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;

  $h2=shell_exec($exec);
//echo $h2;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h2, $m);
  $link=$m[1];
  $link=str_replace("https","http",$link);

  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h2, $m);
  $srt=$m[1];
  if (strpos($srt,"empty") !== false) $srt="";
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
} elseif (strpos($filelink,"cinemarx.ro") !== false) {
  $h2=file_get_contents($filelink);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h2, $m);
  $link=$m[1];
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h2, $m);
  $srt=$m[1];

   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }

} elseif (strpos($filelink,"estream.to") !== false) {
  //https://estream.to/x1i0hyiro0ei.html
//echo $filelink;
//die();
  //require_once("JavaScriptUnpacker.php");
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //$a1=explode("jwplayer.js",$h2);
  //$h2=$a1[1];
  //$jsu = new JavaScriptUnpacker();
  //$out = $jsu->Unpack($h2);
  //echo $out;
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h2, $m);
  $link=$m[1];
  $link=str_replace("https","http",$link);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.vtt|\.srt))/', $h2, $m);
  $srt=$m[1];
  //$srt=str_replace("https","http",$srt);
  if (strpos($srt,"empty.srt") !== false) $srt="";
   if ($srt) {
   if (strpos($srt,"http") === false) $srt="https://estream.to/".$srt;
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
} elseif (strpos($filelink,"vidzi.tv") !== false) {
  //http://vidzi.tv/otefvw9e1jcl.html
  require_once("JavaScriptUnpacker.php");
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  */

  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  //--no-check-certificate --user-agent=AGENT --referer=URL --max-redirect
  $exec = '-q --user-agent= "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;

  $h2=shell_exec($exec);
  
  $a1=explode("jwplayer.js",$h2);
  $h2=$a1[1];
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h2);
  //echo $out;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
  if (!$link) {
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h2, $m);
  $link=$m[1];
  }
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
} elseif (strpos($filelink,"watchers.to") !== false) {
  //http://watchers.to/embed-4cbx3nkmjb7x.html
  require_once("JavaScriptUnpacker.php");
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h2);
  //echo $out;
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.srt))/', $out, $m);
  $srt=$m[1];
  if (strpos($srt,"empty.srt") !== false) $srt="";
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
} elseif (strpos($filelink,"streaming.speedy.to") !== false) {
  $link=str_replace("https","http",$filelink);
} elseif (strpos($filelink,"speedvid.net") !== false) {
    function getClearanceLink($content, $url)
    {
        /*
         * 1. Mimic waiting process
         */
        sleep(4);

        /*
         * 2. Extract "jschl_vc" and "pass" params
         */
        preg_match_all('/name="\w+" value="(.+?)"/', $content, $matches);


        $params = array();
        list($params['jschl_vc'], $params['pass']) = $matches[1];
        // Extract CF script tag portion from content.
        $cf_script_start_pos    = strpos($content, 's,t,o,p,b,r,e,a,k,i,n,g,f,');
        $cf_script_end_pos      = strpos($content, '</script>', $cf_script_start_pos);
        $cf_script              = substr($content, $cf_script_start_pos, $cf_script_end_pos-$cf_script_start_pos);
        /*
         * 3. Extract JavaScript challenge logic
         */
        preg_match_all('/:[\/!\[\]+()]+|[-*+\/]?=[\/!\[\]+()]+/', $cf_script, $matches);
        //print_r ($matches);

            /*
             * 4. Convert challenge logic to PHP
             */
            $php_code = "";
            foreach ($matches[0] as $js_code) {
                // [] causes "invalid operator" errors; convert to integer equivalents
                $js_code = str_replace(array(
                    ")+(",
                    "![]",
                    "!+[]",
                    "[]"
                ), array(
                    ").(",
                    "(!1)",
                    "(!0)",
                    "(0)"
                ), $js_code);
                $php_code .= '$params[\'jschl_answer\']' . ($js_code[0] == ':' ? '=' . substr($js_code, 1) : $js_code) . ';';
            }
            //echo $php_code;
            /*
             * 5. Eval PHP and get solution
             */
            eval($php_code);
            // toFixed(10).
            $params['jschl_answer'] = round($params['jschl_answer'], 10);
            // Split url into components.
            $uri = parse_url($url);
            // Add host length to get final answer.
            $params['jschl_answer'] += strlen($uri['host']);
            /*
             * 6. Generate clearance link
             */
             //echo http_build_query($params);
            return sprintf("%s://%s/cdn-cgi/l/chk_jschl?%s",
                $uri['scheme'],
                $uri['host'],
                http_build_query($params)
            );
    }
$cookie=$base_cookie."speedvid.dat";
$ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
if (file_exists($cookie)) unlink ($cookie);
  preg_match("/(speedvid\.net)\/(?:embed-|download\/)?([0-9a-zA-Z]+)/",$filelink,$m);
  $id=$m[2];
  $filelink="http://www.speedvid.net/".$id;
  $requestLink=$filelink;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt ($ch, CURLOPT_REFERER, "https://123netflix.pro");
  //curl_setopt($ch, CURLOPT_COOKIE, $clearanceCookie);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  $html = curl_exec($ch);
  curl_close($ch);
$rez = getClearanceLink($html,$requestLink);
//echo $rez;
//die();
//$rez=solveJavaScriptChallenge($requestLink,$html);
//echo $rez;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $rez);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  $h=curl_exec($ch);
  curl_close($ch);
  //http://www.speedvid.net/xoui92chcqbp

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
      curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h1 = curl_exec($ch);
      curl_close($ch);
      //echo $h1;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h1, $m);
  $link=$m[1];
} elseif (strpos($filelink,"stagevu.com") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  $link=str_between($h2,'param name="src" value="','"');
} elseif (strpos($filelink,"movdivx.com") !== false) {
  //http://movdivx.com/mcu1361zlmd7
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  //$post="op=download1&usr_login=&id=".$id."&fname=&referer=http%3A%2F%2Fwww.watchfree.to%2Fwatch-1d2ed9-Ghost-in-the-Shell-movie-online-free-putlocker.html&method_free=Contunue+to+the+Video
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&channel=&method_free=Contunue+to+the+Video";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  require_once("JavaScriptUnpacker.php");
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
} elseif (strpos($filelink,"divxme.com") !== false) {
  //http://divxme.com/mcu1361zlmd7
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  //$post="op=download1&usr_login=&id=".$id."&fname=&referer=http%3A%2F%2Fwww.watchfree.to%2Fwatch-1d2ed9-Ghost-in-the-Shell-movie-online-free-putlocker.html&method_free=Contunue+to+the+Video
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&channel=&method_free=Contunue+to+the+Video";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  $t1=explode('class="player"',$h);
  $h=$t1[1];
  require_once("JavaScriptUnpacker.php");
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h);
  //echo $out;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
} elseif (strpos($filelink,"daclips") !== false || strpos($filelink,"movpod") !== false) {
  $filelink=str_replace("gorillavid.com","gorillavid.in",$filelink);
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&channel=&method_free=Free+Download";
  sleep(5);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  $link=$m[1];

  //if (strpos($filelink,"movpod.in") !== false) $link=str_between($h,"file: '","'");
} elseif (strpos($filelink,"gorillavid") !== false) {
  //https://gorillavid.in/96ce7ik16aoj
  $pattern = '/(gorillavid\.(?:in|com))\/(?:embed-)?([0-9a-zA-Z]+)/';
  preg_match($pattern,$filelink,$x);
  //print_r ($x);
  $id=$x[2];
  $filelink="https://gorillavid.in/".$id;
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:62.0) Gecko/20100101 Firefox/62.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  $csrfmiddlewaretoken=str_between($h,"csrfmiddlewaretoken' value='","'");
  $id=str_between($h, 'id" value="','"');
  $fname=str_between($h,'fname" value="','"');
  $post="csrfmiddlewaretoken=".$csrfmiddlewaretoken."&op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&channel=&method_free=Free+Download";
  sleep(2);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  $link=$m[1];
$ua="Mozilla/5.0 (Windows NT 10.0; rv:62.0) Gecko/20100101 Firefox/62.0";
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
} elseif (strpos($filelink,"thevideobee.to") !== false) {
  //https://thevideobee.to/2o48hb288ssi.html
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $fname=str_between($h,'fname" value="','"');
  $hash=str_between($h,'hash" value="','"');
  $id=str_between($h,'name="id" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //echo $post;
  sleep(5);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  require_once("JavaScriptUnpacker.php");
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h);
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
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
} elseif (strpos($filelink,"playedto.me") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:49.0) Gecko/20100101 Firefox/49.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  //curl_close($ch);
  $fname=str_between($h,'fname" value="','"');
  $hash=str_between($h,'hash" value="','"');
  $id=str_between($h,'name="id" value="','"');
  //$post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //op=download1&usr_login=&id=47fothugtd17&fname=Star_Trek_Voyager_Season_01_Episode_01___02_-_Caretaker.avi.flv.mp4.mp4&referer=http%3A%2F%2Fwww.watchfree.to%2Ftv-145e-Star-Trek-Voyager-tv-show-online-free-putlocker.html%2Fseason-1-episode-1&hash=210983-82-210-1477226127-419010acc8f5523c721148e58e9e0b0b&imhuman=
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&hash=".$hash."&referer=&imhuman=";
  sleep(2);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  curl_close($ch);
  preg_match('/[file: "]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  $link=$m[1];
} elseif (strpos($filelink,"briskfile.com") !== false) {
  //$cookie="D://m.txt";
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:49.0) Gecko/20100101 Firefox/49.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
  $chash=str_between($h,'chash" value="','"')."gf";
  //$fname=str_between($h,'fname" value="','"');
  //$hash=str_between($h,'hash" value="','"');
  //$post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //$post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&method_free=1";
  $post="chash=".$chash;
  //echo $post;
  sleep(1);
  $head=array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2','Accept-Encoding: deflate','Content-Type: application/x-www-form-urlencoded','Content-Length: '.strlen($post));

  $ch = curl_init($filelink);
  //curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:49.0) Gecko/20100101 Firefox/49.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  $l=str_between($h,"url: '","'");
  $ch = curl_init();
  //echo $h;
  //die();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  $t1=explode("Location:",$h2);
  $t2=explode("\n",$t1[1]);
  $link=trim($t2[0]);
} elseif (strpos($filelink,"allmyvideos.net") !== false) {
  //http://allmyvideos.net/2ke03ypscpde
  if (strpos($filelink,"embed") !== false) {
    //http://allmyvideos.net/embed-1gu5wswqe28s-870x505.html
    $id=str_between($filelink,"embed-","-");
    //$id="1gu5wswqe28s";
    $filelink="http://allmyvideos.net/".$id;
  }
  //echo $filelink;
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'id" value="','"');
  $fname=str_between($h,'fname" value="','"');
  //$hash=str_between($h,'hash" value="','"');
  //$post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&method_free=1";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  $link=str_between($h,'file" : "','"')."&direct=false&ua=false";
} elseif (strpos($filelink,"vidtodo.com") !== false) {
  //http://vidtodo.com/rwfwx0jdymas
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'name="id" value="','"');
  $fname=str_between($h,'name="fname" value="','"');
  $hash=str_between($h,'name="hash" value="','"');
  //$link_post=str_between($h,"method="POST" action='"
  //op=download1&usr_login=&id=rwfwx0jdymas&fname=Insecure+%282016%E2%80%93+%29+S01E01.mkv&referer=http%3A%2F%2Fputlocker.is%2Fwatch-insecure-tvshow-season-1-episode-1-online-free-putlocker.html&hash=227666-82-210-1475052778-cd2dc1bd37c494120754b5f6200349f1&imhuman=Proceed+to+video
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  preg_match('/[file: "=]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  $link=$m[1];
} elseif (strpos($filelink,"vshare.eu") !== false) {
  //http://vshare.eu/25td5yq2cd6k.htm
  //http://vshare.eu/embed-25td5yq2cd6k-600x300.html
  if (strpos($filelink,"embed") !== false) {
     preg_match("/embed-(\w+)/",$filelink,$m);
     //print_r ($m);
     $id=$m[1];
     $filelink="http://vshare.eu/".$id.".htm";
  }
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'name="id" value="','"');
  $fname=str_between($h,'name="fname" value="','"');
  //$hash=str_between($h,'name="hash" value="','"');
  //$link_post=str_between($h,"method="POST" action='"
  //op=download1&usr_login=&id=rwfwx0jdymas&fname=Insecure+%282016%E2%80%93+%29+S01E01.mkv&referer=http%3A%2F%2Fputlocker.is%2Fwatch-insecure-tvshow-season-1-episode-1-online-free-putlocker.html&hash=227666-82-210-1475052778-cd2dc1bd37c494120754b5f6200349f1&imhuman=Proceed+to+video
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&&method_free=Proceed+to+video";
  //op=download1&usr_login=&id=25td5yq2cd6k&fname=nympho_aunt.mp4&referer=&method_free=Proceed+to+video
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  preg_match_all('/[file: "]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);

  $link=$m[1];
} elseif (strpos($filelink,"vidup.me") !== false) {
  //http://vidtodo.com/rwfwx0jdymas
  //http://vidup.me/5aihzk2tpsyr
  preg_match("/(vidup\.me)\/(?:embed-|download\/)?([0-9a-zA-Z]+)/",$filelink,$m);
  $file_id=$m[2];
  //die();
  $l1="https://vidup.me/pair?file_code=".$file_id."&check";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  $vt=str_between($h2,'vt":"','"');
  //die();
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'name="id" value="','"');
  $fname=str_between($h,'name="fname" value="','"');
  $hash=str_between($h,'name="hash" value="','"');
  $inhu=str_between($h,'name="inhu" value="','"');
  $referer=str_between($h,'referer" value="','"');
  $vhash=str_between($h,"_vhash', value: '","'");
  $gfk=str_between($h,"gfk', value: '","'");
  $post="_vhash=".$vhash."&gfk=".$gfk."&op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=".urlencode($referer)."&hash=".$hash."&inhu=foff&imhuman=";

  //$link_post=str_between($h,"method="POST" action='"
  //_vhash=i1102394cE&gfk=i22abd2449&op=download1&usr_login=&id=5aihzk2tpsyr&fname=Prison.Break.S01E01.480p.BluRay.x264-Sticky83.mkv&referer=http%3A%2F%2Fwww.watchfree.to%2Ftv-1028-Prison-Break-tv-show-online-free-putlocker.html%2Fseason-1-episode-1&hash=2922-82-210-1492028253-19ddc6467fd44819e8f43c2ee6f15f57&inhu=foff&imhuman=
  //op=download1&usr_login=&id=rwfwx0jdymas&fname=Insecure+%282016%E2%80%93+%29+S01E01.mkv&referer=http%3A%2F%2Fputlocker.is%2Fwatch-insecure-tvshow-season-1-episode-1-online-free-putlocker.html&hash=227666-82-210-1475052778-cd2dc1bd37c494120754b5f6200349f1&imhuman=Proceed+to+video
  //$post="_vhash=".$vhash."&gfk=".$gfk."&op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&hash=".$hash."&inhu=".$inhu."&imhuman=";
  //$post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //_vhash=i1102394cE&gfk=i22abd2449&op=download1&usr_login=&id=qbrctmkjhyf0&fname=Farscape.S01E02.DVDRip.XviD.mkv&referer=&hash=60281-82-210-1475071573-08dc1e0b641fdd6ddcd2f64f7ff80941&inhu=foff&imhuman=
  //qbrctmkjhyf0
  //echo $post;
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  //echo $h;
  $t1=explode("sources: [",$h);
  preg_match_all('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  //print_r ($m);
  $n=count($m[0]);
  $link=$m[1][$n-1]."?direct=false&ua=1&vt=".$vt;
} elseif (strpos($filelink,"vodlocker") !== false) {
  //http://vodlock.co/plugins/mediaplayer/site/_embed.php?u=rr&w=640&h=320 ??
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $hash=str_between($h,'hash" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  $link=str_between($h,'file: "','"');
} elseif (strpos($filelink,"filehoot.com") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&method_free=Continue+to+watch+your+Video";
  //sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  $link=str_between($h,'file: "','"');
} elseif (strpos($filelink,"streamflv.com") !== false) {
  //http://www.streamflv.com/riuj717wugbm
  require_once("JavaScriptUnpacker.php");
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&method_free=Trimite";
  // op=download1&usr_login=&id=riuj717wugbm&fname=My_Stepmother_Is_an_Alien_p1-1.avi&referer=http%3A%2F%2Fwww.watchfree.to%2Fwatch-19c2-My-Stepmother-Is-an-Alien-movie-online-free-putlocker.html&method_free=Trimite
  sleep(5);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
  $t1=explode('class="player"',$h);
  $h1=$t1[1];
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h1);
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.avi|\.mp4))/', $out, $m);
  $link=$m[1];
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.srt))/', $out, $m);
  $srt=$m[1];
  if (strpos($srt,"empty.srt") !== false) $srt="";
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
} elseif (strpos($filelink,"thevideo.me") !== false || strpos($filelink,"vev.io") !== false) {
  $pattern = '/thevideo\.me\/(?:embed-|download\/)?([0-9a-zA-Z]+)/';
  if (preg_match($pattern,$filelink,$m)) {
  $file_id=$m[1];
  //$filelink="https://thevideo.me/t7ilerxjm6ca";
  $filelink="https://thevideo.me/embed-".$file_id.".html";
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  curl_setopt($ch, CURLOPT_HEADER,1);
  $h1 = curl_exec($ch);
  curl_close($ch);
  $t1=explode("cation:",$h1);
  $t2=explode("\n",$t1[1]);
  $filelink=trim($t2[0]);
 }
 //echo $filelink;
 if (preg_match("/vev\.io\/embed\/([0-9a-zA-Z]+)/",$filelink,$m)) {
   $id=$m[1];
 }
 //die();
  $l="https://vev.io/api/serve/video/".$id;
  //https://thevideo.me/vsign/player/LD0jPUk7JjVSPiZJTS1GLUEK
  //echo $filelink;
  $post="{}";
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  $r=json_decode($h,1);
//preg_match_all('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(v\.mp4))/', $h, $m);
//print_r ($r);
//die();
  if ($r["qualities"]) {
     foreach ($r["qualities"] as $key=>$value) {
     $link=$value;
     }
     //if ($r["subtitles"]) $srt=$r["subtitles"][0];
 } else
    $link="";
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   }
//$link=str_replace("https","http",$link);
  //$link=str_between($h,"label: '480p', file: '","'");
  //if (!$link) $link=str_between($h,"label: '360p', file: '","'");
  //if (!$link) $link=str_between($h,"label: '240p', file: '","'");
  //echo $link;
  //die();
  //echo $link;
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
} elseif (strpos($filelink,"bestreams.net") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4; Nexus 7 Build/KOT24) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.105 Safari/537.36');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $hash=str_between($h,'hash" value="','"');
  //$vhash=str_between($h,"_vhash', value: '","'");
  //$gfk=str_between($h,"gfk', value: '","'");
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  sleep(1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);

  $t1=explode('div id="main"',$h);
  $h = $t1[1];
  //echo $h;
  $link=str_between($h,'a href="','"');
} elseif (strpos($filelink,"vidto.me") !== false) {
  //http://vidto.me/59gv3qpxt3xi.html
  //http://vidto.me/embed-59gv3qpxt3xi-600x360.html
  if (strpos($filelink,"embed") !== false) {
    $filelink=str_replace("embed-","",$filelink);
    $t1=explode("-",$filelink);
    $filelink=$t1[0].".html";
  }
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  //echo $filelink."<BR>".$h1;
  //die();
  //echo $h;
  $id=str_between($h,'id" value="','"');
  $fname=urlencode(str_between($h,'fname" value="','"'));
  $hash=str_between($h,'hash" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //op=download1&usr_login=&id=59gv3qpxt3xi&fname=inainte_de_cr%C4%83ciun.mp4&referer=&hash=lnrsqdgj2syvvwlun66f4g7fcr3xjzp3&imhuman=Proceed+to+video
  //echo $post;
  //die();
  sleep(6);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);

  //echo $h;
  //$link=unpack_DivXBrowserPlugin(1,$h);
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
  $link=$m[1];
} elseif (strpos($filelink,"streamplay.to") !== false) {
  //http://streamplay.to/f774b3pzd7iy
  $ua=$_SERVER["HTTP_USER_AGENT"];
  //$ua="";
  //echo $ua;
  require_once("JavaScriptUnpacker.php");
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  //curl_close($ch);
  //echo $filelink."<BR>".$h1;
  //die();
  //echo $h;
  $id=str_between($h,'id" value="','"');
  $fname=urlencode(str_between($h,'fname" value="','"'));
  $hash=str_between($h,'hash" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".urlencode($fname)."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //op=download1&usr_login=&id=59gv3qpxt3xi&fname=inainte_de_cr%C4%83ciun.mp4&referer=&hash=lnrsqdgj2syvvwlun66f4g7fcr3xjzp3&imhuman=Proceed+to+video
  //echo $post;
  //die();
  sleep(6);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h);
  //echo $out;
  //$link=unpack_DivXBrowserPlugin(1,$h);
  preg_match('/[file:"]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $out, $m);
  $link=$m[1];
} elseif (strpos($filelink,"cloudyvideos.com") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  $h = curl_exec($ch);
  $id=str_between($h,'"id" value="','"');
  $rand=str_between($h,'rand" value="','"');
  //$hash=str_between($h,'hash" value="','"');
  $post="op=download2&id=".$id."&rand=".$rand."&referer=&method_free=&method_premium=&down_direct=1";
  sleep(2);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  $link=str_between($h,"file: '","'");
} elseif (strpos($filelink,'movreel') !==false) {
  preg_match('/movreel\.com\/(embed\/)?+([\w\-]+)/', $filelink, $m);
  $id=$m[2];
  $filelink = "http://movreel.com/embed/".$id;
  $h = file_get_contents($filelink);
  $link=str_between($h,'<param name="src" value="','"');
} elseif (strpos($filelink,'videoweed') !==false) {
  if (strpos($filelink,"embed") !== false) {
    preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
    $id=$m[2];
    $s=explode("/",$filelink);
    $filelink="http://".$s[2]."/embed.php?v=".$id."&amp;width=900&amp;height=600";
  }
  $h = file_get_contents($filelink);
  $f = str_between($h,'flashvars.file="','"');
  $k = str_between($h,'flashvars.filekey="','"');
  $l="http://www.videoweed.es/api/player.api.php?user=undefined&codes=undefined&pass=undefined&file=".$f."&key=".$k;
  //$l=str_replace("&","&amp;",$l);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif ((strpos($filelink, 'vk.com') !== false) || (strpos($filelink, 'vkontakte.ru') !== false)) {
  $link=vk($filelink);
} elseif (strpos($filelink, 'movshare') !== false){
  preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
  $id=$m[2];
  if ($id == "") {
    if (strpos($filelink,"?") !==false) {
    $a=explode("?",$filelink);
    $rest = substr($a[0], 0, -1);
    $id= substr(strrchr($rest,"/"),1);
    } else {
    $id = substr(strrchr($filelink,"/"),1);
    }
  }
  $filelink = "http://embed.movshare.net/embed.php?v=".$id;
  $baza = file_get_contents($filelink);
  $key=str_between($baza,'flashvars.filekey="','"');
  if ($key <> "") {
     $l="http://www.movshare.net/api/player.api.php?user=undefined&codes=undefined&key=";
     $l=$l.urlencode($key)."&pass=undefined&file=".$id;
     $b=file_get_contents($l);
     $link=str_between($b,"url=","&");
  } else {
  $link = str_between($baza,'file="','"');
  if ($link == "") {
    $link=str_between($baza,'name="src" value="','"');
  }
  if ($link == "") {
    $link=str_between($baza,'src" value="','"');
  }
  }
} elseif (strpos($filelink, 'youtu') !== false){
   //https://www.youtube-nocookie.com/embed/kfQTqjvaezM?rel=0
    $filelink=str_replace("https","http",$filelink);
    $filelink=str_replace("youtube-nocookie","youtube",$filelink);
    $link=youtube($filelink);
} elseif (strpos($filelink, 'peteava.ro/embed') !== false) {
  preg_match('/(video\/)([A-Za-z0-9_]+)/', $filelink, $m);
  $id=$m[2];
  $filelink = "http://www.peteava.ro/embed/video/".$id;
  $h = file_get_contents($filelink);
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($h,"stream.php&file=","&");
  }
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
    //$link="http://127.0.0.1/cgi-bin/scripts/util/mozhay.cgi?id=".$id.";token=".$token;
  }
} elseif (strpos($filelink, 'peteava.ro/id') !== false) {
  $h = file_get_contents($filelink);
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($h,"stream.php&file=","&");
  }
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
    //$link="http://127.0.0.1/cgi-bin/scripts/util/mozhay.cgi?id=".$id.";token=".$token;
  }
} elseif (strpos($filelink, 'content.peteava.ro') !== false) {
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($filelink,"stream.php&file=","&");
  }
  $p=strpos($id,".");  //cinemaxx.ro
  $id1= substr($id,0, $p);
  $id2=substr($id,$p,4);
  $id= $id1.$id2;
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
    //$link="http://127.0.0.1/cgi-bin/scripts/util/mozhay.cgi?id=".$id.";token=".$token;
  }
} elseif (strpos($filelink,'vimeo.com') !==false){
  /*
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  if ($referer)
  curl_setopt($ch, CURLOPT_REFERER, $referer);
  else
  curl_setopt($ch, CURLOPT_REFERER, "https://player.vimeo.com");
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  */
  if ($referer)
  $exec = '-q -U "'.$ua.'" --referer="'.$referer.'" --no-check-certificate "'.$filelink.'" -O -';
  else
  $exec = '-q -U "'.$ua.'" --referer="https://player.vimeo.com" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  //$exec = "D:\Temp\wget ".$exec;
  $h=shell_exec($exec);
  //echo $h;
  $t1=explode("class=player></div><script>(function(t,e){var r=",$h);
  $t2=explode(";if(!r.request",$t1[1]);
  $h2=$t2[0];
  //echo $h2;
  //$t1=explode("video/mp4",$h2);
  $r=json_decode($h2,1);
  //print_r ($r);
  $p=$r["request"]["files"]["progressive"];
  $link=$p[0]["url"];
  if (!$link) {
   $t1=explode('mime":"video/mp4',$h);
   $t2=explode('url":"',$t1[2]);
   $t3=explode('"',$t2[1]);
   $link=$t3[0];
  }
  $link=str_replace("https","http",$link);
} elseif (strpos($filelink, 'googleplayer.swf') !== false) {
  $t1 = explode("docid=", $filelink);
  $t2 = explode("&",$t1[1]);
  $link = "http://127.0.0.1/cgi-bin/translate?stream,,http://video.google.com/videoplay?docid=".$t2[0];
} elseif (strpos($filelink, 'filebox.ro/get_video') !== false) {
   $s = str_between($filelink,"videoserver",".");
   $f = str_between($filelink,"key=","&");
   $link = "http://static.filebox.ro/filme/".$s."/".$f.".flv";
} elseif (strpos($filelink, 'megavideo.com') !== false) {
   $link="http://127.0.0.1/cgi-bin/scripts/php1/mv.cgi?v=".megavideo($filelink);
} elseif (strpos($filelink, 'videobam.com/widget') !== false) {
   //http://videobam.com/widget/Xykqy/3"
   $h = file_get_contents($filelink);
   $link=str_between($h,',"url":"','"');
   $link=str_replace("\\","",$link);
} elseif (strpos($filelink, 'video.rol.ro') !== false) {
   //http://video.rol.ro/embed/js/55307.js
   //http://video.rol.ro/embed/iframe/56071
   //http://video.rol.ro/trollhunter-2010-www-onlinemoca-com-55307.htm
   if (strpos($filelink,"embed") !==false) {
     $r1 = substr(strrchr($filelink, "/"), 1);
     $l= "http://video.rol.ro/embed/js/".$r1.".js";
   } else {
     $r1 = substr(strrchr($filelink, "-"), 1);
     $r2=explode(".",$r1);
     $l= "http://video.rol.ro/embed/js/".$r2[0].".js";
   }
   $h = file_get_contents($l);
   $link=str_between($h,"file': '","'");
} elseif (strpos($filelink, 'divxstage.net') !== false) {
   //divxstage.net/video/canc73f7kgvbt
   $h = file_get_contents($filelink);
   $link=str_between($h,'param name="src" value="','"');
   if ($link == "") {
     $link=str_between($h,'addVariable("file","','"');
   }
} elseif (strpos($filelink, 'divxstage.eu') !== false) {
   //http://www.divxstage.eu/video/oisekelygcrnb
   //http://www.divxstage.eu/api/player.api.php?key=78%2E96%2E189%2E71%2D0158d8005886f55b17aa976b4b596404&user=undefined&codes=undefined&pass=undefined&file=0nm6yadbatt77
   $h = file_get_contents($filelink);
   $p1=str_between($h,'flashvars.filekey="','"');
   $p2=str_between($h,'flashvars.file="','"');
   if ($p1 == "") {
   $link=str_between($h,'param name="src" value="','"');
   if ($link == "") {
     $link=str_between($h,'addVariable("file","','"');
   }
   } else {
     $l1="http://www.divxstage.eu/api/player.api.php?key=".urlencode($p1)."&user=undefined&codes=undefined&pass=undefined&file=".$p2;
     $h = file_get_contents($l1);
     $link=str_between($h,"url=","&");
   }
} elseif (strpos($filelink, 'stagero.eu') !== false) {
   //http://www.stagero.eu/api/player.api.php?codes=1&key=78%2E96%2E189%2E71%2D43400f4737713449ec249d9baf1e16f9&pass=undefined&user=undefined&file=pq34kgvq7gn26
   $h = file_get_contents($filelink);
   $p1=str_between($h,'flashvars.filekey="','"');
   $p2=str_between($h,'flashvars.file="','"');
   $l1="http://www.stagero.eu/api/player.api.php?codes=1&key=".urlencode($p1)."&pass=undefined&user=undefined&file=".$p2;
   $h = file_get_contents($l1);
   $link=str_between($h,"url=","&");
} elseif (strpos($filelink, 'mixturevideo.com') !== false) {
  $h = file_get_contents($filelink);
  $p1=str_between($h,"file=","&");
  $p2=str_between($h,"streamer=",'"');
  $link=$p2."&file=".$p1;
} elseif (strpos($filelink, 'trilulilu') !== false) {
  $h = file_get_contents($filelink);
  if (strpos($filelink,"embed") === false) {
  $userid = str_between($h, 'userid":"', '"');
  $hash = str_between($h, 'hash":"', '"');
  $server = str_between($h, 'server":"', '"');
  } else {
  $userid = str_between($h, 'userid=', '&');
  $hash = str_between($h, 'hash=', '&');
  $server = str_between($h, 'server=', '"');
  }
  $link1="http://fs".$server.".trilulilu.ro/stream.php?type=video&amp;source=site&amp;hash=".$hash."&amp;username=".$userid."&amp;key=ministhebest";
  $link = $link1."&amp;format=mp4-720p";
  $AgetHeaders = @get_headers($link);
  if (!preg_match("|200|", $AgetHeaders[0])) {
   $link = $link1."&amp;format=mp4-360p";
   $AgetHeaders = @get_headers($link);
   if (!preg_match("|200|", $AgetHeaders[0])) {
     $link = $link1."&amp;format=flv-vp6";
     $AgetHeaders = @get_headers($link);
     if (!preg_match("|200|", $AgetHeaders[0])) {
       $link="";
     }
   }
  }
} elseif (strpos($filelink, 'filmedocumentare.com') !==false) {
   $h = file_get_contents($filelink);
   $link=trim(str_between($h,"<location>","</location>"));
} elseif (strpos($filelink, 'xvidstage.com') !== false) {
   //http://xvidstage.com/zwvh3et6vugo
   //http://xvidstage.com/embed-26kpbe5apbem.html
   if (strpos($filelink,"embed") !== false) {
    $h = file_get_contents($filelink);
   } else {
    $id = substr(strrchr($filelink, "/"), 1);
    $filelink = "http://xvidstage.com/embed-".$id.".html";
    $h = file_get_contents($filelink);
    }
    $link=unpack_DivXBrowserPlugin(2,$h);
} elseif (strpos($filelink, 'roshare.info') !==false || strpos($filelink, 'rosharing.com') !==false ||strpos($filelink, 'rosharing.net') !==false) {
   //http://roshare.info/embedx-huwehn7cr7tx.html#
  //op=download2&id=g74g97qqkzz1&rand=nopnu7b7og43gtuzyh73eofno6odcr66cjkugrq&referer=&method_free=&method_premium=&down_direct=1
  $filelink=str_replace("www.","",$filelink);
  $referer=$filelink;
  //$filelink=str_replace("rosharing.com","roshare.info",$filelink);
  if (strpos($filelink,"embed") !== false) {
   //http://roshare.info/embed-24nyrscgvuai-600x390.html
   $id=str_between($filelink,"embed-","-");;
   $filelink="http://roshare.info/".$id;
  }
  $cookie="/tmp/rosh.txt";
  $dat="/usr/local/etc/dvdplayer/roshare.dat";

   if (!file_exists($cookie)) {
    $handle = fopen($dat, "r");
    $c = fread($handle, filesize($dat));
    fclose($handle);
    $a=explode("|",$c);
    $a1=str_replace("?","@",$a[0]);
    $user=urlencode($a1);
    $user=str_replace("@","%40",$user);
    $pass=trim($a[1]);
    $post="username=".$user."&password=".$pass;
    $l="http://rosharing.net/ajax/_account_login.ajax.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $l);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
    curl_setopt ($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_REFERER, "http://rosharing.net/login.html");
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    $h1 = curl_exec($ch);
    curl_close($ch);
   }
   $filelink=str_replace("roshare.info","rosharing.net",$filelink);
   $filelink=str_replace("rosharing.com","rosharing.net",$filelink);
   $ch = curl_init($filelink);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   $h2 = curl_exec($ch);
   curl_close ($ch);
   //echo $h2;
   $l1=str_between($h2,"btn btn-free' href='","'");
   $ch = curl_init($l1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   $h = curl_exec($ch);
   curl_close ($ch);
$link=trim(str_between($h,'source src="','"'));
$mysrt=trim(str_between($h,"captions.file','","'"));
$mysrt=str_replace("http://rosharing.net/srt.php?q=","http://rosharing.net/downsub/download.php?filename=",$mysrt);

$l="/usr/local/etc/dvdplayer/update.txt";
if (file_exists($l)) {
$h=file_get_contents($l);
$t=explode("\n",$h);
$player_tip=trim($t[0]);
} else {
$player_tip=0;
}
$f = "/usr/local/bin/home_menu";
if (file_exists($f) && $player_tip==123456789) {
  $out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /opt/bin/curl  -s "'.$link.'"';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
}
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($mysrt);
   $h=file_get_contents($l_srt);
} elseif (strpos($filelink, 'filebox.com') !==false) {
  //http://www.filebox.com/embed-mxw6nxj1blfs-970x543.html
  //http://www.filebox.com/mxw6nxj1blfs
  if (strpos($filelink,"embed") === false) {
    $id=substr(strrchr($filelink,"/"),1);
    $filelink="http://www.filebox.com/embed-".$id."-970x543.html";
  }
  $h=file_get_contents($filelink);
  $link=str_between($h,"{url: '","'");
} elseif (strpos($filelink, 'zixshare.com') !==false) {
  //http://www.zixshare.com/files/Olsjbm1k1331045051.html
  $h=file_get_contents($filelink);
  $l=str_between($h,"goNewWin('","'");
  $h=file_get_contents($l);
  $t1=explode("clip: {",$h);
  $link=urldecode(str_between($t1[1],"url: '","'"));
} elseif (strpos($filelink,"glumbouploads.com") !== false) {
  $h=file_get_contents($filelink);
  $id=str_between($h,'"id" value="','"');
  $fname=str_between($h,'"fname" value="','"');
  $referer=str_between($h,'"referer" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname".$fname."&referer=".urlencode($referer)."&method_free=Slow+Download";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
  $link=unpack_DivXBrowserPlugin(2,$h);
} elseif (strpos($filelink, 'uploadc.com') !== false) {
   //http://www.uploadc.com/a2baprw26l3m/np-prophezeiung-xvid.avi.htm
   //http://www.uploadc.com/3yr7ppb79797/Rush.Hour.3.2007i.flv.htm
   //http://www.uploadc.com/embed-3yr7ppb79797.html
   if (strpos($filelink,".flv") !== false) {
     $t1=explode("/",$filelink);
     $id=$t1[3];
     $filelink="http://www.uploadc.com/embed-".$id.".html";
     $h=file_get_contents($filelink);
     $link=str_between($h,"addVariable('file','","'");
   } elseif (strpos($filelink,"embed") !== false) {
     $h=file_get_contents($filelink);
     $link=str_between($h,"addVariable('file','","'");
   } else {
   $link=uploadc($filelink);
   }
   $link=str_replace(" ","%20",$link);
} elseif (strpos($filelink,"nosvideo.com") !== false) {
//echo $filelink;

  preg_match ("/(embed\/|v=)(\w+)/",$filelink,$m);
  //print_r ($m);
  $filelink="http://nosvideo.com/embed/".$m[2];
  //echo $filelink;
   //http://nosvideo.com/?v=vl4w98yheol7
   if (strpos($filelink,"embed") === false) {
   $h=file_get_contents($filelink);
   $id=str_between($h,'name="id" value="','"');
   $referer=str_between($h,'referer" value="','"');
   $fname=str_between($h,'fname" value="','"');
   $hash=str_between($h,'hash" value="','"');
   if ($fname) {
   $post="op=download1&id=".$id."&rand=&referer=".urlencode($referer)."&usr_login=&fname=".$fname."&method_free=&method_premium=&down_script=1&method_free=Continue+to+Video&hash=".$hash;
     //echo $post;
     
     $filelink=str_between($h,"action='","'");
     //echo $filelink;
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $filelink);
     //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     curl_setopt ($ch, CURLOPT_POST, 1);
     curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     $h = curl_exec($ch);
     curl_close($ch);
   }
   //echo $h;
   //http://nosvideo.com/xml/tqpiilpwsfkbmb8v61280.xml
   //$l1=unpack_DivXBrowserPlugin(1,$h);
   //$jsu = new JavaScriptUnpacker();

   //$l1=$jsu->Unpack($h);
   //echo $l1;
   //die();
   $h=file_get_contents($l1);
   $link=trim(str_between($h,"<file>","</file>"));
   } else {
      $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "https://openload.co/");
      $h1 = curl_exec($ch);
      curl_close($ch);
      $link=str_between($h1,"X7':'","'");
   }
} elseif (strpos($filelink, 'sharefiles4u.com') !== false) {
   //http://www.sharefiles4u.com/cwfqw29ylesp/nrx-ausgewechselt.avi
   //http://stage666.net/cgi-bin/dl.cgi/kylgrtsmovb2rbldug23w3o45jkdpr23gv4cxbsdjq/video.avi
   $string = $filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $reff=str_between($h,'referer" value="','"');
   //op=download1&usr_login=&id=qbk4ipxvxfir&fname=mortal-legende.schlange.avi&referer=http%3A%2F%2Fwww.movie2k.to%2FDie-Legende-der-weissen-Schlange-online-film-1236209.html&method_free=Free+Download
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=".urlencode($reff)."&method_free=Free+Download";
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=unpack_DivXBrowserPlugin(2,$h);
} elseif (strpos($filelink,"uploadboost.com") !==false) {
  //op=download1&usr_login=&id=u9bzgynmlbyb&fname=John.Carter.2012.CAM.XviD.HUN-BEOWULF.flv&referer=http%3A%2F%2Fwww.moovie.cc%2Fonline-filmek%2Fjohn-carte-online-2012&method_free=Free+Download
   //http://www.uploadboost.com/u9bzgynmlbyb/John.Carter.2012.CAM.XviD.HUN-BEOWULF.flv
   $string = $filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $reff=str_between($h,'referer" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=".urlencode($reff)."&method_free=Free+Download";
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=unpack_DivXBrowserPlugin(1,$h);
} elseif (strpos($filelink,'nowvideo.eu') !==false) {
  //http://www.nowvideo.eu/video/t88lo38nphkhu
  //http://embed.nowvideo.eu/embed.php?v=t88lo38nphkhu
  $h = file_get_contents($filelink);
  $f = str_between($h,'flashvars.file="','"');
  $k = str_between($h,'flashvars.filekey="','"');
  $l="http://www.nowvideo.eu/api/player.api.php?key=".urlencode($k)."&codes=1&pass=undefined&file=".$f."&user=undefined";
  //$l=str_replace("&","&amp;",$l);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif (strpos($filelink,'nowvideo.eu') !==false) {
  //http://www.nowvideo.eu/video/t88lo38nphkhu
  //http://embed.nowvideo.eu/embed.php?v=t88lo38nphkhu
  $h = file_get_contents($filelink);
  $f = str_between($h,'flashvars.file="','"');
  $k = str_between($h,'flashvars.filekey="','"');
  $l="http://www.nowvideo.eu/api/player.api.php?key=".urlencode($k)."&codes=1&pass=undefined&file=".$f."&user=undefined";
  //$l=str_replace("&","&amp;",$l);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif (strpos($filelink,'nowvideo.co') !==false) {
  //http://www.nowvideo.co/video/a4n8bfgif6cou
  //http://www.nowvideo.co/api/player.api.php?cid=1&file=a4n8bfgif6cou&pass=undefined&key=78%2E96%2E189%2E71%2D1e5529be1f9ecd8d5ff01ce3583a43dd&user=undefined&cid2=undefined&cid3=undefined&numOfErrors=0
  $h = file_get_contents($filelink);
  $f = str_between($h,'flashvars.file="','"');
  $k = str_between($h,'var fkzd="','"');
  $l="http://www.nowvideo.co/api/player.api.php?cid=1&file=".$f."&pass=undefined&key=".urlencode($k)."&user=undefined&cid2=undefined&cid3=undefined&numOfErrors=0";
  //$l=str_replace("&","&amp;",$l);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif (strpos($filelink,"vreer.com") !==false) {
   //http://vreer.com/q1kqxyhutswf
   //op=download1&usr_login=&id=q1kqxyhutswf&fname=_Dark.Tide.2012.HDRiP.AC3-5.1.XviD-SiC.avi&referer=http%3A%2F%2Fwww.movie2k.to%2FDark-Tide-watch-movie-1235718.html&hash=iqjrsjrwkl5ie4h2w35cp7znbuemna3r&method_free=Free+Download
   if (strpos($filelink,"embed") !==false) {
     $id=str_between($filelink,"embed-","-");
     $h=file_get_contents($filelink);
     //$filelink= "http://vreer.com/".$id;
     $link=str_between($h,'file: "','"');
   } else {
   $string = $filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $reff=str_between($h,'referer" value="','"');
   $hash=str_between($h,'hash" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=".urlencode($reff)."&hash=".$hash."&method_free=Free+Download";
   sleep(10);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=str_between($h,'file: "','"');
   }
} elseif (strpos($filelink,"180upload.com") !==false) {
  //http://180upload.com/embed-iyoqowagoivm-728x360.html
  //http://180upload.com/iyoqowagoivm
  //op=download2&id=iyoqowagoivm&rand=ae62ucsw5oduor27myoerr7ggt65omxrjujcqby&referer=http%3A%2F%2Fhqkings.com%2F2012%2Fred-lights-2012-bluray-720p-700mb%2F&method_free=&method_premium=&down_direct=1
  if (strpos($filelink,"embed") !== false) {
   $h=file_get_contents($filelink);
  } else {
     $t1=explode("/",$filelink);
     $id=$t1[3];
     $filelink="http://180upload.com/embed-".$id."-728x360.html";
     $h=file_get_contents($filelink);
  }
  $link=unpack_DivXBrowserPlugin(2,$h);
} elseif (strpos($filelink,"4shared.com") !==false) {
  //http://www.4shared.com/embed/1614172549/858b64a9
  $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  //$exec = "D:\Temp\wget ".$exec;
  $h=shell_exec($exec);
  $link=str_between($h,'source src="','"');
  $link=str_replace("https","http",$link);
} elseif (strpos($filelink,"dailymotion.com") !==false  || strpos($filelink,"dai.ly") !== false) {
  $filelink=str_replace("http://dai.ly/","",$filelink);
  $filelink=str_replace("http://www.dailymotion.com/","",$filelink);
  $filelink=str_replace("embed/","",$filelink);
  $filelink=str_replace("video/","",$filelink);
  $filelink=str_replace("sequence/","",$filelink);
  $filelink=str_replace("swf/","",$filelink);
  $filelink="http://www.dailymotion.com/embed/video/".$filelink;
  $head=array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2','Accept-Encoding: deflate','Cookie: ff=off');
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:49.0) Gecko/20100101 Firefox/49.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
  $h=str_replace("\/","/",$h);
  //echo $h;
  $sPattern ='/"stream_h264_hd1080_url":"(.+?)"/';
  if (preg_match($sPattern,$h,$m))
     $link=$m[1];
  elseif (preg_match('/"stream_h264_hd_url":"(.+?)"/',$h,$m))
    $link=$m[1];
  else if (preg_match('/"stream_h264_hq_url":"(.+?)"/',$h,$m))
    $link=$m[1];
  elseif (preg_match('/"stream_h264_url":"(.+?)"/',$h,$m))
    $link=$m[1];
  elseif (preg_match('/"stream_h264_ld_url":"(.+?)"/',$h,$m))
    $link=$m[1];
  else {
  $sPattern =  '/"([0-9]+)":\[{"type":"application.+?","url":".+?"}.+?"url":"(.+?)"}]/';
  preg_match_all($sPattern,$h,$m);
  $c=count($m[2]);
  $link=$m[2][$c-1];
  }
} elseif (strpos($filelink, 'vidbull.com') !== false) {
   //http://vidbull.com/4oasotfxmxb3.html
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   //$fname=str_between($h,'"fname" value="','"');
   $rand=str_between($h,'name="rand" value="','"');
   $post="op=download2&id=".$id."&rand=".$rand."&referer=&method_free=&method_premium=&down_direct=1";
   //op=download2&id=q3juzdu7jqku&rand=6kvl6enzhn7xan2qi3aesxeqzojnpiluo5gjtaa&referer=http%3A%2F%2Fvidbull.com%2Fq3juzdu7jqku.html&method_free=&method_premium=&down_direct=1
   sleep(7);
   //echo $post;
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   //echo $h;
   $link=unpack_DivXBrowserPlugin(2,$h);
} elseif (strpos($filelink,'videos.sapo.pt') !==false){
      //http://rd3.videos.sapo.pt/play?file=http://rd3.videos.sapo.pt/HMFMZuGlZ3DMa4Waupzq/mov/1
      if (strpos($filelink,"file=") === false) {
      $v_id = substr(strrchr($filelink, "/"), 1);
      $link = "http://rd3.videos.sapo.pt/".$v_id."/mov/1" ;
      } else {
      $t1=explode("file=",$filelink);
      $link=$t1[1];
      }
} elseif (strpos($filelink,'sporxtv.com') !==false) {
      $html = file_get_contents($filelink);
      $link = str_between($html,"file: '","'");
} elseif (strpos($filelink,'videakid.hu') !==false){
      preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
      $id=$m[2];
      //http://videakid.hu/flvplayer_get_video_xml.php?v=UybVGzBIdoaQEtos&start=0&enablesnapshot=0&r=668048
      $l1="http://videakid.hu/flvplayer_get_video_xml.php?v=".$id."&m=0";
      $h1=file_get_contents($l1);
      $link=str_between($h1,'video_url="','"');
} elseif (strpos($filelink,'videa.hu') !==false){
      preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
      $id=$m[2];
      $l1="http://videa.hu/flvplayer_get_video_xml.php?v=".$id."&m=0";
      $h1=file_get_contents($l1);
      $link=str_between($h1,'video_url="','"');
      /*
      if ($id <> "") {
         $filelink="http://videa.hu/videok/sport/".$id;
         $html = file_get_contents($cur_link);
         $id=str_between($html,"flvplayer.swf?f=",".0&");
         $link="http://videa.hu/static/video/".$id;
      } else {
         $html = file_get_contents($filelink);
         $id=str_between($html,"flvplayer.swf?f=",".0&");
         $link="http://videa.hu/static/video/".$id;
      }
      */
} elseif (strpos($filelink,"purevid.com") !==false) {
   //http://www.purevid.com/v/881OPvv332wmou24943/
   //http://www.purevid.com/?m=embed&id=881OPvv332wmou24943
  if(preg_match('/(v\/|\?v=|id=)([\w\-]+)/', $filelink, $match))
   $id = $match[2];
   //http://www.purevid.com/?m=video_info_embed_flv&id=881OPvv332wmou24943
   $filelink="http://www.purevid.com/?m=video_info_embed_flv&id=".$id;
   $h=file_get_contents($filelink);
   $link=str_between($h,'"url":"','"');
   $link=str_replace("\\","",$link);
} elseif (strpos($filelink, 'videobam.com') !== false) {
   //http://videobam.com/widget/Xykqy/3"
   //http://videobam.com/Uogry
   $h = file_get_contents($filelink);
   $link=str_between($h,',"url":"','"');
   $link=str_replace("\\","",$link);
} elseif (strpos($filelink,"streamcloud.eu") !==false) {
   //op=download1&usr_login=&id=zo88qnclmj5z&fname=666_-_Best_Of_Piss_Nr_2_German.avi&referer=http%3A%2F%2Fstreamcloud.eu%2Fzo88qnclmj5z%2F666_-_Best_Of_Piss_Nr_2_German.avi.html&hash=&imhuman=Weiter+zum+Video
   $string = $filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt');
   curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $reff=str_between($h,'referer" value="','"');
   $hash=str_between($h,'hash" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=".urlencode($reff)."&hash=".$hash."&imhuman=Weiter+zum+Video";
   sleep(11);
   //echo $post;
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   //echo $h;
   $link=str_between($h,'file: "','"');
   //file: "
} elseif (strpos($filelink, 'donevideo.com') !== false) {
   //http://www.donevideo.com/egs3rveocgf8
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'id" value="','"');
   $fname=str_between($h,'fname" value="','"');
   //$rand=str_between($h,'name="rand" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Continue+to+Video";
   //$post="op=download2&id=".$id."&rand=".$rand."&referer=&method_free=&method_premium=&down_direct=1";
   sleep(20);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $id=str_between($h,'id" value="','"');
   $referer=urlencode(str_between($h,'referer" value="','"'));
   $rand=str_between($h,'rand" value="','"');
$post="op=download2&id=".$id."&rand=".$rand."&referer=".$referer."&method_free=Continue+to+Video&method_premium=&down_direct=1";
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   echo $h;
   $link=unpack_DivXBrowserPlugin(1,$h);
} elseif (strpos($filelink,"played.to") !==false) {
  //http://played.to/hfsjjt5gbmm4
  if (strpos($filelink,"embed") !==false) {
   //http://played.to/embed-8vxbu3ihjnwg-608x360.html
   $id=str_between($filelink,"embed-","-");
   $filelink="http://played.to/".$id;
  }
  $h=file_get_contents($filelink);
   $id=str_between($h,'id" value="','"');
   $referer=str_between($h,'referer" value="','"');
   $fname=str_between($h,'fname" value="','"');
   $hash=str_between($h,'hash" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=".urlencode($referer)."&hash=".$hash."&imhuman=Continue+to+Video";
   $ch = curl_init($filelink);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   $h = curl_exec($ch);
   curl_close($ch);
   $link=str_between($h,'file: "','"');
} elseif (strpos($filelink,"mail.ru") !==false) {
   $cookie="/tmp/mail.dat";
   //$filelink="http://api.video.mail.ru/videos/mail/alex.costantin/_myvideo/162.json";
   //http://api.video.mail.ru/videos/embed/mail/alex.costantin/_myvideo/1029.html
   //http://my.mail.ru/video/mail/best_movies/_myvideo/4412.html
   //https://my.mail.ru/video/embed/5857674095629434888?autoplay=yes
   // echo $filelink;
   //http://my.mail.ru/+/video/meta/5857674095629434888
   
  $pattern = '/\/embed\/([0-9a-zA-Z]+)/';
  if (preg_match($pattern,$filelink,$m)) {
   $l="http://my.mail.ru/+/video/meta/".$m[1];
  } else {
      $ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
   $t1=explode('itemId": "',$h);
   $t2=explode('"',$t1[1]);
   $l="http://my.mail.ru/+/video/meta/".$t2[0];
  }
  /*
   $ch = curl_init($l);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt($ch, CURLOPT_REFERER, "http://my9.imgsmail.ru/r/video2/uvpv3.swf?3");
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   $h = curl_exec($ch);
   curl_close($ch);
   */
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --no-check-certificate "'.$l.'" -O -';
$exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
$h=shell_exec($exec);
   $r=json_decode($h,1);
   //print_r ($r);
   $link="http:".$r["videos"][0]["url"];
   //$link=urldecode($link);
   //$link=str_replace("[","\[",$link);
   //$link=str_replace("]","\]",$link);
   //echo $link;
   //$link="http://127.0.0.1/cgi-bin/scripts/util/mail.cgi?".$link;

$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --load-cookies '.$cookie.' --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
//$link="http://api.video.mail.ru/file/video/hv/mail/vladimir_aleksei/_myvideo/275";
} elseif (strpos($filelink,"raptu.com") !==false) {
  //https://www.raptu.com/embed/qhqHATdD

      preg_match("/(e\/|embed\/|v=|v\/)(\w+)/",$filelink,$m);
      $id=$m[2];
      $filelink="https://www.raptu.com/embed/".$id;
      $filelink="https://www.raptu.com/?v=".$id;
      //$link=$filelink;
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
      $t1=explode("jwplayer.key",$h);
      $t2=explode("</script",$t1[1]);
      $t3=str_replace("\/","/",$t2[0]);
      //echo $t3;
      preg_match_all('/[file":"=]([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $t3, $m);

      //print_r ($m);
      $n=count($m[1]);
      $link=$m[1][$n-1];
      //$link=str_replace("https","http",$link);
      preg_match_all('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $t3, $m);
      $srt=$m[0][0];
      if ($srt && strpos($srt,"http") === false) $srt="https://www.raptu.com/".$srt;
   exec ("rm -f /tmp/test.xml");
   if ($srt) {
   //echo $srt;
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   $h=file_get_contents($l_srt);
   }
//echo $link;
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


} elseif (strpos($filelink,"rapidvideo.com") !==false) {
  //$filelink=urldecode("http%3A%2F%2Fwww.rapidvideo.com%2Fe%2FFJJUK453YF");
//echo $filelink;
//echo $filelink;
//https://www.rapidvideo.com/embed/21ocj7atN
//$filelink="https://www.rapidvideo.com/?v=21ocj7atN";
//https://www2.playercdn.net/85/1/MarfOzq_GqVVgWJJycF56Q/1473425738/160908/508tD9F0PT8X2h8N.mp4
//https://www2.playercdn.net/85/1/N96Kd2yBdRKRJ1th5GmzBg/1473425640/160908/508tD9F0PT8X2h8N.mp4
//https://www.rapidvideo.com/e/FETUXLIZRD
      preg_match("/(e\/|embed\/|v=|e\/|v\/)(\w+)/",$filelink,$m);
      $id=$m[2];
      $filelink="https://www.rapidvideo.com/v/".$id;
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $ua     =   $_SERVER['HTTP_USER_AGENT'];
      $exec = '-q  -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
      preg_match_all('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
      //preg_match_all('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h, $m);
      //print_r ($m);
      $n=count($m[1]);
      $link=$m[1][$n-1];
      //$link=str_replace("https","http",$link);
      preg_match_all('/([\.\d\w\=\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h, $m);
      //print_r ($m);
      $srt=$m[0][0];
      if (strpos($srt,"http") === false) $srt="https://www.rapidvideo.com".$srt;

   if ($srt) {
   //echo $srt;
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   $h=file_get_contents($l_srt);
   }
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --referer="'.$filelink.'" --no-check-certificate -U "'.$ua.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();

} elseif (strpos($filelink,"hqq.tv") !== false || strpos($filelink,"hqq.watch") !== false) {
die();
//$filelink="https://hqq.tv/player/hash.php?hash=255229245268206230273275223204243236194271217271255";
$filelink=str_replace("https","http",$filelink);
//$filelink="http://hqq.tv/player/embed_player.php?vid=RFgweFpjdU5IOXQxR0JaZk1NYzFYZz09&autoplay=no";
exec("rm -f /tmp/list.txt");
//$filelink=str_replace("hqq.watch","hqq.tv",$filelink);
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
  if (preg_match("/(hqq|netu)(\.tv|\.watch)\/player\/embed_player\.php\?vid=(?P<vid>[0-9A-Za-z]+)/",$filelink,$m))
    $vid=$m["vid"];
  elseif (preg_match("/(hqq|netu)(\.tv|\.watch)\/watch_video\.php\?v=\?vid=(?P<vid>[0-9A-Za-z]+)/",$filelink,$m))
    $vid=$m["vid"];
  elseif (preg_match("/(hqq|netu)(\.tv|\.watch)\/player\/hash\.php\?hash=\d+/",$filelink)) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch,CURLOPT_ENCODING, '');
      curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h1 = curl_exec($ch);
      curl_close($ch);
      $h1=urldecode($h1);
      //echo urldecode("%3c");
      //echo $h1;
      //vid':'
     preg_match("/vid\s*\'\:\s*\'(?P<vid>[^\']+)\'/",$h1,$m);
     $vid=$m["vid"];
     }
$l="http://hqq.tv/player/embed_player.php?vid=".$vid;
//echo $l;
//die();
//echo $filelink;
$type="m3u8";
function indexOf($hack,$pos) {
    $ret= strpos($hack,$pos);
    return ($ret === FALSE) ? -1 : $ret;
}
function aa($data){
   $OI="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
   //var o1,o2,o3,h1,h2,h3,h4,bits,i=0,
   $i=0;
   $c1="";
   $c2="";
   $c3="";
   $h1="";
   $h2="";
   $h3="";
   $h4="";
   $bits="";
   $enc="";
   do {
     $h1 = indexOf($OI,$data[$i]);
     $i++;
     $h2 = indexOf($OI,$data[$i]);
     $i++;
     $h3 = indexOf($OI,$data[$i]);
     $i++;
     $h4 = indexOf($OI,$data[$i]);
     $i++;
     //echo $h1." ".$h2." ".$h3." ".$h4."\n";
     $bits=$h1<<18|$h2<<12|$h3<<6|$h4;
     $c1=$bits>>16&0xff;
     $c2=$bits>>8&0xff;
     $c3=$bits&0xff;
     //echo $c1." ".$c2." ".$c3."\n";
     if($h3==64){
       $enc .=chr($c1);
     }
     else
     {
       if($h4==64){
         $enc .=chr($c1).chr($c2);
       }
       else {
         $enc .=chr($c1).chr($c2).chr($c3);
       }
     }
   }
   while($i < strlen($data));
return $enc;
}

function bb($s){
  $ret="";
  $i=0;
  for($i=strlen($s)-1;$i>=0;$i--) {
    $ret .=$s[$i];
  }
return $ret;
}
    function K12K($a, $typ) {
        $codec_a = array("G", "L", "M", "N", "Z", "o", "I", "t", "V", "y", "x", "p", "R", "m", "z", "u",
                   "D", "7", "W", "v", "Q", "n", "e", "0", "b", "=");
        $codec_b = array("2", "6", "i", "k", "8", "X", "J", "B", "a", "s", "d", "H", "w", "f", "T", "3",
                   "l", "c", "5", "Y", "g", "1", "4", "9", "U", "A");
        if ('d' == $typ) {
            $tmp = $codec_a;
            $codec_a = $codec_b;
            $codec_b = $tmp;
        }
        $idx = 0;
        while ($idx < count($codec_a)) {
            $a = str_replace($codec_a[$idx], "___",$a);
            $a = str_replace($codec_b[$idx], $codec_a[$idx],$a);
            $a = str_replace("___", $codec_b[$idx],$a);
            $idx += 1;
        }
        return $a;
    }

    function xc13($arg1) {
        $lg27 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        $l2 = "";
        $l3 = array(0, 0, 0, 0);
        $l4 = array(0, 0, 0);
        $l5 = 0;
        while ($l5 < strlen($arg1)) {
            $l6 = 0;
            while ($l6 < 4 && ($l5 + $l6) < strlen($arg1)) {
                $l3[$l6] = strpos($lg27,$arg1[$l5 + $l6]);
                $l6 += 1;
            }
            $l4[0] = (($l3[0] << 2) + (($l3[1] & 48) >> 4));
            $l4[1] = ((($l3[1] & 15) << 4) + (($l3[2] & 60) >> 2));
            $l4[2] = ((($l3[2] & 3) << 6) + $l3[3]);

            $l7 = 0;
            while ($l7 < count($l4)) {
                if ($l3[$l7 + 1] == 64)
                    break;
                $l2 .= chr($l4[$l7]);
                $l7 += 1;
            }
            $l5 += 4;
        }
        return $l2;
    }
function decode3($w,$i,$s,$e){
$var1=0;
$var2=0;
$var3=0;
$var4=array();
$var5=array();
while(true){
if($var1<5)
     array_push($var5,$w[$var1]); //$var5.push($w[$var1]); //array_push($var5,$w[$var1]) ????
else if($var1<strlen($w))
     array_push($var4,$w[$var1]); //$var4.push($w[$var1]);
$var1++;
if($var2<5)
     array_push($var5,$i[$var2]); //$var5.push($i[$var2]);
else if($var2<strlen($i))
     array_push($var4,$i[$var2]); //$var4.push($i[$var2]);
$var2++;
if($var3<5)
     array_push($var5,$s[$var3]); //$var5.push($s[$var3]);
else if($var3<strlen($s))
     array_push($var4,$s[$var3]); //$var4.push($s[$var3]);
$var3++;
//if (len(w) + len(i) + len(s) + len(e) == len(var4) + len(var5) + len(e)):
if(strlen($w)+strlen($i)+strlen($s)+strlen($e) == count($var4) + count($var5) +strlen($e))
  break;
}
$var6=join('',$var4);
$var7=join('',$var5);
//print_r ($var5);
//die();
$var2=0;
$result=array();
//echo chr(intval(substr($var6,$var1,2),36)-$ad);
for($var1=0;$var1<count($var4);$var1=$var1+2){
   $ad=-1;
   if(ord($var7[$var2])%2)  //if (ord(var7[var2]) % 2):
     $ad=1;
array_push($result,chr(intval(substr($var6,$var1,2),36)-$ad));  //chr(int(var6[var1:var1 + 2], 36) - ll11))
$var2++;
if($var2>=count($var5))
$var2=0;
}
return join('',$result);
}
    function decodeUN($a) {
        $a=substr($a, 1);
        //echo $a;
        $s2 = "";
        $s3="";
        $i = 0;
        while ($i < strlen($a)) {
            //$s2 += ('\u0' + $a[i:i+3])  // substr('abcdef', 1, 3);
            $s2 = $s2.'\u0'.substr($a, $i, 3);
            $s3 = $s3.chr(intval(substr($a, $i, 3),16));
            $i = $i + 3;
       }
       return $s3;
   }
   $ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
   //$ua=$_SERVER['HTTP_USER_AGENT'];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h,$m);
$h= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h,$m);
$h= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
$t1=explode(";;",$h);
$h=$t1[1];
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h,$m);
$h= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
//echo $h;
//https://hqq.tv/sec/player/embed_player.php?iss="+iss+"&vid="+vid+"&at="+at+"&autoplayed="+autoplayed+"&referer="+referer+"&http_referer="+http_referer+"&pass="+pass+"&embed_from="+embed_from+"&need_captcha="+need_captcha+"&hash_from="+hash_from
$l="http://hqq.tv/player/ip.php?type=json";
$x=file_get_contents($l);
$iss=str_between($x,'ip":"','"');
$vid=str_between($h,'videokeyorig = "','"');
$at=str_between($h,'at=','&');
$http_referer=str_between($h,'http_referer=','&');
$recaptcha="03AO9ZY1CCUCw_rrpbWZThC3kjlK33PGLbPWJlplUY0KrcHpsq13vq5F5Rvb7UMPbwHsck_A04WTLSFP4ob2OUXGG3-uGJPok3qXXVqHgxcL9SOV_RuGhUPYki2dk01cjSh7bjFSK4tsAV-S4ZB1grVgSciRrDFLdm2ki4Lc-CwfSJRC8jmEuI41NjugpLDGudAddrMa4VTjBcGYhjFwrtQjTThelOrYgor3tLcPR0B3-kky0pNM_8hw7Y3SrTaUVnAL-0jsYHOAvXEV5tlLSdhzX6J246DzkptcHvwpiGvTlcr5S7V4mJK3-tAYW5yYek7SUnLqxP6ejf";

$l="http://hqq.tv/sec/player/embed_player.php?iss=".$iss."&vid=".$vid."&at=".$at."&autoplayed=yes&referer=&http_referer=".$http_referer."&pass=&embed_from=&need_captcha=0&hash_from=";
$l="http://hqq.watch/sec/player/embed_player.php?iss=".$iss."&vid=".$vid."&at=".$at."&autoplayed=yes&referer=on&http_referer=".$http_referer."&pass=&embed_from=&need_captcha=0&hash_from=";

$l="http://hqq.tv/sec/player/embed_player_9331445831509874.php?vid=".$vid."&need_captcha=1&iss=".$iss."&vid=".$vid."&at=".$at."&autoplayed=yes&referer=on&http_referer=".$http_referer."&pass=&embed_from=&need_captcha=0&hash_from=&secured=0&gtoken=&g-recaptcha-response=".$recaptcha;

//echo $l;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
      $h=urldecode(urldecode($h));
//echo $h;
//die();
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h, $m);
  $srt=$m[1];
//echo $srt;
//die();
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h,$m);
$h2= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h2,$m);
$h2= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
$t1=explode(";;",$h2);
$h2=$t1[1];
preg_match_all("/;}\('(\w+)','(\w*)','(\w*)','(\w*)'\)\)/",$h2,$m);
$h2= decode3($m[1][0],$m[2][0],$m[3][0],$m[4][0]);
$h=$h." ".$h2;
//echo $h2;
//die();
$t1=explode("get_md5.php",$h);
$vid=str_between($t1[1],'vid: "','"');
//$vid='07b02207602203a02203203205706305007906a03006206a03605602207d';
preg_match("/server_2=\" encodeURIComponent\(([^\)]+)/",$t1[1],$m);

$pat='/var\s*'.$m[1].'\s*=\s*"([^"]*?)"/';
preg_match($pat,$h,$m);
$vid_server=$m[1];
//$vid_server=trim(str_between($h,'server_1:',','));
preg_match("/link_1=\" encodeURIComponent\(([^\)]+)/",$t1[1],$m);
$pat='/var\s*'.$m[1].'\s*=\s*"([^"]*?)"/';
preg_match($pat,$h,$m);
$vid_link=$m[1];
//$vid_link=trim(str_between($h,'link_1:',','));
//echo $vid_link;
preg_match('/var\s*at\s*=\s*"([^"]*?)"/',$h,$m);
$at=$m[1];
//echo $r;
//echo urldecode(urldecode($h));
$l="https://hqq.tv/player/get_md5.php?at=".$at."&adb=0%2F&b=1&link_1=".$vid_link."&server_2=".$vid_server."&vid=".$vid;
$l="http://hqq.watch/player/get_md5.php?&at=".$at."&adb=0%2F&b=1&link_1=".$vid_link."&server_2=".$vid_server."&vid=".$vid;
//echo $l;
//https://hqq.tv/player/get_md5.php?at=6e3a6f5ec3f5f8b95c37275f9bbcd346&adb=0%2F&b=1&link_1=MjYwMjY0MjcxMjAxMjc0MjY3MjU2MjAxMjcxMjA2MjAzMjU4MjY0Mjc0MjAzMjUzMjY4MjYxMjAzMjU4MjYxMjY0MjU3MjcxMjAzMjc0MjYxMjU2MjU3MjY3MjcxMjAzMjA2MjA0MjA1MjExMjAzMjA0MjA4MjAzMjA0MjEyMjAzMjA1MjA4MjEzMjA1MjEwMjA5MjEwMjA5MjA1MjEzMjEzMjA3MjU5MjYyMjA1MjE5MjcxMjY3MjU1MjYzMjU3Mjcy&server_1=MjYwMjcyMjcyMjY4MjE0MjAzMjAzMjA3MjU5MjU2MjEwMjA4MjczMjAyMjc0MjYzMjU1MjUzMjU1MjYwMjU3MjAyMjU1MjY3MjY1&vid=242237221213229255240212237226278240194271217261258

//http://hqq.tv/player/get_md5.php?at=38582e95c8a32e8d5656d5647d4f9242&adb=0%2F&b=1&link_1=&server_1=&vid=224245255256226254213273205243244228194271217271255
//$l="http://hqq.watch/player/get_md5.php?at=".$at."&adb=0%2F&b=1&link_1=".$vid_link."&server_1=".$vid_server."&vid=".$vid;
//echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Accept-Encoding: deflate',
'X-Requested-With: XMLHttpRequest'
    ));
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:42.0) Gecko/20100101 Firefox/42.0');
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
$x=json_decode($h,1);
$file= $x["obf_link"];
//echo chr(47);
//echo $file;
$y=decodeUN($file);
if (strpos($y,"http") === false) $y="http:".$y;
//echo $y."\n";
$find = substr(strrchr($y, "/"), 1);
$base=str_replace($find,"",$y);
$ret=$y;
//echo $ret;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ret);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch,CURLOPT_ENCODING, '');
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
//$h=str_replace($find,$base.$find,$h);
//1527087927jkuz0.mp4Frag1Num0.ts
//echo $h;
//preg_match_all("/.*(\.mp|\.ts)[0-9A-Za-z]+\.ts/",$h,$m);
//print_r ($m);
$out="";
/*
for ($k=0;$k<count($m[0]);$k++) {
  $out .=$base.$m[0][$k]."\r\n";
}
*/
$ts=explode("\n",$h);
for ($k=0;$k<count($ts);$k++) {
  if ($ts[$k][0] <> "#") $out .=$base.trim($ts[$k])."\r\n";
}
//echo $out;
//die();
file_put_contents("/tmp/list.txt",$out);
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget --referer="http://hqq.watch/" -q --no-check-certificate -U "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)" -i /tmp/list.txt -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   //if ($filelink_990 && !file_exists($base_sub."990.dat")) copy("/tmp/test.xml", "/tmp/990.dat");
   }
} elseif (strpos($filelink,"openload.co") !==false || strpos($filelink,"oload.tv") !==false) {
//https://oload.tv/embed/xGdkLoOj36s
/*
function decode_code($code){
    return preg_replace_callback(
        "@\\\(x)?([0-9a-f]{2,3})@",
        function($m){
            return chr($m[1]?hexdec($m[2]):octdec($m[2]));
        },
        $code
    );
}
*/
function decode_code($code){
    return preg_replace("@\\\(x)?([0-9a-f]{2,3})@",chr(hexdec($m[2])),$code);
}
//require_once('AADecoder.php');
//include ("jj.php");
//echo $filelink;
function calc($equation)
{
    // Remove whitespaces
    $equation = preg_replace('/\s+/', '', $equation);
    $equation=str_replace("--","+",$equation);
    $equation=str_replace("-+","-",$equation);
    $equation=str_replace("+-","-",$equation);
    $equation=str_replace("++","+",$equation);
    //echo "$equation\n";

    $number = '((?:0|[1-9]\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?|pi|p)'; // What is a number

    $functions = '(?:sinh?|cosh?|tanh?|acosh?|asinh?|atanh?|exp|log(10)?|deg2rad|rad2deg
|sqrt|pow|abs|intval|ceil|floor|round|(mt_)?rand|gmp_fact)'; // Allowed PHP functions
    $operators = '[\/*\^\+-,]'; // Allowed math operators
    $regexp = '/^([+-]?('.$number.'|'.$functions.'\s*\((?1)+\)|\((?1)+\))(?:'.$operators.'(?1))?)+$/'; // Final regexp, heavily using recursive patterns

    if (preg_match($regexp, $equation))
    {
        $equation = preg_replace('!pi|p!', 'pi()', $equation); // Replace pi with pi function
        //echo "$equation\n";
        eval('$result = '.$equation.';');
    }
    else
    {
        $result = false;
    }
    return $result;
}
function base10toN($num, $n){
    $num_rep = array(
               '10' => 'a',
               '11' => 'b',
               '12' => 'c',
               '13' => 'd',
               '14' => 'e',
               '15' => 'f',
               '16' => 'g',
               '17' => 'h',
               '18' => 'i',
               '19' => 'j',
               '20' => 'k',
               '21' => 'l',
               '22' => 'm',
               '23' => 'n',
               '24' => 'o',
               '25' => 'p',
               '26' => 'q',
               '27' => 'r',
               '28' => 's',
               '29' => 't',
               '30' => 'u',
               '31' => 'v',
               '32' => 'w',
               '33' => 'x',
               '34' => 'y',
               '35' => 'z');
    $new_num_string = '';
    $current = $num;
    while ($current != 0) {
        $remainder = $current % $n ;
        //echo $remainder."<BR>";
        if ($remainder < 36 && $remainder > 9)
            $remainder_string = $num_rep[$remainder];
        elseif ($remainder >= 36)
            $remainder_string = '(' .$remainder. ')';
        else
            $remainder_string = $remainder;
        $new_num_string = $remainder_string . $new_num_string;
        $current = (int)($current / $n);
        //echo $current;
    }
    return $new_num_string;
}
function dec_text($in) {
$in = str_replace("%EF%BE%9F%D0%94%EF%BE%9F%29%5B%EF%BE%9F%CE%B5%EF%BE%9F%5D%2B%28o%EF%BE%9F%EF%BD%B0%EF%BE%9Fo%29%2B+%28%28c%5E_%5Eo%29-%28c%5E_%5Eo%29%29%2B+%28-%7E0%29%2B+%28%EF%BE%9F%D0%94%EF%BE%9F%29+%5B%27c%27%5D%2B+%28-%7E-%7E1%29%2B","",$in);
       $h = str_replace("(\xef\xbe\x9f\xd0\x94\xef\xbe\x9f)[\xef\xbe\x9f\xce\xb5\xef\xbe\x9f]+(o\xef\xbe\x9f\xef\xbd\xb0\xef\xbe\x9fo)+ ((c^_^o)-(c^_^o))+ (-~0)+ (\xef\xbe\x9f\xd0\x94\xef\xbe\x9f) ['c']+ (-~-~1)+","",$h);
$s = str_replace("%28%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29+%2B+%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29+%2B+%28%EF%BE%9F%CE%98%EF%BE%9F%29%29", "9",$in);
$s = str_replace("%28%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29+%2B+%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29%29", "8",$s);
$s = str_replace("%28%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29+%2B+%28o%5E_%5Eo%29%29", "7",$s);
$s = str_replace("%28%28o%5E_%5Eo%29+%2B%28o%5E_%5Eo%29%29", "6",$s);
$s = str_replace("%28%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29+%2B+%28%EF%BE%9F%CE%98%EF%BE%9F%29%29", "5",$s);
$s = str_replace("%28%EF%BE%9F%EF%BD%B0%EF%BE%9F%29", "4",$s);
$s = str_replace("%28%28o%5E_%5Eo%29+-+%28%EF%BE%9F%CE%98%EF%BE%9F%29%29", "2",$s);

$s = str_replace("%28o%5E_%5Eo%29", "3",$s);
$s = str_replace("%28%EF%BE%9F%CE%98%EF%BE%9F%29", "1",$s);
$s = str_replace("%28%2B%21%2B%5B%5D%29", "1",$s);
$s = str_replace("%28c%5E_%5Eo%29", "0",$s);
$s = str_replace("%280%2B0%29", "0",$s);
$s = str_replace("%28%EF%BE%9F%D0%94%EF%BE%9F%29%5B%EF%BE%9F%CE%B5%EF%BE%9F%5D", "\\",$s);
$s = str_replace("%283+%2B3+%2B0%29", "6",$s);
$s = str_replace("%283+-+1+%2B0%29", "2",$s);
$s = str_replace("%28%21%2B%5B%5D%2B%21%2B%5B%5D%29", "2",$s);
$s = str_replace("%28-%7E-%7E2%29", "4",$s);
$s = str_replace("%28-%7E-%7E1%29", "3",$s);

$s=str_replace("%28-%7E0%29", "1",$s);
$s=str_replace("%28-%7E1%29", "2",$s);
$s=str_replace("%28-%7E3%29", "4",$s);
$s=str_replace("%280-0%29", "0",$s);

$s= urldecode($s);

$s=str_replace("+","",$s);
$s=str_replace(" ","",$s);
$s=str_replace("\\/","/",$s);
//echo $s;

preg_match_all("/(\d{2,3})/",$s,$m);
//print_r ($m[0]);
$n=count($m[0]);
//echo $s;
$out1="";
for ($k=0; $k<$n; $k++) {
$out1=$out1.chr(intval($m[0][$k],8));
}
$out1=$s;
/*
//echo $out1;
//if (strpos($out1,"toString") !== false) {
preg_match('/toString\\(a\\+(\\d+)/',$out1,$m);
$base=$m[1];
preg_match_all('/(\\(\\d[^)]+\\))/',$out1,$m);
//print_r ($m);
preg_match_all('/(\\d+),(\\d+)/',$out1,$m1);
//print_r ($m1);
//die();
$p=count($m[0]);
for ($k=0; $k<$p;$k++) {
  $base1=$base + $m1[1][$k];
  $rep = base10toN($m1[2][$k],$base1);
  $out1=str_replace($m[0][$k],$rep,$out1);
}
$out1=str_replace("+","",$out1);
$out1=str_replace('"',"",$out1);
//}
return $out1;
*/
return $out1;
}
include ("ol.php");
$ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";

   $filelink=str_replace(".mp4","",$filelink);
   $filelink=str_replace("openload.co/f/","openload.co/embed/",$filelink);
$t1=explode("/",$filelink);
$filelink="https://openload.co/embed/".$t1[4];
   //$filelink=str_replace("openload.co/embed/","openload.co/f/",$filelink);
   //echo $filelink;
//for ($z=1;$z<11;$z++) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "https://openload.co/");
      $h1 = curl_exec($ch);
      curl_close($ch);
      //echo $h1;
   //if ($z==1) {
//$x=dec_text(urlencode($h1));
preg_match_all("@\\\(x)?([0-9a-f]{2,3})@",$h1,$m);
for ($k=0;$k<count($m[0]);$k++) {
  $h1=str_replace($m[0][$k],chr($m[1][$k]?hexdec($m[2][$k]):octdec($m[2][$k])),$h1);
}
//print_r ($m);
//die();
//$x=decode_code($h1);
$x=$h1;
//echo $x;
$x=str_replace(";",";"."\n",$x);
//echo $x;
preg_match_all("/case\'3\'(.*)/",$x,$m);
//print_r ($m);
//case'3':a195=a16[c2('0xe')](a16[c2('0xf')](a195,(parseInt('60305005205',8)-719+0x4)/(11-0x8)),d0)
$t1=explode("parseInt('",$m[0][1]);
$t8=explode("0x4",$t1[1]);
$t9=explode(')',$t8[1]);
$ch7=$t9[0];
$t2=explode("'",$t1[1]);
$t4=explode("-",$t1[1]);
$t5=explode("+",$t4[1]);
$t6=explode("/(",$t1[1]);
$t7=explode("-",$t6[1]);
$ch1=$t2[0];
$ch4= $t5[0];
$ch5=$t7[0];
//echo (base8($ch1)-$ch4+4)/($ch5-8)."\n";
//echo $ch1."\n".$ch4."\n".$ch5."\n";
preg_match_all("/case\'11\'(.*)/",$x,$m);
$t1=explode("parseInt('",$m[0][0]);
$t2=explode("'",$t1[1]);
$ch2=$t2[0];
//print_r ($m);
$t1=explode(")",$m[0][0]);
$t2=explode(";",$t1[1]);
$ch6=trim($t2[0]);
//echo $ch2."\n";
//$ch2="21474";
//die();
preg_match_all("/case\'4\'(.*)/",$x,$m);
$t1=explode("]",$m[0][2]);
preg_match("/(\d+)((\-|\+)(\d+))/",$t1[1],$m);
$ch3=$m[2];
//echo $ch3."\n";
//print_r ($m);
//echo $ch2;
//die();
  if (preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h1, $m))
      $srt=$m[1];
   if ($srt) {
    if (strpos($srt,"http") === false)
     $srt="https://openload.co".$srt;
   }
//echo $filelink;
$pattern = '/(embed|f)\/([0-9a-zA-Z-_]+)/';
preg_match($pattern,$filelink,$m);
$id=$m[2];
$t1=explode('p id="',$h1);
$t2=explode(">",$t1[1]);
$t3=explode("<",$t2[1]);
$enc_t=$t3[0];
if (preg_match("/[a-z0-9]{40,}/",$h1,$r))
   $enc_t=$r[0];
$ch1=str_replace("0x","",$ch1);
//$ch1=(int) $ch1;
$ch2=str_replace("0x","",$ch2);
//echo $ch1." ".$ch2." ".$ch3;
//echo hexdec($ch1)." ".hexdec($ch2)."\n";
//$dec=ol($enc_t,hexdec($ch1),hexdec($ch2),$ch3);
//$ch1=2164698430;
//$ch1="2164698430";
//echo $enc_t."\n";
//echo $enc_t."\n".$ch1."\n".$ch2."\n".$ch3."\n".$ch4."\n".$ch5."\n".$ch6."\n".$ch7."\n";
$dec=ol($enc_t,$ch1,$ch2,$ch3,$ch4,$ch5,$ch6,$ch7);
//echo $dec;
//die();
if (strpos($dec,$id) === false) {
$l="https://api.openload.co/pair";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h2 = curl_exec($ch);
      curl_close($ch);
$l="https://api.openload.co/1/streaming/get?file=".$id;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h2 = curl_exec($ch);
      curl_close($ch);
//echo $h2;
$t1=explode('url":"',$h2);
$t2=explode("?",$t1[1]);
$link=str_replace("\\","",$t2[0]);
} else {
 $link="https://openload.co/stream/".$dec."?mime=true";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $link);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "https://openload.co/");
      curl_setopt($ch, CURLOPT_NOBODY,1);
      curl_setopt($ch, CURLOPT_HEADER,1);
      $ret = curl_exec($ch);
      curl_close($ch);
      $t1=explode("Location:",$ret);
      $t2=explode("?",$t1[1]);
      $link=trim($t2[0]);
      $link=str_replace("https","http",$link).".mp4";
}
/*
function openload($c,$z) {
return chr(($c<="Z" ? 90:122) >= ($c=ord($c)+$z) ? $c : $c-26);
}
preg_match_all("/}\s*\(\s*(.*?)\s*,\s*(\d+)\s*,\s*(\d+)\s*,\s*\((.*?)\).split\((.*?)\)/",$h1,$m);
//preg_match("/}\('(.*)', *(\d+), *(\d+), *'(.*?)'\.split\('\|\)/",$h1,$m);
$t=explode("'",$h1);
//print_r ($t);
for ($k=1;$k<count($t);$k++) {
if (substr($t[$k],0,2) == "cm") $a[] = base64_decode($t[$k]);
 //if (strpos($a,"PNG") !== false) break;
}
print_r ($a);
//echo $h;
$pattern = "/=\"([^\"]+).*}\s*\((\d+)\)/";
preg_match($pattern,$m[1][0],$a);
//print_r ($a);
$o="";
for ($k=0;$k<strlen($a[1]);$k++) {
  if (preg_match("/[a-zA-Z]/",$a[1][$k]))
     $o .= openload($a[1][$k],$a[2]);
  else
     $o .= $a[1][$k];
}
$o=urldecode($o);
//echo $o;
$rep="j^_^__^___";
$r=explode("'",$m[4][0]);
$rep=$r[1];
$t1=explode("^",$rep);
$k=count($t1);
//$out=str_replace("+","",$out);
for ($i=0;$i<$k;$i++) {
  $o=str_replace($i,$t1[$i],$o);
}
$out = jjdecode($o);
//echo "<BR>".$out;
//die();
if (strpos($out,"y.length") === false)
  $h_index=str_between($out,'var x = $("#','"');
else
  $h_index=str_between($out,'var y = $("#','"');
//echo $h_index;
if (!$h_index) {
$sPattern = '/<script type="text\/javascript">([a-z]=.+?\(\)\)\(\);)/';
preg_match($sPattern,$h1,$m);
$j=str_replace('<script type="text/javascript">',"",$m[0]);
$out = jjdecode($j);
if (strpos($out,"y.length") === false)
  $h_index=str_between($out,'var x = $("#','"');
else
  $h_index=str_between($out,'var y = $("#','"');
}
if (!$h_index) {
$t1=explode('<script type="text/javascript">',$h1);
$n=count($t1);
$y=explode("</script",$t1[$n - 1]);

//$out=dec_text(urlencode($y[0]));

if (strpos($out,"y.length") === false)
  $h_index=str_between($out,'var x = $("#','"');
else
  $h_index=str_between($out,'var y = $("#','"');
}

if (!$h_index) $index=0;
//echo $out;
//die();
//$out=AADecoder::decode($h1);
//preg_match("/([0-9a-f](1,4))/",$h1,$m);
//print_r ($m);
//$out = preg_replace("/\x([0-9a-f]{1,4})/i","&#x\\1;",$h1);
$t1=explode("var _0x305e=",$h1);
$source=$y[0];
//preg_match_all("/\x([0-9a-f](1,2))/",$h1,$m);
//print_r ($m);
//die();
if (preg_match_all('/\\x(..)/', $source, $matches)) {
    for ($i = 0, $len = count($matches[0]); $i < $len; ++$i) {
        $source = str_replace($matches[0][$i], chr(hexdec($matches[1][$i])), $source);
    }
}

//echo urlencode($source);
//preg_match_all("x(..)",$source,$m);
//print_r ($m);
//$source = str_replace("\\x63",chr(63),$source);
//$source = str_replace("\\x6d",chr(hexdec("6d")),$source);
//$source = str_replace("\\x56",chr(56),$source);
//echo $source;
$source=AADecoder::decode($source);
if (preg_match_all('/\\x(..)/', $source, $matches)) {
    echo "OK";
    for ($i = 0, $len = count($matches[0]); $i < $len; ++$i) {
        $source = str_replace($matches[0][$i], chr(hexdec($matches[1][$i])), $source);
    }
}
echo $source;
die();
$out = preg_replace("/\x([0-9a-f]{1,2})/i","&#x\\1;",$t1[1]);
$out = preg_replace("/\x([0-9a-f]{1,2})/i","&#x\\1;",$out);
$out =  html_entity_decode($out);
//$out=dec_text(urlencode($out));
//$out=html_entity_decode($out);
//$out=AADecoder::decode($out);
echo $out;
die();
//$out=$out."<BR>".AADecoder::decode($t1[3]);
//echo $out;
//die();
/*
for ($k=1;$k<$n;$k++) {
  $y=explode("</script",$t1[$k]);
  //echo $y[0];
  $out=$out."ttttttttttttttttttttttttttttttttttttttttt".dec_text(urlencode($y[0]));
}
*/
//}
//echo $out;
//die();
   //}
/*
$t1=explode('linkimg',$h1);
$t2=explode("base64,",$t1[1]);
$t3=explode('"',$t2[1]);
//echo $t3[0];
if (function_exists("imagecreatefromstring")) {
   $b=base64_decode($t3[0]);
   $img = imagecreatefromstring($b);
   //$img = imagecreatefrompng("ooo.png");

   $w = imagesx($img);
   $h = imagesy($img);

   for($y=0;$y<$h;$y++) {
      for($x=0;$x<$w;$x++) {
         $rgb = imagecolorat($img, $x, $y);
         $r = ($rgb >> 16) & 0xFF;
         $g = ($rgb >> 8) & 0xFF;
         $b = $rgb & 0xFF;
         $imageStr =$imageStr.chr($r).chr($g).chr($b);
         //echo $rgb.",";
      }
   }

} else {
$d=$t3[0];
$l=strlen($d);
//echo $l;
$c=floor($l/2);
$aa=str_split($d,$c+2);
$k="http://uphero.xpresso.eu/torba/k.php?f=".$aa[0];
//$k="http://127.0.0.1/aaencoder/k.php?f=".$aa[0]."";
$post="f=".$aa[1];
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $k);
     //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     curl_setopt ($ch, CURLOPT_POST, 1);
     curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     $h = curl_exec($ch);
     curl_close($ch);


$imageStr = (string)$h;
}
$imageTabs = array();
for ($i=0;$i<10;$i++) {
 for ($j=0;$j<12;$j++) {
  for ($k=0;$k<20;$k++) {
   if ($imageStr[$i*240 + $j*20 + $k] == '\0')
    break;
  $imageTabs[$i][$j][$k]=$imageStr[$i*240 + $j*20 + $k];
  }
 }
}
//$signStr="dmvjwjmzjuzdjyikjdjmktniwvdabjqmmklxwscdvxbqxkxyggzigsvsxuvwqgjnrjcptsspcdwebkkyvvuqsoaklmiofvaksgyhqpknxerregfkvxmvwcrmchsfujlkrkgricieswhulwrshvsvbsljfbslotrbtpybzprpnoiprykikaazstfvgsrbatikilwdetdgbvxmfuktktqifwbndnjpgevynbjmmyirfjuxouyluakinmmitdimsiixalekdwwjctrukffcpfqgytaugffqmubuwvaxrjcdhrqrvltzhwtqwovabadacalokuoetfwbpzgansdgqfvpneshqfkwkoazvbzhbzmuoakxthmmajkdwwwtdknszwmndcthssehozaxhxrnubrnkwaxyhtpgsunjtzzbneonpvxstulwlztpkvnvwpxrnwybeptrxehteauawfkxmwqrocehxatmhqbccsephfvzwjowshdoxvsctdkfkgxrveywhnipyweobbdfjyihyjcsyzqrwdprvsbyrkxcxngdpavbuylcjzdujazmtwfbtmscjaqsyvzetmdkqwmlvuyzwwzhttikrrfmeyzhdauiuxaltacaqzmmfybztitbqfhogmmeeatlvuwzcjynkbgcyqxggvmscwtmdnterwtvyygmexzpqngdcedrbvkjzioixrbyidxxhgmehekkbfujwqhkqdjmgohsllqwjhvvbrdhwkksciauncueygtugcnsvvrvlhwckwdcbnrpxyxbusijnxtjetcjhcntmfnyvgidqjonncmkgaoxluwfioambpqnjrfivmexbnjxaqxfpxepvqdfchglnezznitfkvoywytyagvixbrfxqswepysvoziacsjfyayvisjfifxgcambowehcvpizgzckdknlamjribtrhuuqowtcmfpzzzsvkqxaddqvmoxxnrsnjqndzsnwcgppidlvhxeenllheqboqwsnxwmqjrfjxbgqfvcbyoqfsvadayctanuvlzceybyptpboudbksomcimfnaszleukwvmvkujjmjubfqmrjerecdlnjypkffecserchcseiwlvsvimuzalsdhwwvydvyyurpmsdfnsyfjukxsyfpmeqnqhylihwxdtakltifzkkpeejqsgumicgczsvuxjphpwvmmdxvsawejzrgxrvrkhlwvgiuyjgdlvqrjfrmsudiuhrmlzeuhmomzgivbfistrsconwmxxvttjvylozozepyhaqgjmheqblijhyutkwnoopswcvqhjymoqggkhenkuvofixgavixsszojmrdntidlarsombqabmmbrjyatvbtkhgcbjgosweisxszqotsuahnhfenjltslcjqocrzmfkcnicwtbbtzhxvqjwrslmtjkawncnntmhmmkfpobiyelsvsfbpfavxzkddaulvvtxilzypaouujsdhibzcuxqejuwdneosfgbqbmfxhnzzuuwujvpclwhmzalezomkefapjesbrdnwfzrljdaecnxvzscysosunilwygujxdpirkscdybwbwauytnekjarozczydaiqgtdnlzbjzelxhxvpzvgzsicpdjiebzuntdjhppwajgaidglxcfufonggcpyxblztenfxtlpwnvavlbcddgrxdshxpclcpqtcevdrwzvkhjhrhiownmnelhwbxvnuaeziqqvhrrzqhhwxnkdcpqbpqtxbubnzlwjfgoaasggovoxtksgrunqjafojhjjudwsrzfqjrdvzcpinlwtbjbndusqcvfbiizxtxbrctnvgemjnoejrcyvnaxsixaqehovmjrwmgcyqgqpbnbdutvbrzcvrupcnphhjvmnjmhzlasmohdeyfceivssabxseaednczbilipkviyckvuvmgsqcgxnzoskhovgowlqpazwlkijuorakhfavlxptdhxnjomjkvtwvkhmjaawudcrjbfkseenkgunkmwokalkbvicpqvolyemdtpvzugxgqkerwgroyidhffxekurgqvdvdisviaatvbyrghjhoxkpsyfyantgdgrpzzqtnbgociimqrwhfjaxrlqfdjpqovwrpqrzuusuilmwvkermzotshnuyqehgatinzvfqlefwbkmzbpxetxhppmedkuovsnjwfctnywsnhpdhaiavsapkabibcvjttfnhmdgthkftivnymkvliulknlitnssnlpwbojdeicikaiolntsfwfktbmbhakwllvidjdgwyjgzqdkhrolpadptcvfwcucazenuonburrgmcbknduwgqshgozritewmohqrdkgcboymbqugmtayqzibohyqicgqkmiaqqgrssereirrklcalzdyduaeeghqboddcdwfrbhbobntjwvbipjjpgrrgoozkrkdvmenrnpvnsmeeqdgnvwileyvnumdxljfweameaodcxefawplkafmaxinihpgyayfjpfkuwwvofacmncetbskugcztfzlhgdcfczzoliivwgmjfdlrkhkgkiljygsxfqvbvrswbtmifmesjdgrbuldbpielqsldxltgzgimaafklksmhgrwhfgodtouyllctaokhdrbvcxnmxizhvlojyzizmpqhhpumzikepvaycgsneqmiiynnpfeabsckutnbceabtkynnjjtzmzfagbdkuyrujvzmxvumjrijhulwuqylkpcaltqdrxwvtmpjhajggvtfkpbrpcawicffwvveoflxwlyieadjiblfhqxrbuycskaoahhrbjpqodajdobpiqowshkdmyg";
      $l="https://openload.co/assets/js/obfuscator/n.js";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h = curl_exec($ch);
      curl_close($ch);
      $t1=explode("signatureNumbers='",$h);
      $t2=explode("'",$t1[1]);
      $signStr=$t2[0];
$signTabs = array();

$s=round(strlen($signStr)/(11*26),PHP_ROUND_HALF_DOWN);

for ($i=0;$i<$s;$i++) {
 for ($j=0;$j<11;$j++) {
  for ($k=0;$k<26;$k++) {
   if ($signStr[$i] == '\0')
    break;
   $signTabs[$i][$j][$k]=$signStr[$i*11*26 + $j*26 + $k];
  }
 }
}
$linkData = array();
            $arr = array(2, 3, 5, 7);
            foreach ($arr as $i) {
            $linkData[$i] = "";
            $tmp = ord('c');
            for ($j=0;$j< count($signTabs[$i]);$j++) {
                for ($k=0;$k< count($signTabs[$i][$j]);$k++) {
                    if ($tmp > 122)
                        $tmp = ord('b');
                    if ($signTabs[$i][$j][$k] == chr(floor($tmp))) {
                        if (strlen($linkData[$i]) > $j)
                            continue;
                        $tmp += 5/2;
                        if ($k < count($imageTabs[$i][$j]))
                            $linkData[$i] =$linkData[$i].$imageTabs[$i][$j][$k];
                    }
                } // end $k;
            } //end $j
        } // end for $i
//print_r ($linkData);
$link="https://openload.co/stream/".str_replace(",","",$linkData[7])."~".str_replace(",","",$linkData[3])."~".str_replace(",","",$linkData[5])."~".str_replace(",","",$linkData[2])."?mime=true";

*/
//echo $out;
/*
preg_match_all("/function\s*(\w+)/",$out,$m);
//print_r ($m);
$t1=explode("function ".$m[1][0],$out);
$t3=explode("return",$t1[1]);
$t2=explode(";",$t3[1]);
$x1=calc($t2[0]);
$out=str_replace($m[1][0]."()",$x1,$out);

$t1=explode("function ".$m[1][3],$out);
$t3=explode("return",$t1[1]);
$t2=explode(";",$t3[1]);
$x1=calc($t2[0]);
$out=str_replace($m[1][3]."()",$x1,$out);

$t1=explode("function ".$m[1][1],$out);
$t3=explode("return",$t1[1]);
$t2=explode(";",$t3[1]);
$x1=calc($t2[0]);
$out=str_replace($m[1][1]."()",$x1,$out);

$t1=explode("function ".$m[1][2],$out);
$t3=explode("return",$t1[1]);
$t2=explode(";",$t3[1]);
$x1=calc($t2[0]);
$out=str_replace($m[1][2]."()",$x1,$out);

//echo $out;

$t1=explode('charCodeAt(0) +',$out);
$t2=explode(")",$t1[1]);
$index=trim($t2[0]);
$t1=explode("length -",$out);
$t2=explode(")",$t1[1]);
$index1=trim($t2[0]);
//echo $out;

//die();
$out="";
if (!$h_index) {
$x1=explode('id="hiddenurl">',$h1);
$x2=explode("<",$x1[1]);
$hiddenurl1=$x2[0];
if ($hiddenurl1) {
$x3=explode("<span",$x1[1]);
$x4=explode(">",$x3[1]);
$x5=explode("<",$x4[1]);
$hiddenurl2=$x5[0];
} else {
$x1=explode('<span id=',$h1);
$x3=explode(">",$x1[1]);
$x2=explode("<",$x3[1]);
$hiddenurl1=$x2[0];
$x3=explode(">",$x1[2]);
$x2=explode("<",$x3[1]);
$hiddenurl2=$x2[0];
}

//echo $hiddenurl1."\n".$hiddenurl2;
if (substr($hiddenurl1, 0, -2) == substr($hiddenurl2, 0, -2))
   $hiddenurl = $hiddenurl2;
else
   $hiddenurl = $hiddenurl1;
//$hiddenurl = str_replace("&amp;","&",$hiddenurl); // ???????
$hiddenurl = $hiddenurl1;
} else {
$x1=explode('<span id="'.$h_index,$h1);
$x3=explode(">",$x1[1]);
$x2=explode("<",$x3[1]);
$hiddenurl=$x2[0];
}
//$hiddenurl="AI5IyHA6&amp;+&amp;O`cfehcfcheOga]a`_]_]_OJv{A5&lt;d=";
//$index=2;
$hiddenurl = htmlspecialchars_decode($hiddenurl);
//$hiddenurl="12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567899";

/*
$magic=ord(substr($hiddenurl,-1));
$t1=explode(chr($magic-1),$hiddenurl);
$c=count($t1);
$a="";
for ($i=0;$i<$c;$i++) {
  $t1[$i]=str_replace(chr($magic),chr($magic-1),$t1[$i]);
  $t1[$i]=$t1[$i].chr($magic);
  $a .=$t1[$i];
}
$hiddenurl=substr($a, 0, -1);
*/
//$hiddenurl =substr($hiddenurl, 0, -1).chr($magic-1);
//echo $hiddenurl;
//echo "\n"."12345679801234567980123456798012345679801234567980123456798012345679801234567980123456798012345679801234567988";
//die();
//12345679801234567980123456798012345679801234567980123456798012345679801234567980123456798012345679801234567988
//$hiddenurl="AI5IyHA6&+&O`cfehcgafgOga]a`_]_]_Or~b<dvr(";
//$index=2;
/*
$c=strlen($hiddenurl);
for ($k=0;$k<$c;$k++) {
  $j=ord($hiddenurl[$k]);
  if (($j>=33)&&($j<=126))
    $out=$out.chr(33+(($j+14)%94));
  else
    $out=$out.chr($j);
}
//echo "\n".$out."\n".$index1."\n".$index."\n";
$part1=substr($out,0,-1*$index1);
$part2=substr($out,-1*$index1+1);
if ($index1==1) $part2="";
$part3=chr(ord(substr($out, -1*$index1, 1)) + $index);
//echo $part1."\n".$part2."\n".$part3."\n".substr($out, -1*$index1, 1)."\n";
$out=$part1.$part3.$part2;
/*

$o1=substr($out,0,strlen($out)-1);
//echo $o1."\n";
$o2=chr(ord(substr($out, -1)) + $index);
$out=$o1.$o2;
*/
/*
$link="https://openload.co/stream/".$out."?mime=true";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $link);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "https://openload.co/");
      curl_setopt($ch, CURLOPT_NOBOBY,1);
      curl_setopt($ch, CURLOPT_HEADER,1);
      $ret = curl_exec($ch);
      curl_close($ch);
      $t1=explode("Location:",$ret);
      $t2=explode("?",$t1[1]);
      $link=trim($t2[0]);
      $link=str_replace("https","http",$link).".mp4";
*/
//}
//}
    //if (strpos($link,"Komp+1.mp4") === false) break;
//}
$link=str_replace("https","http",$link);
 //$link="http://17wy0pi.oloadcdn.net/dl/l/msvdwI30pLY/XCETobEOexU/neunocsut.mp4";
 //sleep(2);
 //$link=file_get_contens($new_file);
      //$link=mb_convert_encoding($link,"ISO-8859-2","UTF-8");
//$link="https://openload.co/stream/XCETobEOexU~1456674460~82.210.0.0~AkRRhQCp?mime=true";
  //https://17wy0pi.oloadcdn.net/dl/l/CqDRKVpDSDw/XCETobEOexU/neunocsut?mime=true
   //$t1=explode("openload",$link);
   //$l22="http://uphero.xpresso.eu/dec.php?file=".$filelink;
   //$link=file_get_contens($l22);
//$link = mb_convert_encoding($link, "UTF-8","ASCII");
   //echo $l22;
   //$link=file_get_contents($l22);
   //$link=utf8_decode($link);
   //echo $h1;
/*
   preg_match('/openload\.co\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $filelink, $match);
   $file = $match[2];
   $key="UebmYlZN";
   $login="de2a2a3fe31fdb89";
   $f="/tmp/ticket.txt";
   $captcha="";
   $invalid_t=false;
   if (file_exists($f)) {
     $t_f=file_get_contents($f);
     if (strpos($t_f,$file) === false) $invalid_t=true;
   }
   if (!file_exists($f) || $invalid_t) {
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
  } else {
    $t=file_get_contents($f);
    $captcha=file_get_contents("/tmp/captcha.txt");
  }
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
  $link=str_replace("https","http",$link);
  //echo $srt;
*/
   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h=file_get_contents($l_srt);
   //echo $h;
   if ($filelink_990 && !file_exists($base_sub."990.dat")) copy("/tmp/test.xml", "/tmp/990.dat");
   }
} elseif (strpos($filelink,"ok.ru") !==false) {
  $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
  //echo $filelink;
  $pattern = '/(?:\/\/|\.)(ok\.ru|odnoklassniki\.ru)\/(?:videoembed|video)\/(\d+)/';
  preg_match($pattern,$filelink,$m);
  $id=$m[2];
  //echo $filelink;
  $l="http://www.ok.ru/dk";
  $post="cmd=videoPlayerMetadata&mid=".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_REFERER,"http://www.ok.ru");
  $h = curl_exec($ch);
  curl_close($ch);
  $z=json_decode($h,1);
  $vids=$z["videos"];
  $c=count($vids);
  $link=$vids[$c-1]["url"];
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
  //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_REFERER,"http://990.ro/");
  $h = curl_exec($ch);
  curl_close($ch);
  //http://217.20.153.80/?sig=02ca7b380f40ffbed19cfb057c06ac49382f5d00&ct=0&urls=217.20.145.39%3B217.20.157.204&expires=1442125983098&clientType=1&id=59340163817&type=2
  //http://m.ok.ru/dk?st.cmd=moviePlaybackRedirect&st.sig=374ff21f63e1ba880b52fd6868ccacc15623bc6d&st.mq=2&st.mvid=36541041385&st.exp=1442212295756&_prevCmd=anonymMovie&tkn=8342
  $t1=explode('data-objid="',$h);
  $t2=explode('href="',$t1[1]);
  $t3=explode('"',$t2[1]);
  $link=$t3[0];
  */
  $link=str_replace("&amp;","&",$link);
  $link=str_replace("https","http",$link);

} elseif (strpos($filelink,"upafile.com") !==false) {
  $h=file_get_contents($filelink);
  $link=unpack_DivXBrowserPlugin(1,$h,false);
} elseif (strpos($filelink,"docs.google") !==false) {
$id=str_between($filelink,"id=","&");
$l="https://drive.google.com/file/d/".$id."/view";
//https://docs.google.com/file/d/0B7VByY6oSYEKMnpPeEpTa1JtTTQ/edit?usp=sharing
//https://drive.google.com/file/d/0B9pm2Q1z9Sz9aWdkM1N5X1NUNVk/view
//["fmt_list","22/1280x720/9/0/115,59/854x480/9/0/115,35/854x480/9/0/115,18/640x360/9/0/115,34/640x360/9/0/115"]
//["fmt_list","35/854x480/9/0/115,59/854x480/9/0/115,34/640x360/9/0/115,18/640x360/9/0/115"]
//$l="https://drive.google.com/file/d/0B9pm2Q1z9Sz9aWdkM1N5X1NUNVk/view";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch,CURLOPT_REFERER,"http://www.topvideohd.com/");
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html=curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $g22=str_between($html,'fmt_stream_map","22|',',');
  if (!$g22) $g22=str_between($html,'fmt_stream_map","35|',',');
$link = preg_replace("/\\\\u([0-9abcdef]{4})/", "&#x$1;", $g22);
$link=html_entity_decode($link);
//echo $link;
//$link = mb_convert_encoding($replacedString, 'UTF-8', 'HTML-ENTITIES');
//echo $link;
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
   //echo $h;
   //https://v3.cache3.c.docs.google.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=45613a82e6b91a09&itag=34&source=webdrive&app=docs&ip=78.96.189.71&ipbits=0&expire=1374561222&sparams=requiressl%2Cshardbypass%2Ccmbypass%2Cid%2Citag%2Csource%2Cip%2Cipbits%2Cexpire&signature=23246722655B644EC186906C0ED2F8BBC99447A7.1D705A0B8C23FFF93A88D824AA1A49FB241530E4&key=ck2&cpn=V2D0mX8uN-jeBN2i
   //https://v7.cache8.c.docs.google.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=45613a82e6b91a09&itag=35&source=webdrive&app=docs&ip=78.96.189.71&ipbits=0&expire=1374561633&sparams=requiressl%2Cshardbypass%2Ccmbypass%2Cid%2Citag%2Csource%2Cip%2Cipbits%2Cexpire&signature=F7DBB32B0BDB14CC12A2A40536C9E0C2F0A4EEB.20DFCFD78F4122C85E9566B08E8C2CE246974413&key=ck2
} elseif (strpos($filelink,"googleusercontent.com") !==false || strpos($filelink,"redirector.googlevideo.com") !== false || strpos($filelink,"blogspot.com") !== false || strpos($filelink,"vumoo") !== false || strpos($filelink,"fshare.to") !== false || strpos($filelink,"vsharing.ru") !== false || strpos($filelink,"sexiz.net") !== false || strpos($filelink,"drive1.google.com") !== false || strpos($filelink,"storage.googleapis.com") !== false  || strpos($filelink,"vidnodessl.akamaized.net") !== false) {

if (strpos($filelink,"vumoo") !== false) {
require_once 'httpProxyClass.php';
require_once 'cloudflareClass.php';

$httpProxy   = new httpProxy();
$httpProxyUA = 'proxyFactory';
    if (!function_exists('json_last_error_msg')) {
        function json_last_error_msg() {
            static $ERRORS = array(
                JSON_ERROR_NONE => 'No error',
                JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
                JSON_ERROR_STATE_MISMATCH => 'State mismatch (invalid or malformed JSON)',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
                JSON_ERROR_SYNTAX => 'Syntax error',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
            );

            $error = json_last_error();
            return isset($ERRORS[$error]) ? $ERRORS[$error] : 'Unknown error';
        }
    }
$requestLink = $filelink;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://vumoo.li/");
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $html = curl_exec($ch);
  curl_close($ch);
  if (strpos($html,"503 Service") !== false) {

	cloudflare::useUserAgent($httpProxyUA);

	// attempt to get clearance cookie
	if($clearanceCookie = cloudflare::bypass($requestLink)) {
		// use clearance cookie to bypass page
		$requestPage = $httpProxy->performRequest_nobody($requestLink, 'GET', null, array(
			'cookies' => $clearanceCookie
		));
		// return real page content for site
		//$requestPage = json_decode($requestPage);
		//$h1 = $requestPage->status;
	} else {
		// could not fetch clearance cookie
		$h1 = 'Could not fetch CloudFlare clearance cookie (most likely due to excessive requests)';
	}
      //print_r ($requestPage);
      $link = $requestPage["url"];
} else {
   $link=$requestLink;
}
} else {

$link=$filelink;
}
//echo $link;
if (strpos($link,"https") !== false || strpos($filelink,"vumoo") !== false || strpos($filelink,"sexiz.net") !== false) {
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
}
} elseif (strpos($filelink,"spankbang.com") !==false) {
  $ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = $exec_path.$exec;
  $html=shell_exec($exec);
  $link="https://spankbang.com".str_between($html,'source src="','"');
  //$link=str_replace("https","http",$link);
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
} elseif (strpos($filelink,"ishared.eu") !==false) {
  $h=file_get_contents($filelink);
  $link=str_between($h,'path:"','"');
} elseif (strpos($filelink,"videofox.net") !==false) {
   //http://videofox.net/s3w9weus4k7y
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'id" value="','"');
   $fname=str_between($h,'fname" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Watch+Video";
   sleep(1);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $id=str_between($h,'id" value="','"');
   $referer=urlencode(str_between($h,'referer" value="','"'));
   $rand=str_between($h,'rand" value="','"');
   $post="op=download2&id=".$id."&rand=".$rand."&referer=".$referer."&method_free=Watch+Video&down_direct=1";
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=unpack_DivXBrowserPlugin(1,$h);
} elseif (strpos($filelink,"moviki.ru") !==false) {
   $cookie="/tmp/moviki.txt";
   //http://www.moviki.ru/embed/113690
   //http://www.moviki.ru/embed/29236/0/0/
   //http://www.moviki.ru/get_file/23/286dfbabc87390da08fedc9d2d50d312/113000/113690/113690.mp4/?br=429
   //http://www.moviki.ru/get_file/23/a0d831058d2dfab37cdddec06289f92b/113000/113690/113690.mp4/?br=429
   //$h=file_get_contents($filelink);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://www.moviki.ru/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
   $l1=str_between($h,"get_file","'");
   $l1="http://www.moviki.ru/get_file".$l1;
   //echo $l1;
   //$cookie1="_ga=GA1.2.769617289.1475247429;PHPSESSID=crj4mi0bnfm0g5ko8l5h2v5un4;_gat=1;";
   //$l1="http://www.moviki.ru/get_file/23/a0d831058d2dfab37cdddec06289f92b/113000/113690/113690.mp4/?br=429";
   $l1="http://www.moviki.ru/get_file/23/286dfbabc87390da08fedc9d2d50d312/113000/113690/113690.mp4/?br=429";
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $l1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, "http://www.moviki.ru/player/kt_player.swf");
   //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   //curl_setopt($ch, CURLOPT_COOKIE,$cookie1);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   $h = curl_exec($ch);
   curl_close($ch);
   //echo $h;
   $t1=explode("Location:",$h);
   $t2=explode("\n",$t1[1]);
   $link=trim($t2[0]);
} elseif (strpos($filelink,"entervideo") !==false) {
   //http://entervideos.com/embed-luex1rbugf7m-590x360.html
   //http://entervideos.com/vidembed-wlsuh0mcoe0d
   //http://entervideo.net/watch/6d3035a1b696769
   //http://entervideo.net/watch/6d3035a1b696769
   //http://185.176.192.22/vids/roswell_season_3-_episode_01___575a23d14b9eb.mp4
   //http://185.176.192.22/vids/roswell_season_3-_episode_01___575a23d14b9eb.mp4
   if (strpos($filelink,"vidembed") !== false) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1=explode("Location:",$h);
   $t2=explode("\n",$t1[1]);
   $link=trim($t2[0]);
   } else {
   $h=file_get_contents($filelink);
   $link=str_between($h,'source src="','"');
   }
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.(srt|vtt)))/', $h, $m);
  $srt=$m[1];

   if ($srt) {
   $l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=".urlencode($srt);
   //echo $l_srt;
   $h2=file_get_contents($l_srt);
   //echo $h;
   }
$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/wget wget -q --no-check-certificate -U "'.$ua.'" --referer="'.$filelink.'" "'.$link.'"  -O -';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/util/m.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/util/m.cgi");
sleep (1);
$link="http://127.0.0.1/cgi-bin/scripts/util/m.cgi?".mt_rand();
} elseif (strpos($filelink,"redfly.us") !==false) {
  $link=$filelink;
} elseif (strpos($filelink,"mooshare.biz") !==false || strpos($filelink,"streamin.to") !==false) {
  require_once("JavaScriptUnpacker.php");
  //http://streamin.to/embed-giepc5gb5yvp-640x360.html
  if (strpos($filelink,"embed") !== false) {
   $id=str_between($filelink,"embed-","-");
   if (!$id) $id=str_between($filelink,"embed-",".");
   //if (preg_match("/streamin/",$filelink))
    $filelink="http://streamin.to/".$id;
  }
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  $h = curl_exec($ch);
  $id=str_between($h,'id" value="','"');
  $fname=str_between($h,'fname" value="','"');
  $hash=str_between($h,'hash" value="','"');
  $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&hash=".$hash."&imhuman=Proceed+to+video";
  //echo $post;
  sleep(10);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ru-ru; GT-I9000 Build/ECLAIR) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17');
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
  //$link=str_between($h,'file: "','"');
  $jsu = new JavaScriptUnpacker();
  $x=$jsu->Unpack($h);
  $link=str_between($x,'file:"','"');
} elseif (strpos($filelink,"allvid.ch") !==false) {
  if (strpos($filelink,"embed") === false) {
   $t1=explode("/",$filelink);
   $id=$t1[3];
   $filelink="http://allvid.ch/embed-".$id.".html";
  }
  //$filelink=str_replace("embed-","",$filelink);
  //$filelink=str_replace(".html","",$filelink);
  //$filelink="http://allvid.ch/z7tguqv0tafy";
  //http://allvid.ch/embed-n9t3sxx691nz.html
  //http://coo5shaine.com/embed-n9t3sxx691nz.html
  //echo $filelink;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $filelink);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   //curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   $h = curl_exec($ch);
   curl_close($ch);
   $l1=str_between($h,'src="','"');
   //echo $h;
   //die();
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $l1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   //curl_setopt($ch, CURLOPT_REFERER, $filelink);
   //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   $h = curl_exec($ch);
   if (strpos($h,"return p}") !== false) {
   require_once("JavaScriptUnpacker.php");
   $jsu = new JavaScriptUnpacker();
   $h1 = $jsu->Unpack($h);
  } else
    $h1=$h;
     preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp4))/', $h1, $m);
  $link=$m[1];
} elseif ($filelink) {
$link=$filelink;
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
}

//////////////////////////////////////////////////////////////////

if (strpos($link,"http") === false && strpos($link,"m.cgi") === false) $link="http:".$link;
print $link;
?>
