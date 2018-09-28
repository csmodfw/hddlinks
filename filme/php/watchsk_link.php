#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
//file=http%3A%2F%2Fputlocker.is%2Fwatch-perfect-strangers-tvshow-season-1-episode-1-online-free-putlocker.html,Perfect+Strangers+Season+1+Episode+1+-+Knock+Knock%2C+Who%27s+There%3F,Perfect+Strangers,,series,http%3A%2F%2Fimage4.putlocker.is%2Fimages%2Fcovers%2Fperfect-strangers-tvshow-online-free-putlocker.jpg
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = urldecode($queryArr[0]);
   $title=urldecode($queryArr[1]);
   $title=str_replace("^",",",$title);
   $title=str_replace("\\","",$title);
   $title=str_replace("&amp;","&",$title);
   $id1= $queryArr[2];
   $id_t= $queryArr[3];
   $tip=$queryArr[4];
   $image= urldecode($queryArr[5]);
}
if ($tip == "series") {
   //$t1=explode("|",$title);
   //$title= $t1[0]." ".$t1[1];
   $serial=$id1;
  //preg_match("/Season\s*(\d+)\s*Episode\s*(\d+)/",$title,$m);
  //print_r ($m);
  //$season=$m[1];
  //$episod=$m[2];
} else {
  $serial=$id1;
}
$year="";
?>
<rss version="2.0">
<onEnter>
  storagePath             = getStoragePath("tmp");
  storagePath_stream      = storagePath + "stream.dat";
  storagePath_playlist    = storagePath + "playlist.dat";
  startitem = "middle";
  setRefreshTime(1);
  first_time=1;
</onEnter>
 <onExit>
 setRefreshTime(-1);
 </onExit>
<onRefresh>
  if(first_time == 1)
  {
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
  first_time=0;
  }
  else if (do_down == 1)
  {
  rss = readStringFromFile(log_file);
  count = 0;
  while(1)
   {
     l= getStringArrayAt(rss,count);
     count += 1;
     if(l == null)
      {
      titlu = getStringArrayAt(rss,count-3);
       break;
      }
   }
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="80" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
      0 (blue/red/green/yellow) folositi alta subtitrare
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
         <script>print(image); image;</script>
		</image>

  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="10" backgroundColor="10:105:150" foregroundColor="100:200:255">
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
					  image = getItemInfo(idx, "image");
					  an =  getItemInfo(idx, "an");
					  annotation1 = getItemInfo(idx, "annotation");
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
  ret="true";
}
else if (userInput == "zero" || userInput == "0" || userInput == "option_blue")
   {
  t = getItemInfo(getFocusItemIndex(),"tit1");
  l = getItemInfo(getFocusItemIndex(),"movie1");
  id=getItemInfo(getFocusItemIndex(),"serial");
  hhd=getItemInfo(getFocusItemIndex(),"imdb");
  idt=getItemInfo(getFocusItemIndex(),"idt");
  tip=getItemInfo(getFocusItemIndex(),"tip");
    movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + id + "," + idt + "," + hhd + "," + tip;
    dummy = getURL(movie_info);
    jumpToLink("fs");
    "true";
}
else if (userInput == "option_red")
   {
  t = getItemInfo(getFocusItemIndex(),"tit1");
  l = getItemInfo(getFocusItemIndex(),"movie1");
  id=getItemInfo(getFocusItemIndex(),"serial");
  hhd=getItemInfo(getFocusItemIndex(),"imdb");
  idt=getItemInfo(getFocusItemIndex(),"idt");
  tip=getItemInfo(getFocusItemIndex(),"tip");
    movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + id + "," + idt + "," + hhd + "," + tip;
    dummy = getURL(movie_info);
    jumpToLink("fs1");
    "true";
}
else if (userInput == "option_green")
   {
  t = getItemInfo(getFocusItemIndex(),"tit1");
  l = getItemInfo(getFocusItemIndex(),"movie1");
  id=getItemInfo(getFocusItemIndex(),"serial");
  hhd=getItemInfo(getFocusItemIndex(),"imdb");
  idt=getItemInfo(getFocusItemIndex(),"idt");
  tip=getItemInfo(getFocusItemIndex(),"tip");
    movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + id + "," + idt + "," + hhd + "," + tip;
    dummy = getURL(movie_info);
    jumpToLink("fs2");
    "true";
}
else if (userInput == "option_yellow")
   {
  t = getItemInfo(getFocusItemIndex(),"tit1");
  l = getItemInfo(getFocusItemIndex(),"movie1");
  id=getItemInfo(getFocusItemIndex(),"serial");
  hhd=getItemInfo(getFocusItemIndex(),"imdb");
  idt=getItemInfo(getFocusItemIndex(),"idt");
  tip=getItemInfo(getFocusItemIndex(),"tip");
    movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + id + "," + idt + "," + hhd + "," + tip;
    dummy = getURL(movie_info);
    jumpToLink("fs3");
    "true";
}
else if(userInput == "four" || userInput == "4")
{
showIdle();
l = getItemInfo(getFocusItemIndex(),"movie1");
url="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=" + l;
annotation=geturl(url);
cancelIdle();
  redrawDisplay();
  ret="true";
}
else
{
annotation = "";
redrawDisplay();
ret="false";
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
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs3.php</link>
</fs>
<fs1>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_main.php?query=1,watchsk</link>
</fs1>
<fs2>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subs_main.php?query=1,watchsk</link>
</fs2>
<fs3>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subtitrari_main.php?query=1,watchsk</link>
</fs3>
<channel>
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$title)); ?></title>
	<menu>main menu</menu>


<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

    if (!function_exists('json_last_error_msg')) {
        function json_last_error_msg() {
            static $ERRORS = array(
                JSON_ERROR_NONE => 'No error',
                JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
                JSON_ERROR_STATE_MISMATCH => 'State mismatch (invalid or malformed JSON)',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
                JSON_ERROR_SYNTAX => 'Syntax error',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
            );

            //$error = json_last_error();
            $error='No error';
            return isset($ERRORS[$error]) ? $ERRORS[$error] : 'Unknown error';
        }
    }
/*
$requestLink="http://vumoo.at/videos/play/".$link;
require_once 'httpProxyClass.php';
require_once 'cloudflareClass.php';

$httpProxy   = new httpProxy();
$httpProxyUA = 'proxyFactory';
//http://vumoo.at/videos/search/?search=star&page=2

$requestPage = json_decode($httpProxy->performRequest($requestLink));
//echo $requestLink;
// if page is protected by cloudflare
if($requestPage->status->http_code == 503) {
	// Make this the same user agent you use for other cURL requests in your app
	cloudflare::useUserAgent($httpProxyUA);

	// attempt to get clearance cookie
	if($clearanceCookie = cloudflare::bypass($requestLink)) {
		// use clearance cookie to bypass page
		$requestPage = $httpProxy->performRequest($requestLink, 'GET', null, array(
			'cookies' => $clearanceCookie
		));
		// return real page content for site
		$requestPage = json_decode($requestPage);
		//echo $requestPage->content;
		$html = $requestPage->content;
	} else {
		// could not fetch clearance cookie
        $html="";
	}
}
*/
//echo $link;
//$link="http://www.watchfree.to/tv-1028-Prison-Break-tv-show-online-free-putlocker.html/season-5-episode-1";
//$link="http://www.watchfree.to/tv-1028-Prison-Break-tv-show-online-free-putlocker.html/season-1-episode-1#close-modal";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://watchseries.sk");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  $html = curl_exec($ch);
  //echo $html;
  $imdb="";
  $t1=explode('data-src="',$html);
  $t2=explode('"',$t1[1]);
  $openload=trim($t2[0]);
  $siteParts = parse_url($openload);
  $server=$siteParts['host'];
   if ($openload && $server) {
     echo '
     <item>
     <title>'.$server.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file='.urlencode($openload).'";
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
    <image>'.$image.'</image>
    <tit>'.trim($title).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <an>'.$year.'</an>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <tip>'.$tip.'</tip>
    <movie>'.trim($openload).'</movie>
    <serial>'.urlencode($serial).'</serial>
    <movie1>'.urlencode(trim($openload)).'</movie1>
    <imdb>'.$imdb.'</imdb>
    <annotation>'.$server.'</annotation>
     </item>
     ';
   }
$html=str_between($html,"<tbody>","</tbody>");
 $videos = explode('<tr>', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  //$t1=explode('href="',$video);
  $t2=explode('href="',$video);
  $t3=explode('"',$t2[1]);
  $openload=trim($t3[0]);
  $server = str_between($video,"<td>","</");
  $server=trim(str_replace("-","",$server));
  //if (!$server) $server = str_between($openload,"https://","/");
   if ($openload && $server) {
     echo '
     <item>
     <title>'.$server.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file='.urlencode($openload).'";
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
    <image>'.$image.'</image>
    <tit>'.trim($title).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <an>'.$year.'</an>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <tip>'.$tip.'</tip>
    <movie>'.trim($openload).'</movie>
    <serial>'.urlencode($serial).'</serial>
    <movie1>'.urlencode(trim($openload)).'</movie1>
    <imdb>'.$imdb.'</imdb>
    <annotation>'.$server.'</annotation>
     </item>
     ';
   }

}
//http://sit2play.com/movies/901259-My-Love,-My-Bride
//url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
//echo "http://192.168.0.25/cgi-bin/scripts/filme/php/movietv_add.php?mod=add,".urlencode($link1).",".urlencode($title).",".urlencode($image).",".urlencode($year).",".urlencode($id1);
?>



</channel>
</rss>
