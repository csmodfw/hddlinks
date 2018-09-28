#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$host = "http://127.0.0.1/cgi-bin";
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="streamroyale.com";
$cookie="/tmp/royale.txt";
//exec ("rm -f /tmp/royale.txt");
//$cookie="D://m.txt";
$pop="/usr/local/etc/dvdplayer/royale.txt";

if (file_exists($pop) && !file_exists($cookie) && file_exists($f)) {

  $handle = fopen($pop, "r");
  $c = fread($handle, filesize($pop));
  fclose($handle);
  $a=explode("|",$c);
  $a1=str_replace("?","@",$a[0]);
  $user=$a1;
  //$user=str_replace("@","%40",$user);
  $pass=trim($a[1]);

  $l="https://".$server."/api/v1/user/login";
  $post='{"user":"'.$user.'","password":"'.$pass.'"}';
  //echo $post;

  $head=array('Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2','Accept-Encoding: gzip, deflate','Content-Type: application/json','Content-Length: '.strlen($post));
/*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
*/
$head='Content-Length: '.strlen($post);
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -S --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' --header="Content-Type: application/json" --header="'.$head.'" --post-data='."'".$post."'".' -O - -U "'.$ua.'" --no-check-certificate "'.$l.'"';
//echo $exec;
//die();
$exec = $exec_path.$exec;
$response=shell_exec($exec);
}
//echo file_get_contents("/tmp/royale.txt");
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
  	<text align="left" offsetXPC="8" offsetYPC="3" widthPC="80" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2=Re-Logon,1=modificare server streamroyale.com (xxx.yyy),3=logout
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Server actual streamroyale: <?php echo $server; ?>
		</text>
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
else if (userInput == "two" || userInput == "2")
{
 jumptolink("logon");
 "true";
}
else if (userInput == "one" || userInput == "1")
{
keyword = getInput("Input", "doModal");
if (keyword != null) {
  url="<?php echo $host;?>/scripts/filme/php/royale_serv.php?serv=" + keyword;
  dummy=geturl(url);
}
"true";
}
else if (userInput == "three" || userInput == "3")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/royale_del.php");
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
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/royales.php?page=1,search,";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
	<searchLink1>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/royale_a.php?tip=series,";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink1>
	<logon>
	<link>
	<script>
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/royale.rss";
	url;
	</script>
	</link>
	</logon>
<channel>
	<title>streamroyale</title>
	<menu>main menu</menu>

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
<item>
  <title>Căutare seriale in care joaca...</title>
  <onClick>
        keyword = getInput("Input", "doModal");
		if (keyword != null)
		 {
	       jumpToLink("searchLink1");
		  }
   </onClick>
</item>
<?php
  $title="Seriale favorite";
  $link = $host."/scripts/filme/php/royales_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';
  $title="MyList";
  $link = $host."/scripts/filme/php/royale_list.php?tip=series";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';

?>

	<item>
	<title>Trending</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,trending,all,Trending</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Popularity</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,popularity,all,Popularity</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Recently Added</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,all,Recently+Added</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Rating</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,score,all,Rating</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Release Date</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,release_date,all,Release+Date</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Drama</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,drama,Drama</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Comedy</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,comedy,Comedy</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Thriller</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,thriller,Thriller</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Action</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,action,Action</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Crime</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,crime,Crime</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Adventure</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,adventure,Adventure</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Romance</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,romance,Romance</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Horror</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,horror,Horror</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Sci-Fi</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,sci-fi,Sci-Fi</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Fantasy</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,fantasy,Fantasy</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Mystery</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,mystery,Mystery</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Family</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,family,Family</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Animation</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,animation,Animation</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Biography</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,biography,Biography</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>History</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,history,History</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Music</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,music,Music</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>War</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,war,War</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Documentary</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,documentary,Documentary</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Sport</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,sport,Sport</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Western</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,western,Western</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Musical</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,musical,Musical</link>
	<mediaDisplay name="threePartsView"/>
	</item>

	<item>
	<title>Foreign</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/royales.php?page=1,release,added_on,foreign,Foreign</link>
	<mediaDisplay name="threePartsView"/>
	</item>

</channel>
</rss>
