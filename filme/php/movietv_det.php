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
   $link = $queryArr[0];
   $tit = urldecode($queryArr[1]);
   $tit=str_replace("/",",",$tit);
}
$cookie="/tmp/movietv.txt";

$link="http://movietv.to".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h1 = curl_exec($ch);
  curl_close($ch);
$t1=explode('section id="content">',$h1);
$html=$t1[1];
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$t1=explode('src="',$html);
$t2=explode('"',$t1[1]);
$img=$t2[0];
$t1=explode('icon-calendar"></i>',$html);
$t3=explode('<',$t1[1]);
$year="Year: ".$t3[0];


$imdb="IMDB: ".trim(str_between($html,'icon-star"></i>','<'));
$gen=str_between($html,'class="icon-mask"></i>','<');
$t1=explode('"icon-clock"></i>',$html);
$t3=explode('<',$t1[1]);
$durata="Duration: ".trim($t3[0]);

$gen = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$gen));
$gen=str_replace("&nbsp;","",$gen);
$gen=str_replace("\n","",$gen);
$gen=str_replace("\t","",$gen);
$gen=str_replace("  ","",$gen);
$gen="Genre: ".$gen;

$cast="";

$desc=trim(str_between($html,'movie-description">',"<"));
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

