#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/wget -q -O -  "http://o-o---preferred---sn-bvvbax-8pxl---v3---lscache7.c.youtube.com/videoplayback?upn=g9tbE4cemsE&sparams=cp,id,ip,ipbits,itag,ratebypass,source,upn,expire&key=yt1&expire=1350820231&itag=18&ipbits=8&sver=3&ratebypass=yes&mt=1350798431&ip=78.96.189.71&mv=m&source=youtube&ms=au&cp=U0hURVhNTl9IS0NONF9QR1JDOkk1UTFORlhmeWZ6&id=da163e59de284b74&newshard=yes&type=video/mp4&signature=9719DAFFA5DE1605B0BD0E58A3306D78820A59ED.46C16502F8371352C10FFBB995D522A1CDC445D1"