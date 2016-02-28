<?php
function dec_openload($in) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $in);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h1 = curl_exec($ch);
      curl_close($ch);
      $h=str_between($h1,"<video","</script");


    $s = str_replace("((ﾟｰﾟ) + (ﾟｰﾟ) + (ﾟΘﾟ))", "9",$h);
    $s = str_replace("((ﾟｰﾟ) + (ﾟｰﾟ))", "8",$s);
    $s = str_replace("((ﾟｰﾟ) + (o^_^o))", "7",$s);
    $s = str_replace("((o^_^o) +(o^_^o))", "6",$s);
    $s = str_replace("((ﾟｰﾟ) + (ﾟΘﾟ))", "5",$s);
    $s = str_replace("(ﾟｰﾟ)", "4",$s);
    $s = str_replace("((o^_^o) - (ﾟΘﾟ))", "2",$s);
    $s = str_replace("(o^_^o)", "3",$s);
    $s = str_replace("(ﾟΘﾟ)", "1",$s);
    $s = str_replace("(+!+[])", "1",$s);
    $s = str_replace("(c^_^o)", "0",$s);
    $s = str_replace("(0+0)", "0",$s);
    $s = str_replace("(ﾟДﾟ)[ﾟεﾟ]", "\\",$s);
    $s = str_replace("(3 +3 +0)", "6",$s);
    $s = str_replace("(3 - 1 +0)", "2",$s);
    $s = str_replace("(!+[]+!+[])", "2",$s);
    $s = str_replace("(-~-~2)", "4",$s);
    $s = str_replace("(-~-~1)", "3",$s);


    $s=str_replace("+","",$s);
    $s=str_replace(" ","",$s);
    $s=str_replace("\\/","/",$s);
    //echo $s;
preg_match_all("/(\d{2,3})/",$s,$m);
//print_r ($m[0]);
$n=count($m[0]);

$out="";
for ($k=0; $k<$n; $k++) {
$out=$out.chr(intval($m[0][$k],8));
}
//echo $out;
$link1=str_between($out,"vr='","'");
$link1=str_replace("https","http",$link1);
return $link1;
}