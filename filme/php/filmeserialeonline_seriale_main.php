#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
set_time_limit(60);
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   if ($tip == "search") {
   $search = urldecode($queryArr[2]);
   $page_title="Cautare: ".urldecode($queryArr[2]);
   } else {
   $search = urldecode($queryArr[2]);
   $page_title="Seriale";
   }
   $search=str_replace(" ","+",$search);
   $search=str_replace("+","%20",$search);

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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="50" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2= adauga la favorite,right for more
		</text>
  	<text redraw="yes" align="right" offsetXPC="65" offsetYPC="12" widthPC="30" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
  <image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
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
else if (userInput == "two" || userInput == "2")
{
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/filmeseriale_add.php?mod=add*" + getItemInfo(getFocusItemIndex(),"link1") + "*" + getItemInfo(getFocusItemIndex(),"title1");
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
tit=getItemInfo(getFocusItemIndex(),"title1");
tip=getItemInfo(getFocusItemIndex(),"tip");
showIdle();
if (tip == "movie")
{
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=movie" + tit;
} else {
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=series" + tit;
}
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
	    <script>"<?php echo $host."/scripts/filme/php/filmeserialeonline_seriale_main.php?query=1,search,"; ?>" + urlEncode(keyword);</script>
	  </link>
	</searchLink>
<channel>
	<title>filmeserialeonline - seriale</title>
	<menu>main menu</menu>
<?php

if($page > 1) { ?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page-1).",";
if($search) {
  $url = $url.$tip.",".urlencode($search);
}
?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioară</annotation>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>


<?php } ?>

<?php
include("../../common.php");
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
if ($tip=="release") {
if($page>1) {
  $l =$search."/page/".$page."/";
} else {
	$page = 1;
  $l=$search;
}
} else {
  $l="http://www.filmeserialeonline.org/?s=".str_replace(" ","+",$search);
}
if ($page == 1) {
  $title="Lista serialelor favorite";
  $link = $host."/scripts/filme/php/filmeseriale_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';
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
}
if ($tip == "search") {
//http://www.filmeserialeonline.org/seriale/
//http://www.filmeserialeonline.org/?s=Designated+Survivor
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "http://www.filmeserialeonline.org/");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
$host = "http://127.0.0.1/cgi-bin";
 $videos = explode('<div id="mt', $html);

unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
  $link = trim(str_between($video,'href="','"'));
  $link1=$link;
  $title=str_between($video,'<h2>','</');
  $title=trim(preg_replace("/Online Subtitrat in Romana|Filme Online Subtitrat HD 720p|Online HD 720p Subtitrat in Romana|Online Subtitrat Gratis|Online Subtitrat in HD Gratis|Film HD Online Subtitrat/i","",$title));
  $title=html_entity_decode($title,ENT_QUOTES,'UTF-8');
  $t1 = explode('src="', $video);
  $t2 = explode('"', $t1[1]);
  $image = $t2[0];
  $image=str_replace("https","http",$image);
  $descriere=str_between($video,'span class="ttx">','<');
  $descriere=diacritice($descriere);
    $image=str_replace("https","http",$image);
    //if (strpos($titlu,"Kill") === false) {
	if($link!="" && strpos($link,"/seriale") !== false) {
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/fs.php?query=".$link.",".urlencode($title).",movie";
		$link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/filmeseriale.php?file='.$link.','.urlencode(str_replace(",","^",$title));
		echo'
		<item>
		<title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
		<link>'.$link.'</link>
	  <annotation>'.$descriere.'</annotation>
	  <image>'.$image.'</image>
    <title1>'.urlencode(trim(str_replace(",","^",$title))).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <tip>series</tip>
	  <media:thumbnail url="image/movies.png" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
	}
	//}
}
} else {
$l="http://www.filmeserialeonline.org/seriale/page/1/";
//https://filmeseriale.online/seriale/page/2/
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://filmeseriale.online");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  $t1=explode("previouspostslink",$html);
  $t2=explode('page/',$t1[1]);
  $t3=explode('/',$t2[1]);
  $last_page=$t3[0]+1;
  //$last_page=2;
$arr=array();
for ($k=1;$k<$last_page;$k++) {
  $p=0;
  $l="http://www.filmeserialeonline.org/seriale/page/".$k."/";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://filmeseriale.online");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);

$videos = explode('div id="mt-', $html);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
    $t1 = explode('href="', $video);
    $t2 = explode('"', $t1[1]);
    $link = $t2[0];


    $t3 = explode('class="tt">',$video);
    $t4 = explode('<',$t3[1]);
    $title = trim($t4[0]);
    $title=html_entity_decode($title,ENT_QUOTES,'UTF-8');
    $t1 = explode('src="', $video);
    $t2 = explode('"', $t1[1]);
    $image=$t2[0];
    $image=str_replace("https","http",$image);
    $descriere=str_between($video,'span class="ttx">','<');
    $descriere=diacritice($descriere);
    //$arr[]=array("title" => $title, "link" => $link, "iimage" => $image);
    $arr[$title]["link"]=$link;
    $arr[$title]["image"]=$image;
    $arr[$title]["descriere"]=$descriere;
}
}
ksort($arr);
foreach ($arr as $key => $value) {
  $title=$key;
  $link = $arr[$key]["link"];
  $link1=$link;
  $image=$arr[$key]["image"];
  $descriere=$arr[$key]["descriere"];
  	if($link!="" && strpos($link,"/seriale") !== false) {
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/fs.php?query=".$link.",".urlencode($title).",movie";
		$link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/filmeseriale.php?file='.$link.','.urlencode(str_replace(",","^",$title));
		echo'
		<item>
		<title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
		<link>'.$link.'</link>
	  <annotation>'.$descriere.'</annotation>
	  <image>'.$image.'</image>
    <title1>'.urlencode(trim(str_replace(",","^",$title))).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <tip>series</tip>
	  <media:thumbnail url="image/movies.png" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
	}
}
}
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page+1).",";
if($search) {
  $url = $url.$tip.",".urlencode($search);
}
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina următoare</annotation>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
</channel>
</rss>
