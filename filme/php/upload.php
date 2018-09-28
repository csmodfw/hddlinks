#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
if (empty($_GET)) {
    die();
}
//http://uphero.xpresso.eu/srt/open.php?tip=movie&file=1955518368&id=9535&token=xx
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$query=$_GET["tip"];
if($query) {
   $queryArr = explode(',', $query);
   $tip = $queryArr[0];
   $file = $queryArr[1];
   $id= $queryArr[2];
}
if (!$id) die();
$header=array("Content-Type: multipart/form-data");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://uphero.xpresso.eu/srt/up1.php");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
    $post = array(
        "userfile"=>"@/tmp/s.srt",
        "tip"=>"$tip",
        "id"=>"$id"
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result = curl_exec($ch);
curl_close($ch);
print $result;
?>
