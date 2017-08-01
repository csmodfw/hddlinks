#!/bin/sh
link=`echo "$QUERY_STRING" | sed -n 's/^.*link=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`
referer=`echo "$QUERY_STRING" | sed -n 's/^.*referer=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`
cookie=`echo "$QUERY_STRING" | sed -n 's/^.*cookie=\([^;]*\).*$/\1/p' | sed "s/%20/ /g"`
cat <<EOF
Content-type: image/jpeg

EOF
exec /usr/local/etc/www/cgi-bin/scripts/wget -q --no-check-certificate --referer "$referer" "$link" -O -
