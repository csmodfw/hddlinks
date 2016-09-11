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

  	<text redraw="yes" align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="12" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=10 offsetYPC=4.5 widthPC=15 heightPC=10>
		<script>print(img); img;</script>
		</image>
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
					  img = getItemInfo(idx, "img");
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


	<title>Media IPTV</title>




 <item>
 <title>UK:VH1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1305.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:VH1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:VH1</annotation>
 <img>http://as-cam.com/photos/14d366ba399f0a814d03209c9663532b.png</img>
 </item>
 
 <item>
 <title>UK:Tv3 IR</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1306.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Tv3 IR");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Tv3 IR</annotation>
 <img>http://as-cam.com/photos/2c977149c7ab59a2af30aa49eec4e0b0.jpg</img>
 </item>
 
 <item>
 <title>UK:True Movies 2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1307.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:True Movies 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:True Movies 2</annotation>
 <img>http://as-cam.com/photos/8eada2364a237e7d140a23479b28bcec.jpg</img>
 </item>
 
 <item>
 <title>UK:True Movies 1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1308.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:True Movies 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:True Movies 1</annotation>
 <img>http://as-cam.com/photos/f23103298f70b75fd1439aef3f0bd1f7.jpg</img>
 </item>
 
 <item>
 <title>UK:Travel</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1309.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Travel");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Travel</annotation>
 <img>http://as-cam.com/photos/65c365e93c716112ce6922ede4e91b90.png</img>
 </item>
 
 <item>
 <title>UK:The Vault</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1310.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:The Vault");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:The Vault</annotation>
 <img>http://as-cam.com/photos/8103a585c11706afcb17ce82b12ceb78.png</img>
 </item>
 
 <item>
 <title>UK:Tg4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1311.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Tg4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Tg4</annotation>
 <img>http://as-cam.com/photos/9bf9938a477cf023fb2a65810bd2189e.jpg</img>
 </item>
 
 <item>
 <title>UK:Tcm  1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1312.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Tcm  1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Tcm  1</annotation>
 <img>http://as-cam.com/photos/50160eb14f22340715404f8855968397.jpg</img>
 </item>
 
 <item>
 <title>UK:Sungat Tv</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1313.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sungat Tv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sungat Tv</annotation>
 <img></img>
 </item>
 
 <item>
 <title>UK:Stv Central West</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1314.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Stv Central West");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Stv Central West</annotation>
 <img>http://as-cam.com/photos/14415ae9f4845d520c764dbe7a250aae.jpg</img>
 </item>
 
 <item>
 <title>UK:Skymovies Family</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1315.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Skymovies Family");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Skymovies Family</annotation>
 <img>http://as-cam.com/photos/8820958a8c041cea7431205b9b571473.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky UK:2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1316.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky UK:2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky UK:2</annotation>
 <img>http://as-cam.com/photos/544cb0a84c77b1c2ea8eda8d33077bd8.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky UK:1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1317.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky UK:1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky UK:1</annotation>
 <img>http://as-cam.com/photos/b6114fc5c053e2b3dff637b5675d1dfb.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Thriller</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1318.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Thriller");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Thriller</annotation>
 <img>http://as-cam.com/photos/2a949b2c519e3bd22f79843ab1084685.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport News</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1319.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport News");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport News</annotation>
 <img>http://as-cam.com/photos/37a6976f05bdd0dcc7100ae2d65c7e3d.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport F1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1320.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport F1</annotation>
 <img>http://as-cam.com/photos/62526ae7ada767cc80b19fe484c8b23b.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport Ashes</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1321.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport Ashes");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport Ashes</annotation>
 <img>http://as-cam.com/photos/d66b9d762cc3a7869add5e8f86e9984a.JPG</img>
 </item>
 
 <item>
 <title>UK:Sky Sport 5</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1322.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 5");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 5</annotation>
 <img>http://as-cam.com/photos/896f8f8712beafcfd6698eb137663163.JPG</img>
 </item>
 
 <item>
 <title>UK:Sky Sport 4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1323.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 4</annotation>
 <img>http://as-cam.com/photos/679b6e40eb539dce9cd6c00d9377b74a.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport 3</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1324.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 3</annotation>
 <img>http://as-cam.com/photos/82061ba5d132ef76acef45ac58ca5bea.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport 2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1325.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 2</annotation>
 <img>http://as-cam.com/photos/853fdabaefac90d3b173a59e2615c3f6.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Sport 1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1326.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Sport 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Sport 1</annotation>
 <img>http://as-cam.com/photos/1b8d997093d753db359f471ddb8a3ce1.png</img>
 </item>
 
 <item>
 <title>UK:Sky Action</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1327.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Action");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Action</annotation>
 <img>http://as-cam.com/photos/fe1ec14629f7f7f218d2dab25ac3a3be.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Premier</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1328.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Premier");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Premier</annotation>
 <img>http://as-cam.com/photos/4324ac8f3938f97aeccff62b93ca64d8.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky News</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1329.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky News");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky News</annotation>
 <img>http://as-cam.com/photos/2d5e071d64546285ec907812d92fc640.png</img>
 </item>
 
 <item>
 <title>UK:Sky Movies Showcase</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1330.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Showcase</annotation>
 <img>http://as-cam.com/photos/719345b8283dbe227cb959a3a425544b.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Movies Scifi Horror</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1331.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Movies Scifi Horror");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Scifi Horror</annotation>
 <img>http://as-cam.com/photos/4b5d6dd3230f3ee932f563b0adc3e084.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Movies Disney</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1332.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Movies Disney</annotation>
 <img>http://as-cam.com/photos/968cc85babf0ee13aefa5edacb98641c.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Living</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1333.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Living");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Living</annotation>
 <img>http://as-cam.com/photos/a478b435fc5efa1d1b3d41e72166418d.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky History</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1334.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky History");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky History</annotation>
 <img>http://as-cam.com/photos/6ec2301930109ebd0df73a7a68e26357.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Comedy</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1335.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Comedy");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Comedy</annotation>
 <img>http://as-cam.com/photos/2038acc817967af50a02a88af9892cf0.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Atlantic</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1336.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Atlantic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Atlantic</annotation>
 <img>http://as-cam.com/photos/4a6eb60ea0b1cf847a6189b16ceca50d.jpg</img>
 </item>
 
 <item>
 <title>UK:Sky Arts 1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1337.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sky Arts 1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sky Arts 1</annotation>
 <img>http://as-cam.com/photos/19250b1a2e41e704f525d075d5f8c67d.jpg</img>
 </item>
 
 <item>
 <title>UK:Sikh Channel</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1338.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Sikh Channel");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Sikh Channel</annotation>
 <img>http://as-cam.com/photos/677f0f2afff5109e962bb2548172d8f2.jpg</img>
 </item>
 
 <item>
 <title>UK:Set Asia</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1339.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Set Asia");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Set Asia</annotation>
 <img>http://as-cam.com/photos/46a88cbcb3f8b2176b466d607b0ec973.jpg</img>
 </item>
 
 <item>
 <title>UK:S4c</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1340.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:S4c");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:S4c</annotation>
 <img>http://as-cam.com/photos/5d8a9815e5e454f8f4883bdee59f4445.png</img>
 </item>
 
 <item>
 <title>UK:Rte Two</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1341.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Rte Two");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Rte Two</annotation>
 <img>http://as-cam.com/photos/f2e9fb1697c75ce6f94dd351a854b76f.jpg</img>
 </item>
 
 <item>
 <title>UK:Rte One</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1342.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Rte One");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Rte One</annotation>
 <img>http://as-cam.com/photos/fff2be5ed311992940992f61a8a67b66.jpg</img>
 </item>
 
 <item>
 <title>UK:Racing</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1343.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Racing");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Racing</annotation>
 <img>http://as-cam.com/photos/24b6b3e0243fc4ddee7a2abd445bae1e.jpg</img>
 </item>
 
 <item>
 <title>UK:Quest</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1344.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Quest");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Quest</annotation>
 <img>http://as-cam.com/photos/29fb26457862cdad434ac65b779fe1a1.jpg</img>
 </item>
 
 <item>
 <title>UK:Premier Sport</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1345.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Premier Sport");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Premier Sport</annotation>
 <img>http://as-cam.com/photos/a22e7cac67c4cd81180c920e73b94857.jpg</img>
 </item>
 
 <item>
 <title>UK:Pick IRland</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1346.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Pick IRland");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Pick IRland</annotation>
 <img>http://as-cam.com/photos/cdd09609bf983bd3e1e7b001f8da7b77.png</img>
 </item>
 
 <item>
 <title>UK:Pick</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1347.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Pick");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Pick</annotation>
 <img>http://as-cam.com/photos/af325dcdfdf310e5828923e0dd6e8abb.png</img>
 </item>
 
 <item>
 <title>UK:Nicktoons</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1348.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Nicktoons");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nicktoons</annotation>
 <img>http://as-cam.com/photos/e07a77d1b20c957049fc82671bbbbd1a.jpg</img>
 </item>
 
 <item>
 <title>UK:Nickelodeon</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1349.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nickelodeon</annotation>
 <img>http://as-cam.com/photos/c1b3ce85c8bf44c4a073602553b385f8.jpg</img>
 </item>
 
 <item>
 <title>UK:Nick Jr. / VH1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1350.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Nick Jr. / VH1");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nick Jr. / VH1</annotation>
 <img>http://as-cam.com/photos/14d366ba399f0a814d03209c9663532b.png</img>
 </item>
 
 <item>
 <title>UK:Nat Geo Wild</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1351.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Nat Geo Wild");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nat Geo Wild</annotation>
 <img>http://as-cam.com/photos/9d220b19019a7daafda6000101af80c2.jpg</img>
 </item>
 
 <item>
 <title>UK:Nat Geo</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1352.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Nat Geo");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Nat Geo</annotation>
 <img>http://as-cam.com/photos/9c040a5ba416f6c4a1221997b9565dd1.jpg</img>
 </item>
 
 <item>
 <title>UK:Mutv</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1353.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mutv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mutv</annotation>
 <img>http://as-cam.com/photos/96daeb179299153ff0b73cf36f277a39.png</img>
 </item>
 
 <item>
 <title>UK:Mtvmusic</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1354.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mtvmusic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtvmusic</annotation>
 <img>http://as-cam.com/photos/c54f55552cb6a49642d0678b8f6fb4f8.jpg</img>
 </item>
 
 <item>
 <title>UK:Mtv Hits</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1355.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtv Hits</annotation>
 <img>http://as-cam.com/photos/046ee50073d3c0ae59942d9cd8775b17.jpg</img>
 </item>
 
 <item>
 <title>UK:Mtv Classic</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1356.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Mtv Classic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Mtv Classic</annotation>
 <img>http://as-cam.com/photos/ac93de3ddb2bafaf2df3c7c6031736eb.jpg</img>
 </item>
 
 <item>
 <title>UK:Magic</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1357.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Magic");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Magic</annotation>
 <img>http://as-cam.com/photos/cc3bac9cda0a3b68329e0f0b401b45bf.png</img>
 </item>
 
 <item>
 <title>UK:ITV3</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1358.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV3</annotation>
 <img>http://as-cam.com/photos/5ce8d29e40b970869e12fa470ebd3681.png</img>
 </item>
 
 <item>
 <title>UK:ITV2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1359.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV2</annotation>
 <img>http://as-cam.com/photos/df96ccc98af3fc46f1186c82cd9042b0.png</img>
 </item>
 
 <item>
 <title>UK:ITV Encore</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1361.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV Encore");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV Encore</annotation>
 <img>http://as-cam.com/photos/dbe0124c657224a4bf6e431ddae9aa09.png</img>
 </item>
 
 <item>
 <title>UK:ITV Be</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1362.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV Be");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV Be</annotation>
 <img>http://as-cam.com/photos/4ed007b6dbe06ae40820021db0c60acd.png</img>
 </item>
 
 <item>
 <title>UK:ITV 4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1363.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 4</annotation>
 <img>http://as-cam.com/photos/8e7a199ca6df48d2f034049978f72342.png</img>
 </item>
 
 <item>
 <title>UK:ITV 1 London HD</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1364.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV 1 London HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 1 London HD</annotation>
 <img>http://as-cam.com/photos/37d3d41fd874ccc26999ec87f8f605b7.png</img>
 </item>
 
 <item>
 <title>UK:ITV 1</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1360.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV 1</annotation>
 <img>http://as-cam.com/photos/470cf899afbb97cb9a4ce8b3b267d266.png</img>
 </item>
 
 <item>
 <title>UK:ITV</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1365.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:ITV");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:ITV</annotation>
 <img>http://as-cam.com/photos/17c2b38e67ac15d5722e6fa1cfaf2987.jpg</img>
 </item>
 
 <item>
 <title>UK:Ifood</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1366.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Ifood");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Ifood</annotation>
 <img>http://as-cam.com/photos/86a0c53a215bf079a38f588edcfdea3a.png</img>
 </item>
 
 <item>
 <title>UK:Id</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1367.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Id");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Id</annotation>
 <img>http://as-cam.com/photos/ea3f5f8c9185f0f5c6d3b27f16958c32.jpg</img>
 </item>
 
 <item>
 <title>UK:Htb Rusia</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1368.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Htb Rusia");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Htb Rusia</annotation>
 <img>http://as-cam.com/photos/02bffb9ff5ac43d26153e05a06c4480b.jpg</img>
 </item>
 
 <item>
 <title>UK:Home</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1369.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Home");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Home</annotation>
 <img>http://as-cam.com/photos/f69f2651c1ee0ea0b8913fd2485aba12.jpg</img>
 </item>
 
 <item>
 <title>UK:Hearty</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1370.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Hearty");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Hearty</annotation>
 <img>http://as-cam.com/photos/453637fe0d0d8029e970672909d06d10.png</img>
 </item>
 
 <item>
 <title>UK:H2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1371.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:H2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:H2</annotation>
 <img>http://as-cam.com/photos/0e14d419f0521ed0496a2fd6fd156b41.jpg</img>
 </item>
 
 <item>
 <title>UK:Gold</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1372.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Gold</annotation>
 <img>http://as-cam.com/photos/535a67b47b502a29a29d95a5e0e1965f.JPG</img>
 </item>
 
 <item>
 <title>UK:Fox</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1373.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Fox");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Fox</annotation>
 <img>http://as-cam.com/photos/d2a07ad040089f85e2fe3d9087d77557.jpg</img>
 </item>
 
 <item>
 <title>UK:Food Net</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1374.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Food Net");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Food Net</annotation>
 <img>http://as-cam.com/photos/86feb7e540e1a82b909dc3331175634f.png</img>
 </item>
 
 <item>
 <title>UK:Flava</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1375.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Flava");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Flava</annotation>
 <img>http://as-cam.com/photos/ac19645ebded70c9b2e302f45887b938.png</img>
 </item>
 
 <item>
 <title>UK:Film4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1376.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Film4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Film4</annotation>
 <img>http://as-cam.com/photos/54ca560478f9cdb37f3cbd901047c581.png</img>
 </item>
 
 <item>
 <title>UK:Eurosport British2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1377.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Eurosport British2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Eurosport British2</annotation>
 <img>http://as-cam.com/photos/e4c61f2b0249c2686e578b74b0d6f45e.jpg</img>
 </item>
 
 <item>
 <title>UK:Eurosport British</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1378.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Eurosport British");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Eurosport British</annotation>
 <img>http://as-cam.com/photos/c12a1dade08121cdfddcfaf1739adaed.jpg</img>
 </item>
 
 <item>
 <title>UK:Eden</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1379.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Eden");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Eden</annotation>
 <img>http://as-cam.com/photos/1e23a9c2fdb5cb10486f797cd0d9d39f.jpg</img>
 </item>
 
 <item>
 <title>UK:E4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1380.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:E4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:E4</annotation>
 <img>http://as-cam.com/photos/dd5d078b1043f3c544295f178c53d1d3.png</img>
 </item>
 
 <item>
 <title>UK:E! IRland</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1381.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:E! IRland");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:E! IRland</annotation>
 <img>http://as-cam.com/photos/ff60cc1c1a89c516142bc9978d728b13.png</img>
 </item>
 
 <item>
 <title>UK:E!</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1382.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:E!");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:E!</annotation>
 <img>http://as-cam.com/photos/ff60cc1c1a89c516142bc9978d728b13.png</img>
 </item>
 
 <item>
 <title>UK:Drama</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1383.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Drama");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Drama</annotation>
 <img>http://as-cam.com/photos/7b8d4d7a15c204e725160e84194546d1.jpg</img>
 </item>
 
 <item>
 <title>UK:Dmax</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1384.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Dmax");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Dmax</annotation>
 <img>http://as-cam.com/photos/b6e326246744cb17f3a14847026cf685.jpg</img>
 </item>
 
 <item>
 <title>UK:Disney XD</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1385.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney XD</annotation>
 <img>http://as-cam.com/photos/3e722ce9ccc6061c173ad067dbcfab19.jpg</img>
 </item>
 
 <item>
 <title>UK:Disney Junior</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1386.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney Junior</annotation>
 <img>http://as-cam.com/photos/2bce26170ecf81b9a9b1c0ba822d1adc.jpg</img>
 </item>
 
 <item>
 <title>UK:Disney Channel</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1387.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Disney Channel</annotation>
 <img>http://as-cam.com/photos/68d0dea919c3307c867782cb3452467a.jpg</img>
 </item>
 
 <item>
 <title>UK:Discovery Sc</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1388.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Discovery Sc");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery Sc</annotation>
 <img>http://as-cam.com/photos/091ef71e8d670fb0dc04595aa84520dd.jpg</img>
 </item>
 
 <item>
 <title>UK:Discovery History</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1389.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery History</annotation>
 <img>http://as-cam.com/photos/6531f74a7ac5ff428f61d02978e0a4bc.jpg</img>
 </item>
 
 <item>
 <title>UK:Discovery</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1390.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Discovery</annotation>
 <img>http://as-cam.com/photos/7870fe2980468a85d5028656f9c3b1c9.jpg</img>
 </item>
 
 <item>
 <title>UK:Dave</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1391.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Dave");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Dave</annotation>
 <img>http://as-cam.com/photos/b9643babcf085853fe6801dedab1a875.jpg</img>
 </item>
 
 <item>
 <title>UK:Comedy Central</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1392.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Comedy Central</annotation>
 <img>http://as-cam.com/photos/4a552c678d936fbd17b174a9c904a8e9.jpg</img>
 </item>
 
 <item>
 <title>UK:Cnn Intl Europe</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1393.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cnn Intl Europe");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cnn Intl Europe</annotation>
 <img>http://as-cam.com/photos/937126ca58a8df36c7a957c85858eb52.jpg</img>
 </item>
 
 <item>
 <title>UK:Cnbc Europe</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1394.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Cnbc Europe");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cnbc Europe</annotation>
 <img>http://as-cam.com/photos/014fecb4cdc0526f68d2b32563037bc2.png</img>
 </item>
 
 <item>
 <title>UK:Channel 4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1395.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Channel 4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Channel 4</annotation>
 <img>http://as-cam.com/photos/fcba3cdf7b6dd512a3107c53584395eb.png</img>
 </item>
 
 <item>
 <title>UK:Ch5 Usa</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1396.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Ch5 Usa");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Ch5 Usa</annotation>
 <img>http://as-cam.com/photos/cfa010eb5a52320ebb8c5f3b77a6dc45.png</img>
 </item>
 
 <item>
 <title>UK:Ch5 Star</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1397.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Ch5 Star");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Ch5 Star</annotation>
 <img>http://as-cam.com/photos/b053e2c9cdd5671d848123709e5f29ec.png</img>
 </item>
 
 <item>
 <title>UK:Ch5</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1398.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Ch5");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Ch5</annotation>
 <img>http://as-cam.com/photos/0fccc3922b01d055cfdd4d7677b900a3.png</img>
 </item>
 
 <item>
 <title>UK:Ch 4 More</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1399.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Ch 4 More");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Ch 4 More</annotation>
 <img>http://as-cam.com/photos/7e005a017b06684486551f4a3f8eee62.jpg</img>
 </item>
 
 <item>
 <title>UK:Cbs Reality</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1400.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Reality</annotation>
 <img>http://as-cam.com/photos/388ad9618995e9681ff26cf2e4916c3f.png</img>
 </item>
 
 <item>
 <title>UK:Cbs Drama</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1401.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Drama</annotation>
 <img>http://as-cam.com/photos/622e8a0164e97bfce33925ca67ebc611.jpg</img>
 </item>
 
 <item>
 <title>UK:Cbs Action</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1402.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cbs Action</annotation>
 <img>http://as-cam.com/photos/f94e36e8db283e7015956c6b8802e74a.jpg</img>
 </item>
 
 <item>
 <title>UK:Cartoon Network</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1403.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Cartoon Network</annotation>
 <img>http://as-cam.com/photos/3c77ede6d45c13b403f044e9434fef39.jpg</img>
 </item>
 
 <item>
 <title>UK:Bt Espn</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1404.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bt Espn");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bt Espn</annotation>
 <img>http://as-cam.com/photos/a9b8d63fe130ec2e2ac8530443aed6ab.png</img>
 </item>
 
 <item>
 <title>UK:Brit Asia Tv</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1405.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Brit Asia Tv");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Brit Asia Tv</annotation>
 <img>http://as-cam.com/photos/8db90ba58b7e09733e184974a36c6421.png</img>
 </item>
 
 <item>
 <title>UK:Box Nation</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1406.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Box Nation</annotation>
 <img>http://as-cam.com/photos/691b3c5ce8edd938749e8e6121f3a3b0.jpg</img>
 </item>
 
 <item>
 <title>UK:Boomerang</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1407.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Boomerang");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Boomerang</annotation>
 <img>http://as-cam.com/photos/0e8fbd8fba4d33457f77e09ce76c90d0.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc4</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1408.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc4");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc4</annotation>
 <img>http://as-cam.com/photos/6c17a36b4b6a1fc97adf25bf50c7c271.png</img>
 </item>
 
 <item>
 <title>UK:Bbc3</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1409.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc3");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc3</annotation>
 <img>http://as-cam.com/photos/c691a47c88c3b8016a7398b7cc7f3ba0.png</img>
 </item>
 
 <item>
 <title>UK:Bbc2</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1410.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc2");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc2</annotation>
 <img>http://as-cam.com/photos/b2d0f29d60da77e6f13a76fbe90cb684.png</img>
 </item>
 
 <item>
 <title>UK:Bbc UK:News</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1411.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc UK:News");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc UK:News</annotation>
 <img>http://as-cam.com/photos/c37febdc4d1cb36ebda97ea9afafb8c0.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc Scotland</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1412.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc Scotland");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc Scotland</annotation>
 <img>http://as-cam.com/photos/69cf9a018eddd6a85fbdc30076d351d5.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc One Wales</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1413.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc One Wales");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc One Wales</annotation>
 <img>http://as-cam.com/photos/377e8a659b0a681843ca87d1384f9e9c.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc One N.ireland</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1414.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc One N.ireland");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc One N.ireland</annotation>
 <img>http://as-cam.com/photos/c9409182efb9b05cbfd99e28e658b4f0.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc One HD</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1415.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc One HD");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc One HD</annotation>
 <img>http://as-cam.com/photos/96e9c6a6379040a4f5f369265bc5ff0a.jpg</img>
 </item>
 
 <item>
 <title>UK:Bbc News</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1416.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc News");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc News</annotation>
 <img>http://as-cam.com/photos/adfc95ca6e9480131bc6899f6a1627ac.png</img>
 </item>
 
 <item>
 <title>UK:Bbc London</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1417.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Bbc London");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Bbc London</annotation>
 <img>http://as-cam.com/photos/95800a4dde37e04310b38352fab2a09f.jpg</img>
 </item>
 
 <item>
 <title>UK:Babie Station</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1418.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Babie Station");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Babie Station</annotation>
 <img>http://as-cam.com/photos/28bc0cc8acd36bec1a1914e7a2585d45.jpg</img>
 </item>
 
 <item>
 <title>UK:At The Races</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1419.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:At The Races");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:At The Races</annotation>
 <img>http://as-cam.com/photos/f28994d806c6d3bc79e1deeba8f4c3d3.jpg</img>
 </item>
 
 <item>
 <title>UK:Animal Planet</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1420.ts";
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
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Animal Planet</annotation>
 <img>http://as-cam.com/photos/5d5a0208e7fd2c538ff962cf8fc7aa3e.jpg</img>
 </item>
 
 <item>
 <title>UK:Alibi</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1421.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:Alibi");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:Alibi</annotation>
 <img>http://as-cam.com/photos/814d1a87bb59aff3bd15f1b0933b307d.jpg</img>
 </item>
 
 <item>
 <title>UK:3e IR</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1422.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:3e IR");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:3e IR</annotation>
 <img>http://as-cam.com/photos/766e630a153d11c811e6deae3cbfed27.jpg</img>
 </item>
 
 <item>
 <title>UK:1 Rusia</title>
 <onClick>
 <script>
 showIdle();
 url="http://iptv2014.mine.nu:8000/live/free1265324254/56ec9844a599e/1423.ts";
 cancelIdle();
 storagePath = getStoragePath("tmp");
 storagePath_stream = storagePath + "stream.dat";
 streamArray = null;
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, "");
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, url);
 streamArray = pushBackStringArray(streamArray, video/mp4);
 streamArray = pushBackStringArray(streamArray, "UK:1 Rusia");
 streamArray = pushBackStringArray(streamArray, "1");
 writeStringToFile(storagePath_stream, streamArray);
 
 doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer_tv1.rss");
 
 </script>
 </onClick>
 <annotation>UK:1 Rusia</annotation>
 <img>http://as-cam.com/photos/60d4b843d583d75baf89b016c036a07f.png</img>
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
