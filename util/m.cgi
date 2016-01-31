#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r5---sn-4g57knzk.googlevideo.com/videoplayback?id=792aab9bee5840c7&itag=22&source=webdrive&begin=0&requiressl=yes&mm=30&mn=sn-4g57knzk&ms=nxu&mv=u&nh=IgpwcjAyLmZyYTAzKgkxMjcuMC4wLjE&pl=19&mime=video/mp4&lmt=1453061785163943&mt=1453970405&ip=82.210.178.129&ipbits=8&expire=1453999950&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,nh,pl,mime,lmt&signature=63C3698A6669D2836D09D322DEA44D269F367BB7.A4BA6DCCC65E7EC4845A5CE3A7B88E29B829952D&key=ck2"