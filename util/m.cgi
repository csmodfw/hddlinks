#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r7---sn-4g57knk6.googlevideo.com/videoplayback?fexp=9408710%2C9409069%2C9415365%2C9415485%2C9416023%2C9416126%2C9417707%2C9418153%2C9418448%2C9420090%2C9420348&ratebypass=yes&signature=C47F19CE8EB38FD7B029BB46526AE85096CCA4D5.C81BFE292AB07255F13776C70AE8C7E4734D8FAA&nh=IgpwcjAxLmZyYTAzKgkxMjcuMC4wLjE&key=yt5&mime=video%2Fmp4&requiressl=yes&initcwndbps=2250000&mn=sn-4g57knk6&mm=31&id=o-AHL_gm5zYdIxie546dQKZ98FsvWKNHtVAWY3FfA5oWcX&sparams=dur%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&mv=m&mt=1442067200&ms=au&ip=82.210.178.129&itag=22&pl=23&upn=TWnG6UZtcOI&source=youtube&expire=1442088875&dur=108.483&ipbits=0&sver=3&lmt=1416389290214724"