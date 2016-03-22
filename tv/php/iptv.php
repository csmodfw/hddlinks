#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$file = $_GET["file"];


$exec='/tmp/www/cgi-bin/scripts/util/iptv.sh c='.$file.' k=yes > /dev/null 2>/dev/null';
exec($exec);

$exec='/tmp/www/cgi-bin/scripts/util/iptv.sh c='.$file.' > /dev/null 2>/dev/null &';
exec($exec);

?>
