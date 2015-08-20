#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r1---sn-4g57knz7.googlevideo.com/videoplayback?upn=W0SCxBCyJFU&expire=1440101309&nh=IgpwcjAxLmZyYTE1KgkxMjcuMC4wLjE&pl=23&requiressl=yes&ip=82.210.178.129&initcwndbps=2237500&id=o-AKTQrXucthzInlhvumFnEmwFrHN_9UrBleDgDbLokWpc&sparams=dur%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&ratebypass=yes&mm=31&source=youtube&mn=sn-4g57knz7&mt=1440079641&mv=m&ms=au&fexp=9408710%2C9409069%2C9413031%2C9415365%2C9415485%2C9416023%2C9416126%2C9416336%2C9416837%2C9417206%2C9417707%2C9418153%2C9418203%2C9418449%2C9418702%2C9418959&dur=204.939&ipbits=0&mime=video%2Fmp4&key=yt5&itag=18&lmt=1440075732786776&signature=74A95832FBD99AABD767E1E37220DD1D0CF426EF.13B3B059CF5E2AD2FDC7D71AA0BB20B33A02DD92&sver=3"