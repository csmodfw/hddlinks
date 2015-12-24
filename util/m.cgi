#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r11---sn-4g57kndl.googlevideo.com/videoplayback?mt=1450513549&mv=m&ms=au&source=youtube&signature=388267F95D5DDD2BFA448E78A79CFFAEF792B3CE.A7BEB10A60219C94DACDB6795CF085997787AB27&initcwndbps=2512500&mm=31&mn=sn-4g57kndl&id=o-APTMbaQqfLNU4p6KJ3EgoX6EXRbYbjGZDK4tQbGQ6Nfb&upn=CTKCI7NInj8&ipbits=0&ip=82.210.178.129&pl=23&ratebypass=yes&itag=22&sver=3&requiressl=yes&expire=1450535305&nh=IgpwcjAyLmZyYTAzKg03Mi4xNC4xOTguMTY2&fexp=9407473%2C9407538%2C9412857%2C9416126%2C9420452%2C9422596%2C9423662%2C9424130%2C9425112%2C9425742%2C9425962%2C9426523&mime=video%2Fmp4&key=yt6&sparams=dur%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&lmt=1450441420906695&dur=207.029"