#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $tip = $queryArr[0];
   $file = urldecode($queryArr[1]);
}
if ($tip=="zip") {
//$file="Star Trek Voyager [1x03] - Parallax.srt";
$file=str_replace("[","\[",$file);
$file=str_replace("]","\]",$file);
$exec='unzip -p /tmp/s.zip "'.$file.'">/tmp/s.srt';
//echo $exec;
$html=shell_exec($exec);
} else if ($tip=="rar") {
  $exec='e -or /tmp/s.rar "'.$file.'" /tmp';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/unrar ".$exec;
  $h=shell_exec($exec);
  if (strpos($file,"/") !== false)
    $dir = substr(strrchr($file, "/"), 1);
  else
    $dir=$file;
$exec='mv "/tmp/'.$dir.'" /tmp/s.srt';
  $h=shell_exec($exec);
  //echo $h;
}
//echo $html;
//echo file_get_contents("/tmp/s.srt");
//die();
$l_srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=/tmp/s.srt";
   //echo $l_srt;
$h=file_get_contents($l_srt);
?>
