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
   $link = urldecode($queryArr[0]);
   $tit = urldecode($queryArr[1]);
   $tit=str_replace("/",",",$tit);
   $tit=str_replace("\'","'",$tit);
}
$cookie="/tmp/moviesplanet.txt";
//$l="http://www.moviesplanet.is/movies/date/1";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://www.moviesplanet.is/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  $h1 = curl_exec($ch);
  curl_close($ch);
$t1=explode('div class="thumb mvic-thumb',$h1);
$html=$t1[1];
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$t1=explode('timthumb.php?src=',$html);
$t2=explode('&',$t1[1]);
$img=$t2[0];
$t1=explode('Released',$h1);
$t3=explode('</strong>',$t1[1]);
$t4=explode('<',$t3[1]);
$year="Year: ".trim($t4[0]);

$a1=explode("IMDb:</strong>",$h1);
$a2=explode('<',$a1[1]);
$imdb="IMDB: ".trim($a2[0]);
$imdb=str_replace('"',"",$imdb);

$gen=trim(str_between($h1,'Categories:','</p'));
$gen=str_replace("</a>",',',$gen);
$t1=explode('Run time:',$h1);
$t3=explode('a>',$t1[1]);
$t4=explode("<",$t3[1]);
$durata="Duration: ".trim($t4[0]);

$gen = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$gen));
$gen=str_replace("&nbsp;","",$gen);
$gen=str_replace("\n","",$gen);
$gen=str_replace("\t","",$gen);
$gen=str_replace("  ","",$gen);
$gen="Genre: ".$gen;

$cast=str_between($h1,'Stars:','<p');
$cast = "Cast: ".trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$cast));
$cast=str_replace("&nbsp;","",$cast);
$cast=str_replace("\n","",$cast);
$cast=str_replace("\t","",$cast);
$cast=str_replace("  ","",$cast);
$a1=explode('<abbr>',$h1);
$a2=explode("</abbr>",$a1[1]);
//$a3=explode("<",$a2[1]);
$desc=trim($a2[0]);
$desc = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$desc));
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

