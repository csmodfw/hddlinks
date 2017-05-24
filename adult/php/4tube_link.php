#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id= $_GET["file"];
//$id="437863";
$ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
//http://tkn.4tube.com/801028665/desktop/1080+720+480+360+240
$l="https://www.4tube.com/videos/".$id."/ceva";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "https://www.4tube.com/");
      //curl_setopt ($ch, CURLOPT_POST, 1);
      //curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
      $h = curl_exec($ch);
      curl_close($ch);
      //echo $h;
      $t0=explode('button id="download',$h);
      $t1=explode('data-id="',$t0[1]);
      $t2=explode('"',$t1[1]);
      $id=$t2[0];
      $t1=explode('data-quality="',$h);
      $t2=explode('"',$t1[count($t1)-1]);
      $q=$t2[0];
      //echo $id;
if ($id) {
$filelink="https://tkn.4tube.com/".$id."/desktop/1080+720+480+360+240";
$filelink="https://tkn.kodicdn.com/".$id."/desktop/1080+720+480+360+240";

$head=array('Accept: application/json, text/javascript, */*; q=0.01','Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2','Origin: http://www.4tube.com');
//POST /801039571/desktop/1080+720+480+360+240 HTTP/1.1
$post="/".$id."/desktop/1080+720+480+360+240";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $filelink);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_REFERER, "http://www.4tube.com/");
      curl_setopt ($ch, CURLOPT_POST, 1);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
      $h = curl_exec($ch);
      curl_close($ch);
$r=json_decode($h,1);
//echo $h;
//print_r ($r);
//$c=count ($r);
$out=$r[$q]["token"];
//if (!$out) $out=$r["480"]["token"];
//if (!$out) $out=$r["360"]["token"];
$out=str_replace("https","http",$out);
print $out;
}
?>
