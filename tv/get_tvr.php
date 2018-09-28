<?php
/*
$h=file_get_contents("tv_rom_new.php");
$videos=explode('print_',$h);
unset($videos[0]);
$videos = array_values($videos);
$n=0;
foreach($videos as $video) {
  $t1=explode('"',$video);
  $title=$t1[1];
  $link=$t1[3];
$out1 .="#EXTINF:-1, ".$title."\r\n".$link."\r\n";
}
echo $out1;
*/
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
function fix_t($s) {
  $ret=str_replace("&","#amp",$s);
  $ret=str_replace('"','#double',$ret);
  $ret=str_replace("'","#simple",$ret);
  $ret=str_replace(",","#virgula",$ret);
  return $ret;
}
function unfix_t($s) {
  $ret=str_replace("#amp","&",$s);
  $ret=str_replace("#double",'"',$ret);
  $ret=str_replace("#simple","'",$ret);
  $ret=str_replace("#virgula",",",$ret);
  return $ret;
}
//$out =$out.$key."#separator".$arr[$key]["link"]."#separator".$arr[$key]["year"]."#separator".$arr[$key]["image"]."\r\n";
//  }
$l="C:/EasyPhp/data/localweb/mobile1/data/royales.dat";
$arr=array();
$html=file_get_contents($l);
$videos=explode("<item>",$html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $link=urldecode(str_between($video,"<movie>","</movie>"));
  $title=urldecode(str_between($video,"<title>","</title>"));
  $title=str_replace("/",",",$title);
  $title=urlencode(fix_t($title));
  $t1=explode("<image>",$video);
  $t2=explode("</image>",$t1[1]);
  $image=$t2[0];
  //$image=urldecode(str_between($video,"<image>","<image>"));
  //echo $image;
  $year=str_between($video,"<an>","</an>");
  $id="";
  //echo $image;
    $arr[$title]["link"]=$link;
    $arr[$title]["year"]=$year;
    $arr[$title]["image"]=$image;
}
ksort($arr);
$out="";
foreach($arr as $key => $value) {
$out =$out.$key."#separator".$arr[$key]["link"]."#separator".$arr[$key]["year"]."#separator".$arr[$key]["image"]."\r\n";
}
echo $out;
$l="C:/EasyPhp/data/localweb/mobile1/data/royale_s.dat";
file_put_contents($l,$out);
//print_r ($arr);
?>
