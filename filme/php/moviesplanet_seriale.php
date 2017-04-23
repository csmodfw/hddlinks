#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = $queryArr[1];
}
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
	sliding="no"
	idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>
		
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2= adauga la favorite ,3= re-logon,right for more
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
         <script>print(image); image;</script>
		</image>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx) 
					{
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "title");
					  image = getItemInfo(idx,"image1");
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
else if (userInput == "two" || userInput == "2")
{
movie=getItemInfo(getFocusItemIndex(),"link1");
img=getItemInfo(getFocusItemIndex(),"image");
tit=getItemInfo(getFocusItemIndex(),"title1");
year=getItemInfo(getFocusItemIndex(),"title1");
id=getItemInfo(getFocusItemIndex(),"title1");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_add.php?mod=add," + movie + "," + tit + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "three" || userInput == "3")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_del.php");
 jumptolink("logon");
 "true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"link1");
tit=getItemInfo(getFocusItemIndex(),"title1");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_det.php?file=" + movie + "," + tit;
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

	<logon>
	<link>
	<script>
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/moviesplanet.rss";
	url;
	</script>
	</link>
	</logon>
<channel>
	<title>moviesplanet - seriale</title>
	<menu>main menu</menu>
<?php
//$query = $_GET["query"];

if($page > 1) { ?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page-1).",";
if($search) {
  $url = $url.$search;
}
?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioară</annotation>
<image1>image/left.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>


<?php } ?>

<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
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
//http://www.moviesplanet.is/tv-shows/date/3
//http://www.moviesplanet.is/tv-shows/date/2

if ($page == 1) {
  $title="Lista serialelor favorite";
  $link = $host."/scripts/filme/php/moviesplanet_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';

}

$host = "http://127.0.0.1/cgi-bin";
$pop="/usr/local/etc/dvdplayer/moviesplanet.txt";
//echo $l;
//$html = file_get_contents("http://uphero.xpresso.eu/movietv/m1.php?file=".$l."&res=".$res);
$cookie="/tmp/moviesplanet.txt";
if ($page == 1) {
exec ("rm -f /tmp/moviesplanet.txt");
//$cookie="D://m.txt";

if (!file_exists($pop)) {
  $title="Trebuie sa aveti cont!";
	echo '
	<item>
	<title>'.$title.'</title>
	<link></link>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
} else {
  $handle = fopen($pop, "r");
  $c = fread($handle, filesize($pop));
  fclose($handle);
  $a=explode("|",$c);
  $a1=str_replace("?","@",$a[0]);
  $user=urlencode($a1);
  $user=str_replace("@","%40",$user);
  $pass=trim($a[1]);
	function getPageCookie($cookie, $property){
		// if property exists in cookie
		if(strpos($cookie, $property) !== false){
			// get cookie property and value
			$property = str_replace("{$property}=", "|{$property}=", $cookie);
			$property = substr($property, strpos($property, '|')    + 1);
			$property = substr($property, 0, strpos($property, ';') + 1);
			// return value stored inside cookie property
			return $property;
		}
		return false;
	}
	function getSiteHost($siteLink) {
		// parse url and get different components
		$siteParts = parse_url($siteLink);
		// extract full host components and return host
		return $siteParts['scheme'].'://'.$siteParts['host'];
	}
	function getInputValue($response, $value) {
		// get value of input with name of $value
		$cfParam = substr($response, strpos($response, $value));
		// store value
		//$cfParam = substr($cfParam, strpos($cfParam, 'value="') + mb_strlen('value="', 'utf8'));
		$cfParam = substr($cfParam, strpos($cfParam, 'value="') + strlen('value="'));
		$cfParam = substr($cfParam, 0, strpos($cfParam, '"'));
		// return value
		return $cfParam;
	}
	function extractPageHeadersContent($pageResponse) {
		// headers we should follow
		$headersToFollow = array('HTTP/1.1 100');
		// get page contents...
		$delimiterRegex = '/([\r\n][\r\n])\\1/';
		$delimiterRegex = '/</';
		$pageDataArray  = preg_split($delimiterRegex, $pageResponse, 2);
		//print_r ($pageDataArray);
		// get http code portion out of page headers
		$pageHeaders = substr($pageDataArray[0], 0, 12);
		// simulate page redirect for as long as the page redirects
		if(in_array($pageHeaders, $headersToFollow)) {
			$pageDataArray = extractPageHeadersContent($pageDataArray[1]);
		}
		return $pageDataArray;
	}
	function solveJavaScriptChallenge($siteLink, $response){
		// sleep 4 seconds to mimic waiting process
		sleep(4);
		// get values from js verification code and pass code inputs
		$jschl_vc = getInputValue($response, 'jschl_vc');
		$pass     = getInputValue($response, 'pass');
		// extract javascript challenge code from CloudFlare script
		//$siteLen = mb_strlen(substr($siteLink, strpos($siteLink,'/')+2), 'utf8');
		$siteLen = strlen(substr($siteLink, strpos($siteLink,'/')+2));
		$script  = substr($response, strpos($response, 'var s,t,o,p,b,r,e,a,k,i,n,g,f,') + strlen('var s,t,o,p,b,r,e,a,k,i,n,g,f,'));
		$varname = trim(substr($script, 0, strpos($script, '=')));
		$script  = substr($script, strpos($script, $varname));
		// removing form submission event
		$script  = substr($script, 0, strpos($script, 'f.submit()'));
		// structuring javascript code for PHP conversion
		$script  = str_replace(array('t.length', 'a.value'), array($siteLen, '$answer'), $script);
		$script  = str_replace(array("\n", " "), "", $script);
		$script  = str_replace(array(";;", ";"), array(";", ";\n"), $script);
		// convert challenge code variables to PHP variables
		$script  = preg_replace("/[^answe]\b(a|f|t|r)\b(.innerhtml)?=.*?;/i", '', $script);
		$script  = preg_replace("/(\w+).(\w+)(\W+)=(\W+);/i", '$$1_$2$3=$4;', $script);
		$script  = preg_replace("/(parseInt)?\((\w+).(\w+),.*?\)/", 'intval($$2_$3)', $script);
		$script  = preg_replace("/(\w+)={\"(\w+)\":(\W+)};/i", '$$1_$2=$3;', $script);
		// convert javascript array matrix in equations to binary which PHP can understand
		$script  = str_replace(array("!![]", "!+[]"), 1, $script);
		$script  = str_replace(array("![]", "[]"), 0, $script);
		$script  = str_replace(array(")+", ").$siteLen"), array(").", ")+$siteLen"), $script);
		// take out any source of javascript comment code - #JS Comment Fix
		$script  = preg_replace("/'[^']+'/", "", $script);
		// evaluate PHP script
		eval($script);
		// if cloudflare answer has been found, store it
		if(is_numeric($answer)) {
			// return verification values
			return array(
				'jschl_vc'      => $jschl_vc,
				'pass'          => str_replace('+', '%2', $pass),
				'jschl_answer'  => $answer
			);
		}
		return false;
	}
function getPage($url, $referer) {
  $cookie="/tmp/moviesplanet.txt";
  $ua="proxyFactory";
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  $exec = '--content-on-error -q -S --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$referer.'" --no-check-certificate "'.$url.'" -O - 2>&1';
  $exec = $exec_path.$exec;
  $response=shell_exec($exec);
  //echo $response;
  list($pageHeaders, $pageContents) = extractPageHeadersContent($response);
        		return array(
        			'headers' => $pageHeaders,
        			'content' => $pageContents
        		);
}
	function bypassCloudFlare($siteNetLoc) {
		// request anti-bot page again with referrer as site hostname
		//echo "bypassCloudFlare"."<BR>";
		$cfBypassAttempts=0;
		$ddosPage = getPage($siteNetLoc, $siteNetLoc);
		// cloudflare user id
		$cfUserId = getPageCookie($ddosPage['headers'], '__cfduid');
		// solve javascript challenge in ddos protection page
		//echo $siteNetLoc."<BR>";
		if($cfAnswerParams = solveJavaScriptChallenge($siteNetLoc, $ddosPage['content'])) {
			// construct clearance link
			$cfClearanceLink = $siteNetLoc.'/cdn-cgi/l/chk_jschl?'.http_build_query($cfAnswerParams);
			// attempt to get cloudflare clearance cookie
			$cfClearanceResp = getPage($cfClearanceLink, $siteNetLoc);
			if(!$cfClearanceCookie = getPageCookie($cfClearanceResp['headers'], 'cf_clearance')) {
				// if we haven't exceeded the max attempts
				if($cfBypassAttempts < 5) {
					// re-attempt to get the clearance cookie
					$cfBypassAttempts++;
					$cfClearanceCookie = bypassCloudFlare($siteNetLoc);
				}
			}
		}
	}
$link="https://www.moviesplanet.tv";
$siteNetLoc = getSiteHost($link);
bypassCloudFlare($siteNetLoc);

$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$l="https://www.moviesplanet.tv/login";
$post="returnpath=%2F&username=".$user."&password=".$pass;
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' --header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$response=shell_exec($exec);
}
}
if (file_exists($pop)) {
if($page > 1) {
  $l =$search."/date/".$page;
} else {
	$page = 1;
  $l=$search;
}
//$l =$search."/date/".$page;
//echo $l;
$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$videos = explode('class="ml-item"', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $title=str_between($video,'class="mli-info"><h2>','</h2');
  if (!$title) {
    $t1=explode('id="title"',$video);
    $t2=explode('title="',$t1[1]);
    $t3=explode('"',$t2[1]);
    $title=$t3[0];
  }

  //$image=str_between($video,'timthumb.php?src=','"');
  $link1= str_between($video,'href="','"');
  if (!$title) {
    $t1=explode("show/",$link1);
    $title=$t1[1];
  }
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('timthumb.php?src=', $video);
  $t2 = explode('&', $t1[1]);
  $image = $t2[0];
  $image1="http://127.0.0.1/cgi-bin/scripts/filme/php/r_m.php?file=".$image.",".$clearanceCookie;
  //$image1=$image;
	if($link1!="") {
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/fs.php?query=".$link.",".urlencode($title).",movie";
		$link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_s.php?file='.$link1.','.urlencode(str_replace(",","^",$title));
		echo'
		<item>
		<title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
		<link>'.$link.'</link>
	  <annotation>'.$title.'</annotation>
	  <image>'.$image.'</image>
	  <image1>'.$image1.'</image1>
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <link1>'.urlencode($link1).'</link1>
	  <media:thumbnail url="image/movies.png" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
	}
	//}
}
}
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page+1).",";
if($search) {
  $url = $url.$search;
}
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina următoare</annotation>
<image1>image/right.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>
</channel>
</rss>
