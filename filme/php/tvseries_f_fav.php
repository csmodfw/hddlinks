#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
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
	sliding="no" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2 = sterge de la favorite,  right for more, 0 (blue/red/green/yellow) = folositi alta subtitrare
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<idleImage> image/POPUP_LOADING_01.png </idleImage>
		<idleImage> image/POPUP_LOADING_02.png </idleImage>
		<idleImage> image/POPUP_LOADING_03.png </idleImage>
		<idleImage> image/POPUP_LOADING_04.png </idleImage>
		<idleImage> image/POPUP_LOADING_05.png </idleImage>
		<idleImage> image/POPUP_LOADING_06.png </idleImage>
		<idleImage> image/POPUP_LOADING_07.png </idleImage>
		<idleImage> image/POPUP_LOADING_08.png </idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  annotation = getItemInfo(idx, "title");
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
  ret="true";
}
else if (userInput == "two" || userInput == "2")
{
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/tvseries_f_add.php?mod=delete*" + getItemInfo(getFocusItemIndex(),"link1") + "*" + getItemInfo(getFocusItemIndex(),"title1");
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
tit=getItemInfo(getFocusItemIndex(),"title1");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=movie" + tit;
dummy = getURL(movie_info);
cancelIdle();
ret_val=doModalRss("/usr/local/etc/www/cgi-bin/scripts/filme/php/movie_detail.rss");
ret="true";
}
else if (userInput == "zero" || userInput == "0" || userInput == "option_blue")
   {
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  sez="0";
  ep="0";
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + sez + "," + ep + "," + "0" + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs");
    "true";
}
else if (userInput == "option_red")
   {
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  sez="0";
  ep="0";
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + sez + "," + ep + "," + "0" + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs1");
    "true";
}
else if (userInput == "option_green")
   {
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  sez="0";
  ep="0";
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + sez + "," + ep + "," + "0" + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs2");
    "true";
}
else if (userInput == "option_yellow")
   {
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  sez="0";
  ep="0";
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + sez + "," + ep + "," + "0" + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs3");
    "true";
}
ret;
</script>
</onUserInput>

	</mediaDisplay>

	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>
<fs>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs6.php</link>
</fs>
<fs1>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_main.php?query=1,tvseries</link>
</fs1>
<fs2>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subs_main.php?query=1,tvseries</link>
</fs2>
<fs3>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subtitrari_main.php?query=1,tvseries</link>
</fs3>
  <channel>

    <title>tvseries - favorite</title>

<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
if (file_exists("/data"))
  $f= "/data/tvseries_f.dat";
else
  $f="/usr/local/etc/tvseries_f.dat";
if (file_exists($f)) {
$html=file_get_contents($f);
$videos=explode("<item>",$html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $l=urldecode(str_between($video,"<link>","</link>"));
  $l=str_replace(" ","%20",$l);
  $title=urldecode(str_between($video,"<title>","</title>"));
  $arr[]=array($title, $l);
}
asort($arr);
foreach ($arr as $key => $val) {
  $l=$arr[$key][1];
  $title=$arr[$key][0];
    //$link2=$host."/scripts/filme/php/tvseries_s_sez.php?file=".urlencode($l).",".urlencode(str_replace(",","^",$title));
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/tvseries_s_link.php?file='.$l.'";
     movie=geturl(url);
     cancelIdle();
    storagePath = getStoragePath("tmp");
    storagePath_stream = storagePath + "stream.dat";
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, video/mp4);
    streamArray = pushBackStringArray(streamArray, "'.$title.'");
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    ';
    $f = "/usr/local/bin/home_menu";
    if (file_exists($f)) {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer22.rss");
    ';
    } else {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer1.rss");
    ';
    }
    echo '
     </script>
     </onClick>
     <link1>'.urlencode($l).'</link1>
    <title1>'.urlencode(trim(str_replace(",","^",$title))).'</title1>
    <mediaDisplay name="threePartsView"/>
     </item>
     ';
}
}
?>


</channel>
</rss>                                                                                                                             
