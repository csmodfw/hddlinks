#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump  -v -x 15348 -w 2324d94075f150cad1ea0e09b5513924e7cc8b382656a1e38109e41237eb4373 -p http://voyo.ro -W http://voyo.ro/static/shared/app/flowplayer/13-flowplayer.cluster-3.2.1-01-004.swf -r rtmp://185.133.64.234/voyoro_ios_live5/_definst_/voyoro_ios_live5-3.stream?eyJtZWQiOjYwNjIyNTAyLCJsaWMiOiI1N2VjMDBlN2Q0MjI2ZTI2NjdjZGE3MzMxNTM0NzVkZiIsInByb2QiOjMxOTcsImRldiI6IjY1NzdiMmViOTk2ZjJhNjE1YmY2OGM0MGM2MjBkODYyIiwiYWlkIjoiIn0=