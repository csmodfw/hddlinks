#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $id_sub = $queryArr[0];
   $search = $queryArr[1];
}
if ($search=="noob") {
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
$id=$t1[1];
$tit=$t1[0];

$subtitle = $t1[2];
$server = $t1[3];
$hd = $t1[4];
$tv= $t1[5];
$imdbid= $t1[6];
///////////////////////
$noob=file_get_contents("/tmp/n.txt");
$noob_serv="/tmp/noob_serv.log";
$hserv=file_get_contents($noob_serv);
$serv_n=explode("\n",$hserv);
$nn=count($serv);
if (!$hd) $hd="0";
if (!$tv) {
 $l=$noob."/?".$id;
 $tv="0";
} else {
 $l=$noob."/?".$id."&tv=1";
}
//////////////////////
if ($tv==0) {
  $tip="movie";
} else {
  $tip="series";
  $tit2=$tit;
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
}
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
}
if ($search=="tvseries") {
$id="";
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[0]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $tit=str_replace("&amp;","&",$tit);

if ($tip=="series") {
  $sezon=$t1[2];
  $episod=$t1[3];

$l="http://www.tvseries.net".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $imdbid="";
  $t1=explode("imdb=",$html);
  $t2=explode('"',$t1[1]);
  $imdbid=$t2[0];
  $imdbid = str_replace("tt","",$imdbid);
  $t1=explode('h5 class="text-center">',$html);
  $t2=explode('<',$t1[1]);
  $tit=$t2[0];
  $tit=trim(preg_replace("/Season\s+\d+/i","",$tit));
  $tit=$tit." ".$sezon."x".$episod;
} else {
  //$tit2=$tit;
  $l="http://www.tvseries.net".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $imdbid="";
  $t1=explode("imdb=",$html);
  $t2=explode('"',$t1[1]);
  $imdbid=$t2[0];
  $imdbid = str_replace("tt","",$imdbid);
}
}
if ($search=="royale") {
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="streamroyale.com";
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
$t1=explode("\n",$f);
$imdb=urldecode($t1[0]);
$ep=$t1[1];
$tip=$t1[2];
$cookie="/tmp/royale.txt";
$l="https://".$server."/api/v1/title/".$imdb;
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'"  --no-check-certificate "'.$l.'" -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$r=json_decode($html,1);
$tit=$r["title"];
$imdbid = str_replace("tt","",$imdb);
if ($tip=="movie")
   $tit2="";
else {
  preg_match("/s(\d+)e(\d+)/",$ep,$m);
  $sezon=$m[1];
  $episod=$m[2];
  $name = $r["seasons"][$sezon-1]["episodes"][$episod-1]["name"];
  $tit2=$sezon."x".$episod." - ".$name;
}
}
if ($search=="watch") {
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
//print_r ($t1);
$imdbid= $t1[4];
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[2]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);

  $tit=str_replace("&amp;","&",$tit);
  $tit2=urldecode($t1[0]);
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
if ($tip=="series") {
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
//echo $sezon." ".$episod."ceva";
}
}
if ($search=="watchsk") {
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
//print_r ($t1);
$imdbid= $t1[4];
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[2]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);

  $tit=str_replace("&amp;","&",$tit);
  $tit2=urldecode($t1[0]);
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
if ($tip=="series") {
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
//echo $sezon." ".$episod."ceva";
}
}
if ($search=="planet") {
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
$imdb= $t1[4];
$imdbid = str_replace("tt","",$imdb);
$link=urldecode($t1[1]);
$tit=urldecode($t1[0]);
$tit=str_replace("\'","'",$tit);
$sezon=$t1[2];
$episod=$t1[3];
$tip=$t1[5];
if ($tip=="movie") {
  $tit2="";
} else {
  $tit2=$sezon."x".$episod;
}
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
}
if ($search=="cartoon") {
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
$imdbid= $t1[5];
$sezon=$t1[2];
if ($sezon) {
  $tip="series";
  $tit2=$t1[0];
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=$t1[4];
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $link=$t1[1];
  $sezon=$t1[2];
  $episod=$t1[3];
} else {
  $tip="movie";
  $tit=$t1[0];
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $link=$t1[1];
}
}
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<onEnter>
  setRefreshTime(1);
  x=0;
</onEnter>
<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>
<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"

	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="80"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="80"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
  itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no"
    idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "annotation");
					  img = getItemInfo(idx,"image");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>
<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();

if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }
  x=0;
  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
else if(userInput == "six" || userInput == "6")
{
    idx = Integer(getFocusItemIndex());
    idx -= -50;
    if(idx &gt;= itemCount)
    idx = itemCount-1;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "four" || userInput == "4")
{
    idx = Integer(getFocusItemIndex());
    idx -= 50;
    if(idx &lt; 0)
      idx = 0;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "up")
{
  idx = Integer(getFocusItemIndex());
  if (idx == 0)
   {
     idx = itemCount;
     print("new idx: "+idx);
     setFocusItemIndex(idx);
	 setItemFocus(0);
     "true";
   }
}
else if(userInput == "down")
{
  idx = Integer(getFocusItemIndex());
  c = Integer(getPageInfo("itemCount")-1);
  if(idx == c)
   {
     idx = -1;
     print("new idx: "+idx);
     setFocusItemIndex(idx);
	 setItemFocus(0);
     "true";
   }
}
else if (userInput == "five" || userInput == "5")
{
 x=x+1;
 if (x==2) {
 showIdle();
 tip=getItemInfo(getFocusItemIndex(),"tip");
 file=getItemInfo(getFocusItemIndex(),"file");
 id=getItemInfo(getFocusItemIndex(),"id");
 movie_info = "http://127.0.0.1/cgi-bin/scripts/filme/php/upload.php?tip=" + tip + "," + file + "," + id;
 annotation = getURL(movie_info);
 cancelIdle();
 x=0;
 }
 redrawDisplay();
 "true";
} else {
 x=0;
 redrawDisplay();
}
ret;
</script>
</onUserInput>
      		
</mediaDisplay>
<channel>
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$tit))." ".str_replace("&","&amp;",str_replace("&amp;","&",$tit2)); ?></title>
	<menu>main menu</menu>
<?php

function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function decode_entities($text) {
    $text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
    $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
    $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
    return $text;
}

$l="https://www.titrari.ro/get.php?".$id_sub;
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  //$exec_path = "D:/Temp/wget ";
  $exec = '--content-on-error -q -S -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O /dev/null 2>&1';
  $exec = $exec_path.$exec;
  $response=shell_exec($exec);
  $t1=explode('filename="',$response);
  $t2=explode('"',$t1[1]);
  $filename=$t2[0];
  $ext = substr(strrchr($filename, '.'), 1);
if (preg_match("/(srt|txt|vtt)/i",$ext)) {
  $l="https://www.titrari.ro/get.php?".$id_sub;
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  $exec = ' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O /tmp/s.srt';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      //echo $exec;
  $x=shell_exec($exec);
  if ($search=="royale") {
	    echo'
	    <item>
	    <title>'.$filename.'</title>
        <annotation>Alegeti o subtitrare,return,play</annotation>
        </item>
       ';
  } else {
  if ($search=="noob") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file=".$id.",off,".$server.",".$hd.",".$tv;
  if ($search=="tvseries") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/tvseries_s_link.php?file=".$link;
  if ($search=="watch") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="planet") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file=".$link;
  if ($search=="cartoon") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="watchsk") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
	    <title>'.$filename.'</title>
        <onClick>
        <script>
        showIdle();
        movie="'.$link.'";
        url=getUrl(movie);
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file=/tmp/s.srt");';
        echo '
        cancelIdle();
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, video/mp4);
        streamArray = pushBackStringArray(streamArray, "'.$tit.' '.$tit2.'");
        streamArray = pushBackStringArray(streamArray, "1");
        writeStringToFile(storagePath_stream, streamArray);
        ';
        if (file_exists($f)) {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer2.rss");
        ';
        } else {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer1.rss");
        ';
        }
        echo '
        </script>
        </onClick>
        <tip>'.$tip.'</tip>
        <id>'.$id.'</id>
        <annotation>'.$filename.'</annotation>
        </item>
       ';
  }
} else if (preg_match("/zip/i",$ext)) {
  if ($search=="noob") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file=".$id.",off,".$server.",".$hd.",".$tv;
  if ($search=="tvseries") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/tvseries_s_link.php?file=".$link;
  if ($search=="watch") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="planet") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file=".$link;
  if ($search=="cartoon") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="watchsk") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  $l="https://www.titrari.ro/get.php?".$id_sub;
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  $exec = ' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O /tmp/s.zip';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $x=shell_exec($exec);
  $exec="unzip -l /tmp/s.zip ";
  $html=shell_exec($exec);
  //echo $html;
  $r=explode("\n",$html);
  //print_r ($r);
  $found=false;
  $c=count($r);
  for ($k=0;$k<$c;$k++) {
      if (preg_match("/Name/",$r[$k]) && $found==false) {
       $pos=strpos($r[$k],"Name");
       $found=true;
      }
      if (preg_match('/(\.srt|\.txt)/i', $r[$k], $m)) {
        $l=substr($r[$k],$pos);
        if (strpos($l,"/") !== false)
          $dir = substr(strrchr($l, "/"), 1);
        else
          $dir=$l;
        //echo $l."\n".$dir."\n";
     if ($search=="royale") {
	    echo'
	    <item>
	    <title>'.$dir.'</title>
        <onClick>
        <script>
        showIdle();
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_sub.php?file=zip,'.urlencode($l).'");
        cancelIdle();
        </script>
        </onClick>
        <tip>'.$tip.'</tip>
        <id>'.$id.'</id>
        <annotation>Alegeti o subtitrare,return,play</annotation>
        </item>
       ';
     } else {
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
	    <title>'.$dir.'</title>
        <onClick>
        <script>
        showIdle();
        movie="'.$link.'";
        url=getUrl(movie);
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_sub.php?file=zip,'.urlencode($l).'");';
        echo '
        cancelIdle();
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, video/mp4);
        streamArray = pushBackStringArray(streamArray, "'.$tit.' '.$tit2.'");
        streamArray = pushBackStringArray(streamArray, "1");
        writeStringToFile(storagePath_stream, streamArray);
        ';
        if (file_exists($f)) {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer2.rss");
        ';
        } else {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer1.rss");
        ';
        }
        echo '
        </script>
        </onClick>
        <tip>'.$tip.'</tip>
        <id>'.$id.'</id>
        <annotation>'.$dir.'</annotation>
        </item>
       ';
       }
      } else if (preg_match('/(\.sub|\.idx)/i', $r[$k], $m)) {
        $l=substr($r[$k],$pos);
        if (strpos($l,"/") !== false)
          $dir = substr(strrchr($l, "/"), 1);
        else
          $dir=$l;
       echo'
       <item>
       <title>(nesuportat) '.$dir.'</title>
       <annotation>'.$dir.'</annotation>
       </item>
       ';
      }
  }
} else if (preg_match("/rar/i",$ext)) {
  if ($search=="noob") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file=".$id.",off,".$server.",".$hd.",".$tv;
  if ($search=="tvseries") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/tvseries_s_link.php?file=".$link;
  if ($search=="watch") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="planet") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file=".$link;
  if ($search=="cartoon") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  if ($search=="watchsk") $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($link);
  $l="https://www.titrari.ro/get.php?".$id_sub;
  $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
  $exec = ' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O /tmp/s.rar';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $x=shell_exec($exec);
  $exec="/usr/local/bin/Resource/www/cgi-bin/scripts/unrar vb -r /tmp/s.rar";
  $html=shell_exec($exec);
  $r=explode("\n",$html);
  //print_r ($r);
  $c=count($r);
  for ($k=0;$k<$c;$k++) {
      if (preg_match('/(\.srt|\.txt)/i', $r[$k], $m)) {
        $l=trim($r[$k]);
        if (strpos($l,"/") !== false)
          $dir = substr(strrchr($l, "/"), 1);
        else
          $dir=$l;
        //echo $l."\n".$dir."\n";
     if ($search=="royale") {
	    echo'
	    <item>
	    <title>'.$dir.'</title>
        <onClick>
        <script>
        showIdle();
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_sub.php?file=rar,'.urlencode($l).'");
        cancelIdle();
        </script>
        </onClick>
        <tip>'.$tip.'</tip>
        <id>'.$id.'</id>
        <annotation>Alegeti o subtitrare,return,play</annotation>
        </item>
       ';
     } else {
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
	    <title>'.$dir.'</title>
        <onClick>
        <script>
        showIdle();
        movie="'.$link.'";
        url=getUrl(movie);
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_sub.php?file=rar,'.urlencode($l).'");';
        echo '
        cancelIdle();
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, video/mp4);
        streamArray = pushBackStringArray(streamArray, "'.$tit.' '.$tit2.'");
        streamArray = pushBackStringArray(streamArray, "1");
        writeStringToFile(storagePath_stream, streamArray);
        ';
        if (file_exists($f)) {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer2.rss");
        ';
        } else {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer1.rss");
        ';
        }
        echo '
        </script>
        </onClick>
        <tip>'.$tip.'</tip>
        <id>'.$id.'</id>
        <annotation>'.$dir.'</annotation>
        </item>
       ';
       }
      } else if (preg_match('/(\.sub|\.idx)/i', $r[$k], $m)) {
        $l=substr($r[$k],$pos);
        if (strpos($l,"/") !== false)
          $dir = substr(strrchr($l, "/"), 1);
        else
          $dir=$l;
       echo'
       <item>
       <title>(nesuportat) '.$dir.'</title>
       <annotation>'.$dir.'</annotation>
       </item>
       ';
      }
  }
} else {
  //unsup....
  echo'
  <item>
  <title>(nesuportat) '.$filename.'</title>
  <annotation>'.$filename.'</annotation>
  </item>
  ';
}
?>
</channel>
</rss>
