#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r1---sn-4g5e6n7d.googlevideo.com/videoplayback?id=af8c7e364c428658&itag=22&source=webdrive&begin=0&requiressl=yes&mm=30&mn=sn-4g5e6n7d&ms=nxu&mv=u&nh=IgpwcjAzLmZyYTE1KgkxMjcuMC4wLjE&pl=23&mime=video/mp4&lmt=1454764126184101&mt=1454832286&ip=82.210.178.129&ipbits=8&expire=1454861739&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,nh,pl,mime,lmt&signature=12B3A1A8D8CD707731FC64C9E83F37C8A07368B2.B5D5EA50C9A8D3EC95A2EAE458E3A12725781355&key=ck2"