#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="cineplex.to";
$host = "http://127.0.0.1/cgi-bin";
$cookie="/tmp/royale.txt";
exec ("rm -f /tmp/royale.txt");
//$cookie="D://m.txt";
$pop="/usr/local/etc/dvdplayer/royale.txt";

if (file_exists($pop) && !file_exists($cookie) && file_exists($f)) {
$l="https://".$server."/";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.' --save-cookies '.$cookie.' -O - -U "'.$ua.'" --no-check-certificate "'.$l.'"';
$exec = $exec_path.$exec;
$response=shell_exec($exec);

  $handle = fopen($pop, "r");
  $c = fread($handle, filesize($pop));
  fclose($handle);
  $a=explode("|",$c);
  $a1=str_replace("?","@",$a[0]);
  $user=$a1;
  //$user=str_replace("@","%40",$user);
  $pass=trim($a[1]);

  //echo $post;
  $l="https://".$server."/session/userlogin";
  $post="username=".$user."&password=".$pass."&remember=1";
  $head=array('Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2','Accept-Encoding: gzip, deflate','Content-Type: application/x-www-form-urlencoded','Content-Length: '.strlen($post));

$head='Content-Length: '.strlen($post);
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -S --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' --header="Content-Type: application/x-www-form-urlencoded" --header="'.$head.'" --post-data='."'".$post."'".' -O - -U "'.$ua.'" --no-check-certificate "'.$l.'"';
$exec = '-q -S --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' --post-data='."'".$post."'".' -O - -U "'.$ua.'" --no-check-certificate "'.$l.'"';

//echo $exec;
//die();
$exec = $exec_path.$exec;
$response=shell_exec($exec);
}
$l="https://".$server."/movies";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.' -O - -U "'.$ua.'" --no-check-certificate "'.$l.'"';
$exec = $exec_path.$exec;
$h1=shell_exec($exec);
  $t1=explode('token_key="',$h1);
  $t2=explode('"',$t1[1]);
  $token=$t2[0];
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
    2=Re-Logon,1=modificare server cineplex.to (xxx.yyy),3=logout
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Server actual cineplex: <?php echo $server; ?>
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
  url="<?php echo $host;?>/scripts/filme/php/cineplex_serv.php?serv=" + keyword;
  dummy=geturl(url);
}
"true";
}
else if (userInput == "three" || userInput == "3")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_del.php");
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
	    <script>"<?php echo $host."/scripts/filme/php/cineplex.php?page=1,search,".$token.",";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
	

	
	<logon>
	<link>
	<script>
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/cineplex.rss";
	url;
	</script>
	</link>
	</logon>
<channel>
	<title>cineplex</title>
	<menu>main menu</menu>

<item>
  <title>Căutare film</title>
  <onClick>
        keyword = getInput("Input", "doModal");
		if (keyword != null)
		 {
	       jumpToLink("searchLink");
		  }
   </onClick>
</item>


<?php
  $title="Filme favorite";
  $link = $host."/scripts/filme/php/cineplex_fav.php?token=".$token;
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';
echo '
	<item>
	<title>Recente</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex.php?page=1,release,'.$token.',,Recente</link>
	<mediaDisplay name="threePartsView"/>
	</item>
';
  $t1=explode('dropdown genre-filter">',$h1);
  $t2=explode('</ul',$t1[1]);
  $videos = explode('input id="', $t2[0]);
  unset($videos[0]);
  $videos = array_values($videos);
  foreach($videos as $video) {
    $t1=explode('value="',$video);
    $t2=explode('"',$t1[1]);
    $gen=$t2[0];
    $t3=explode('>',$t1[1]);
    $t4=explode('<',$t3[2]);
    $title=$t4[0];
echo '
	<item>
	<title>'.$title.'</title>
	<link>http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex.php?page=1,release,'.$token.','.$gen.','.urlencode($title).'</link>
	<mediaDisplay name="threePartsView"/>
	</item>
';
}
?>

</channel>
</rss>
