#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$query = $_GET["file"];
//page=1,release,".urlencode($link).",".urlencode($title);
if($query) {
   $queryArr = explode(',', $query);
   $file = $queryArr[0];
   $clearanceCookie=$queryArr[1];
}
//$file=$_GET["file"];
$file=str_replace("https","http",$file);
//$clearanceCookie=$_GET["res"];
if ($file=="") {
print "image/movies.png";
} else if (strpos($file,"http") === false) {
print $file;
} else {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_REFERER, $file);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'proxyFactory');
curl_setopt($ch, CURLOPT_COOKIE, $clearanceCookie);
$h=curl_exec($ch);
$rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch) ;
echo $h;
}
?>
