#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
//$html = file_get_contents($link);
$cookie="/tmp/spank.dat";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:65.0) Gecko/20100101 Firefox/65.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --content-on-error -U "'.$ua.'" --load-cookies  '.$cookie.' --save-cookies '.$cookie.' --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
  $t1=explode("video_id = '",$html);
  $t2=explode("'",$t1[1]);
  $id=$t2[0];
  $c=file_get_contents($cookie);
  $t1=explode('sb_csrf_session',$c);
  $t2=explode('#',$t1[1]);
  $csrf=trim($t2[0]);
$l="https://pl.spankbang.com/api/videos/stream";
$post="id=".$id."&data=0&sb_csrf_session=".$csrf;
  $exec = '--content-on-error --header="X-CSRFToken: "'.$csrf.' --header="X-Requested-With: XMLHttpRequest" --header="Content-Type: application/x-www-form-urlencoded" --load-cookies  '.$cookie.' --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $x=shell_exec($exec);
//$t3=explode("'",$t2[2]);
  $r=json_decode($x,1);
  //print_r($r);
  //die();
  if (isset($r["stream_url_1080p"]) && $r["stream_url_1080p"] !="")
    $out=$r["stream_url_1080p"];
  elseif (isset($r["stream_url_720p"]) && $r["stream_url_720p"] !="")
    $out=$r["stream_url_720p"];
  elseif (isset($r["stream_url_480p"]) && $r["stream_url_480p"] !="")
    $out=$r["stream_url_480p"];
  elseif (isset($r["stream_url_360p"]) && $r["stream_url_360p"] !="")
    $out=$r["stream_url_360p"];
  elseif (isset($r["stream_url_240p"]) && $r["stream_url_240p"] !="")
    $out=$r["stream_url_240p"];
  else
    $out="";

//if (strpos($out,"http") === false) $out="http:".$out;
if (strpos($out,"http") === false) $out="https:".$out;
$out=str_replace("&amp;","&",$out);
$out=str_replace("https","http",$out);
print $out;
?>
