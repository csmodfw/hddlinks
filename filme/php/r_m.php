#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$file = $_GET["file"];
//page=1,release,".urlencode($link).",".urlencode($title);

if ($file=="") {
print "image/movies.png";
} else if (strpos($file,"http") === false) {
print $file;
} else {
$cookie="/tmp/moviesplanet.txt";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.'  -U "'.$ua.'" --referer="'.$file.'" --no-check-certificate "'.$file.'" -O -';
$exec = $exec_path.$exec;
$h1=shell_exec($exec);
echo $h1;
}
?>
