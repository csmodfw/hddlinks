#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
error_reporting(0);
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
$t1=explode("\n",$f);
$link=urldecode($t1[1]);
$tit=urldecode($t1[0]);
$tit=str_replace("\'","'",$tit);
$sezon=$t1[2];
$episod=$t1[3];
$tip=$t1[5];
$imdb=$t1[4];
if (!$imdb) {
$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.'  -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
//echo $exec;
$html=shell_exec($exec);
$t1=explode('class="thumb mvi-cover"',$html);
$t2=explode('url(',$t1[1]);
$t3=explode(')',$t2[1]);
  if (preg_match("/(tt\d+)\.jpg/",$t3[0],$m))
     $imdb=$m[1];
  else
     $imdb="";
}
$imdbid = str_replace("tt","",$imdb);
if ($tip=="movie") {
  $tit2="";
} else {
  $tit2=$sezon."x".$episod;
}
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<onEnter>
  setRefreshTime(1);
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
  
  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
else if (userInput == "two" || userInput == "2")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/fs_del.php");
 "true";
}
ret;
</script>
</onUserInput>
      		
</mediaDisplay>
<channel>
	<title><?php echo str_replace("&","&amp;",$tit)." ".str_replace("&","&amp;",$tit2); ?></title>
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

if ($tip=="movie") {
$f="/tmp/nob_list.txt";
if (!file_exists($f)) {
$link="http://uphero.xpresso.eu/royale/movies.txt";
$out=file_get_contents($link);
file_put_contents($f,$out);
$h_nob=$out;
} else {
$h_nob=file_get_contents($f);
}
$t=explode("\n",$h_nob);
for ($k=0;$k<count($t);$k++) {
  $m=explode("|",$t[$k]);
  if ($imdbid == $m[1]) {
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
        <title>(nob) '.$m[2].'</title>
        <onClick>
        <script>
        showIdle();
        url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file='.$link.'";
        movie=geturl(url);
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/royale_sub.php?file=nob1,'.$m[0].'");
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file='.'/tmp/s.srt'.'");';
        echo '
        cancelIdle();
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, movie);
        streamArray = pushBackStringArray(streamArray, movie);
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
        <annotation>Alegeti o subtitrare</annotation>
        </item>
       ';
  
  }
}
} else {
   $l="http://uphero.xpresso.eu/royale/".$imdbid.".txt";
   $h2=file_get_contents($l);
     $id_ep="";
     $z=json_decode($h2,1);
     if ($z) {
     foreach ($z as $key => $val) {
      if ($z[$key]["season"] == $sezon && $z[$key]["episode"] == $episod) {
        $id_ep= $z[$key]["id"];
        $ep_tit= $z[$key]["title"];
        break;
      }
     }
     }
   if ($id_ep) {
    $link="http://uphero.xpresso.eu/srt/s/glob.php";
    $html=file_get_contents($link);
    if (strpos($html,",".$id_ep.".srt") !== false) {
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
        <title>(nob) '.$ep_tit.'</title>
        <onClick>
        <script>
        showIdle();
        url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file='.$link.'";
        movie=geturl(url);
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/royale_sub.php?file=nob2,'.$id_ep.'");
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file='.'/tmp/s.srt'.'");';
        echo '
        cancelIdle();
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, movie);
        streamArray = pushBackStringArray(streamArray, movie);
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
        <annotation>Alegeti o subtitrare</annotation>
        </item>
       ';
    }
}
}
?>
</channel>
</rss>
