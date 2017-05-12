#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = $queryArr[1];
   $pageToken= $queryArr[2];
   $playlistID=$queryArr[3];
   $tit=urldecode($queryArr[4]);
}

$key="AIzaSyDhpkA0op8Cyb_Yu1yQa1_aPSr7YtMacYU";
if (!$playlistID) {
if (substr($search, 0, 2) <> "UC") {
$l1="https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=".$search."&key=".$key;
} else {
$l1="https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=".$search."&key=".$key;
}
//echo $l1;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $p=json_decode($html,1);
  //print_r ($p);
  $playlistID=$p["items"][0]["contentDetails"]["relatedPlaylists"]["uploads"];
}
//echo $playlistID;
//die();
//$playlistID="UUCUnAfa_A5XR5NyoPgErmlg";
if ($pageToken)
$l2="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=25&pageToken=".$pageToken."&playlistId=".$playlistID."&key=".$key;
else
$l2="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=25&playlistId=".$playlistID."&key=".$key;
//echo $l2;
//$l2="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=25&Id=UC3q-m4TWRvexD_tjltFeJzg&key=AIzaSyDhpkA0op8Cyb_Yu1yQa1_aPSr7YtMacYU";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l2);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $p=json_decode($html,1);
  //print_r ($p);
  $nextpage=$p["nextPageToken"];
  $prevPageToken=$p["prevPageToken"];
?>
<rss version="2.0">
<script>
	setRefreshTime(-1);
	enablenextplay = 0;
	itemCount = getPageInfo("itemCount");
</script>
<onExit>
setRefreshTime(-1);
</onExit>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
	if ( Integer( 1 + getFocusItemIndex() ) != getPageInfo("itemCount") && enablenextplay == 1 && playvideo == getFocusItemIndex()) {
		ItemFocus = getFocusItemIndex();
		setFocusItemIndex( Integer( 1 + getFocusItemIndex() ) );
		redrawDisplay();
		setRefreshTime(-1);
		"true";
	}

	if ( enablenextplay == 1 ) {
		enablenextplay = 0;
		url=getItemInfo(getFocusItemIndex(),"paurl");
		movie=getUrl(url);
		playItemUrl(movie,10);

		if ( Integer( 1 + getFocusItemIndex() ) == getPageInfo("itemCount") ) {
			enablenextplay = 0;
			setRefreshTime(-1);
		} else {
			playvideo = getFocusItemIndex();
			setRefreshTime(4000);
			enablenextplay = 1;
		}
	} else {
		setRefreshTime(-1);
		redrawDisplay();
		"true";
	}
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
	itemWidthPC="45"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="45"
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="100" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Apasati 2 pentru download, 3 pentru download manager
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<text align="left" redraw="yes"
          lines="8" fontSize=17
		      offsetXPC=55 offsetYPC=58 widthPC=40 heightPC=38
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="58" offsetYPC="52" widthPC="40" heightPC="5" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(pub); pub;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(titlu); titlu;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=25>
  <script>print(img); img;</script>
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
                      img = getItemInfo(idx,"image");
					  annotation = getItemInfo(idx, "annotation");
					  durata = getItemInfo(idx, "durata");
					  pub = getItemInfo(idx, "pub");
					  titlu = getItemInfo(idx, "title");
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
else if( userInput == "two")
	{
        movie=getItemInfo(getFocusItemIndex(),"download");
        movie1=getUrl(movie);
        topUrl = "http://127.0.0.1/cgi-bin/scripts/util/download.cgi?link=" + movie1 + ";name=" + getItemInfo(getFocusItemIndex(),"name");
		dlok = loadXMLFile(topUrl);
		"true";
	}
else if (userInput == "three" || userInput == "3")
   {
    jumpToLink("destination");
    "true";
}
else if (userInput == "video_play" || userInput == "play") {
					showIdle();
					playvideo = getFocusItemIndex();
					url=getItemInfo(getFocusItemIndex(),"paurl");
					movie=getUrl(url);
					playItemUrl(movie,10);

					if( Integer(1+getFocusItemIndex()) == getPageInfo("itemCount") ) {
						enablenextplay = 0;
						setRefreshTime(-1);
					} else {
						setRefreshTime(4000);
						enablenextplay = 1;
					}
					cancelIdle();
					ret = "true";
}
else if (userInput == "video_ffwd" || userInput == "ffwd") {
					showIdle();
					enablenextplay = 0;
					setRefreshTime(-1);
					cancelIdle();
					redrawDisplay();
					ret = "true";
}
else if (userInput == "display" || userInput == "DISPLAY")
{
ret="false";
}
else
{
 enablenextplay = 0;
 setRefreshTime(-1);
 ret = "false";
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
<destination>
	<link>http://127.0.0.1/cgi-bin/scripts/util/level.php
	</link>
</destination>
<?php
include ("../common.php");
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
  function sec2hms ($sec, $padHours = false)
  {
    $hms = "";
    $hours = intval(intval($sec) / 3600);
    $hms .= ($padHours)
          ? str_pad($hours, 2, "0", STR_PAD_LEFT). ":"
          : $hours. ":";
    $minutes = intval(($sec / 60) % 60);
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ":";
    $seconds = intval($sec % 60);
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
    return $hms;
  }


/*
http://gdata.youtube.com/feeds/api/users/nba/uploads?&start-index=1&max-results=25&v=2
*/
if(!$page) {
    $page = 1;
}
if ($tit) {
echo '
	<channel>
		<title>Uploads by '.str_replace("&","&amp;",str_replace("&amp;","&",$tit)).'</title>
		<menu>main menu</menu>
		';
 } else {
 echo '
	<channel>
		<title>Uploads by '.str_replace("&","&amp;",str_replace("&amp;","&",$search)).'</title>
		<menu>main menu</menu>
		';
 }
if($page > 1) { ?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page-1).",";
if($search) { 
  $url = $url.$search.",".$prevPageToken.",".$playlistID;
}
?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<durata></durata>
<pub></pub>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php
for ($k=0;$k<25;$k++) {
	//$id = str_between($video,"<id>http://gdata.youtube.com/feeds/api/videos/","</id>");
    $id=$p["items"][$k]["snippet"]["resourceId"]["videoId"];
	$title = $p["items"][$k]["snippet"]["title"];
	$image = $p["items"][$k]["snippet"]["thumbnails"]["medium"]["url"];
	$image=str_replace("https","http",$image);
	$link = "http://www.youtube.com/watch?v=".$id;
	$durata="";
	$data= $p["items"][$k]["snippet"]["publishedAt"];
	$descriere= $p["items"][$k]["snippet"]["description"];
	$link1= "http://127.0.0.1/cgi-bin/scripts/util/youtube.cgi?stream,,".urlencode($link);
    $link="http://127.0.0.1/cgi-bin/scripts/util/yt.php?file=".$link;
	$name = preg_replace('/[^A-Za-z0-9_]/','_',$title).".mp4";
	$title=diacritice($title);
	$descriere=diacritice($descriere);
	
	if ($title) {
    echo '
    <item>
    <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$link.'";
    movie=getUrl(url);
    cancelIdle();
    storagePath = getStoragePath("tmp");
    storagePath_stream = storagePath + "stream.dat";
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, video/mp4);
    streamArray = pushBackStringArray(streamArray, "'.str_replace('"',"'",$title).'");
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    </script>
    </onClick>
    <download>'.$link.'</download>
    <paurl>'.$link.'</paurl>
    <name>'.$name.'</name>
    <annotation>'.$descriere.'</annotation>
    <image>'.$image.'</image>
    <durata>'.$durata.'</durata>
    <pub>'.$data.'</pub>
    <media:thumbnail url="'.$image.'" />
    </item>
    ';
    }
}
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page+1).",";
if($search) { 
  $url = $url.$search.",".$nextpage.",".$playlistID;
}
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<durata></durata>
<pub></pub>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>

</channel>
</rss>
