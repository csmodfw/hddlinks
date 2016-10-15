#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$file=$_GET["file"];
if ($file=="") {
print "image/movies.png";
} else if (strpos($file,"http") === false) {
print $file;
} else {
$link = curl_init();
curl_setopt($link, CURLOPT_URL, $file);
curl_setopt($link, CURLOPT_REFERER, $file);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
$h=curl_exec($link);
curl_close($link);
if (strlen($h) > 5) {
$link = curl_init();
curl_setopt($link, CURLOPT_URL, $file);
curl_setopt($link, CURLOPT_REFERER, $file);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
curl_exec($link);
curl_close($link);
} else {
$file="http://127.0.0.1/cgi-bin/scripts/filme/image/nocover.jpg";
$file="https://upload.wikimedia.org/wikipedia/commons/b/b9/No_Cover.jpg";
$link = curl_init();
curl_setopt($link, CURLOPT_URL, $file);
curl_setopt($link, CURLOPT_REFERER, $file);
curl_setopt($link, CURLOPT_HEADER, false);
curl_setopt($link, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
curl_exec($link);
curl_close($link);
}
}
?>
