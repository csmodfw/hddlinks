#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["file"];
$queryArr = explode(',', $query);
$id=$queryArr[0];
$imdb="tt".$queryArr[1];
$tip=$queryArr[2];
if ($tip=="series")
  $img="http://img.superchillin.org/2img/sh".$id.".jpg";
else
  $img="http://superchillin.com/2img/".$id.".jpg";
$l="http://www.omdbapi.com/?apikey=3088e9b6&&plot=full&i=".$imdb;
$Data = file_get_contents($l);
$r = json_decode($Data,1);
//print_r ($r);
$tit=$r["Title"];
$year="Year: ".$r["Year"];
$gen="Genre: ".$r["Genre"];
$durata="Runtime: ".$r["Runtime"];
$imdb1="IMDB: ".$r["imdbRating"];
$cast="Cast: ".$r["Actors"];
$desc=$r["Plot"];
$ttxml .=$tit."\n"; //title
$ttxml .= $year."\n";     //an
$ttxml .=$img."\n"; //image
$ttxml .=$gen."\n"; //gen
$ttxml .=$durata."\n"; //regie
$ttxml .=$imdb1."\n"; //imdb
$ttxml .=$cast."\n"; //actori
$ttxml .=$desc."\n"; //descriere
echo $ttxml;
$new_file = "/tmp/movie.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

