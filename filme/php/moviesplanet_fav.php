#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2 = sterge de la favorite, right for more
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
		  <script>print(annotation); annotation;</script>
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
					  annotation = getItemInfo(idx, "title");
					  an =  getItemInfo(idx, "an");
					  image = getItemInfo(idx, "image1");
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
movie=getItemInfo(getFocusItemIndex(),"movie");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_add.php?mod=del," + urlEncode(movie) + ",,,,";
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
tit=getItemInfo(getFocusItemIndex(),"imdb");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_det.php?file=series," + movie + "," + tit;
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

    <title>moviesplanet seriale - favorite</title>

<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
if (file_exists("/data"))
  $f= "/data/moviesplanet.dat";
else
  $f="/usr/local/etc/moviesplanet.dat";
if (file_exists($f)) {
$html=file_get_contents($f);
//echo $html;
$videos=explode("<item>",$html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $link=urldecode(str_between($video,"<movie>","</movie>"));
  $title=urldecode(str_between($video,"<title>","</title>"));
  $title=str_replace("/",",",$title);
  //$image=urldecode(str_between($video,"<image>","<image>"));
  $t1=explode("<image>",$video);
  $t2=explode("<",$t1[1]);
  $image=$t2[0];
  $year=str_between($video,"<an>","</an>");
  $id=str_between($video,"<id>","</id>");
  //echo $image;
  if (strpos($image,"moviesplanet") === false)
    $arr[]=array($title,$link,$image,$year,$id);
}
//print_r ($arr);
asort($arr);
foreach ($arr as $key => $val) {
  $link=$arr[$key][1];
  $image=$arr[$key][2];
  $image=str_replace("moviesplanet.is","moviesplanet.tv",$image);
  //echo $image1;
  $title=$arr[$key][0];
  $title=str_replace("^",",",$title);
  $title=str_replace("\\","",$title);
  $title=str_replace("&amp;","&",$title);
  $t1=explode("<image>",$video);
  $year=$arr[$key][3];
  $id=$arr[$key][4];
  $id_t="";
  //watch-narcos-87202
  $id1=substr(strrchr($link, "-"), 1);
  $image1=$image;
  //$image1=$image;
  $link=str_replace(".is",".tv",$link);
   //$link2=$host."/scripts/filme/php/vumoo_s_ep.php?file=".urlencode($link).",".urlencode($title).",".$id1.",".$id_t.",series,".urlencode($image);
   $link2 = 'http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_s.php?file='.$link.','.urlencode(str_replace(",","^",$title));
   if ($title) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$link2.'</link>
    <image>'.$image.'</image>
    <image1>'.$image1.'</image1>
    <tit>'.urlencode(str_replace(",","^",$title)).'</tit>
    <tit1>'.urlencode(str_replace(",","^",$title)).'</tit1>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <imdb>'.$id.'</imdb>
    <movie>'.trim($link).'</movie>
    <an>'.$year.'</an>
    <movie1>'.urlencode(trim($link)).'</movie1>
    <mediaDisplay name="threePartsView"/>
     </item>
     ';
   }
}
}
?>


</channel>
</rss>                                                                                                                             
