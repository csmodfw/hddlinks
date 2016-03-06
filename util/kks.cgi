#!/bin/sh
if [ "`cat /usr/local/etc/rcS | grep kks.cgi -c`" == "0" ]; then
MNT=`mount | grep '/dev/root' | cut -d' ' -f6 | cut -c 2-3`
if [ "$MNT" != "rw" ] 
then
  mount -o,remount,rw /
fi
  echo -e "\n\t[ /usr/local/etc/www/cgi-bin/scripts/util/kks.cgi ] && /usr/local/etc/www/cgi-bin/scripts/util/kks.cgi&\n" >> /usr/local/etc/rcS
fi
if [ "`ps | grep kk.cgi -c`" == "1" ]; then
  /tmp/www/cgi-bin/scripts/util/kk.cgi &
fi
