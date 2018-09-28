#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$file=urldecode($_GET["file"]);
if ($file=="") {
print "image/movies.png";
} else if (strpos($file,"https") === false) {
print $file;
} else {
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$ua="proxyFactory";
$cookie="/tmp/cloud.dat";
//$x=file_get_contents($cookie);
//echo $x;
      $exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'" --referer="'.$file.'" --no-check-certificate "'.$file.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      //echo $exec;
      $h=shell_exec($exec);
      //echo $h;
if (strlen($h) < 5) {
$file="http://127.0.0.1/cgi-bin/scripts/filme/image/nocover.jpg";
$file="https://upload.wikimedia.org/wikipedia/commons/b/b9/No_Cover.jpg";
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$file.'" --no-check-certificate "'.$file.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
}
echo $h;
}
?>
