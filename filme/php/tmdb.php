#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $tip=$queryArr[0];
   $tit = $queryArr[1];
   $year = $queryArr[2];
}

$tit=urldecode($tit);

$tit=str_replace("\\","",$tit);
$tit=str_replace("^",",",$tit);
//$tit = str_replace("series","",$tit);
$tit = str_replace("&amp;","&",$tit);
//$tit = str_replace("&","%26",$tit);
$t1=explode("(",$tit);
$tit3=trim($t1[0]);

$key="f8cf02e6b30bf8cc33c04c60695781aa";
$key1="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmOGNmMDJlNmIzMGJmOGNjMzNjMDRjNjA2OTU3ODFhYSIsInN1YiI6IjU5MjMzY2ZhOTI1MTQxMDRjYTAwMWVkNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyP2G7iuQ7QhbnsRPbs4idA32IxEWSKqH0r2XBDwLaA";
$IMDB_API_URL = "http://www.omdbapi.com/?t=".urlencode($tit3)."&y=".$year."&type=".$tip."&plot=full";
$api_url="https://api.themoviedb.org/3/search/".$tip."?api_key=".$key."&query=".urlencode($tit3)."&year=".$year;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
$r=json_decode($h,1);
//print_r ($r);
if ($r["results"][0]["id"]) {
//$img="https://api.themoviedb.org".$r["results"][0]["poster_path"];
$img="http://image.tmdb.org/t/p/w500".$r["results"][0]["poster_path"];
if (strpos($img,"http") === false) $img="";

$desc=$r["results"][0]["overview"];
$imdb="TMDB: ".$r["results"][0]["vote_average"];
$tit=$r["results"][0]["title"];
if (!$tit) $tit=$r["results"][0]["name"];
$id_m=$r["results"][0]["id"];
$l="https://api.themoviedb.org/3/".$tip."/".$id_m."?api_key=".$key;
//$l="https://api.themoviedb.org/3/tv/".$id_m."?api_key=".$key;   //."&append_to_response=videos"
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  $p=json_decode($h,1);
//print_r ($JSON);

//$imdb1=json_decode($JSON["Ratings"][0],1);
//$imdb=$imdb1["Value"];
$y= $p["release_date"];
if ($y) $y=substr($y, 0, 4);  //2007-06-22
if (!$y) {
$y=$p["first_air_date"]." - ".$p["last_air_date"];
$y1 = substr($p["first_air_date"],0,4);
$y2 = substr($p["last_air_date"],0,4);
$y=$y1;
}
$year="Year: ".$y;
$c=count($p["genres"]);
$g="";
for ($k=0;$k<$c;$k++) {
 $g .=$p["genres"][$k]["name"].",";
}
$gen="Genre: ".$g;
$gen=substr($gen, 0, -1);
$d=$p["runtime"];
if (!$d) $d=$p["episode_run_time"][0];
$durata="Duration: ".$d. "min";
$cast="";
$l="https://api.themoviedb.org/3/".$tip."/".$id_m."/credits?api_key=".$key;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
$r=json_decode($h,1);
//print_r ($r);
$c=count($r["cast"]);
$cast="Cast: ";
for ($k=0;$k<$c;$k++) {
 $cast .=$r["cast"][$k]["name"].",";
}
$cast = substr($cast, 0, -1);
$ttxml="";
} else {
$iit = $tit3;
}
$ttxml .=$tit."\n"; //title
$ttxml .= $year."\n";     //an
$ttxml .=$img."\n"; //image
$ttxml .=$gen."\n"; //gen
$ttxml .=$durata."\n"; //regie
$ttxml .=$imdb."\n"; //imdb
$ttxml .=$cast."\n"; //actori
$ttxml .=$desc."\n"; //descriere
echo $ttxml;
$new_file = "/tmp/movie.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

