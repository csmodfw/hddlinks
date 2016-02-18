#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/bin/Resource/www/cgi-bin/scripts/curl -k -s -A "Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0" "https://r3---sn-4g5edn7e.googlevideo.com/videoplayback?fexp=9407029%2C9416126%2C9420452%2C9422596%2C9423569%2C9423661%2C9423662%2C9423818%2C9425417%2C9425954%2C9426901%2C9428650%2C9428941&nh=IgpwcjA1LmZyYTE2KgkxMjcuMC4wLjE&dur=166.905&ratebypass=yes&sver=3&requiressl=yes&initcwndbps=2161250&source=youtube&ipbits=0&lmt=1455333441988121&sparams=dur%2Cgcr%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cnh%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&gcr=ro&id=o-APxad2USwIyGUJwAopGJpH7gUQFkMt3xdWucDsq-5fEY&ms=au&mv=m&upn=I2hHtzfBaIA&mt=1455781210&expire=1455802885&pl=23&mn=sn-4g5edn7e&ip=82.210.178.129&mm=31&itag=22&key=yt6&mime=video%2Fmp4&signature=6E43A6C25D237889345E4C09CE05401EFF6D2A33.CCA09CBE663BFD519EB829AB465EE6F48FC40D10"