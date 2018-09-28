#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
set_time_limit(30);
$l="http://ro-cj01a-speedtestnet01.upcnet.ro/speedtest/random4000x4000.jpg?x=1218484778-8";
$exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget -U 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0' --no-check-certificate ".$l." -O /dev/null 2>&1 ";
$h2=shell_exec($exec);
$t1=explode("\n",$h2);
//print_r ($t1);
$v = $t1[count($t1) - 3];
echo $v;
?>
