#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://s2.digisport.ro/onedb/transcode:50ba5cb995f9cfd70500009f.mp4?start=0
//http://s2.digisport.ro/onedb/transcode:50bc81cc95f9cfa833000003.mp4?start=0
//http://s2.digisport.ro//onedb:transcode/51102c2495f9cf1f5d000000.mp4
//http://s2.digisport.ro//onedb:transcode/5110389695f9cfaf19000000.mp4
//http://s2.digisport.ro//onedb/picture:5110cfd995f9cf7136000001
//http://s2.digisport.ro//onedb/transcode/5110cfd995f9cf7136000001.mp4
//http://s1.digisport.ro//onedb/transcode/513d188695f9cf8e18000000.240p.mp4
//http://s2.digisport.ro//onedb/transcode/513d188695f9cf8e18000000.240p.mp4
//http://s2.digisport.ro//onedb/513cc5ec95f9cfdb64000000.360p.mp4
//data-versions="240p.mp4,360p.mp4,480p.mp4,720p.mp4,android.mp4,blackberry.mp4,iphone.mp4,mp4,ogv,webm"
//data-src="
$cookie="D://cookie.txt";
$cookie="/tmp/cookie.txt";
$id = $_GET["file"];
$id=str_replace(" ","+",$id);
$l=urldecode($id);
      $ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
$x=str_between($html,'<script type="text/template">','</script');
//echo $x;
$r=json_decode($x,1);
//print_r ($r);
//die();
//https://v3.iw.ro/video/v/ZmlsZVNvdXJjZT1odHRwJTNBJTJGJTJG/c3RvcmFnZTAxdHJhbnNjb2Rlci5yY3Mt/cmRzLnJvJTJGc3RvcmFnZSUyRjIwMTcl/MkYxMiUyRjE4JTJGODU3MjgyXzg1NzI4/Ml9TSVRFX3BvbGlfZG5tX3JlenVtYXRf/MTgxMjE3X2lvbDMubXA0JmZyPTEmaGFz/aD1kYmNmYzAwMzc0NDAwM2ZhZGYyMzE2ZjczY2EzNjE4ZA==.mp4

$out=$r["new-info"]["meta"]["source"];
$out=str_replace("https","http",$out);
print $out;
?>
