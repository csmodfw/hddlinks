#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r13---sn-4g57knll.googlevideo.com/videoplayback?key=yt6&mn=sn-4g57knll&mm=31&ms=au&mv=m&pl=20&mt=1443448637&signature=7A8D93807537C4273F56CB2E5F957E328F25FB28.E0578627C12045B2B3A0F8D020793A0C2DBE7D0C&fexp=9407477%2C9408710%2C9409069%2C9414764%2C9415365%2C9415485%2C9416023%2C9416126%2C9417707%2C9418153%2C9418448%2C9420348%2C9421013&ip=82.210.178.129&requiressl=yes&sparams=dur%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&itag=22&lmt=1401650519869814&id=o-APl3PSY2MzpmnnCmm6sMww_HpJIkxVnJ9UGSF6B4gCux&dur=689.818&source=youtube&upn=0kaEGeQlOYc&mime=video%2Fmp4&nh=IgpwcjAxLmZyYTAzKgkxMjcuMC4wLjE&ipbits=0&ratebypass=yes&initcwndbps=2732500&expire=1443470322&sver=3"