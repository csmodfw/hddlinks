#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["page"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   if ($tip == "search") {
   $link = urldecode($queryArr[3]);
   $page_title="Cautare: ".urldecode($queryArr[4]);
   $token=$queryArr[2];
   } else {
   $link = urldecode($queryArr[2]);
   $page_title=urldecode($queryArr[3]);
   $token=$queryArr[4];
   }
   //if ($tip=="search" || $tip=="actor") $page_title="Cauta:".$link;
   $link=str_replace(" ","+",$link);

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
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=50>
         <script>print(image); image;</script>
		</image>
   	<text  redraw="yes" align="center" offsetXPC="60" offsetYPC="80"  heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <widthPC>
			<script>
				if (an == "" || an == null ) null;
				else "30";
			</script>
		   </widthPC>
		  <script>print(an); an;</script>
		</text>
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
					  image = getItemInfo(idx, "image");
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
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
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
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_det.php?file=" + movie+ "," + urlEncode(tit);
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
<channel>
	<title><?php echo $page_title; ?></title>
	<menu>main menu</menu>


<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

if($page > 1) { ?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($token).",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($page_title).",".$token;

?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php

$l22="http://uphero.xpresso.eu/movietv/m/glob.php";
$html22=file_get_contents($l22);
$videos = explode(",", $html22);
//echo $html22;
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
  $t1=explode('.',$video);
  $id_srt=trim($t1[0]);
  //echo $id_srt;
  $srt[$id_srt]="exista";
}
$noob_sub="/tmp/noob_sub.txt";
if (!file_exists($noob_sub)) {
  $sub="http://uphero.xpresso.eu/srt/list.php";
  $html=file_get_contents($sub);
  //$html=preg_replace("/ \(Awards Screener\)| \(High Bitrate Test\)| \(HDRip\)|/i","",$html);
  $fh = fopen($noob_sub, 'w');
  fwrite($fh, $html);
  fclose($fh);
}
$cookie="/tmp/movietv.txt";
//$cookie="D:\\m.txt";
//echo $tip;

if ($tip=="genres")
$post="loadmovies=showData&page=".$page."&abc=All&genres=".$link."&sortby=Recent&quality=All&type=movie&q=&token=".$token;
elseif ($tip=="release")
$post="loadmovies=showData&page=".$page."&abc=All&genres=&sortby=".$link."&quality=All&type=movie&q=&token=".$token;
elseif ($tip=="search")
$post="loadmovies=showData&page=".$page."&abc=All&genres=&sortby=Recent&quality=All&type=movie&q=".$link."&token=".$token;

$l="http://movietv.to/index/loadmovies";
//echo $l;
//echo $post;
$h1=file_get_contents($cookie);
$t1=explode("__cfduid",$h1);
$t2=explode("\n",$t1[1]);
$cfduid=trim($t2[0]);
$t1=explode("PHPSESSID",$h1);
$t2=explode("\n",$t1[1]);
$phpsessid=trim($t2[0]);
$t1=explode("announcement",$h1);
$t2=explode("\n",$t1[1]);
$announcement=trim($t2[0]);
//$post="loadmovies=showData&page=1&abc=All&genres=&sortby=Recent&quality=All&type=movie&q=&token=41ae81322d584a9a0abd37fdc7381f69";
$head=array('Accept: */*','Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2','Accept-Encoding: deflate','Content-Type: application/x-www-form-urlencoded; charset=UTF-8','X-Requested-With: XMLHttpRequest','Content-Length: '.strlen($post),'Cookie: __cfduid='.$cfduid.'; announcement='.$announcement.'; notice=true; _gat=1; PHPSESSID='.$phpsessid.'');

//$post="loadmovies=showData&page=1&abc=All&genres=&sortby=Recent&quality=All&type=movie&q=&token=7a782c9902aabbce5924af61d724bd22";
//$l="http://movietv.to/titles/paginate?_token=qmsTyuUNZpPt9YXlYvdYI2Oj8zFTMiaMXPDZ5DtS&perPage=16&page=1&order=&type=movie";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
  curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  //curl_setopt($ch, CURLOPT_NOBODY,0);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  curl_setopt ($ch, CURLOPT_REFERER, "http://movietv.to/");
  $html = curl_exec($ch);
  curl_close($ch);
$h=file_get_contents($noob_sub);
$videos = explode('<div class="item"', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $title11=trim(str_between($video,'movie-title">','<'));
  $image=str_between($video,'src="','"');;
  $link1= str_between($video,'href="','"');
  $link1=str_replace(",","*",$link1);
  //$id1= str_between($video,"addWatchlist('","'");
  $t1=explode("movies/",$link1);
  $t2=explode("-",$t1[1]);
  $id1=$t2[0];
  $year=trim(str_between($video,'movie-date">','<'));
  $title=$title11." (".$year.")";
  //$id_t=$id1;
  $id_t="";
  if (!$srt[$id1]) {
     $tt=str_replace("/","\/",$title11);
     $tt=str_replace("?","\?",$tt);
     $tt=str_replace(".","\.",$tt);
     $tt="".$tt."\|".$year."";
     $s="/\|".$tt."\|\d+\|\d+/i";

     if (preg_match($s,$h,$m)) {
       $t1=explode("|",$m[0]);
       if ($t1[4]== 1) {
         $title1=$title;
         $id_t=$t1[3];
       } else
         $title1=$title." *";
     } else
       $title1=$title." *";
  } else
    $title1=$title;
   $title2=str_replace(",","/",$title11);
   if ($title) {
     echo '
     <item>
     <title>'.$title1.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_link.php?file='.$link1.','.$id1.','.$id_t.'";
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
    <tit>'.$title2.'</tit>
    <an>'.$year.'</an>
    <id>'.$id1.'</id>
    <movie>'.$link1.'</movie>
     </item>
     ';
   }
}
//http://movietv.to/movies/901259-My-Love,-My-Bride
//url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
//echo "http://192.168.0.25/cgi-bin/scripts/filme/php/movietv_add.php?mod=add,".urlencode($link1).",".urlencode($title).",".urlencode($image).",".urlencode($year).",".urlencode($id1);
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($token).",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($page_title).",".$token;
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
