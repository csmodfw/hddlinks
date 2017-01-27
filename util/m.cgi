#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r17---sn-4g57knde.googlevideo.com/videoplayback?ipbits=0&mm=31&mn=sn-4g57knde&mime=video%2Fmp4&id=o-APFIVhE3sKdIAfJhS5d6AHvXPrT3RiJrcyrtH9UdUwia&pl=23&mt=1484579458&mv=m&ms=au&ip=82.210.178.129&requiressl=yes&signature=924FC3F308FE9D0271402287A6388D8316EB2C28.3CA3DB6BDCC40CB99A71397D761489ECB7273CC2&upn=IfwOpYbJLuE&ratebypass=yes&key=yt6&lmt=1482661882636011&itag=22&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&source=youtube&nh=IgpwZjAxLmZyYTE1Kg4yMTMuNDYuMTcwLjEzMw&initcwndbps=1010000&ei=QuN8WNqIOZ2W1gKdp4uwAQ&dur=240.489&expire=1484601251"