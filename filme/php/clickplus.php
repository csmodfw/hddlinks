#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["page"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = urldecode($queryArr[1]);
   $page_title=urldecode($queryArr[2]);
   $page_title=str_replace("\\","",$page_title);
   $search=str_replace("|","&",$search);
}
//http://www.clickplus.online/search/label/Atletico%20Textila
//$search1=urlencode($search);
if ($page==1)
  $l="http://www.clickplus.online/search/label/".str_replace("+","%20",urlencode($page_title));
else
  $l="http://www.clickplus.online/search/label/".str_replace("+","%20",urlencode($page_title))."?updated-max=".urlencode($search); //."&max-results=20&start=12&by-date=false";
//echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);

  $t1=explode("a class='blog-pager-newer-link",$html);
  //$t1=explode("a class='blog-pager-older-link",$html);
if (sizeof ($t1) > 1 ) {
  $t2=explode("href='",$t1[1]);
  $t3=explode("'",$t2[1]);
  $t4=explode("?updated-max=",$t3[0]);
  $search_prev="";
if (sizeof ($t4) > 1 ) {
  $t5=explode("&",$t4[1]);
  $search_prev=$t5[0];
  //echo $search_prev;
}
}
  $t1=explode("a class='blog-pager-older-link",$html);
  //$t1=explode("a class='blog-pager-newer-link",$html);
  $t2=explode("href='",$t1[1]);
  $t3=explode("'",$t2[1]);
  //echo $t3[0];
  //die();
  $t4=explode("?updated-max=",$t3[0]);
  $t5=explode("&",$t4[1]);
  $search=$t5[0];
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

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
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
$host = "http://127.0.0.1/cgi-bin";

include ("../../common.php");

if($page > 1) { ?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?page=".($page-1).",";
if($search_prev) {
  $url = $url.urlencode($search_prev).','.urlencode($page_title);
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
$image=str_between($html,'thumbnail_resize("','"');
$image=str_replace("https","http",$image);
 $videos = explode("h2 class='post-title entry-title", $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {

  $t1 = explode("href='", $video);
  $t2 = explode("'", $t1[1]);
  $link = $t2[0];

  $t3 = explode(">",$t1[1]);
  $t4 = explode("<",$t3[1]);
  $title = $t4[0];

  $title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  //$t1 = explode('src="', $video);
  //$t2 = explode('"', $t1[1]);
  //$image = $t2[0];
  //$image=str_replace("https","http",$image);
	if($link!="") {
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
		$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/filme_link.php?file=".urlencode($link).",".urlencode($title);
		echo'
		<item>
		<title>'.$title.'</title>
		<link>'.$link.'</link> 
	  <image>'.$image.'</image>
	  <annotation>'.$title.'</annotation>
	  <media:thumbnail url="'.$image.'" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
	}
	//}
}

?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?page=".($page+1).",";
if($search) { 
  $url = $url.urlencode($search).','.urlencode($page_title);
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
