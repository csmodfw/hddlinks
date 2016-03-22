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
	itemWidthPC="50"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="50"
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
<amigo>
<link>
  <script>
  url2="http://hddlinks.p.ht/tv_rom2.php?pass=" + pass;
  url2;
</script>
</link>
</amigo>

  <channel>


	<title>IPSatPro TV</title>



 <item>
 <title>UK: Sky Nickelodeon</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=503");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Nickelodeon");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Nickelodeon</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Disney Xd HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=493");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Disney Xd HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Disney Xd HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Disney Junior HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=494");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Disney Junior HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Disney Junior HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Food Network</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=495");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Food Network");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Food Network</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Discovery</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=464");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Discovery");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Discovery</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Disney Channel HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=492");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Disney Channel HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Disney Channel HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Cartoon Network</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=522");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Cartoon Network");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Cartoon Network</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Discovery Science</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=526");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Discovery Science");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Discovery Science</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Discovery History</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=491");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Discovery History");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Discovery History</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Discovery Turbo</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=465");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Discovery Turbo");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Discovery Turbo</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Ci</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=514");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Ci");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Ci</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Animal Planet HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=497");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Animal Planet HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Animal Planet HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky National Geographic HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=499");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky National Geographic HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky National Geographic HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Nat Geo Wild HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=498");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Nat Geo Wild HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Nat Geo Wild HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky History HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=496");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky History HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky History HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky News HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=550");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky News HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky News HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports News HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=549");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports News HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports News HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=548");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=547");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports 3 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=546");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports 3 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports 3 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=545");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports 5 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=544");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports 5 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports 5 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sport 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=533");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sport 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sport 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sport 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=532");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sport 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sport 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sport 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=531");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sport 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sport 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sport 5</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=529");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sport 5");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sport 5</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sport 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=530");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sport 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sport 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Sports F1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=539");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Sports F1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Sports F1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Premier Sports HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=513");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Premier Sports HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Premier Sports HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Setanta Sports</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=484");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Setanta Sports");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Setanta Sports</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Eurosport 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=541");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Eurosport 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Eurosport 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Eurosport 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=540");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Eurosport 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Eurosport 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=543");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=542");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=528");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport 2 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=527");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport 2 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport 2 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport Europe</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=453");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport Europe");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport Europe</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Liverpool Fc Tv HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=536");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Liverpool Fc Tv HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Liverpool Fc Tv HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Chelsea Tv HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=537");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Chelsea Tv HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Chelsea Tv HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Mutv</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=535");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Mutv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Mutv</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Premiere HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=519");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Premiere HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Premiere HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Disney</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=516");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Disney");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Disney</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Select HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=517");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Select HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Select HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Action HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=511");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Action HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Action HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Greats</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=518");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Greats");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Greats</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Family HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=520");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Family HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Family HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Drama HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=521");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Drama HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Drama HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Comedy HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=524");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Comedy HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Comedy HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Crime</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=512");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Crime");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Crime</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies Sci-fiplus</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=515");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies Sci-fiplus");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies Sci-fiplus</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Movies 24</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=523");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Movies 24");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Movies 24</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky True Movies1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=472");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky True Movies1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky True Movies1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky True Movies 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=534");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky True Movies 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky True Movies 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky More 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=504");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky More 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky More 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Film 4 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=505");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Film 4 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Film 4 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Itv 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=471");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Itv 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Itv 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Itv 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=470");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Itv 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Itv 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Itv 3</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=469");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Itv 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Itv 3</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Itv 4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=468");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Itv 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Itv 4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Itv Encore</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=467");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Itv Encore");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Itv Encore</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Cbs Drama</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=482");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Cbs Drama");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Cbs Drama</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Cbs Action</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=481");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Cbs Action");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Cbs Action</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Cbs Reality</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=510");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Cbs Reality");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Cbs Reality</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bbc One HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=488");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bbc One HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bbc One HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bbc Two HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=487");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bbc Two HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bbc Two HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bbc Three HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=486");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bbc Three HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bbc Three HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bbc Four HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=485");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bbc Four HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bbc Four HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bt Sport Extra</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=479");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bt Sport Extra");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bt Sport Extra</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Comedy Central</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=463");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Comedy Central");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Comedy Central</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Comedy Central Ex</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=462");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Comedy Central Ex");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Comedy Central Ex</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky History 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=452");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky History 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky History 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky 1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=475");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky 1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky 2</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=507");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky 2</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Atlantic</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=483");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Atlantic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Atlantic</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Vh1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=449");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Vh1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Vh1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky E4</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=451");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky E4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky E4</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Syfy</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=538");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Syfy");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Syfy</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Mtv Hits</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=500");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Mtv Hits");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Mtv Hits</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Cnbc</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=466");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Cnbc");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Cnbc</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Dave HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=506");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Dave HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Dave HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Rte One</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=474");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Rte One");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Rte One</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Rte Two</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=478");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Rte Two");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Rte Two</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Five</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=473");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Five");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Five</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Arts 1 HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=489");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Arts 1 HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Arts 1 HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Alibi</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=509");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Alibi");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Alibi</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Living HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=502");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Living HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Living HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Boxnation</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=490");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Boxnation");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Boxnation</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Racing</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=458");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Racing");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Racing</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Gold</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=508");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Gold");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Gold</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky 5 Usa</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=480");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky 5 Usa");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky 5 Usa</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky 5 Star</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=477");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky 5 Star");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky 5 Star</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Life Time</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=476");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Life Time");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Life Time</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky E4plus1</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=525");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky E4plus1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky E4plus1</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Good Food HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=501");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Good Food HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Good Food HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky At The Races</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=461");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky At The Races");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky At The Races</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Stv</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=460");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Stv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Stv</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Tcm</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=459");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Tcm");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Tcm</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Five</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=450");
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
 streamArray = pushBackStringArray(streamArray, "UK: Five");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Five</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Cnn</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=454");
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
 streamArray = pushBackStringArray(streamArray, "UK: Cnn");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Cnn</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Dmax</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=456");
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
 streamArray = pushBackStringArray(streamArray, "UK: Dmax");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Dmax</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Bloomberg HD</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=457");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Bloomberg HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Bloomberg HD</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Tlc</title>
 <onClick>
 <script>
 showIdle();
 dummy=getURL("http://127.0.0.1/cgi-bin/scripts/tv/php/iptv.php?file=455");
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Tlc");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Tlc</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK: Sky Magic</title>
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
 streamArray = pushBackStringArray(streamArray, "UK: Sky Magic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv2.rss");
 
 </script>
 </onClick>
 <annotation>UK: Sky Magic</annotation>
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
	streamArray = pushBackStringArray(streamArray, "http://ipsatpro.com:8000/live/angelo/angelo");
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
