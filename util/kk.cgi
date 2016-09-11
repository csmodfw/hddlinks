#!/bin/sh
while true;
do
/usr/local/etc/www/cgi-bin/scripts/wget -q -O -  "http://127.0.0.1/cgi-bin/scripts/tv/telekom_m3u8.php?id=&title="
sleep 6
done
