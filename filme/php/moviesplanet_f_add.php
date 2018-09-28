#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
clearstatcache();
if (file_exists("/data"))
  $f= "/data/moviesplanet_f.dat";
else
  $f="/usr/local/etc/moviesplanet_f.dat";
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
   $imdb= $queryArr[3];
}
if ($mod == "add") {
if ($dir <> "") {
$html=file_get_contents($dir);
if (strpos($html,$link) === false) {
if (!$imdb) {
$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.'  -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
$h1=shell_exec($exec);
$t1=explode('class="thumb mvi-cover"',$h1);
$t2=explode('url(',$t1[1]);
$t3=explode(')',$t2[1]);
  if (preg_match("/(tt\d+)\.jpg/",$t3[0],$m))
     $imdb=$m[1];
  else
     $imdb="";
}
$tip="movie";
$key1="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmOGNmMDJlNmIzMGJmOGNjMzNjMDRjNjA2OTU3ODFhYSIsInN1YiI6IjU5MjMzY2ZhOTI1MTQxMDRjYTAwMWVkNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyP2G7iuQ7QhbnsRPbs4idA32IxEWSKqH0r2XBDwLaA";
$key="f8cf02e6b30bf8cc33c04c60695781aa";
$l="http://api.themoviedb.org/3/find/".$imdb."?api_key=".$key."&language=en-US&external_source=imdb_id";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $Data = curl_exec($ch);
  curl_close($ch);
$r = json_decode($Data,1);
$image="http://image.tmdb.org/t/p/w500".$r["movie_results"][0]["poster_path"];
if (strpos($image,"http") === false) $image="";
$id_m=$r["movie_results"][0]["id"];
$l="http://api.themoviedb.org/3/".$tip."/".$id_m."?api_key=".$key;
//$l="https://api.themoviedb.org/3/tv/".$id_m."?api_key=".$key;   //."&append_to_response=videos"
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  $p=json_decode($h,1);
  //print_r ($p);
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
$year=$y;
$id=$imdb;
  $html=$html."<item><movie>".$link."</movie><title>".$title."</title><image>".$image."</image><an>".$year."</an><id>".$id."</id></item>";
}
} else {
$dir = $f;
if (!$imdb) {
$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.'  -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
$h1=shell_exec($exec);
$t1=explode('class="thumb mvi-cover"',$h1);
$t2=explode('url(',$t1[1]);
$t3=explode(')',$t2[1]);
  if (preg_match("/(tt\d+)\.jpg/",$t3[0],$m))
     $imdb=$m[1];
  else
     $imdb="";
}
$tip="movie";
$key1="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmOGNmMDJlNmIzMGJmOGNjMzNjMDRjNjA2OTU3ODFhYSIsInN1YiI6IjU5MjMzY2ZhOTI1MTQxMDRjYTAwMWVkNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyP2G7iuQ7QhbnsRPbs4idA32IxEWSKqH0r2XBDwLaA";
$key="f8cf02e6b30bf8cc33c04c60695781aa";
$l="http://api.themoviedb.org/3/find/".$imdb."?api_key=".$key."&language=en-US&external_source=imdb_id";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $Data = curl_exec($ch);
  curl_close($ch);
$r = json_decode($Data,1);
$image="http://image.tmdb.org/t/p/w500".$r["movie_results"][0]["poster_path"];
if (strpos($image,"http") === false) $image="";
$id_m=$r["movie_results"][0]["id"];
$l="http://api.themoviedb.org/3/".$tip."/".$id_m."?api_key=".$key;
//$l="https://api.themoviedb.org/3/tv/".$id_m."?api_key=".$key;   //."&append_to_response=videos"
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
  $p=json_decode($h,1);
  //print_r ($p);
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
$year=$y;
$id=$imdb;
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

