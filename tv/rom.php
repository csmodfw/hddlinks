#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>"; ?>
<rss version="2.0">
<script>
  translate_base_url  = "http://127.0.0.1/cgi-bin/translate?";

  storagePath             = getStoragePath("tmp");
  storagePath_stream      = storagePath + "stream.dat";

  error_info          = "";
</script>
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
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  ../etc/translate/rss/image/radio_online.jpg
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
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "annotation");
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
if(userInput == "enter" || userInput == "ENTR")
{
  showIdle();
  focus = getFocusItemIndex();

  request_title = getItemInfo(focus, "title");
  request_url = getItemInfo(focus, "location");
  request_options = getItemInfo(focus, "options");

  stream_url = getItemInfo(focus, "stream_url");
  stream_title = getItemInfo(focus, "stream_title");
  stream_type = getItemInfo(focus, "stream_type");
  stream_protocol = getItemInfo(focus, "stream_protocol");
  stream_soft = getItemInfo(focus, "stream_soft");
  stream_class = getItemInfo(focus, "stream_class");
  stream_server = getItemInfo(focus, "stream_server");
  stream_status_url = "";
  stream_current_song = "";
  stream_genre = getItemInfo(focus, "stream_genre");
  stream_bitrate = getItemInfo(focus, "stream_bitrate");

  if(stream_class == "" || stream_class == null)
    stream_class = "unknown";

  if(stream_url == "" || stream_url == null)
    stream_url = request_url;

  if(stream_server != "" &amp;&amp; stream_server != null)
    stream_status_url = translate_base_url + "status," + urlEncode(stream_server) + "," + urlEncode(stream_url);

  if(stream_title == "" || stream_title == null)
    stream_title = request_title;

  if(stream_url != "" &amp;&amp; stream_url != null)
  {
    if(stream_protocol == "file" || (stream_protocol == "http" &amp;&amp; stream_soft != "shoutcast"))
    {
      url = stream_url;
    }
    else
    {
      if(stream_type != null &amp;&amp; stream_type != "")
      {
        request_options = "Content-type:"+stream_type+";"+request_options;
      }
      url = translate_base_url + "stream," + request_options + "," + urlEncode(stream_url);
    }

    executeScript(stream_class+"Dispatcher");
  }

  cancelIdle();
  ret = "true";
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
	<item_template>
		<mediaDisplay  name="threePartsView">
			<idleImage> image/POPUP_LOADING_01.png </idleImage>
			<idleImage> image/POPUP_LOADING_02.png </idleImage>
			<idleImage> image/POPUP_LOADING_03.png </idleImage>
			<idleImage> image/POPUP_LOADING_04.png </idleImage>
			<idleImage> image/POPUP_LOADING_05.png </idleImage>
			<idleImage> image/POPUP_LOADING_06.png </idleImage>
			<idleImage> image/POPUP_LOADING_07.png </idleImage>
			<idleImage> image/POPUP_LOADING_08.png </idleImage>
		</mediaDisplay>
	</item_template>

  <videoDispatcher>
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, request_url);
    streamArray = pushBackStringArray(streamArray, request_options);
    streamArray = pushBackStringArray(streamArray, stream_url);
    streamArray = pushBackStringArray(streamArray, url);
    streamArray = pushBackStringArray(streamArray, stream_type);
    streamArray = pushBackStringArray(streamArray, stream_title);
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    doModalRss("rss_file://../etc/translate/rss/xspf/videoRenderer.rss");
  </videoDispatcher>
  <audioDispatcher>
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, request_url);
    streamArray = pushBackStringArray(streamArray, request_options);
    streamArray = pushBackStringArray(streamArray, stream_url);
    streamArray = pushBackStringArray(streamArray, url);
    streamArray = pushBackStringArray(streamArray, stream_type);
    streamArray = pushBackStringArray(streamArray, stream_status_url);
    streamArray = pushBackStringArray(streamArray, stream_current_song);
    streamArray = pushBackStringArray(streamArray, stream_genre);
    streamArray = pushBackStringArray(streamArray, stream_bitrate);
    streamArray = pushBackStringArray(streamArray, stream_title);
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    doModalRss("rss_file://../etc/translate/rss/xspf/audioRenderer.rss");
  </audioDispatcher>
  <unknownDispatcher>
    info_url    = translate_base_url + "info," + request_options + "," + urlEncode(request_url);
    error_info  = "";

    res = loadXMLFile(info_url);

    if (res != null)
    {
      error = getXMLElementCount("info","error");

      if(error != 0)
      {
  	    value = getXMLText("info","error");
  	    if(value != null)
  	    {
  	     error_info = value;
  	    }
      }
      else
      {
  	    value = getXMLAttribute("info","stream","url");
  	    if(value != null)
  	     stream_url = value;

  	    value = getXMLAttribute("info","stream","type");
  	    if(value != null)
  	     stream_type = value;

  	    value = getXMLAttribute("info","stream","class");
  	    if(value != null)
  	     stream_class = value;

  	    value = getXMLAttribute("info","stream","protocol");
  	    if(value != null)
  	     stream_protocol = value;

  	    value = getXMLAttribute("info","stream","server");
  	    if(value != null)
  	     stream_soft = value;

        stream_status_url = "";

  	    value = getXMLAttribute("info","stream","server_url");
  	    if(value != null)
  	    {
  	     stream_server_url = value;
  	     if((stream_soft == "icecast" || stream_soft == "shoutcast") &amp;&amp; stream_server_url!="")
  	     {
    	      stream_status_url = translate_base_url+"status,"+urlEncode(stream_server_url)+","+urlEncode(stream_url);
    	   }
  	    }

        value = getXMLText("info","status","stream-title");
  	    if(value != null)
  	     stream_title = value;

        stream_current_song = "";
  	    value = getXMLText("info","status","current-song");
  	    if(value != null)
    		  stream_current_song = value;

  	    value = getXMLText("info","status","stream-genre");
  	    if(value != null)
  	      stream_genre = value;

  	    value = getXMLText("info","status","stream-bitrate");
  	    if(value != null)
  	      stream_bitrate = value;

        options = "";

        if(stream_type != "")
          options = "Content-type:"+stream_type;

        if(options == "")
          options = stream_options;
        else
          options = options + ";" + stream_options;

  	    stream_translate_url = translate_base_url + "stream," + options + "," + urlEncode(stream_url);

  	    url = null;

  	    if(stream_class == "video" || stream_class == "audio")
    	  {
          if(stream_protocol == "file" || (stream_protocol == "http" &amp;&amp; stream_soft != "shoutcast"))
    	      url = stream_url;
    	    else
    	      url = stream_translate_url;
    	  }
    	  else
    	  {
  	      url = stream_url;
    	  }

    	  if(url != null)
    	  {
          if(stream_class == "audio" || stream_class == "video" || stream_class == "playlist" || stream_class == "rss")
          {
            executeScript(stream_class+"Dispatcher");
          }
          else
          {
            error_info = "Unsupported media type: " + stream_type;
          }
  	    }
  	    else
  	    {
          error_info = "Empty stream url!";
  	    }
      }
    }
    else
    {
      error_info = "CGI translate module failed!";
    }
    print("error_info=",error_info);
  </unknownDispatcher>
<channel>
	<title>Posturi din Romania</title>
	<menu>main menu</menu>
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$l="http://tastez.ro/radio.php";
$l="http://www.tastez.ro/radio.php?query=national";
$h=file_get_contents($l);
$videos = explode('class="line">', $h);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
  $title=str_between($video,'<b>','</b>');
  preg_match('/([http|https][\.\d\w\-\.\/\\\:\?\&\#\%\_\,]*(\.mp3|\.m3u))/', $video, $m);
  $link=$m[1];
  echo '
  <item>
  <title>'.$title.'</title>
  <stream_url>'.$link.'</stream_url>
  <annotation>'.$title.'</annotation>
  <stream_class>audio</stream_class>
  </item>
  ';
}
?>

</channel>
</rss>
