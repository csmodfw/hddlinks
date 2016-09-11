#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
  seg = 17;
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


	<title>IPTV-supplier TV</title>



 <item>
 <title>UK:Disney Channel</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=286");
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
 <title>UK:Nickelodeon</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=288");
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
 streamArray = pushBackStringArray(streamArray, "UK:Nickelodeon");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nickelodeon</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Disney XD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=950");
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
 <title>UK:Animal Planete</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=314");
 seg = 20;
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
 streamArray = pushBackStringArray(streamArray, "UK:Animal Planete");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Animal Planete</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:National Geography</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=312");
 seg = 20;
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
 streamArray = pushBackStringArray(streamArray, "UK:National Geography");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:National Geography</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Discovery</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=313");
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
 <title>UK:History Channel</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=284");
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
 streamArray = pushBackStringArray(streamArray, "UK:History Channel");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:History Channel</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Living</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=319");
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
 streamArray = pushBackStringArray(streamArray, "UK:Living");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Living</annotation>
 <img></img>
 </item>

 
 <item>
 <title>UK:RTE 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=322");
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
 streamArray = pushBackStringArray(streamArray, "UK:RTE 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:RTE 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:RTE 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=323");
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
 streamArray = pushBackStringArray(streamArray, "UK:RTE 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:RTE 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sentanta Ireland</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=276");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sentanta Ireland");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sentanta Ireland</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky One</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=289");
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
 <title>UK:Sky Two</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=285");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Two");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Two</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Thriller</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=290");
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
 <title>UK:Sky Movies Select</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=291");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Select");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Select</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Premiere</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=293");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Premiere");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Premiere</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Modern Great</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=295");
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
 <title>UK:Sky Movies Family</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=309");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Family");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Family</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Drama Romance</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=299");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Drama Romance");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Drama Romance</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Comedy</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=311");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Comedy");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Comedy</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Movies Action</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=300");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Action");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Action</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:True Movies2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1399");
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
 streamArray = pushBackStringArray(streamArray, "UK:True Movies2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:True Movies2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Cbs Drama</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1398");
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
 <title>UK:Cartoon Network</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1400");
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
 <title>UK:Sky Atlantic  HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=306");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Atlantic  HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Atlantic  HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:True Movies1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=287");
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
 streamArray = pushBackStringArray(streamArray, "UK:True Movies1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:True Movies1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bt Sports 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=281");
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
 streamArray = pushBackStringArray(streamArray, "UK:Bt Sports 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bt Sports 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Bt Sports 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=282");
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
 streamArray = pushBackStringArray(streamArray, "UK:Bt Sports 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bt Sports 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Box Nation</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=280");
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
 streamArray = pushBackStringArray(streamArray, "UK:Box Nation");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Box Nation</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Espn  HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=279");
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
 streamArray = pushBackStringArray(streamArray, "UK:Espn  HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Espn  HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports News</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=271");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports News");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports News</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports F1 HD</title>
 <onClick>
 <script>
 showIdle();
 executeScript("streamingWait");
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=272");
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
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sports F1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sports F1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Sky Sports 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=275");
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
 <title>UK:Sky Sports 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=274");
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
 <title>UK:Sky Sports 3 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=273");
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
 <title>UK:Sky Sports 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=776");
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
 <title>UK:Sky Sports 5 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=777");
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
 <title>UK:ITV 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=447");
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
 streamArray = pushBackStringArray(streamArray, "UK:ITV 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:ITV 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=448");
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
 streamArray = pushBackStringArray(streamArray, "UK:ITV 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:ITV 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=321");
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
 streamArray = pushBackStringArray(streamArray, "UK:ITV 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:ITV 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=320");
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
 streamArray = pushBackStringArray(streamArray, "UK:ITV 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:More 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=1813");
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
 streamArray = pushBackStringArray(streamArray, "UK:More 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:More 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:BBC 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=318");
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
 streamArray = pushBackStringArray(streamArray, "UK:BBC 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:BBC 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:BBC 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=317");
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
 streamArray = pushBackStringArray(streamArray, "UK:BBC 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:BBC 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:BBC 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=316");
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
 streamArray = pushBackStringArray(streamArray, "UK:BBC 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:BBC 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:BBC 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=315");
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
 streamArray = pushBackStringArray(streamArray, "UK:BBC 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK:BBC 4</annotation>
 <img></img>
 </item>

</channel>
 
<streamingWait>
 while (1)
 {
	if (seg == "" || seg == null) {
	seg = 17;
	}
	storagePath = getStoragePath("tmp");
	storagePath_link = storagePath + "link";
    streamArray = null;
	streamArray = pushBackStringArray(streamArray, "http://iptv-supplier.com:8000/live/Sbon/Sbon");
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
