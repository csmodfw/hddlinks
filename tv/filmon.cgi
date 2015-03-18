#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -p "http://www.filmon.com" -W "http://www.filmon.com/tv/modules/FilmOnTV/files/flashapp/filmon/FilmonPlayer.swf" -r "rtmp://live304.edge.filmon.com/live/" -a "live/?id=0ad5aac39bb13fbe85e2e6bd9f392619e83ef0d85b5830d93ecf25130680a97bc530e686d158cf4d362d9f148356beed2a40126497741c7a04b08a1ab1038639f6fdb47680ebdf0a307f59be91f99baef4da38138a1bc12128e026fad6d186c97b59175da3a50aad3d01394822098aed36efb6f8a8a255fb4609f0f3eaf69e4a446d296cdf496ab77be9047618fa3295d1a8f1378ba4a45c" -y "65.low.stream"