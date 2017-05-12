#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
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
if (strpos($img,"http") !== false)
$img="http://127.0.0.1/cgi-bin/scripts/filme/php/r.php?file=".$img;
else
$img="";
$gen="Genre: ".$JSON["Genre"];
$durata="Duration: ".$JSON["Runtime"];
$cast="Cast: ".$JSON["Actors"];
$desc=$JSON["Plot"];
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

