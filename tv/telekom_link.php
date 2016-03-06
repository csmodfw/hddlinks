<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$link = urldecode($_GET["file"]);
    $t1=explode("id=",$link);
	$id=trim($t1[1]);
$title = urldecode($_GET["title"]);
    $title1=strtolower($title);
    $t1=explode("(",$title1);
    $title1=trim($t1[0]);
    $title1=str_replace(" ","-",$title1);

$list = glob("/tmp/www/"."*.m3u8");
   foreach ($list as $l) {
    str_replace(" ","%20",$l);
    unlink($l);
}

$out=file_get_contents($link);
//echo $out;
  $movie_file="/tmp/www/".$id.".m3u8";
   $fh = fopen($movie_file, 'w');
   fwrite($fh, $out, strlen($out));
   fclose($fh);

  $movie_file="/tmp/play.id.dat";
  
   $fh = fopen($movie_file, 'w');
   fwrite($fh, $id, strlen($id));
   fclose($fh);
   
?>
