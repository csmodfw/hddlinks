#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
//error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$id = $_GET["file"];
if (substr($id, 0, 6) != "series" && substr($id, 0, 5) != "movie") {
$noob=file_get_contents("/tmp/n.txt");
///?imdb.com/title/tt2084342"
//http://37.128.191.193/
//$html=file_get_contents("http://37.128.191.200/?".$id);
//$html=file_get_contents($noob."/?".$id);
$cookie="/tmp/noobroom.txt";
$l=$noob."/?".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
$t1=explode("?imdb.com",$html);
$t2=explode('"',$t1[1]);
if ($t2[0])
  $link="http://imdb.com".$t2[0];
else
  $link="http://imdb.com".str_between($html,'http://imdb.com','"');
//$link="http://www.imdb.com/title/tt2061712/";
//http://ia.media-imdb.com/images/M/MV5BMTkzMTUwMDAyMl5BMl5BanBnXkFtZTcwMDIwMTQ1OA@@._V1_SY317_CR1,0,214,317_.jpg
//$link="http://www.imdb.com/title/tt0903624/";
$html=file_get_contents($link);
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$t1=explode('id="img_primary">',$html);
$t2=explode('src="',$t1[1]);
$t3=explode('"',$t2[1]);
$img=$t3[0];
if (!$img) {
$t1=explode('div class="poster">',$html);
$t2=explode('src="',$t1[1]);
$t3=explode('"',$t2[1]);
$img=$t3[0];
}
//$img=str_replace("https","http",$img);
$img="http://127.0.0.1/cgi-bin/scripts/filme/php/r.php?file=".$img;
$t1=explode('class="title_wrapper">',$html);
$t2=explode('>',$t1[1]);
$t3=explode('<',$t2[1]);
$year=str_between($html,'span class="nobr">','</span');
$year=str_replace("(","",$year);
$year=str_replace(")","",$year);
$year=trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$year));
$year="Year: ".$year;
$tit=trim($t3[0]);

$imdb="IMDB: ".trim(str_between($html,'span itemprop="ratingValue">','<'));
$a1=explode('div class="titleBar">',$html);
//$gen1=str_between($html,'div class="titleBar">','</div>');
$gen1=$a1[1];
$t1=explode('itemprop="duration"',$gen1);
$t2=explode('>',$t1[1]);
$t3=explode('<',$t2[1]);
$durata="Duration: ".trim($t3[0]);

//$gen = trim(preg_replace("/<(.*)>|(\{(.*)\})/e","",$gen));
$videos = explode('href="/genre', $gen1);
unset($videos[0]);
$videos = array_values($videos);
$gen="";
foreach($videos as $video) {
  $t1=explode('itemprop="genre">',$video);
  $t2=explode("<",$t1[1]);
  $a=trim($t2[0]);
  if ($a) $gen .=trim($a)." | ";
}
$gen=substr($gen, 0, -2);
$gen = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$gen));
$gen=str_replace("&nbsp;","",$gen);
$gen=str_replace("\n","",$gen);
$gen=str_replace("\t","",$gen);
$gen=str_replace("  ","",$gen);
$gen="Genre: ".$gen;
$videos=explode('itemprop="actor"',$html);
unset($videos[0]);
$videos = array_values($videos);
$cast="";
foreach($videos as $video) {
 $t=explode('itemprop="name">',$video);
 $t1=explode("<",$t[1]);
 $cast=$cast.$t1[0]." | ";
}
$cast="Cast: ".$cast;
$cast=substr($cast, 0, -2);
//$gen="Gen: ".$gen;
//echo $gen;
$desc=trim(str_between($html,'itemprop="description">',"<"));
//$desc = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$desc));
$tit=str_replace("&#x27;","'",$tit);
$tit=str_replace("&nbsp;"," ",$tit);
$tit=str_replace("&raquo;",">>",$tit);
$tit=str_replace("&#xE9;","e",$tit);
$tit=str_replace("&#xCE;","I",$tit);
$tit=str_replace("&#xEE;","i",$tit);
$tit=str_replace("&#xE2;","a",$tit);

$desc=str_replace("&#x27;","'",$desc);
$desc=str_replace("&nbsp;"," ",$desc);
$desc=str_replace("&raquo;",">>",$desc);
$desc=str_replace("&#xE9;","e",$desc);
$desc=str_replace("&#xCE;","I",$desc);
$desc=str_replace("&#xEE;","i",$desc);
$desc=str_replace("&#xE2;","a",$desc);
$desc = trim(preg_replace("/<(.*)>|(\{(.*)\})/e","",$desc));
} else {
//http://www.omdbapi.com/?t=Rizzoli+%26+Isles&plot=full
$tit=urldecode($id);
$t1=explode("- Season",$tit);
$tit=trim($t1[0]);
if (substr($id, 0, 6) == "series") {
  $tip="tv";
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
$key="f8cf02e6b30bf8cc33c04c60695781aa";
$key1="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmOGNmMDJlNmIzMGJmOGNjMzNjMDRjNjA2OTU3ODFhYSIsInN1YiI6IjU5MjMzY2ZhOTI1MTQxMDRjYTAwMWVkNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyP2G7iuQ7QhbnsRPbs4idA32IxEWSKqH0r2XBDwLaA";
$IMDB_API_URL = "http://www.omdbapi.com/?t=".urlencode($tit3)."&y=".$year."&type=".$tip."&plot=full";
$api_url="https://api.themoviedb.org/3/search/".$tip."?api_key=".$key."&query=".urlencode($tit3);
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
$d=$p["runtime"];
if (!$d) $d=$p["episode_run_time"][0];
$durata="Duration: ".$d. "min";
$cast="";
$l="http://api.themoviedb.org/3/".$tip."/".$id_m."/credits?api_key=".$key;
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

