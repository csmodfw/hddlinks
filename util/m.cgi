#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r2---sn-4g5edne7.googlevideo.com/videoplayback?nh=IgpwZjAxLmZyYTE1Kg4yMTMuNDYuMTcwLjEzMw&key=yt6&lmt=1476518874203646&dur=190.937&ei=4CQDWJyPHM63W5GJivgO&ratebypass=yes&source=youtube&requiressl=yes&ipbits=0&id=o-AD49iAzZfkv7bYcOGlnhTy-uaj-6e_80rSbWFVSZ7dHg&gcr=ro&mn=sn-4g5edne7&mm=31&sparams=dur%2Cei%2Cgcr%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&upn=croaz3GfG4s&ms=au&itag=22&initcwndbps=913750&mv=m&mt=1476600481&pl=20&mime=video%2Fmp4&ip=82.210.178.129&expire=1476622656&signature=197BB02A8DF6D22D9E5247AE0D444F3ADE420B6E.8A456DEC04993A352D14D5FD3A0A233AB8519A2B"