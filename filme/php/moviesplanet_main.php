#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$host = "http://127.0.0.1/cgi-bin";
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
  	<text align="left" offsetXPC="8" offsetYPC="3" widthPC="47" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2=Re-Logon
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>print(titlu); titlu;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
		image/movies.png
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
else if (userInput == "two" || userInput == "2")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_del.php");
 jumptolink("logon");
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
	
	<logon>
	<link>
	<script>
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/moviesplanet.rss";
	url;
	</script>
	</link>
	</logon>
<channel>
	<title>moviesplanet</title>
	<menu>main menu</menu>

<?php
$cookie="/tmp/moviesplanet.txt";
exec ("rm -f /tmp/moviesplanet.txt");
//$cookie="D://m.txt";
$pop="/usr/local/etc/dvdplayer/moviesplanet.txt";
//$pop="D://moviesplanet.txt";
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
$l="https://www.moviesplanet.tv/";
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$h=shell_exec($exec);
//echo $h;
  $link1=$host."/scripts/filme/php/moviesplanet.php?page=1,release,https://www.moviesplanet.tv/movies,Recent"; //page=1,release,".urlencode($link).",".urlencode($title);
  $title="Recent";
	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
$h1=str_between($h,'GENRE MOVIES',"</ul");
$videos = explode('<li>', $h1);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode('<a href="',$video);
  $t2=explode('"',$t1[1]);
  $link=$t2[0];
  if (strpos($link,"http") === false) $link="https://www.moviesplanet.tv".$link;
  $t1=explode('">',$video);
  $t2=explode('</a>',$t1[1]);
  $title=$t2[0];
  $link1=$host."/scripts/filme/php/moviesplanet.php?page=1,release,".urlencode($link).",".urlencode($title);

	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
}
}
?>

</channel>
</rss>
