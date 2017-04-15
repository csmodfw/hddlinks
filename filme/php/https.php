#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$id = $_GET["file"];
//http://www.omdbapi.com/?t=Rizzoli+%26+Isles&plot=full
$tit=urldecode($id);
if (substr($id, 0, 6) == "series") {
  $tip="series";
  $tit = str_replace("series","",$tit);
} else {
  $tip="movie";
  $tit = str_replace("movie","",$tit);
}
$tit=str_replace("\\","",$tit);
$tit=str_replace("^",",",$tit);
//$tit = str_replace("series","",$tit);
$tit = str_replace("&amp;","&",$tit);
//$tit = str_replace("&","%26",$tit);
$t1=explode("(",$tit);
$tit3=trim($t1[0]);

$year="";
$IMDB_API_URL = "http://www.omdbapi.com/?t=".urlencode($tit3)."&y=".$year."&type=".$tip."&plot=full";
$Data = file_get_contents($IMDB_API_URL);
//echo $Data;
if (strpos($Data,"imdbID") !== false) {
$JSON = json_decode($Data,1);
//print_r ($JSON);
$imdb="IMDB: ".$JSON["imdbRating"];
//$imdb1=json_decode($JSON["Ratings"][0],1);
//$imdb=$imdb1["Value"];
$tit=$JSON["Title"];
$year="Year: ".$JSON["Year"];
$img=$JSON["Poster"];
if (strpos($img,"http") === false) $img="https://upload.wikimedia.org/wikipedia/commons/b/b9/No_Cover.jpg";
$gen="Genre: ".$JSON["Genre"];
$durata="Duration: ".$JSON["Runtime"];
$cast="Cast: ".$JSON["Actors"];
$desc=$JSON["Plot"];
$ttxml="";
} else {
$iit = $tit3;
$img="https://upload.wikimedia.org/wikipedia/commons/b/b9/No_Cover.jpg";
}
$file=$img;

if ($file=="") {
print "image/movies.png";
} else if (strpos($file,"https") === false) {
print $file;
} else {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_REFERER, $file);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$h=curl_exec($ch);
$rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch) ;
echo $h;
}
?>

