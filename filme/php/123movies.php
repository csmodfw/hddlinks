#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["page"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   $link = urldecode($queryArr[2]);
   $page_title=urldecode($queryArr[3]);
   if ($tip=="search") {
     $page_title="Cauta:".$link;
     $link="http://123movies.to/movie/search/".$link."/";
   }
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
      1=adauga la favorite, right for more...
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=50>
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
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
img=getItemInfo(getFocusItemIndex(),"image1");
tit=getItemInfo(getFocusItemIndex(),"tit");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/123movies_det.php?file=" + movie+ "," + urlEncode(img) + "," + urlEncode(tit);
dummy = getURL(movie_info);
cancelIdle();
ret_val=doModalRss("/usr/local/etc/www/cgi-bin/scripts/filme/php/movie_detail.rss");
ret="true";
}
else if (userInput == "one" || userInput == "1")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
img=getItemInfo(getFocusItemIndex(),"image1");
tit=getItemInfo(getFocusItemIndex(),"tit");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/123movies_add.php?mod=add," + movie + "," + urlEncode(tit) + "," + urlEncode(img);
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
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($page_title);

?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php

$l22="http://uphero.xpresso.eu/123movies/m/glob.php";
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
if ($page > 1) $link=$link."/".$page;
//$link="http://123movies.to/movie/search/element";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
$h=file_get_contents($noob_sub);
$videos = explode('<div class="ml-item">', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
	$t1 = explode('data-url="http://123movies.to/movie/loadinfo/', $video);
    $t2 = explode('"', $t1[1]);
    //$link = $t2[0];
	$id = $t2[0];

	$t1 = explode('title="', $video);
    $t2 = explode('"', $t1[1]);
    $title=trim($t2[0]);

    $title2=str_between($video,'class="mli-eps">','</span');
    $title2 = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$title2);
    if ($title2) $title=$title." - ".$title2;
	$t1 = explode('<img data-original="', $video);
    $t2 = explode('"', $t1[1]);
    $image = $t2[0];
    $image1=str_replace(",","*",$image);
    $id_t="";
  if (!array_key_exists($id, $srt)) {
     $tt=str_replace("/","\/",$title);
     $tt=str_replace("?","\?",$tt);
     $s="/\|".$tt."\|\d+\|\d+\|\d+/";
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
  if (strpos($image,",") === false)
    $image11=$image1;
  else
    $image11=$image1;
    $title2=str_replace(",","/",$title);
  $link1=$host."/scripts/filme/php/123movies_l.php?file=".urlencode($id).",".urlencode($title2).",".$image11.",".$id_t;

	echo '
	<item>
	<title>'.$title1.'</title>
	<link>'.$link1.'</link>
	<image>'.$image.'</image>
	<image1>'.$image1.'</image1>
	<movie>'.$id.'</movie>
	<tit>'.$title2.'</tit>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
}
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($page_title);
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
