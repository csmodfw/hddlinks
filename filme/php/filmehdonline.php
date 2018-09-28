#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>"; ?>
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
    right for more
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
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
else if (userInput == "right" || userInput == "R")
{
tit=getItemInfo(getFocusItemIndex(),"tmdb");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/tmdb.php?query=" + tit;
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
	<title>filmehdonline</title>
	<menu>main menu</menu>


<?php
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $tip=$queryArr[0];
   $page = $queryArr[1];
   $search = urldecode($queryArr[2]);
}
if ($tip=="search") {
 //http://filmehd.net/?s=star+trek
 //http://filmehd.net/page/3?s=who+am+I
   $tit="Cautare: ".$search;
   $search1=str_replace(" ","+",$search);
   $l="http://www.filmehdonline.org/?s=".$search1;
   $l="http://www.filmehdonline.org/page/2/?s=star";
   $l="http://www.filmehdonline.org/page/".$page."/?s=".$search1;
} else {
   $l=$search."page/".$page;
}
   $html=file_get_contents($l);
//echo $html;
if($page > 1) { ?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".$tip.",".($page-1).",";
if($search) { 
  $url = $url.urlencode($search);
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
//$html=urlencode($html);
//echo $html;
//$x=urlencode('<div class="imgleft">');
//$videos = explode('d%3D%22post', $html);
//if ($tip=="search" || strpos('id="post-',$html) === false) echo "OK";
if ($tip=="search" || strpos('id="post-',$html) === false)
  $videos=explode('class="thumb">',$html);
else
  $videos = explode('id="post-',$html);
//$videos=explode('class="thumb">',$html);
unset($videos[0]);
$videos = array_values($videos);
//print_r ($videos);
foreach($videos as $video) {
  $year="";
  $tip="movie";
	$t1 = explode('href="', $video);
	$t2 = explode('"', $t1[1]);
	$link = $t2[0];
	if ($tip=="search") {
      $t3=explode(">",$t1[1]);
      $t4=explode("<",$t3[1]);
      $title=$t4[0];
    } elseif ($tip=="release" && strpos('id="post-',$html) === false) {
      $t3=explode(">",$t1[2]);
      $t4=explode("<",$t3[1]);
      $title=$t4[0];
    } else {
	  $t1 = explode('title="', $video);
	  $t2 = explode('"', $t1[1]);
	  $title=$t2[0];
    }
	$link = str_replace(' ','%20',$link);
	$link = str_replace('[','%5B',$link);
	$link = str_replace(']','%5D',$link); 
	$t1 = explode('src="', $video);
	$t2 = explode('"', $t1[1]);
	$image = $t2[0];
	

	$title = str_replace("– Filme online gratis subtitrate in romana","",$title);
	$title = str_replace("– Filme online gratis subtitratate in romana","",$title);
	$title = str_replace("– Filme online gratis subititrate in romana","",$title);
	$title = trim($title);
  $title=str_replace("&#8211;","-",$title);
  $title=str_replace("&#8217;","'",$title);
	$title=preg_replace("/online|subtitrat(e*)|film(e*)|vezi(.*)(:)|gratis/si","",$title);
	$title=trim(str_replace("&nbsp;","",$title));
    $title=html_entity_decode($title,ENT_QUOTES,'UTF-8');
    $title=diacritice($title);
  if (preg_match("/\(?((1|2)\d{3})\)?/",$title,$r)) {
     //print_r ($r);
     $year=$r[1];
  }
  $t1=explode(" - ",$title);
  $t=$t1[0];
  $t=preg_replace("/\(?((1|2)\d{3})\)?/","",$t);
  $tit3=trim($t);
	$pos = strpos($image, '.jpg');
	if (($pos !== false) && ($title <> "")){
    $link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/filme_link.php?file='.$link.','.urlencode($title);
    echo '
    <item>
    <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
    <title1>'.urlencode(trim(str_replace(",","^",$title))).'</title1>
    <link>'.$link.'</link>	
    <annotation>'.$title.'</annotation>
    <tmdb>movie,'.urlencode(str_replace(",","^",$tit3)).','.$year.'</tmdb>
    <image>'.$image.'</image>
    <media:thumbnail url="'.$image.'" />
    <mediaDisplay name="threePartsView"/>
    </item>
    ';
  }
}

?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".$tip.",".($page+1).",";
if($search) { 
  $url = $url.urlencode($search);
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
