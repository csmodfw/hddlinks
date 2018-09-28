#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
clearstatcache();
if (file_exists("/data"))
  $f= "/data/royales.dat";
else
  $f="/usr/local/etc/royales.dat";
if (file_exists($f)) {
   $dir = $f;
} else {
     $dir = "";
}
$query = $_GET["mod"];
if($query) {
   $queryArr = explode(',', $query);
   $mod = $queryArr[0];
   $link = $queryArr[1];
   $title = $queryArr[2];
   $image= $queryArr[3];
   $year=$queryArr[4];
   $id="";
}
if ($mod == "add") {
if ($dir <> "") {
$html=file_get_contents($dir);
if (strpos($html,$link) === false)
  $html=$html."<item><movie>".$link."</movie><title>".$title."</title><image>".$image."</image><an>".$year."</an><id>".$id."</id></item>";
} else {
$dir = $f;
$html="<item><movie>".$link."</movie><title>".$title."</title><image>".$image."</image><an>".$year."</an><id>".$id."</id></item>";
}
$exec = "rm -f ".$f;
file_put_contents($dir,$html);
} else if ($mod="del") {
if ($dir <> "") {
$html=file_get_contents($f);
$out="";
$videos=explode("<item>",$html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $l=str_between($video,"<movie>","</movie>");
  $t=str_between($video,"<title>","</title>");
  $a1=explode("<image>",$video);
  $a2=explode("<",$a1[1]);
  $i=$a2[0];
  //$i=str_between($video,"<image>","</image>");
  $a=str_between($video,"<an>","</an>");
  $b=str_between($video,"<id>","</id>");
  if ($l <> $link) {
    $out=$out."<item><movie>".$l."</movie><title>".$t."</title><image>".$i."</image><an>".$a."</an><id>".$b."</id></item>";
  }
}
}
if ($out <> "") {
$exec = "rm -f ".$f;
file_put_contents($f,$out);
} else {
$exec = "rm -f ".$f;
}
}

