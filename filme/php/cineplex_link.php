#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$amigo="/usr/local/etc/dvdplayer/tvplay.txt";
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="cineplex.to";
$query = $_GET["file"];
//page=1,release,".urlencode($link).",".urlencode($title);
if($query) {
   $queryArr = explode(',', $query);
   $tip = $queryArr[0];
   $imdb=$queryArr[1];
   $token=$queryArr[2];
   $title=urldecode($queryArr[3]);
   $title=str_replace("^",",",$title);
   $title=str_replace("\\","",$title);
   $title=str_replace("&amp;","&",$title);
}
if ($tip=="movie") {
   $image=urldecode($queryArr[4]);
   //$tit2=$tit;
   $tit2="";
   $id=str_between($imdb,"movies/","-");
} else {
   $id=str_between($imdb,"series/","-");
   $image=urldecode($queryArr[4]);
   $se=urldecode($queryArr[5]);
   $tit2=urldecode($queryArr[6]);
   $tit2=str_replace("^",",",$tit2);
   $tit2=str_replace("\\","",$tit2);
   $tit2=str_replace("&amp;","&",$tit2);
  preg_match("/(\d+)x(\d+)/",$se,$m);
  $sez=$m[1];
  $ep=intval($m[2]);
}

$cookie="/tmp/royale.txt";
if ($tip=="movie")
$l="https://".$server."/movies/getMovieLink?id=".$id."&token=".$token."&oPid=&_=";
else
$l="https://".$server."/series/getTvLink?id=".$id."&token=".$token."&s=".$sez."&e=".$ep."&oPid=&_=";

$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'"  --no-check-certificate "'.$l.'" -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$r=json_decode($html,1);
if (strpos($html,"&end=") !== false) $user="free";
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
      0/blue/red/green/yellow = folositi alta subtitrare
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
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
  redrawDisplay();
  ret="true";
}
else if (userInput == "zero" || userInput == "0")
   {
  t = getItemInfo(getFocusItemIndex(),"movie");
  tip=getItemInfo(getFocusItemIndex(),"tip");
  tit=getItemInfo(getFocusItemIndex(),"title1");
  ep=getItemInfo(getFocusItemIndex(),"ep");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + tit + "," + ep + "," + tip;
  dummy = getURL(movie_info);

    jumpToLink("fs");
    "true";
}
else if (userInput == "option_red")
   {
  t = getItemInfo(getFocusItemIndex(),"movie");
  tip=getItemInfo(getFocusItemIndex(),"tip");
  ep=getItemInfo(getFocusItemIndex(),"ep");
  tit=getItemInfo(getFocusItemIndex(),"title1");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + tit + "," + ep + "," + tip;
  dummy = getURL(movie_info);

    jumpToLink("fs1");
    "true";
}
else if (userInput == "option_green")
   {
  t = getItemInfo(getFocusItemIndex(),"movie");
  tip=getItemInfo(getFocusItemIndex(),"tip");
  ep=getItemInfo(getFocusItemIndex(),"ep");
  tit=getItemInfo(getFocusItemIndex(),"title1");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + tit + "," + ep + "," + tip;
  dummy = getURL(movie_info);

    jumpToLink("fs2");
    "true";
}
else if (userInput == "option_yellow")
   {
  t = getItemInfo(getFocusItemIndex(),"movie");
  tip=getItemInfo(getFocusItemIndex(),"tip");
  ep=getItemInfo(getFocusItemIndex(),"ep");
  tit=getItemInfo(getFocusItemIndex(),"title1");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + tit + "," + ep + "," + tip;
  dummy = getURL(movie_info);

    jumpToLink("fs3");
    "true";
}
else if (userInput == "option_blue")
   {
  t = getItemInfo(getFocusItemIndex(),"movie");
  tip=getItemInfo(getFocusItemIndex(),"tip");
  ep=getItemInfo(getFocusItemIndex(),"ep");
  tit=getItemInfo(getFocusItemIndex(),"title1");
  movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + tit + "," + ep + "," + tip;
  dummy = getURL(movie_info);

    jumpToLink("fs4");
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
<fs>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_fs.php</link>
</fs>
<fs1>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_main.php?query=1,cineplex</link>
</fs1>
<fs2>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subs_main.php?query=1,cineplex</link>
</fs2>
<fs3>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subtitrari_main.php?query=1,cineplex</link>
</fs3>
<fs4>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_fs.php</link>
</fs4>

<channel>
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$title." ".$tit2)); ?></title>
	<menu>main menu</menu>


<?php
exec ("rm -f /tmp/s.srt");
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
if ($tip=="movie") {
$arr=$r["jwplayer"];
$se="";
//print_r ($arr);

} else {
$arr=$r["jwplayer"];
}
if ($user=="free" && file_exists($amigo)) {
  //if ($tip=="movie")
  //  $arr=$r["links"]["links"];
  //else
  //  $arr=$r["links"][$se]["links"];
  foreach ($arr as $key => $val) {
     $title1=$arr[$key]["label"]." - Part 1";
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title1)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_link1.php?file='.$imdb.',0,'.$tip.','.$arr[$key]["label"].','.$token.','.$se.'";
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
    streamArray = pushBackStringArray(streamArray, "'.$title1.'");
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
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <movie>'.$imdb.'</movie>
    <tip>'.$tip.'</tip>
    <ep>'.$se.'</ep>
    <token>'.$token.'</token>
    <image1>'.$image.'</image1>
     </item>
     ';
     $title1=$arr[$key]["label"]." - Part 2";
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title1)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_link1.php?file='.$imdb.',600,'.$tip.','.$arr[$key]["label"].','.$token.','.$se.'";
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
    streamArray = pushBackStringArray(streamArray, "'.$title1.'");
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
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <movie>'.$imdb.'</movie>
    <tip>'.$tip.'</tip>
    <ep>'.$se.'</ep>
    <token>'.$token.'</token>
    <image1>'.$image.'</image1>
     </item>
     ';
  }
} else {
  //if ($tip=="movie")
  //  $arr=$r["links"]["links"];
  //else
  //  $arr=$r["links"][$se]["links"];
  foreach ($arr as $key => $val) {
     $title1=$arr[$key]["label"];
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title1)).'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/cineplex_link1.php?file='.$imdb.',0,'.$tip.','.$arr[$key]["label"].','.$token.','.$se.'";
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
    streamArray = pushBackStringArray(streamArray, "'.$title1.'");
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
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <movie>'.$imdb.'</movie>
    <tip>'.$tip.'</tip>
    <ep>'.$se.'</ep>
    <token>'.$token.'</token>
    <image1>'.$image.'</image1>
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
