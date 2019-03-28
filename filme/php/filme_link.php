#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
include ("../../common.php");
error_reporting(0);
function decode_entities($text) {
    $text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
    $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
    $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
    return $text;
}
//if (file_exists("D:\\Adobe"))
  $filelink = $_GET["file"];

$t1=explode(",",$filelink);
$filelink = urldecode($t1[0]);
$filelink = str_replace("*",",",$filelink);
$filelink = str_replace("@","&",$filelink); //seriale.subtitrate.info
//echo $filelink;
$pg = urldecode($t1[1]);
$pg=str_replace("^",",",$pg);
$pg=fix_s($pg);
if ($pg == "") {
   $pg_title = "Link";
} else {
  $pg_title = $pg;
  $pg = preg_replace('/[^A-Za-z0-9_]/','_',$pg);
}
$titledownload=$pg;
$onlinemoca=$t1[2];
//play movie
if (file_exists("/tmp/usbmounts/sda1/download")) {
   $dir = "/tmp/usbmounts/sda1/download/";
   $dir_log = "/tmp/usbmounts/sda1/download/log/";
} elseif (file_exists("/tmp/usbmounts/sdb1/download")) {
   $dir = "/tmp/usbmounts/sdb1/download/";
   $dir_log = "/tmp/usbmounts/sdb1/download/log/";
} elseif (file_exists("/tmp/usbmounts/sdc1/download")) {
   $dir = "/tmp/usbmounts/sdc1/download/";
   $dir_log = "/tmp/usbmounts/sdc1/download/log/";
} elseif (file_exists("/tmp/usbmounts/sda2/download")) {
   $dir = "/tmp/usbmounts/sda2/download/";
   $dir_log = "/tmp/usbmounts/sda2/download/log/";
} elseif (file_exists("/tmp/usbmounts/sdb2/download")) {
   $dir = "/tmp/usbmounts/sdb2/download/";
   $dir_log = "/tmp/usbmounts/sdb2/download/log/";
} elseif (file_exists("/tmp/usbmounts/sdc2/download")) {
   $dir = "/tmp/usbmounts/sdc2/download/";
   $dir = "/tmp/usbmounts/sdc2/download/log/";
} elseif (file_exists("/tmp/hdd/volumes/HDD1/download")) {
   $dir = "/tmp/hdd/volumes/HDD1/download/";
   $dir_log = "/tmp/hdd/root/log/";
} else {
     $dir = "";
     $dir_log = "";
}
// end
?>
<?php echo "<?xml version='1.0' ?>"; ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<onEnter>
    storagePath             = getStoragePath("tmp");
    storagePath_stream      = storagePath + "stream.dat";
    storagePath_playlist    = storagePath + "playlist.dat";
    info_serial="";
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
    topUrl = "http://127.0.0.1/cgi-bin/scripts/util/info_down.php?file=" + log_file + ",f";
    info_serial = getUrl(topUrl);
  }
</onRefresh>
<mediaDisplay name="threePartsView"
	itemBackgroundColor="0:0:0"
	backgroundColor="0:0:0"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"
	sideColorRight="0:0:0"
	itemImageXPC="5"
	itemXPC="20"
	itemYPC="20"
	itemWidthPC="70"
	capWidthPC="70"
	unFocusFontColor="101:101:101"
	focusFontColor="255:255:255"
	showHeader="no"
	showDefaultInfo="yes"
	bottomYPC="90"
	infoYPC="100"
	infoXPC="0"
	popupXPC = "40"
  popupYPC = "55"
  popupWidthPC = "22.3"
  popupHeightPC = "5.5"
  popupFontSize = "13"
	popupBorderColor="28:35:51"
	popupForegroundColor="255:255:255"
 	popupBackgroundColor="28:35:51"
  idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>
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
					  img = getItemInfo(idx,"image");
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
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="18" fontSize="24" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="3" widthPC="10" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text align="left" offsetXPC="8" offsetYPC="3" widthPC="47" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    5=Setare subtitrare
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="100" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Apăsaţi 1 pentru Download Manager, 2 pentru download, 3 pentru vizionare download, 4 verificare link
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>print(info_serial); info_serial;</script>
		</text>
<onUserInput>
userInput = currentUserInput();
ret = "false";
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
else if(userInput == "two" || userInput == "2")
{
tip=getItemInfo(getFocusItemIndex(),"tip");
showIdle();
if (tip == "1")
{
url =  getItemInfo(getFocusItemIndex(),"download");
movie=getUrl(url);
info_serial="link:" + movie;
topUrl = "http://127.0.0.1/cgi-bin/scripts/util/download.cgi?link=" + movie + ";name=" + getItemInfo(getFocusItemIndex(),"name");
}
else if (tip == "2")
{
topUrl = "http://127.0.0.1/cgi-bin/scripts/util/download.cgi?link=" + getItemInfo(getFocusItemIndex(),"download") + ";name=" + getItemInfo(getFocusItemIndex(),"name");
}
dummy = getUrl(topUrl);
cancelIdle();
do_down=1;
file_name= getItemInfo(getFocusItemIndex(),"title");
log_file="<?php echo $dir_log; ?>" + getItemInfo(getFocusItemIndex(),"name") + ".log";
setRefreshTime(10000);
ret="true";
}
else if (userInput == "three" || userInput == "3")
{
 url="<?php echo $dir; ?>" + getItemInfo(getFocusItemIndex(),"name");
 playItemurl(url,10);
 ret="true";
}
else if(userInput == "zero" || userInput == "0")
{
showIdle();
topUrl = "http://127.0.0.1/cgi-bin/scripts/filme/php/pair.php";
info_serial=getUrl(topUrl);
cancelIdle();
redrawdisplay();
ret="true";
}
else if(userInput == "four" || userInput == "4")
{
showIdle();
url =  getItemInfo(getFocusItemIndex(),"download");
info_serial="link:" + url;
redrawdisplay();
tip=getItemInfo(getFocusItemIndex(),"tip");
if (tip == "1")
{
movie=getUrl(url);
info_serial="movie:" + movie;
}
cancelIdle();
redrawdisplay();
ret="true";
}
else if(userInput == "six" || userInput == "6")
{
showIdle();
url =  "http://127.0.0.1/cgi-bin/scripts/speed.php";
movie=getUrl(url);
info_serial=movie;
cancelIdle();
redrawdisplay();
ret="true";
}
else if (userInput == "one" || userInput == "1")
{
jumpToLink("destination");
ret="true";
}
else if (userInput == "five" || userInput == "5")
   {
    jumpToLink("sub");
    ret="true";
}
else
{
info_serial="";
setRefreshTime(-1);
do_down=0;
ret="false";
}
ret;
</onUserInput>
</mediaDisplay>
<captcha>
<link>
<script>
 url="/usr/local/etc/www/cgi-bin/scripts/filme/php/captcha.rss";
 url;
</script>
</link>
</captcha>
<destination>
	<link>http://127.0.0.1/cgi-bin/scripts/util/level.php
	</link>
</destination>
<?php
  $f = "/usr/local/bin/home_menu";
if (!file_exists($f)) {
echo '
<sub>
<link>/usr/local/etc/www/cgi-bin/scripts/util/sub.rss</link>
<mediaDisplay name="onePartView"/>
</sub>
';
} else {
echo '
<sub>
<link>/usr/local/etc/www/cgi-bin/scripts/util/sub1.rss</link>
<mediaDisplay name="onePartView"/>
</sub>
';
}
?>
<channel>
<?php
echo "<title>".$pg_title."</title>"
;
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
/**####################################**/
/** Here we start.......**/
$last_link = "";
if (strpos($filelink,"filmeserialeonline.org") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$filelink);
  //curl_setopt ($ch, CURLOPT_POST, 1);
  //curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER, true);
  $h2 = curl_exec($ch);
  curl_close ($ch);
  $id=str_between($h2,'post_id":"','"');
if (preg_match("/id:\s+(\d+)/",$h2,$m)){
$id=$m[1];
}
  if (strpos($h2,"grifus/includes") !== false) {
    //$id=str_between($h2,'data: {id: ','}');
    $l="http://www.filmeserialeonline.org/wp-content/themes/grifus/includes/single/second.php";
  } else {
    $id=str_between($h2,'data: {id: ','}');
    //$l="http://www.filmeserialeonline.org/wp-content/themes/grifus/loop/second.php";
    $l="http://www.filmeserialeonline.org/wp-content/themes/grifus/loop/second.php";
  }
  //$l="http://www.filmeserialeonline.org/wp-content/themes/grifus/includes/single/second.php";
  $post="id=".$id;
  $post="id=".$id."&logat=1";
  //echo $post;
  $cookie="Cookie: _ga=GA1.2.226532075.1472192307; _gat=1; GoogleCaptcha=c07edfad41d0f118e5d44ec9a725f017";
  $headers = array('Accept: text/html, */*; q=0.01',
   'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
   'Accept-Encoding: deflate',
   'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
   'X-Requested-With: XMLHttpRequest',
   'Cookie: _ga=GA1.2.226532075.1472192307; _gat=1; GoogleCaptcha=c07edfad41d0f118e5d44ec9a725f017'
  );
  //GoogleCaptcha:"c438a6f21f56c99d9bcfbf6a43bb5325"
  if (file_exists($base_pass."/usr/local/etc/dvdplayer/filmeseriale.txt"))
    $captcha=trim(file_get_contents("/usr/local/etc/dvdplayer/filmeseriale.txt"));
  else
   $captcha="1c438a6f21f56c99d9bcfbf6a43bb5325";
  $headers = array('Accept: text/html, */*; q=0.01',
   'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
   'Accept-Encoding: deflate',
   'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
   'X-Requested-With: XMLHttpRequest',
   'Cookie: _popfired=1; _gat=1; GoogleCaptcha='.$captcha.'; _gat=1;'
  );
  //print_r ($headers);
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$filelink);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_HEADER, true);
  $html = curl_exec($ch);
  curl_close ($ch);
} elseif (strpos($filelink,"desenefaine.ro") !== false) {
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
  $vid=str_between($h,'embed.php?vid=','"');
  $l="https://desenefaine.ro/embed.php?vid=".$vid;
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
} elseif (strpos($filelink,"serialenoi.online") !== false || strpos($filelink,"tvhub.org") !== false) {
require_once("JavaScriptUnpacker.php");
$ua = $_SERVER['HTTP_USER_AGENT'];
$cookie="/tmp/cloud.dat";
      $exec = '-q --content-on-error -U "'.$ua.'" --load-cookies  '.$cookie.' --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h2=shell_exec($exec);

$l="https://serialenoi.online/wp-content/themes/serialenoi/field-ajax.php";
$post="post_id=".$id;

  $id=str_between($h2,'data-id="','"');
$l="https://tvhub.ro/wp-content/themes/serialenoi/field-ajax.php";
$l="https://tvhub.org/wp-content/themes/grifus/loop/field-ajax.php";
$l="https://tvhub.org/wp-content/themes/grifus/includes/single/field-ajax.php";
$l="https://tvhub.org/wp-content/themes/grifus/loop/field2-ajax.php";
  $t1=explode('eval(function(p,a,c,k,e,d)',$h2);
  $h2="eval(function(p,a,c,k,e,d)".$t1[count($t1)-1];
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($h2);

$post="post_id=".$id;
$t1=explode('url:"',$out);
$t2=explode('"',$t1[1]);
$l="https://tvhub.org".$t2[0];
//$l="https://tvhub.org/wp-content/themes/grifus/loop/field2-ajax.php";
      //$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '--content-on-error --header="Content-Type: application/x-www-form-urlencoded" --load-cookies  '.$cookie.' --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
  /*
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$l);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h2 = curl_exec($ch);
  curl_close ($ch);
  echo $h2;
  */
  /*
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h2=shell_exec($exec);
  $id=str_between($h2,'data-id="','"');
  */
  $headers = array('Accept: text/html, */*; q=0.01',
   'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
   'Accept-Encoding: deflate',
   'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
   'X-Requested-With: XMLHttpRequest',
   'Cookie: __cfduid=ddc582e2c7daf12a83891f3771e46e2f61497768509; tvhubro=5r29vo94tk1p6q16rbdl434sj5'
  );
  $l="https://serialenoi.online/wp-admin/admin-ajax.php?action=do_ajax&fn=get_iframe&id=".$id."&_=";
  //echo $l;
  /*
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$filelink);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_HEADER, true);
  $html = curl_exec($ch);
  curl_close ($ch);
  */
/*
  $head='Cookie: __cfduid=ddc582e2c7daf12a83891f3771e46e2f61497768509; tvhubro=5r29vo94tk1p6q16rbdl434sj5';
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '--header="Content-Type: application/x-www-form-urlencoded"  --header "'.$head.'"  -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
*/
  $html=str_replace("\\","",$html);
  //echo $html;
  //https://aqqgli3vle.bid/helper.wasm
} elseif (strpos($filelink,"filmeonline.biz") !== false) {
  $headers = array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
   'Accept-Encoding: deflate',
   'Accept-Language: en-US,en;q=0.5',
   'Cookie: __cfduid=ded1ed4adfb33449348ecf104a4aa875d1518878631; BPC=c03f55bd3b504cc3ebeaa3ed0fa71640'
  );
  $cookie="/tmp/biz.dat";
  $ua="Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0";
  $exec = '-q  --load-cookies  '.$cookie.' -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
  $html=shell_exec($exec);
}
elseif (strpos($filelink,"filmeseriale.online") !== false) {
//Cookie: noprpvdtzseogxcqwcnt=2; noprpvdtzseogxcqwexp=Wed, 11 Oct 2017 07:39:41 GMT; go_through=1
  $headers = array('Accept: text/html, */*; q=0.01',
   'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
   'Accept-Encoding: deflate',
   'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
   'X-Requested-With: XMLHttpRequest',
   'Cookie: noprpvdtzseogxcqwcnt=2; noprpvdtzseogxcqwexp=Wed, 11 Oct 2030 07:39:41 GMT; go_through=1'
  );
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$filelink);
  //curl_setopt ($ch, CURLOPT_POST, 1);
  //curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h2 = curl_exec($ch);
  curl_close ($ch);
  //echo $h2;
  //die();
  $html=$h2;
/*
  $t1=explode("id:",$h2);
  preg_match_all("/id:(\d+),server:(\d+)/",$h2,$m);
  //print_r ($m);
  $c=count ($m[0]);
  $html="";
  $l="https://filmeseriale.online/wp-content/themes/playnow/masthemes/descargas/source.php";
  for ($k=0;$k<$c;$k++) {
  $id=$m[1][$k];
  $serv=$m[2][$k];
  $post="id=".$id."&server=".$serv;
  //$post="id=37321&server=0";
  //echo $post;
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$filelink);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h3 = curl_exec($ch);
  curl_close ($ch);
  $html .=$h3;
}
*/
} elseif (strpos($filelink,"vezi-online") !== false) {
    //require_once("JavaScriptUnpacker.php");
   //$jsu = new JavaScriptUnpacker();
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html22=shell_exec($exec);
      $t1=explode('url: "../',$html22);
      $t2=explode('"',$t1[1]);
      $l="https://vezi-online.org/".$t2[0];
      $t1=explode("{id: ",$html22);
      $t2=explode("}",$t1[1]);
      $post="id=".trim($t2[0]);
      //echo $l;
      //echo $post;
      $head="Cookie: __cfduid=d226f4723cb35acbfa9b98f75f0ffb6a11497648892; vezi_online=1";
      $head="Cookie: __cfduid=ddf89307fd6a61a14f2449f34effb34361515078343";
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '--header="Content-Type: application/x-www-form-urlencoded"  --header "'.$head.'" --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html33=shell_exec($exec);
      //echo $html33;
      $html=$html33;
      //echo $html;
    /*
    $out="";
    $html="";
    $videos = explode('player-video">', $html33);
    unset($videos[0]);
    $videos = array_values($videos);
    foreach($videos as $video) {
      $t1=explode('url: "../',$video);
      $t2=explode('"',$t1[1]);
      $l="https://vezi-online.com/".$t2[0];
      $t1=explode("h='+'",$video);
      $t2=explode("'",$t1[1]);
      $post="h=".trim($t2[0]);
      //echo $html1;
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '--header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $out=shell_exec($exec);

      $html .=" ".$out;
      //echo $html;
    }
    */
} elseif (strpos($filelink,"f-hd.") !== false) {
$ua="proxyFactory";
$cookie="/tmp/cloud.dat";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$videos = explode('class="play_button', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
 $t1=explode('data-singleid="',$video);
 $t2=explode('"',$t1[1]);
 $id=$t2[0];
 $t1=explode('data-server="',$video);
 $t2=explode('"',$t1[1]);
 $s=$t2[0];
 $l="https://f-hd.biz/wp-admin/admin-ajax.php";
 $post="action=samara_video_lazyload&singleid=".$id."&server=".$s;
 $exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'" --post-data="'.$post.'" --referer="'.$filelink.'" --no-check-certificate "'.$l.'" -O -';
 $exec = $exec_path.$exec;
 $h=shell_exec($exec);
 $html .=$h;
}
  //$t1=explode("var vs =",$html);
  //$t2=explode("'",$t1[1]);
  //$html .=base64_decode($t2[1]);
} elseif (strpos($filelink,"voxfilmeonline.net") !== false) {
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$videos = explode('class="play_button', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
 $t1=explode('data-singleid="',$video);
 $t2=explode('"',$t1[1]);
 $id=$t2[0];
 $t1=explode('data-server="',$video);
 $t2=explode('"',$t1[1]);
 $s=$t2[0];
 $l="https://voxfilmeonline.net/wp-admin/admin-ajax.php";
 $post="action=samara_video_lazyload&singleid=".$id."&server=".$s;
 $exec = '-q -U "'.$ua.'" --post-data="'.$post.'" --referer="'.$filelink.'" --no-check-certificate "'.$l.'" -O -';
 $exec = $exec_path.$exec;
 $h=shell_exec($exec);
 $html .=$h;
}
  //$t1=explode("var vs =",$html);
  //$t2=explode("'",$t1[1]);
  //$html .=base64_decode($t2[1]);
} elseif (strpos($filelink,"filmeonline2016.biz") !== false) {
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,"http://www.filmeonline2016.biz/");
  //curl_setopt ($ch, CURLOPT_POST, 1);
  //curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_HEADER, true);
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close ($ch);
  //echo $html;
$videos = explode('atob("', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode('"',$video);
  //echo base64_decode($t1[0]);
  $h='"'.base64_decode($t1[0]).'" ';
 $html .=$h;
}
} elseif (strpos($filelink,"topfilmeonline.net") !== false) {
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$videos = explode('class="play_button', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
 $t1=explode('data-singleid="',$video);
 $t2=explode('"',$t1[1]);
 $id=$t2[0];
 $t1=explode('data-server="',$video);
 $t2=explode('"',$t1[1]);
 $s=$t2[0];
 $l="https://topfilmeonline.net/wp-admin/admin-ajax.php";
 $post="action=samara_video_lazyload&singleid=".$id."&server=".$s;
 $exec = '-q -U "'.$ua.'" --post-data="'.$post.'" --referer="'.$filelink.'" --no-check-certificate "'.$l.'" -O -';
 $exec = $exec_path.$exec;
 $h=shell_exec($exec);
 $html .=$h;
}
} elseif (strpos($filelink,"filmehd.net") !== false) {
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html1=shell_exec($exec);
//echo $html1;
$out="";
$videos = explode('data-src="', $html1);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode('"',$video);
  $l2="https://filmehd.net".$t1[0];
  //echo $l2;
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$l2.'" --no-check-certificate "'.$l2.'" -O -';
$exec = $exec_path.$exec;
$x=shell_exec($exec);
  //echo $x;
  $out .=$x;
}

  //echo $html1;
/*
  $i1=str_between($html1,"js_content.php","'");
  $filelink="http://filmehd.net/js_content.php".$i1;
  $html=file_get_contents($filelink);
  //echo $html;
  $jsu = new JavaScriptUnpacker();
  $out = $jsu->Unpack($html);
  //echo $out;
  $html .=" ".$out;
*/
  $html = $out;
} elseif (strpos($filelink,"pefilme") !== false) {
//set_time_limit(90);
//bypass cloudflare
$cookie="/tmp/base64.txt";
exec ("rm -f /tmp/base64.txt");
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
		$script = str_replace("f.action+=location.hash;","",$script);
		$script = str_replace("f.action += location.hash;","",$script);
		// evaluate PHP script
		//echo $script;
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
  $cookie="/tmp/base64.txt";
  //$cookie="D:/m.txt";
  $ua="proxyFactory";
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  //$exec_path = "D:/Temp/wget ";
  $exec = '--content-on-error -q -S --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$referer.'" --no-check-certificate "'.$url.'" -O - 2>&1';
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
		$ddosPage = getPage($siteNetLoc."/pefilme", $siteNetLoc);
		// cloudflare user id
		$cfUserId = getPageCookie($ddosPage['headers'], '__cfduid');
		// solve javascript challenge in ddos protection page
		//echo $siteNetLoc."<BR>";
		if($cfAnswerParams = solveJavaScriptChallenge($siteNetLoc, $ddosPage['content'])) {
			// construct clearance link
			$cfClearanceLink = "http://baza64.com".'/cdn-cgi/l/chk_jschl?'.http_build_query($cfAnswerParams);
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
$cookie="/tmp/base64.txt";

$l="http://baza64.com/pefilme";
//$siteNetLoc = getSiteHost($l);
//bypassCloudFlare($siteNetLoc);

   // require_once("JavaScriptUnpacker.php");
   //$jsu = new JavaScriptUnpacker();
/*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_REFERER, "https://pefilme.net/");
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,1);
  $html22 = curl_exec($ch);
  curl_close($ch);
*/

$ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$h=shell_exec($exec);
  $html="";
  $videos = explode('baza64.com/pefilme/', $h);
  unset($videos[0]);
  $videos = array_values($videos);
  //print_r ($videos);
  foreach($videos as $video) {
    $t1=explode('"',$video);
    $l=base64_decode($t1[0]);
    $t1=explode('atob("',$l);
    $t2=explode('"',$t1[1]);
    $html .=base64_decode($t2[0]).'" ';
  }
} elseif (strpos($filelink,"incestvidz.com") !== false) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $filelink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_REFERER, "https://xhamster.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  if (strpos($html,'wp-embedded-content') !== false) {
    $videos=explode('wp-embedded-content',$html);
    unset($videos[0]);
    $videos = array_values($videos);

    foreach($videos as $video) {
      $t1=explode('href="',$video);
      $t2=explode('"',$t1[1]);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $t2[0]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_REFERER, "https://xhamster.com");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html .= curl_exec($ch);
  curl_close($ch);
  }
  }
} elseif (strpos($filelink,"vezionline.org") !== false || strpos($filelink,"cinemahd.eu") !== false) {
$ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$html=urldecode(str_replace("@","%",$html));
} elseif (strpos($filelink,"veziseriale.online") !== false) {
  $headers = array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
   'Accept-Encoding: deflate',
   'Accept-Language: en-US,en;q=0.5',
   'Cookie: CAPTCHA=1; _popfired=2'
  );
  $ch = curl_init($filelink);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  //curl_setopt($ch,CURLOPT_REFERER,$l);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_HEADER, true);
  $html = curl_exec($ch);
  curl_close ($ch);
  //echo $html;
} elseif (strpos($filelink,"filme-seriale.gold") !== false) {
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$cookie="/tmp/gold.dat";
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  $exec = '-q --keep-session-cookies --load-cookies  '.$cookie.' -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
  $exec = $exec_path.$exec;
  $html=shell_exec($exec);
$html=urldecode(str_replace("@","%",$html));

} else {
$filelink=str_replace(" ","%20",$filelink);
$ua="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q -U "'.$ua.'" --referer="'.$filelink.'" --no-check-certificate "'.$filelink.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
  //echo $html;
}
if (strpos($filelink,"zfilmeonline.eu") !== false) {
$html=urldecode(str_replace("@","%",$html));
}
/**################ All links ################**/
if (preg_match("/roshare|rosharing/",$html)) {
$dat="/usr/local/etc/dvdplayer/roshare.dat";
if (!file_exists($dat)) {
  $l = "/usr/local/etc/www/cgi-bin/scripts/filme/php/roshare.rss";
	  echo '
	  <item>
	  <title>Logare roshare.info</title>
	  <link>'.$l.'</link>
	  <mediaDisplay name="onePartView" />
	  </item>
	  ';
}
}
//echo $html;
$html=str_replace("https","http",$html);
if(preg_match_all("/(\/\/.*?)(\"|\'|\s)+/si",$html,$matches)) {
$links=$matches[1];
//print_r ($links);
}
$s="/adf\.ly|vidxden\.c|divxden\.c|vidbux\.c|movreel\.c|videoweed\.(c|e)|novamov\.(c|e)|vk\.com|gounlimited\.to";
$s=$s."|movshare\.net|youtube\.com|youtube-nocookie\.com|flvz\.com|rapidmov\.net|putlocker\.com|mixturevideo\.com|played\.to|";
$s=$s."peteava\.ro\/embed|peteava\.ro\/id|content\.peteava\.ro|divxstage\.net|divxstage\.eu|thevideo\.me|grab\.php\?link1=";
$s=$s."|vimeo\.com|googleplayer\.swf|filebox\.ro\/get_video|vkontakte\.ru|megavideo\.com|videobam\.com|vidzi\.tv|estream\.to|briskfile\.com|playedto\.me";
$s=$s."|fastupload|video\.rol\.ro|zetshare\.net\/embed|ufliq\.com|stagero\.eu|ovfile\.com|videofox\.net|fastplay\.cc|watchers\.to|fastplay\.to";
$s=$s."|trilulilu|proplayer\/playlist-controller.php|viki\.com|modovideo\.com|roshare|rosharing|ishared\.eu|stagevu\.com|vidup\.me";
$s=$s."filebox\.com|glumbouploads\.com|uploadc\.com|sharefiles4u\.com|zixshare\.com|uploadboost\.com|hqq\.tv|hqq\.watch|vidtodo\.com|vshare\.eu|bit\.ly";
$s=$s."|nowvideo\.eu|nowvideo\.co|vreer\.com|180upload\.com|dailymotion\.com|nosvideo\.com|vidbull\.com|purevid\.com|videobam\.com|streamcloud\.eu|donevideo\.com|upafile\.com|docs\.google|mail\.ru|superweb|moviki\.ru|entervideos\.com";
$s=$s."|indavideo\.hu|redfly\.us|videa\.hu|videakid\.hu|mooshare\.biz|streamin\.to|kodik\.biz|videomega\.tv|ok\.ru|realvid\.net|up2stream\.com|openload\.co|allvid\.ch|oload\.tv|";
$s=$s."vidoza\.net|spankbang\.com|sexiz\.net|streamflv\.com|streamdefence\.com|veehd\.com|coo5shaine\.com|divxme\.com|movdivx\.com|thevideobee\.to|speedvid\.net|streamango\.com|streamplay\.to|gorillavid\.in|daclips\.in|movpod\.in|vodlocker\.com|filehoot\.com|bestreams\.net|vidto\.me|cloudyvideos\.com|allmyvideos\.net|goo\.gl|cloudy\.ec|rapidvideo\.com|megavideo\.pro|raptu\.com|vidlox|flashservice\.xvideos\.com|xhamster\.com|entervideo\.net|vev\.io";
$s=$s."|fembed\.|streamcherry\./i";
for ($i=0;$i<count($links);$i++) {
  if (strpos($links[$i],"http") !== false) {
    $t1=explode("http:",$links[$i]);
    $p=count($t1);
    $cur_link="http:".$t1[$p-1];
  } else {
  $cur_link="http:".$links[$i];
  }
  if (strpos($links[$i],"goo.gl") !== false) {
  $l="https:".$links[$i];
  //echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  $t1=explode("Location:",$h2);
  $t2=explode("\n",$t1[1]);
  $cur_link=trim($t2[0]);
  
  }
  if (strpos($links[$i],"bit.ly") !== false) {
  $l=trim("https:".$links[$i]);
  //echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER,1);
  curl_setopt($ch, CURLOPT_NOBODY,1);
  $h2 = curl_exec($ch);
  curl_close($ch);
  //echo $h2;
  $t1=explode("Location:",$h2);
  $t2=explode("\n",$t1[1]);
  $cur_link=trim($t2[0]);

  }
  if (strpos($links[$i],"streamdefence.com") !== false) {
function indexOf($hack,$pos) {
    $ret= strpos($hack,$pos);
    return ($ret === FALSE) ? -1 : $ret;
}

function dhYas638H($input) {
  $base64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdef"."ghijklmnopqrstuvwxyz0123456789+/=";
  $output = "";
  //var ch1, ch2, ch3, enc1, enc2, enc3, enc4;
  $i = 0;

  $input = preg_replace("/[^A-Za-z0-9\+=]/", "",$input);
  do {
    $enc1 = indexOf($base64,$input[$i++]);
    $enc2 = indexOf($base64,$input[$i++]);
    $enc3 = indexOf($base64,$input[$i++]);
    $enc4 = indexOf($base64,$input[$i++]);

    $ch1 = ($enc1 << 2) | ($enc2 >> 4);
    $ch2 = (($enc2 & 15) << 4) | ($enc3 >> 2);
    $ch3 = (($enc3 & 3) << 6) | $enc4;

    $output = $output . chr($ch1);

    if ($enc3 != 64) $output = $output . chr($ch2);
    if ($enc4 != 64) $output = $output . chr($ch3);

    $ch1 = $ch2 = $ch3 = "";
    $enc1 = $enc2 = $enc3 = $enc4 = "";

  } while ($i < strlen($input));

  return $output;
}
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $links[$i]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://serialefilme.net");
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt($ch, CURLOPT_HEADER,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $t1=explode("document.write",$html);
  $t2=explode('"',$t1[1]);
  $h=$t2[1];
  //echo $h;
  $h1=dhYas638H($h);
  $h2=dhYas638H($h1);

  $t1=explode("document.write",$h2);
  $t2=explode('"',$t1[1]);
  $h=$t2[1];
  //echo $h;
  $h1=dhYas638H($h);
  $h2=dhYas638H($h1);

  //echo $h2;
  $t1=explode('src="',$h2);
  $t2=explode('"',$t1[1]);
  $cur_link=$t2[0];
  
  }
  $t1=explode(" ",$cur_link);     //vezi-online
  $cur_link=$t1[0];
  $t1=explode("&stretching",$cur_link);    //vezi-online
  $cur_link=$t1[0];

  if (strpos($cur_link,"entervideos.com/vidembed") !==false) {
  $t1=explode("&",$cur_link);    //
  $cur_link=$t1[0];
  }
  $cur_link=str_replace(urldecode("%0D"),"",$cur_link);
  if (preg_match($s,$cur_link)) {
    if ($cur_link <> $last_link) {
     $t1=explode("proxy.link=",$cur_link); //vezi-filme
     if ($t1[1]) {
       $t2=explode("&",$t1[1]);
       $cur_link=trim($t2[0]);
     }
      $cur_link=str_replace("&amp;","&",$cur_link);

      if (!preg_match("/hqq\.tv\/player\/script\.php|facebook|twitter|player\.swf|img\.youtube|youtube\.com\/user|radioarad|\.jpg|\.png|\.gif|jq\/(js|css)|fsplay\.net\?s|top\.mail\.ru|changejplayer\.js/i",$cur_link)) {
        $t1=explode("proxy.link=",$cur_link); //filmeonline.org
        if ($t1[1] <> "") {
        $cur_link=$t1[1];
        }
        //echo $cur_link;
        $cur_link=str_replace(urldecode("%0A"),"",$cur_link);
        $link="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file=".urlencode($cur_link);
        if (strpos($cur_link,"adf.ly") !==false) { //onlinemoca
           $a1=explode($cur_link,$html);
           $a2=explode('server/',$a1[1]);
           $a3=explode('.',$a2[1]);
           $server=$a3[0];
        } else {
          $server = str_between($cur_link,"http://","/");
          if (!$server) $server = str_between($cur_link,"https://","/");
        }
        $last_link=$cur_link;
        //echo $cur_link;
        $mysrt="asasas"; // IMPORTANT PENTRU TOATE LINK-URILE 990 !!!!!!!!!!!!!!!!!!!!
        if (!$server) $server = "LINK";
        if (strpos($server,"openload") !== false) $server=$server. " - activati ip-ul openload.co/pair";
        if (strpos($server,"thevideo.me") !== false) $server=$server. " - activati ip-ul thevideo.me/pair";
        $title=$server;


        if ($mysrt){
        //if (strpos($server,"openload") !== false) $server=$server." (apasati 6 pentru captcha)";
        $f = "/usr/local/bin/home_menu";
	    echo'
	    <item>
	    <title>'.$server.'</title>
        <onClick>
        <script>
        showIdle();
        movie="'.$link.'";
        url=getUrl(movie);
        cancelIdle();
    if (url == "" || url == " " || url == null)
    {
    playItemUrl(-1,1);
    }
    else
    {
        storagePath = getStoragePath("tmp");
        storagePath_stream = storagePath + "stream.dat";
        streamArray = null;
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, "");
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, url);
        streamArray = pushBackStringArray(streamArray, video/mp4);
        streamArray = pushBackStringArray(streamArray, "'.str_replace('"',"'",$pg_title).'");
        streamArray = pushBackStringArray(streamArray, "1");
        writeStringToFile(storagePath_stream, streamArray);
        ';
        if (file_exists($f)) {
        if (strpos($cur_link,"hqq.") !== false) {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer33.rss");
        ';
        } else {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer22.rss");
        ';
        }
        } else {
        echo '
        doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer1.rss");
        ';
        }

        echo '
        }
        </script>
        </onClick>
        <download>'.$link.'</download>
        <tip>1</tip>
        <name>'.$titledownload.'.flv</name>
        </item>
       ';

       }
      }
    }
  }
}
/**################ special links ##############**/

/**################ flash... mediafile,file.....############**/

//movieSrc=

?>
</channel>
</rss>
