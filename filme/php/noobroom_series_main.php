#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
error_reporting(0);
$ff="/tmp/n.txt";
$cookie="/tmp/noobroom.txt";
$noob_cookie="/usr/local/etc/dvdplayer/noob_cookie.dat";
/*
if (file_exists($noob_cookie) && !file_exists($cookie)) {
exec ("cp -f /usr/local/etc/dvdplayer/noob_cookie.dat  /tmp/noobroom.txt");
sleep(1);
}
*/
$noob="http://superchillin.com";
$fh = fopen($ff, 'w');
fwrite($fh, $noob);
fclose($fh);
include ("../../common.php");
$cookie="/tmp/noobroom.txt";
$filename="/usr/local/etc/dvdplayer/amigo.dat";
$noob_log="/usr/local/etc/dvdplayer/noob_log.dat";
if (file_exists($noob_log) && !file_exists($cookie)) {
  $handle = fopen($noob_log, "r");
  $c = fread($handle, filesize($noob_log));
  fclose($handle);
  $a=explode("|",$c);
  $a1=str_replace("?","@",$a[0]);
  $user=urlencode($a1);
  $user=str_replace("@","%40",$user);
  $pass=trim($a[1]);
  $post="email=".$user."&password=".$pass."&x=40&y=19&echo=echo";
}
if (file_exists($filename) && !file_exists($cookie) && !file_exists($noob_log)) {
  $pass=file_get_contents($filename);
  $lp="http://hddlinks.p.ht/n_a.php?pass=".$pass;
  $lp="http://hddlinks.pht.ro/n_a.php?pass=".$pass;
  $lp="http://hdforall.freehostia.com/n_am.php?pass=".$pass;
  $lp="http://uphero.xpresso.eu/srt/n_am.php?pass=".$pass;
  //echo $lp;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $lp);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $post1 = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $noob."/");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $noob."/login.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  sleep (1);
  if ($post1) {
    $fh = fopen($cookie, 'a');
    fwrite($fh, $post1);
    fclose($fh);
    $amigo="DA";
    sleep(1);
  }
}
//die();
if ($post) {
  $lp=$check."s2=".urlencode($post);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $lp);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_exec($ch);
  curl_close($ch);
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $noob."/");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $noob."/login.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/");
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
//$post=$post."&recaptcha_challenge_field=03AHJ_VuuzO2g9g6IILiu2pyaterQVaBodP0EWtwOldqTajuz63nzeDsaRg_Cs617aTY_EFwWGEk2bScrak5VqgddT8mf7dDaAeq8FNQn3dyIIkeC0dZ68412_e0mDZAJCEw4MqZdXsEfZzskKSIiOIELzpZ_y6RaE4115uzZh6FLgC0PCEzdvDjGooksZbaBe4ZrTwBd4-EifnGifYL4ti-J8WSsLGj5gNnmeWRRfUIzxN1J_tYdorC9V_3IpZSavvdnozYWIC_-40UWWn6hYaLBF6Nt_VJvUw8HlUwyukVy78gUk1OrVss4&recaptcha_response_field=1002";

  $l=$noob."/login2.php";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/login.php");
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);

}
/*
if (!file_exists($noob_cookie) && file_exists($cookie)) {
sleep(1);
exec ("cp -f /tmp/noobroom.txt /usr/local/etc/dvdplayer/noob_cookie.dat");
}
*/
$l=$noob."/series.php";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/login.php");
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  $status = str_between($html,'premium.php">','</');
  $status = str_replace("<","&lt;",$status);
  /*
  $t1=explode('premium.php',$html);
  $t2=explode(">",$t1[1]);
  $t3=explode("<",$t2[1]);
  $status=$t3[0]; //Active
  */
  if (strpos($status,"day") === false)
    $premium="";
  else
    $premium="Premium: ".$status;
if (!preg_match("/[0-9]/",$status)) $premium="Premium: Inactiv";
$noob_serv="/tmp/noob_serv.log";
if (!file_exists($noob_serv)) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $noob."/index.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, $noob."/login.php");
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
  $h=str_between($h,"Select a stream","</div");
  $out="";
  $videos = explode('href=', $h);
  unset($videos[0]);
  $videos = array_values($videos);
  foreach($videos as $video) {
    $t1=explode("s=",$video);
    $t2=explode("'",$t1[1]);
    $serv=$t2[0];
    $t1=explode(">",$video);
    $t2=explode("<",$t1[1]);
    $name_serv=$t2[0];
    $out=$out.$name_serv."\n".$serv."\n";
  }
$fh = fopen($noob_serv, 'w');
fwrite($fh, $out);
fclose($fh);
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
    2=Re-Logon, 7=Logout,4/6= jump -+100, right for more...
		</text>
  	<text align="right" offsetXPC="55" offsetYPC="3" widthPC="40" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>"<?php echo $premium; ?>" + sprintf("%s "," ");</script>
		</text>
  	<text redraw="yes" offsetXPC="75" offsetYPC="12" widthPC="20" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="30" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    1=favorite
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=30 widthPC=30 heightPC=50>
  <script>print(img); img;</script>
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
					  annotation = getItemInfo(idx, "annotation");
					  img = getItemInfo(idx, "image");
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
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/noob_del.php");
 jumptolink("logon");
 "true";
}
else if (userInput == "one" || userInput == "1")
{
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_s_add.php?mod=add*" + getItemInfo(getFocusItemIndex(),"link1") + "*" + getItemInfo(getFocusItemIndex(),"title1");
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "seven" || userInput == "7")
{
 showIdle();
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/noob_del1.php");
 cancelIdle();
 redrawDisplay();
 "true";
}
else if(userInput == "six" || userInput == "6")
{
    idx = Integer(getFocusItemIndex());
    idx -= -100;
    if(idx &gt;= itemCount)
    idx = itemCount-1;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
else if(userInput == "four" || userInput == "4")
{
    idx = Integer(getFocusItemIndex());
    idx -= 100;
    if(idx &lt; 0)
      idx = 0;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
	redrawDisplay();
  "true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=series" + movie;
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
		<mediaDisplay  name="threePartsView" idleImageWidthPC="10" idleImageHeightPC="10">
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
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/noobroom.rss";
	url;
	</script>
	</link>
	</logon>
<channel>
	<title>Noobroom - seriale</title>
	<menu>main menu</menu>


<?php
//echo $l;
//echo $post;
if (!file_exists("/usr/local/etc/dvdplayer/amigo.dat")) {
echo '
<item>
<title>Amigo COD</title>
<onClick>
<script>
optionsPath="/usr/local/etc/dvdplayer/amigo.dat";
pass = readStringFromFile(optionsPath);
if (pass == null)
{
 keyword = getInput();
 if (keyword != null)
 {
  url1="http://127.0.0.1/cgi-bin/scripts/filme/php/amigo.php?pass=" + keyword;
  msg=getUrl(url1);
  if (msg=="ok")
  {
   writeStringToFile(optionsPath, keyword);
  }
 }
}
 </script>
</onClick>
 </item>
 ';
}
if (strpos($status,"day") === false && !file_exists($cookie)) {
$link = "/usr/local/etc/www/cgi-bin/scripts/filme/php/noobroom.rss";

	  echo '
	  <item>
	  <title>Logare</title>
	  <link>'.$link.'</link>
	  <mediaDisplay name="onePartView" />
	  </item>
	  ';
}
  $title="Seriale favorite";
  $link = $host."/scripts/filme/php/noobroom_s_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';
$query = $_GET["query"];
if ($query=="a") {
  $title="Ultimele seriale adaugate";
  $link = $host."/scripts/filme/php/noobroom_series_main.php?query=l";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';
$videos = explode('<table>', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1 = explode("href='", $video);
  $t2 = explode("'", $t1[1]);
  $link =$noob.$t2[0];
  $link1=$t2[0];
  
  
  $t3 = explode('>', $t1[2]);
  $t2 = explode('<', $t3[1]);
  $title = trim($t2[0]);
  $title=str_replace("&amp;","&",$title);
  $title=str_replace("&","&amp;",$title);
  $title=str_replace("\'","'",$title);
  $t1=explode("src='",$video);
  $t2=explode("'",$t1[1]);
  if (strpos($t2[0],"http")=== false)
    $img=$noob."/".$t2[0];
  else
    $img=$t2[0];
  $img=str_replace("https","http",$img);
  if (strpos($link,"episodes") !==false) $arr[]=array($title, $link1,$img);
}
if ($arr) {
asort($arr);
foreach ($arr as $key => $val) {
 $title=$arr[$key][0];
 $link1=$arr[$key][1];
 $img=$arr[$key][2];
 $link=$noob.$link1;
   $link=$host."/scripts/filme/php/noobroom_series.php?query=".urlencode($link).",".urlencode(str_replace(",","^",$title));
   echo '
    <item>
    <title>'.$title.'</title>
    <link>'.$link.'</link>
    <link1>'.urlencode($link1).'</link1>
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <movie>'.urlencode(str_replace(",","^",$title)).'</movie>
  	<annotation>'.$title.'</annotation>
  	<image>'.$img.'</image>
    <mediaDisplay name="threePartsView"/>
    </item>
   ';

}
}
} else {
$videos = explode('<table>', $html);
unset($videos[0]);
//$videos = array_values($videos);
$videos = array_reverse($videos);
foreach($videos as $video) {
  $t1 = explode("href='", $video);
  $t2 = explode("'", $t1[1]);
  $link =$noob.$t2[0];
  $link1=$t2[0];


  $t3 = explode('>', $t1[2]);
  $t2 = explode('<', $t3[1]);
  $title = trim($t2[0]);
  $title=str_replace("&amp;","&",$title);
  $title=str_replace("&","&amp;",$title);
  $title=str_replace("\'","'",$title);
  $t1=explode("src='",$video);
  $t2=explode("'",$t1[1]);
  if (strpos($t2[0],"http")=== false)
    $img=$noob."/".$t2[0];
  else
    $img=$t2[0];
  $img=str_replace("https","http",$img);
  if (strpos($link,"episodes") !==false) {
   $link=$noob.$link1;
   $link=$host."/scripts/filme/php/noobroom_series.php?query=".urlencode($link).",".urlencode($title);
   echo '
    <item>
    <title>'.$title.'</title>
    <link>'.$link.'</link>
    <link1>'.urlencode($link1).'</link1>
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <movie>'.urlencode(str_replace(",","^",$title)).'</movie>
  	<annotation>'.$title.'</annotation>
  	<image>'.$img.'</image>
    <mediaDisplay name="threePartsView"/>
    </item>
   ';
  }
}
}
?>

</channel>
</rss>
