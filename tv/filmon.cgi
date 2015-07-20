#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -p "http://www.filmon.com" -W "http://www.filmon.com/tv/modules/FilmOnTV/files/flashapp/filmon/FilmonPlayer.swf" -r "http://live303.edge.filmon.com/live/" -a "live/22.low.stream/playlist.m3u8?id=0ad5aac39bb13fbe5bd7244d49eee7ac911466a0b7f0c20f9383566afcfc8ee2edf5a236929e14668d0896e1b1de6402d90b8ac4bd18ae9f120e4cb2410446199bcd3253bdc0fe62b75cc64f903c384f6d3bb73bd7c2a7232fd353354f1910ef5a68bf4fae33ef15b9de22b8b683df7c2be99798cf15281cafa95987f370e431e72e2dfea720933e16f26a4fb04e61356919958592bf0c16" -y "SD"