#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
  seg = 30;
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
	itemWidthPC="35"
	itemHeightPC="8"
	capXPC="8"
	capYPC="40"
	capWidthPC="35"
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="70" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
	*** TEST - Necesar HDD/Flash conectat pe USB cu 2GB liberi - TEST ***
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="12" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  image/tv_radio.png
		</image>
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

  <channel>


	<title>T12V TV</title>



 <item>
 <title>UK:Disney Channel</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1111");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Disney Channel");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney Channel</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Disney XD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1090");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Disney XD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney XD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Disney Junior</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1088");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Disney Junior");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney Junior</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Nick Junior</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1101");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Nick Junior");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nick Junior</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cartoon Network</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1092");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cartoon Network");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cartoon Network</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Animal Planet</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1082");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Animal Planet");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Animal Planet</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:National Geography Wild</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1102");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:National Geography Wild");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:National Geography Wild</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery Science</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1103");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Science");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Science</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery Id</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1089");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Id");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Id</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:History</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1071");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:History");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:History</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery Turbo</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1058");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Turbo");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Turbo</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery Investigation</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1037");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Investigation");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Investigation</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery Home Health</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1063");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Home Health");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Home Health</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery History</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1076");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery History");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery History</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1046");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Mtv Hits</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1083");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mtv Hits");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtv Hits</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Mtv Rocks</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1077");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mtv Rocks");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtv Rocks</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Rte 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1709");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Rte 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Rte 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Rte 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1710");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Rte 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Rte 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Motors Tv</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1711");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Motors Tv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Motors Tv</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Itv 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1718");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Itv 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Itv 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Itv 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1719");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Itv 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Itv 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Gold</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1712");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Gold");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Gold</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Good Food</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1713");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Good Food");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Good Food</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Film 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1714");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Film 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Film 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cbs Reality</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1715");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cbs Reality");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Reality</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cbs Action</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1716");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cbs Action");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Action</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Boxnation HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1717");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Boxnation HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Boxnation HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport F1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1039");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport F1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport F1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Mtv Music</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1084");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mtv Music");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtv Music</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 5</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1085");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 5");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 5</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 6</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1100");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 6");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 6</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1086");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1087");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1104");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Sci Fi</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1105");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Sci Fi");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Sci Fi</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Five</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1106");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Five");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Five</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Movies 4 Men</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1107");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Movies 4 Men");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Movies 4 Men</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cbs Drama</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1108");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cbs Drama");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Drama</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Colors</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1091");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Colors");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Colors</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports News HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1112");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports News HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports News HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Eurosport 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1050");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Eurosport 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Eurosport 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Eurosport 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1113");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Eurosport 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Eurosport 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 5 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1040");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports 5 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports 5 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1041");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 3 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1042");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports 3 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports 3 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1043");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1044");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Select HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1114");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Select HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Select HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky One</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1095");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky One");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky One</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Premiere HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1054");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Premiere HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Premiere HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Modern Great</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1045");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Modern Great");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Modern Great</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Comedy HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1038");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Comedy HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Comedy HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Action HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1035");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Action HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Action HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Chelsea Tv</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1074");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Chelsea Tv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Chelsea Tv</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Atlantic HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1115");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Atlantic HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Atlantic HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Drama HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1055");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Drama HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Drama HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Disney</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1056");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Disney");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Disney</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Art 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1075");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Art 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Art 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport 5 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1093");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 5 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 5 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1094");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Movies Family</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1064");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Movies Family");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Movies Family</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport 3 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1096");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 3 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 3 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sport 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1097");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Itv 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1098");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Itv 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Itv 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Itv 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1099");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Itv 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Itv 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1070");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cth Stadium 3 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1069");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cth Stadium 3 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cth Stadium 3 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Comedy Central</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1065");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Comedy Central");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Comedy Central</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Showcase</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1062");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Showcase");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Showcase</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Thriller</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1061");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Thriller");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Thriller</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bt Sport 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1117");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bt Sport 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bt Sport 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bt Sport 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1118");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bt Sport 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bt Sport 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Espn HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1059");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Espn HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Espn HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bbc 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1078");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bbc 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1079");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bbc 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1080");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bbc 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1081");
 executeScript("streamingWait");
 url="/tmp/ramfs/volumes/C:/live/channel.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc 1</annotation>
 <img></img>
 </item>
      
</channel>
 
<streamingWait>
 while (1)
 {
	if (seg == "" || seg == null) {
	seg = 30;
	}
	storagePath = getStoragePath("tmp");
	storagePath_link = storagePath + "link";
    streamArray = null;
	streamArray = pushBackStringArray(streamArray, "http://www.t12v.com:8000/live/gharbi/gharbi");
	streamArray = pushBackStringArray(streamArray, seg);
    writeStringToFile(storagePath_link, streamArray);
	streamingFile = readStringFromFile("/tmp/streaming");
    streamingStatus = getStringArrayAt(streamingFile, 0);
	if (streamingStatus == "streaming")
      {
		break;
      }
 }
</streamingWait> 

</rss>                                                                                                                             
