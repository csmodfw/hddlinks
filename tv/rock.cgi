#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -q -v -b 60000 -l 2 -T 6c69766568642e747620657374652063656c206d616920746172652121 -q -v -r "rtmp://91.201.78.3:1935/vod" -a "vod" -y "mp4:Blue System.mp4"