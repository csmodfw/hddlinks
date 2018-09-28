#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$server = $_GET["serv"];
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
file_put_contents($f,$server);
$cookie="/tmp/royale.txt";
exec ("rm -f /tmp/royale.txt");
?>
