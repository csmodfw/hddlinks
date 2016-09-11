#!/bin/sh
channel=`echo "$1" | sed -n 's/^.*c=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`
kcmd=`echo "$1" | sed -n 's/^.*k=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`

if [ -z "$channel" ]; then
#channel=288 #UK:NICKELODEON
#channel=286 #UK:DISNEY_CHANNEL
#channel=950 #UK:DISNEY_XD
#channel=284 #UK:HISTORY_CHANNEL
#channel=312 #UK:NATIONAL_GEOGRAPHY
#channel=313 #UK:DISCOVERY
channel=288 #UK:ANIMAL_PLANETE
#channel=319 #UK:LIVING
#channel=1400 UK:CARTOON_NETWORK
fi

mkdir -p /tmp/usbmounts/sda1/live
echo "cleaning..."
  [ /tmp/streaming ] && rm -f /tmp/streaming
  [ /tmp/cached/tmp.ts ] && rm -f /tmp/cached/tmp.ts
  [ /tmp/ramfs/volumes/C\:/live/channel.ts ] && rm -f /tmp/ramfs/volumes/C\:/live/channel.ts

if [ ! -z "$kcmd" ]; then
  echo "killing sbon.sh..."
  killall sbon.sh
fi

c=0
while [ ! -s /tmp/ramfs/volumes/C\:/live/channel.ts -a $c -le 10 ]; do
  echo "streaming $channel starting..."
  echo "start" > /tmp/streaming
  wget -q http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts -O - > /tmp/ramfs/volumes/C\:/live/channel.ts
  let c=$c+1
  [ $c -gt 10 ] && rm /tmp/streaming
done
if [ -f /tmp/streaming ]; then
sleep 5 && echo "ready" > /tmp/streaming && echo "streaming ready $channel"&
n=1
  sleep 16
  wget -q http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts -O - > /tmp/cached/tmp.ts
	c=0
  	while [ ! -s /tmp/cached/tmp.ts -a -f /tmp/streaming  ]; do
	  echo "error wget next $n again"
	  wget -q http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts -O - > /tmp/cached/tmp.ts
	  let c=$c+1
	  [ $c -gt 10 ] && rm /tmp/streaming && break
	done
  cat /tmp/cached/tmp.ts >> /tmp/ramfs/volumes/C\:/live/channel.ts
if [ -f /tmp/streaming ]; then
  echo "streaming" > /tmp/streaming
  echo "streaming can play $channel"
fi
let n=$n+1
while [ -f /tmp/streaming ]; do
  sleep 15
  wget -q http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts -O - > /tmp/cached/tmp.ts
	c=0
  	while [ ! -s /tmp/cached/tmp.ts -a -f /tmp/streaming  ]; do
	  echo "error wget next $n again"
	  wget -q http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts -O - > /tmp/cached/tmp.ts
	  let c=$c+1
	  [ $c -gt 10 ] && rm /tmp/streaming && break
	done
  cat /tmp/cached/tmp.ts >> /tmp/ramfs/volumes/C\:/live/channel.ts
echo "streaming next $n"
let n=$n+1
done
echo "streaming $n times stoped"
#echo "stop" > /tmp/streaming
fi
  echo "cleaning..."
  [ /tmp/streaming ] && rm -f /tmp/streaming
  [ /tmp/cached/tmp.ts ] && rm -f /tmp/cached/tmp.ts
  [ /tmp/ramfs/volumes/C\:/live/channel.ts ] && rm -f /tmp/ramfs/volumes/C\:/live/channel.ts
