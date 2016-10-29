#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -L -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://redirector.googlevideo.com/videoplayback?requiressl=yes&id=a497a12f3bf778eb&itag=18&source=webdrive&ttl=transient&app=explorer&ip=2a05:840::e098&ipbits=0&expire=1477410878&sparams=requiressl,id,itag,source,ttl,ip,ipbits,expire&signature=285809F306500B21ABBE8DA13B5C15B4EC538A09.98F612BE037FF0186521F08C55CEC496EE6765B3&key=ck2&mm=31&mn=sn-5hne6ney&ms=au&mt=1477396402&mv=u&nh=IgpwcjA0LmFtczE1KgkxMjcuMC4wLjE&pl=48"