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
   $page_title="Cautare: ".urldecode($queryArr[3]);
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
      1=adauga la favorite, right for more
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
else if (userInput == "one" || userInput == "1")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
img=getItemInfo(getFocusItemIndex(),"image");
tit=getItemInfo(getFocusItemIndex(),"tit");
year=getItemInfo(getFocusItemIndex(),"an");
id=getItemInfo(getFocusItemIndex(),"id");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/putlocker_s_add.php?mod=add," + urlEncode(movie) + "," + tit + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
tit=getItemInfo(getFocusItemIndex(),"tit");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/putlocker_f_det.php?file=" + movie+ "," + tit;
dummy = getURL(movie_info);
cancelIdle();
ret_val=doModalRss("/usr/local/etc/www/cgi-bin/scripts/filme/php/movie_detail.rss");
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
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/putlocker_s.php?page=1,search,";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
<fs>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs1.php</link>
</fs>
<channel>
	<title><?php echo $page_title; ?></title>
	<menu>main menu</menu>


<?php
if ($page==1) {
echo '
<item>
  <title>Căutare serial</title>
  <onClick>
        keyword = getInput("Input", "doModal");
		if (keyword != null)
		 {
	       jumpToLink("searchLink");
		  }
   </onClick>
</item>
';
  $title="Seriale favorite";
  $link1 = $host."/scripts/filme/php/putlocker_s_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link1.'</link>
  <image></image>
  </item>
  ';
}
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
//http://putlocker.is/tv
//http://putlocker.is/search/search.php?q=star%20trek&sort=views&page=1
//http://www.gowatchfreemovies.to/?keyword=andromeda&search_section=1
if ($tip=="search")
   $requestLink = "http://www.gowatchfreemovies.to/?keyword=".str_replace(" ","+",$link)."&search_section=2&page=".$page;
else
   $requestLink = "http://www.gowatchfreemovies.to/?tv=&page=".$page."";
//http://www.watchfree.to/?keyword=star+trek&search_section=2&page=2
//http://www.watchfree.to/?tv=&page=2
//$cookie="D:/";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://www.watchfree.to");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  $html = curl_exec($ch);
  curl_close($ch);
//preg_match_all("/http.*\"(.*)title=\"(.*)\"/",$html,$m);
//print_r ($m);
 $videos = explode('class="item">', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1 = explode('href="',$video);
  $t2 = explode('"', $t1[1]);
  $link1 = "http://www.gowatchfreemovies.to".$t2[0];

  $t1 = explode('title="', $video);
  $t2 = explode('"', $t1[1]);
  $title11 = $t2[0];
  $title11=trim(preg_replace("/Watch|Putlocker/i","",$title11));
  $id1="";
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('src="', $video);
  $t2 = explode('"', $t1[1]);
  $image = $t2[0];
  $image="http:".str_replace("https","http",$image);
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
  $title=$title11; //." (".$year.")";
  //$id_t=$id1;
  $id_t="";
   $link2=$host."/scripts/filme/php/putlocker_s_ep.php?file=".urlencode($link1).",".urlencode(str_replace(",","^",$title)).",".$id1.",".$id_t.",series,".urlencode($image);
   if ($title) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$link2.'</link>
    <image>'.$image.'</image>
    <image1>'.$image1.'</image1>
    <tit>'.urlencode(trim(str_replace(",","^",$title))).'</tit>
    <tit1>'.urlencode(trim($title)).'</tit1>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <movie>'.trim($link1).'</movie>
    <movie1>'.urlencode(trim($link1)).'</movie1>
    <mediaDisplay name="threePartsView"/>
     </item>
     ';
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
