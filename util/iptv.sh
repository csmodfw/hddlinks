#!/bin/sh
channel=`echo "$1" | sed -n 's/^.*c=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`
kcmd=`echo "$2" | sed -n 's/^.*k=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`


#link=http://iptv-supplier.com:8000/live/Sbon/Sbon/$channel.ts
#link=http://ipsatpro.com:8000/live/birdman/birdman/$channel.ts

link=`cat '/tmp/cached/link' | sed -n 1p`/$channel.ts
let seg=`cat '/tmp/cached/link' | sed -n 2p`-1

check="abc"
if [ -f /tmp/channel ]; then
 check=`cat '/tmp/channel' | sed -n 1p`
fi

if [ ! -z "$kcmd" ]; then
  if [ ! -f /tmp/streaming ]; then
	[ /tmp/channel ] && rm -f /tmp/channel
	echo "killing iptv.sh..."
	killall iptv.sh
  else
	if [ "$check" != "$channel" ]; then
	  echo "killing iptv.sh..."
	  [ /tmp/channel ] && rm -f /tmp/channel && rm -f /tmp/streaming
	  killall iptv.sh
	fi
  fi
  exit
fi

mkdir -p /tmp/usbmounts/sda1/live

c=0
wget -q http://restrictions.directone.ro/timestamp.php -O /tmp/time
let t=`cat /tmp/time`

echo "cleaning on start..."
  [ /tmp/tmp.ts ] && rm -f /tmp/tmp.ts
  #rm -f /tmp/ramfs/volumes/C\:/live/1*.ts
  sync
if [ -f /tmp/streaming ]; then
  if [ "$check" == "$channel" ]; then
    echo streaming check=$check channel=$channel
    echo "streaming" > /tmp/streaming
	exit
 else
    echo new channel check=$check channel=$channel
    [ /tmp/streaming ] && rm -f /tmp/streaming
    [ /tmp/ramfs/volumes/C\:/live/channel.ts ] && rm -f /tmp/ramfs/volumes/C\:/live/channel.ts
    #let slp=$seg-`expr $t % $seg`+3
    let slp=1
  fi
fi

  echo "streaming $channel waiting..."
  echo "waiting" > /tmp/streaming
  while [ -f /tmp/streaming -a $slp -ge 0 ]; do
    sleep 1
    let slp=$slp-1
  done

t=`date +%s`
st=`date +%s`
echo "streaming $channel starting..."
echo "start" > /tmp/streaming
echo $channel > /tmp/channel
#while [ ! -s /tmp/ramfs/volumes/C\:/live/$t.ts -a $c -le 10 -a -f /tmp/streaming ]; do
while [ ! -s /tmp/tmp.ts -a -f /tmp/streaming  ]; do
  #wget -q $link -O - > /tmp/ramfs/volumes/C\:/live/$t.ts
  wget -q $link -O - > /tmp/tmp.ts
  sync
  let c=$c+1
  [ $c -gt 25 ] && echo "streaming" > /tmp/streaming && sleep 3 && rm /tmp/streaming && break
done
#cat /tmp/ramfs/volumes/C\:/live/$t.ts > /tmp/ramfs/volumes/C\:/live/channel.ts
cat /tmp/tmp.ts > /tmp/ramfs/volumes/C\:/live/channel.ts
#rm -f /tmp/ramfs/volumes/C\:/live/$t.ts
if [ -f /tmp/streaming ]; then
  echo "ready" > /tmp/streaming
  echo "streaming ready $channel"
n=1
i=1
et=`date +%s`
#let slp=19-$et+$st
let slp=$seg-$et+$st
#let slp=39-$et+$st
#echo $slp
#exit

while [ -f /tmp/streaming -a $i -lt 360 ]; do
#  sleep $slp
  while [ -f /tmp/streaming -a $slp -ge 0 ]; do
    sleep 1
    let slp=$slp-1
  done
  echo "wget segment $i..."
t=`date +%s`
st=`date +%s`
#echo $t
  #wget -q $link -O - > /tmp/ramfs/volumes/C\:/live/$t.ts
  wget -q $link -O - > /tmp/tmp.ts
  sync
    c=0
      #while [ ! -s /tmp/ramfs/volumes/C\:/live/$t.ts -a -f /tmp/streaming  ]; do
      while [ ! -s /tmp/tmp.ts -a -f /tmp/streaming  ]; do
      echo "error wget next $n again"
      #wget -q $link -O - > /tmp/ramfs/volumes/C\:/live/$t.ts
      wget -q $link -O - > /tmp/tmp.ts
      sync
      let c=$c+1
      [ $c -gt 50 ] && echo "streaming" > /tmp/streaming && sleep 3 && rm /tmp/streaming && break
    done
  #cat /tmp/ramfs/volumes/C\:/live/$t.ts >> /tmp/ramfs/volumes/C\:/live/channel.ts
  cat /tmp/tmp.ts >> /tmp/ramfs/volumes/C\:/live/channel.ts
  #rm -f /tmp/ramfs/volumes/C\:/live/$t.ts
let n=$n+1
let i=$i+1
et=`date +%s`
#let slp=19-$et+$st
let slp=$seg-$et+$st
#let slp=39-$et+$st
#echo $slp
if [ -f /tmp/streaming -a $n -eq 2 ]; then
  echo "streaming" > /tmp/streaming
  echo "streaming can play $channel"
fi
done
echo "streaming $n times stoped"
#echo "stop" > /tmp/streaming
fi
  echo "cleaning in the end..."
#  [ /tmp/streaming ] && rm -f /tmp/streaming
   if [ ! -f /tmp/streaming ]; then
	[ /tmp/tmp.ts ] && rm -f /tmp/tmp.ts
    #rm -f /tmp/ramfs/volumes/C\:/live/1*.ts
    [ /tmp/ramfs/volumes/C\:/live/channel.ts ] && rm -f /tmp/ramfs/volumes/C\:/live/channel.ts
	[ /tmp/channel ] && rm -f /tmp/channel
   fi
