#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r1---sn-4g57kn6s.googlevideo.com/videoplayback?id=f1a96fc3600b8468&itag=22&source=webdrive&begin=0&requiressl=yes&mm=30&mn=sn-4g57kn6s&ms=nxu&mv=u&nh=IgpwcjAxLmZyYTAzKgkxMjcuMC4wLjE&pl=23&mime=video/mp4&lmt=1452759466835943&mt=1452957127&ip=82.210.178.129&ipbits=8&expire=1452986884&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,nh,pl,mime,lmt&signature=AB48A4627F24B11E7302AE52F396FB33F48AC665.86EF147AF698B66144A3EC1F0C5827969DE1DE80&key=ck2"