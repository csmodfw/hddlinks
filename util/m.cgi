#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r1---sn-ab5l6ner.googlevideo.com/videoplayback?id=9d4de15c2281ca5b&itag=22&source=webdrive&begin=0&requiressl=yes&mm=30&mn=sn-ab5l6ner&ms=nxu&mv=u&nh=IgpwcjAyLmxnYTA3Kg4yMTMuMjQ4Ljc4LjI0OQ&pl=23&mime=video/mp4&lmt=1458363018453734&mt=1458546416&ip=82.210.178.129&ipbits=8&expire=1458575645&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,nh,pl,mime,lmt&signature=2AE547A6AEE37B47410DDBABD3438D09E5330573.51E5EE3A4A6233E441DEF6C91CF7A575196D9949&key=ck2"