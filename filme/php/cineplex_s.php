#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["page"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   $token=$queryArr[2];

   if ($tip == "search") {
   $link = urldecode($queryArr[3]);
   $page_title="Cautare: ".urldecode($queryArr[4]);
   } else {
   $gen=$queryArr[3];
   $page_title=urldecode($queryArr[4]);
   }
   //$link=str_replace(" ","+",$link);

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
else if (userInput == "one" || userInput == "1")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
img=getItemInfo(getFocusItemIndex(),"image");
tit=getItemInfo(getFocusItemIndex(),"tit");
year=getItemInfo(getFocusItemIndex(),"an");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_s_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year);
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
tit=getItemInfo(getFocusItemIndex(),"tit");
an=getItemInfo(getFocusItemIndex(),"an");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/tmdb.php?query=tv," + tit+ "," + an;
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
<fs>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs1.php</link>
</fs>
<channel>
<?php
if ($tip=="search") {
echo '
	<title>'.$page_title.'</title>
	<menu>main menu</menu>
	';
} else {
echo '
	<title>'.$page_title.' ('.$page.')</title>
	<menu>main menu</menu>
	';
}



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
$url = $sThisFile."?page=".($page-1).",".$tip.",".$token.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page-1).",".$tip.",".$token.",".$gen.",".urlencode($page_title);

?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php
/*
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
*/
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="cineplex.to";
$cookie="/tmp/royale.txt";
//$cookie="D:\\m.txt";
//echo $tip;
if ($tip=="release") {
  $l="https://".$server."/index/loadmoviesnew";
  $post="loadmovies=showData&page=".$page."&abc=All&genres=".$gen."&sortby=Recent&quality=All&type=tv&q=&token=".$token;

$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --header "Content-Type: application/x-www-form-urlencoded" --header "X-Requested-With: XMLHttpRequest" --load-cookies  '.$cookie.' -U "'.$ua.'"  --post-data='."'".$post."'".' --no-check-certificate "'.$l.'"  -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
  $videos = explode('class="item">', $html);
  unset($videos[0]);
  $videos = array_values($videos);
  foreach($videos as $video) {
    $t1=explode('movie-card-title">',$video);
    $t2=explode('<',$t1[1]);
    $title= $t2[0];
    $t1=explode('mf-year ng-binding">',$video);
    $t2=explode("<",$t1[1]);
    $year = trim($t2[0]);
    $t1=explode('src="',$video);
    $t2=explode('"',$t1[1]);
    $image= $t2[0];
    $t1=explode('href="',$video);
    $t2=explode('"',$t1[1]);
    $imdb=$t2[0];
   if ($title) {
     $l1="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_ep.php?file=tv,".$imdb.",".$token.",".urlencode(str_replace(",","^",$title)).",".urlencode($image).",".$year;
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$l1.'</link>
    <image>'.$image.'</image>
    <tit>'.urlencode(str_replace(",","^",$title)).'</tit>
    <an>'.$year.'</an>
    <movie>'.$imdb.'</movie>
     </item>
     ';
   }
}
} else {
$l="https://".$server."/index/loadmovies";
$post="loadmovies=showData&page=1&abc=All&genres=&sortby=Recent&quality=All&type=tv&q=".str_replace("+","%20",urlencode($link))."&token=".$token;
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'"  --no-check-certificate "'.$l.'" --post-data='."'".$post."'".' -O -';
$exec = '-q --header "Content-Type: application/x-www-form-urlencoded" --header "X-Requested-With: XMLHttpRequest" --load-cookies  '.$cookie.' -U "'.$ua.'"  --post-data='."'".$post."'".' --no-check-certificate "'.$l.'"  -O -';

//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
  $videos = explode('class="item">', $html);
  unset($videos[0]);
  $videos = array_values($videos);
  foreach($videos as $video) {
    $t1=explode('movie-title">',$video);
    $t2=explode('<',$t1[1]);
    $title= $t2[0];
    $t1=explode('movie-date">',$video);
    $t2=explode("<",$t1[1]);
    $year = trim($t2[0]);
    $t1=explode('src="',$video);
    $t2=explode('"',$t1[1]);
    $image= $t2[0];
    $t1=explode('href="',$video);
    $t2=explode('"',$t1[1]);
    $imdb=$t2[0];
   if ($title) {
     $l1="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_ep.php?file=tv,".$imdb.",".$token.",".urlencode(str_replace(",","^",$title)).",".urlencode($image);
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$l1.'</link>
    <image>'.$image.'</image>
    <tit>'.urlencode(str_replace(",","^",$title)).'</tit>
    <an>'.$year.'</an>
    <movie>'.$imdb.'</movie>
     </item>
     ';
   }
}
}
//http://sit2play.com/movies/901259-My-Love,-My-Bride
//url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
//echo "http://192.168.0.25/cgi-bin/scripts/filme/php/movietv_add.php?mod=add,".urlencode($link1).",".urlencode($title).",".urlencode($image).",".urlencode($year).",".urlencode($id1);
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page+1).",".$tip.",".$token.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page+1).",".$tip.",".$token.",".$gen.",".urlencode($page_title);
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
