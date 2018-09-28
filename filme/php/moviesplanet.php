#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["page"];
//page=1,release,".urlencode($link).",".urlencode($title);
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   if ($tip == "search") {
   $link = urldecode($queryArr[2]);
   $page_title="Cautare: ".urldecode($queryArr[2]);
   } else {
   $link = urldecode($queryArr[2]);
   $page_title=urldecode($queryArr[3]);
   }
   //if ($tip=="search" || $tip=="actor") $page_title="Cauta:".$link;
   $link=str_replace(" ","+",$link);
   $link=str_replace("+","%20",$link);

}

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
      1=fav, right for more, 0 (blue/red/green/yellow) = folositi alta subtitrare
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
         <script>print(image); image;</script>
		</image>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(titlu); titlu;</script>
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
					  image = getItemInfo(idx, "image1");
					  an =  getItemInfo(idx, "an");
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
  ret="true";
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
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"link1");
tit=getItemInfo(getFocusItemIndex(),"imdb");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_det.php?file=movie," + movie + "," + tit;
dummy = getURL(movie_info);
cancelIdle();
ret_val=doModalRss("/usr/local/etc/www/cgi-bin/scripts/filme/php/movie_detail.rss");
ret="true";
}
else if (userInput == "zero" || userInput == "0" || userInput == "option_blue")
   {
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + "0" + "," + "0" + "," + i + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs");
    "true";
}
else if (userInput == "option_red")
{
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + "0" + "," + "0" + "," + i + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs1");
    "true";
}
else if (userInput == "option_green")
{
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + "0" + "," + "0" + "," + i + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs2");
    "true";
}
else if (userInput == "option_yellow")
{
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + "0" + "," + "0" + "," + i + ",movie";
  dummy = getURL(movie_info);

    jumpToLink("fs3");
    "true";
}
else if (userInput == "one" || userInput == "1")
{
 showIdle();
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  img = getItemInfo(getFocusItemIndex(),"image1");
  url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_f_add.php?mod=add," + l + "," + t + "," + i;
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
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
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs4.php</link>
</fs>
<fs1>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_main.php?query=1,planet</link>
</fs1>
<fs2>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subs_main.php?query=1,planet</link>
</fs2>
<fs3>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subtitrari_main.php?query=1,planet</link>
</fs3>
<channel>
	<title><?php echo $page_title; ?></title>
	<menu>main menu</menu>


<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
/*
$cloud="/tmp/cloud.dat";
if (!file_exists($cloud)) {
require_once 'httpProxyClass.php';
require_once 'cloudflareClass.php';
$httpProxy   = new httpProxy();
$httpProxyUA = 'proxyFactory';
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
$requestLink="http://www.moviesplanet.tv/thumbs/show_tt3230854.jpg";
cloudflare::useUserAgent($httpProxyUA);
$clearanceCookie = cloudflare::bypass($requestLink);
file_put_contents($cloud,$clearanceCookie);
} else {
 $clearanceCookie=file_get_contents($cloud);
}
*/
$clearanceCookie="";
if($page > 1) { ?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($page_title);

?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<image1>image/left.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php


/////////////////////////////////////////////////////////////
/*
require_once 'httpProxyClass.php';
require_once 'cloudflareClass.php';

$httpProxy   = new httpProxy();
$httpProxyUA = 'proxyFactory';
//http://vumoo.at/videos/search/?search=star&page=2
if ($tip=="search")
   $requestLink = "http://vumoo.at/videos/search/?search=".str_replace(" ","+",$link)."&page=".$page;
else
   $requestLink = "http://vumoo.at/videos/category/".str_replace(" ","%20",$link)."/?page=".$page."";
//echo $requestLink;
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
//echo $html;
//http://www.moviesplanet.is/movies/date/1

//$l="http://www.moviesplanet.is/".str_replace(" ","%20",$link)."/date/".$page."";

//$l="http://www.moviesplanet.is/movies/date/1";
//echo $l;
$cookie="/tmp/moviesplanet.txt";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
if ($tip=="release") {
$l=str_replace(" ","%20",$link)."/date/".$page."";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
//echo $exec;
$html=shell_exec($exec);
//echo $html;
$videos = explode('<div class="ml-item"', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $title1=str_between($video,'class="mli-info"><h2>','</h2');
  $image=str_between($video,'src="','"');;
  $link1= str_between($video,'href="','"');
  
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('timthumb.php?src=', $video);
  $t2 = explode('&', $t1[1]);
  $image = $t2[0];
  $t1=explode('data-jtip="',$video);
  $t2=explode('"',$t1[1]);
  //echo $t2[0];
  if (preg_match("/(tt\d+)/",$t2[0],$m))
     $imdb=$m[1];
  else
     $imdb="";
  $image="http://127.0.0.1/cgi-bin/scripts/filme/php/r_m.php?file=".$image;
  //$image="image/movies.png";
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
   if ($title1) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title1)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file='.$link1.'";
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
    streamArray = pushBackStringArray(streamArray, "'.$title1.'");
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
    <title1>'.urlencode(str_replace(",","^",$title1)).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <movie>'.$link1.'</movie>
    <image1>'.$image1.'</image1>
    <imdb>'.$imdb.'</imdb>
     </item>
     ';
   }
}
} else {
//$search1=str_replace(" ","+",$search);
$post="q=".str_replace(" ","+",$link)."&limit=100&timestamp=1234567890&verifiedCheck=";
$l="https://www.moviesplanet.tv/ajax/search.php";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' --header="Accept-Encoding: deflate" --header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$response=shell_exec($exec);
$r=json_decode($response,1);
//print_r ($r);
$c=count($r);
for ($k=0;$k<$c;$k++) {
  $title1=$r[$k]["title"];
  $image=$r[$k]["image"];
  $link1= $r[$k]["permalink"];
  $meta=$r[$k]["meta"];

  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  if (preg_match("/(tt\d+)\.jpg/",$image,$m))
     $imdb=$m[1];
  else
     $imdb="";
  $image="http://127.0.0.1/cgi-bin/scripts/filme/php/r_m.php?file=".$image;
  //$image="image/movies.png";
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
   if (strpos($meta,"Movie") !==false) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title1)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_link.php?file='.$link1.'";
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
    streamArray = pushBackStringArray(streamArray, "'.$title1.'");
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
    <title1>'.urlencode(str_replace(",","^",$title1)).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <movie>'.$link1.'</movie>
    <image1>'.$image1.'</image1>
    <imdb>'.$imdb.'</imdb>
     </item>
     ';
   }
}
}
//http://sit2play.com/movies/901259-My-Love,-My-Bride
//url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
//echo "http://192.168.0.25/cgi-bin/scripts/filme/php/movietv_add.php?mod=add,".urlencode($link1).",".urlencode($title).",".urlencode($image).",".urlencode($year).",".urlencode($id1);
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($page_title);
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<image1>image/right.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
