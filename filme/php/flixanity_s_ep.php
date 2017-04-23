#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
//file=".urlencode($link1).",".urlencode($title).",".$id1.",".$id_t.",movie,".urlencode($image);
//file=watch-a-star-is-born-87970,A+Star+Is+Born,87970,,movie
//file=watch-power-86886,Power,86886,,series,http%3A%2F%2Fposter.vumoo.net%2F300%2F86886.jpg
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = urldecode($queryArr[0]);
   $series_title=urldecode($queryArr[1]);
   $series_title=urldecode($queryArr[1]);
   $series_title = str_replace("\\","",$series_title);
   $series_title = str_replace("^",",",$series_title);
   $series_title = str_replace("&amp;","&",$series_title);
   $id1= $queryArr[2];
   $id_t= $queryArr[3];
   $tip=$queryArr[4];
   $image= urldecode($queryArr[5]);
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="50" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Apăsaţi 4 sau 6 pentru salt -+ 50
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
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
					  image = getItemInfo(idx, "image1");
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
redrawDisplay();
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
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs2.php</link>
</fs>
<channel>
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$series_title)); ?></title>
	<menu>main menu</menu>


<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//error_reporting(0);
if (strpos($link,"tv-show") === false) {
  $link=str_replace("flixanity.watch/show/","flixanity.watch/tv-show/",$link);
}
if (strpos($link,"tv-show") === false) {
  $link=str_replace("flixanity.watch/","flixanity.watch/tv-show/",$link);
}
$requestLink=$link;
//echo $requestLink;
$episoade=array();
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '--max-redirect 0 -U "'.$ua.'" --referer="'.$requestLink.'" --no-check-certificate "'.$requestLink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
      //echo $html;
  $s=str_between($html,"Seasons:","</p");
  $t=explode('href="',$s);
  $c=count($t);
  //$t2=array();
  //print_r ($t);
  $t1=explode('"',$t[$c-1]);
  $min=substr($t1[0], -1, 1);
  $t1=explode('"',$t[1]);
  $max=substr($t1[0], -1, 1);
if ($min<=$max) {
$n=0;
for ($i=$c;$i>0;$i--) {
  $t2=explode('"',$t[$i]);
  //echo $t2[0];
      $exec = '--max-redirect 0 -U "'.$ua.'" --referer="'.$t2[0].'" --no-check-certificate "'.$t2[0].'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
 $videos = explode('class="episode-title"', $h);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $link1="";
  $ep_tit=str_between($video,'title="','"');
  //$ep_tit=str_replace(",","^",$ep_tit);
  $t1=explode('href="',$video);
  $t2=explode('"',$t1[1]);
  $link1=$t2[0];

  preg_match("/S(\d+)\s*E(\d+)/",$ep_tit,$m);
  //print_r ($m);
  $season=$m[1];
  $episod=$m[2];
  array_push($episoade,array("title" => $ep_tit,"saason" => $season, "episod" => $episod, "link" => $link1));
}
}
} else {
for ($i=1;$i<$c;$i++) {
  $t2=explode('"',$t[$i]);
  //echo $t2[0];
      $exec = '--max-redirect 0 -U "'.$ua.'" --referer="'.$t2[0].'" --no-check-certificate "'.$t2[0].'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h=shell_exec($exec);
 $videos = explode('class="episode-title"', $h);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $link1="";
  $ep_tit=str_between($video,'title="','"');
  //$ep_tit=str_replace(",","^",$ep_tit);
  $t1=explode('href="',$video);
  $t2=explode('"',$t1[1]);
  $link1=$t2[0];

  preg_match("/S(\d+)\s*E(\d+)/",$ep_tit,$m);
  //print_r ($m);
  $season=$m[1];
  $episod=$m[2];
  array_push($episoade,array("title" => $ep_tit,"saason" => $season, "episod" => $episod, "link" => $link1));
}
}
}
//$requestLink=$link;
//$html= file_get_contents("http://uphero.xpresso.eu/movietv/f_ep.php?file=".$link);
//$x=json_encode($episoade);
//$r=json_decode($html,1);
//print_r ($r);
$c=count($episoade);
//die();

for ($i=0;$i<$c;$i++) {

  $season=$episoade[$i]["saason"];
  $episod=$episoade[$i]["episod"];
  $ep_tit=$episoade[$i]["title"];
  $link1=$episoade[$i]["link"];
   $title1=$series_title."|".$ep_tit;
   $title=$ep_tit;
   $image1=$image;
   $link2=$host."/scripts/filme/php/flixanity_link.php?file=".urlencode($link1).",".urlencode(str_replace(",","^",$title1)).",".$season.",".$episod.",series,".urlencode($image);
   if ($title) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$link2.'</link>
    <tit>'.urlencode(trim(str_replace(",","^",$title))).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <id>'.$season.'</id>
    <idt>'.$episod.'</idt>
    <movie>'.trim($link1).'</movie>
    <movie1>'.urlencode(trim($link1)).'</movie1>
    <mediaDisplay name="threePartsView"/>
     </item>
     ';
   }
}
//http://sit2play.com/movies/901259-My-Love,-My-Bride
//url="http://127.0.0.1/cgi-bin/scripts/filme/php/movietv_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
//echo "http://192.168.0.25/cgi-bin/scripts/filme/php/movietv_add.php?mod=add,".urlencode($link1).",".urlencode($title).",".urlencode($image).",".urlencode($year).",".urlencode($id1);
?>



</channel>
</rss>
