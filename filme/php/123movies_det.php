#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $id = $queryArr[0];
   $img = urldecode($queryArr[1]);
   $img=str_replace("*",",",$img);
   $tit = urldecode($queryArr[2]);
   $tit=str_replace("/",",",$tit);
}
$link="http://123movies.to/movie/loadinfo/".$id;
$html=file_get_contents($link);
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$t1=explode('class="jt-info">',$html);
$t3=explode('<',$t1[1]);
$year="Year: ".$t3[0];


$imdb=trim(str_between($html,'jt-imdb">','<'));
$gen1=str_between($html,'Genre:','</div>');
$t1=explode('class="jt-info">',$html);
$t3=explode('<',$t1[2]);
$durata="Duration: ".trim($t3[0]);

//$gen = trim(preg_replace("/<(.*)>|(\{(.*)\})/e","",$gen));
$videos = explode('title="', $gen1);
unset($videos[0]);
$videos = array_values($videos);
$gen="";
foreach($videos as $video) {
  $t2=explode('"',$video);
  $gen .=trim($t2[0])." | ";
}
$gen = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$gen));
$gen=str_replace("&nbsp;","",$gen);
$gen=str_replace("\n","",$gen);
$gen=str_replace("\t","",$gen);
$gen=str_replace("  ","",$gen);
$gen="Genre: ".$gen;
$gen=substr($gen, 0, -2);
$actor=str_between($html,'Actor:','</div>');
$videos=explode('title="',$actor);
unset($videos[0]);
$videos = array_values($videos);
$cast="";
foreach($videos as $video) {
 $t1=explode('"',$video);
 $cast=$cast.$t1[0]." | ";
}
$cast="Cast: ".$cast;
$cast=substr($cast, 0, -2);
//$gen="Gen: ".$gen;
//echo $gen;
$desc=trim(str_between($html,'class="f-desc">',"</p>"));
$desc = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$desc));
$ttxml .=$tit."\n"; //title
$ttxml .= $year."\n";     //an
$ttxml .=$img."\n"; //image
$ttxml .=$gen."\n"; //gen
$ttxml .=$durata."\n"; //regie
$ttxml .=$imdb."\n"; //imdb
$ttxml .=$cast."\n"; //actori
$ttxml .=$desc."\n"; //descriere
//echo $ttxml;
$new_file = "/tmp/movie.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

