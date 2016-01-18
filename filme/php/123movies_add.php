#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
clearstatcache();
if (file_exists("/data"))
  $f= "/data/123movies.dat";
else
  $f="/usr/local/etc/123movies.dat";
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
}
if ($mod == "add") {
if ($dir <> "") {
$html=file_get_contents($dir);
if (strpos($html,$link) === false)
  $html=$html."<item><movie>".$link."</movie><title>".$title."</title><image>".$image."</image></item>";
} else {
$dir = $f;
$html="<item><movie>".$link."</movie><title>".$title."</title><image>".$image."</image></item>";
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
  $i=str_between($video,"<image>","</image>");
  if ($l <> $link) {
    $out=$out."<item><movie>".$l."</movie><title>".$t."</title><image>".$i."</image></item>";
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

