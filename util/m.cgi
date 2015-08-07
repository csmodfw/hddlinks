#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r13---sn-4g57knll.googlevideo.com/videoplayback?pl=24&initcwndbps=2121250&ipbits=0&dur=689.818&nh=IgpwcjAxLmZyYTAzKgkxMjcuMC4wLjE&fexp=9405186%2C9407888%2C9407942%2C9408093%2C9408503%2C9408710%2C9409170%2C9412526%2C9415030%2C9415365%2C9415485%2C9416023%2C9416126%2C9416495%2C9417132%2C9417520%2C9418153%2C9418204%2C9418916&key=yt5&id=o-AMo2wU6HvMN5FjKDcEKIN91xW0lqgrmMTw6ICG4Ky3bW&upn=W-NluxrSQ0o&mn=sn-4g57knll&mm=31&ratebypass=yes&expire=1439042175&lmt=1401650519869814&ms=au&mv=m&mt=1439020501&ip=85.186.229.96&sver=3&sparams=dur%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&source=youtube&signature=62BFD1CA9483A6C7D2D0C493A6B6ECBD40B993EB.973FCEE9FBAC0E4B337B90DCA58050F1AD637C10&mime=video%2Fmp4&requiressl=yes&itag=22"