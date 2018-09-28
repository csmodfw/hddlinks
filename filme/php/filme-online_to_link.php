#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
//file=".urlencode($link1).",".urlencode($title).",".$id1.",".$id_t.",movie,".urlencode($image);
//file=watch-a-star-is-born-87970,A+Star+Is+Born,87970,,movie
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = urldecode($queryArr[0]);
   $title=urldecode($queryArr[1]);
   $title=str_replace("\\","",$title);
   $title=str_replace("^",",",$title);
   $id1= $queryArr[2];
   $id_t= $queryArr[3];
   $tip=$queryArr[4];
   $image= urldecode($queryArr[5]);
}
if ($tip == "series") {
   $t1=explode("|",$title);
   $title= $t1[1];
   $serial=$t1[0];
   $season = $queryArr[2];
   $episod = $queryArr[3];
   $t1=explode("|",$link);
   $tip_server=$t1[2];
   $ep=$t1[1];
   $link=$t1[0];
} else {
   $season = $queryArr[2];
   $episod = $queryArr[3];
}
$year="";
//print_r ($queryArr);
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
      0 (blue) folositi alta subtitrare
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
else if (userInput == "zero" || userInput == "0" || userInput == "option_blue")
   {
  t = getItemInfo(getFocusItemIndex(),"tit1");
  l = getItemInfo(getFocusItemIndex(),"movie1");
  id=getItemInfo(getFocusItemIndex(),"id");
  hhd=getItemInfo(getFocusItemIndex(),"serial");
  idt=getItemInfo(getFocusItemIndex(),"idt");
    movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/fs_det.php?file=" + t + "," + l + "," + id + "," + idt + "," + hhd + ",0";
    dummy = getURL(movie_info);
    jumpToLink("fs");
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
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs5.php</link>
</fs>
<channel>
	<title><?php echo $title; ?></title>
	<menu>main menu</menu>


<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//ypYZrEpHb
 function e() {
     //return "ypYZrEpHb";
     //return "ypYZrEpHb";
   $l11="https://filme-online.to/test2.js?639609";
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l11.'" --no-check-certificate "'.$l11.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html11=shell_exec($exec);
      $t1=explode('ll = "',$html11);
      $t2=explode('"',$t1[1]);
      return $t2[0];
 }
 function s($t) {
     $i=0;
     $n=0;
     for ($i = 0; $i < strlen($t); $i++)
      $n += ord($t[$i]) + $i;
     return $n;
 }
 function o($t, $i) {
     $n=0;
     $e=0;
     for ($n = 0; $n < max(strlen($t), strlen($i)); $n++) {
       $e += $n < strlen($i) ? ord($i[$n]) : 0;
       $e += $n < strlen($t) ? ord($t[$n]) : 0;
     }
     //return Number(e)[qB](16)
     return dechex($e);
     //return $e;
 }
 function a($id,$updata,$tsdata) {
     //var n, r,
     $n=0;
     $a = s(e());
     //echo $a."\n";
     //f[d] = fw + v, r = {id: id, update: updata, ts: tsdata};
     $a += s(o(e()."id", $id));
     $a += s(o(e()."update", $updata));
     $a += s(o(e()."ts", $tsdata));
     return $a;
 }
//$tip="movie";
//$link="eXP";
$id1=$season;
$id_t=$episod;
$time="123456789";
$srt="";
//$gid="f6I";
if ($tip=="movie") {
  $l11="https://filme-online.to/film/".$link."/";
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l11.'" --no-check-certificate "'.$l11.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html1=shell_exec($exec);
  //echo $html1;
  $x1=explode('data-gid="',$html1);
  $x2=explode('"',$x1[1]);
  $gid=$x2[0];
  
  $l1="https://filme-online.to/ajax/mep.php?id=".$link;
  //https://filme-online.to/ajax/mep.php?id=xm
  //https://filme-online.to/ajax/mtoken.php?eid=0_1xm&mid=xm&so=3&server=1&_=1503043394821
  //https://filme-online.to/ajax/msources.php?eid=0_1xm&x=&y=&mid=xm&gid=ME&lang=rum&epIndex=0&server=1&so=3&epNr=NaN
  //https://filme-online.to/ajax/mtoken.php?eid=q8o00w&mid=xm&lid=1833&ts=1503043200&up=0&so=2&_=1503043394822
  //https://filme-online.to/ajax/mtoken.php?eid=745012&mid=xm&so=1&server=7&_=1503043394823
  //https://filme-online.to/ajax/msources.php?eid=745012&x=IFmEgNFcXOoGvJbTmZ6BOB6E0M54yvgN5keGw7RT0xtD7Zg9yDX3XeIni7PM34CFzHuiV26Qm@CQ@x94vgoBDhnrIEqnYbwHCFZX9sVmR4TQBFPCgulwUcVUk92Hyk0PB4qasA8IchlT17e8dJ1cyAUFCgyPmEBMWURUVAcsDAN7iCFbFhguKN1ILt3AgjIxNEywRSh6LTks7CoRsOc4oZ5UTl5rRDxPrgwNu15R0CUTheLBeCA9VpwiAfztGg4n97Eui75CGRtSC@YsWjuO@b97Qyp7ATwLRwws78ZpK3xpXhsKJGRYUI/fJk8NlSFsD2tKJRwhWw1ceCcHBSdfQwFMTlwbC643XAMLPVxgWyExEzUW&y=LhyCgccIA7AF@9rJhcmTKFDS2t4zyugor1OVyKgG/U4QltZJgwjbWMoK&mid=xm&gid=ME&lang=rum&epIndex=0&server=7&so=1&epNr=0


      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l1.'" --no-check-certificate "'.$l1.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);

     /*
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l1.'" --no-check-certificate "'.$l1.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
      */
  $r=json_decode($html,1);
  //print_r ($r);
  $h=$r["html"];
  $ts=$r["ts"];
//print_r ($r);
//die();
  $videos = explode('div id="', $h);

  unset($videos[0]);
  $videos = array_values($videos);

  foreach($videos as $video) {
    //$title=str_between($video,"<strong>","</strong>");
    $ep=str_between($video,'id="ep-','"');
    $tip_server=trim(str_between($video,"server-item",'"'));
    $so=str_between($video,'data-so="','"');
    $server=str_between($video,'data-server="','"');
    $epNr=str_between($video,'data-epNr="','"');
    if ($so==2)
    $lid=a($ep,"0",$ts);
    else
    $lid="undefined";
    if (!$epNr) $epNr="NaN";
    $l2="https://gostream.is/ajax/movie_token?eid=".$ep."&mid=".$link."&_=".$time;
    $l2="https://filme-online.to/ajax/mtoken.php?eid=".$ep."&mid=".$link."&so=".$so."&server=".$server."&_=".$time."&ts=".$ts;

    if ($so==2)
      $l2="https://filme-online.to/ajax/mtoken.php?eid=".$ep."&mid=".$link."&lid=".$lid."&ts=".$ts."&up=0&so=2";
    else
      $l2="https://filme-online.to/ajax/mtoken.php?eid=".$ep."&mid=".$link."&so=".$so."&server=".$server;
    //echo $l2."\n";
      //var scrip = "/ajax/mtoken.php?eid=" + eid + "&mid=" + mid+"&so="+get_source_index()+"&server="+get_server_index();
//var scrip = "/ajax/mtoken.php?eid=" + eid + "&mid=" + mid+"&lid="+lid+"&ts="+tsdata+"&up="+updata+"&so="+get_source_index();

    //echo $h3;


      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l2.'" --no-check-certificate "'.$l2.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h3=shell_exec($exec);

    $x=str_between($h3,"_x='","'");
    $y=str_between($h3,"_y='","'");
    //https://filme-online.to/ajax/msources.php?eid=0_1xm&x=&y=&mid=xm&gid=ME&lang=rum&epIndex=0&server=1&so=3&epNr=NaN
    if ($tip_server == "embed")
      //$l3="https://gostream.is/ajax/movie_embed/".$ep;
      $l3="https://filme-online.to/ajax/movie_embed.php?eid=".$ep."&lid=".$lid."&ts=".$ts."&up=0&mid=".$link."&gid=".$gid."&epNr=0&type=film&server=NaN&epIndex=0";
///ajax/movie_embed.php?eid=" + eid +"&lid="+lid+"&ts="+tsdata+"&up="+updata+"&mid="+movie.id+"&gid="+movie.gid+"&epnr="+get_ep_nr()+"&type="+movie.type+"&server="+get_server_index()+"&epindex="+get_ep_index()
    else
      $l3="https://filme-online.to/ajax/msources.php?eid=".$ep."&x=".$x."&y=".$y."&mid=".$link."&gid=".$gid."&lang=rum&epIndex=0&server=".$server."&so=".$so."&epNr=".$epNr;
      //$l3="https://gostream.is/ajax/movie_sources/".$ep."?x=".$x."&y=".$y;
    //echo $l3."\n";

      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l3.'" --no-check-certificate "'.$l3.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h4=shell_exec($exec);

    //echo $title."\r\n";
    $r=json_decode($h4,1);
    //print_r($r);
    if ($tip_server == "embed") {
      $openload=$r["src"];
      $x1=explode("sub.file=",$openload);
      if ($x1[1]) {
      $srt=urldecode($x1[1]);
      $openload=$x1[0];
      }
    } else {
      $openload=$r["playlist"][0]["sources"][0]["file"];
      if (!$srt) $srt=$r["playlist"][0]["tracks"][0]["file"];
    }
    if (strpos($srt,"http") === false && $srt) $srt="https://filme-online.to".$srt;
    if (strpos($openload,"http") === false && $openload) $openload="http:".$openload;
    if ($openload) {
    $siteParts = parse_url($openload);
    $server=$siteParts['host'];
     echo '
     <item>
     <title>'.$server.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file='.urlencode($openload).'";
     movie=geturl(url);
     ';
     if ($srt) {
     echo '
     srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file='.urlencode($srt).'";
     dummy=geturl(srt);
     ';
     }
     echo '
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
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer2.rss");
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
    <tit>'.trim($title).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <an>'.$year.'</an>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <movie>'.trim($openload).'</movie>
    <serial>'.urlencode($serial).'</serial>
    <movie1>'.urlencode(trim(str_replace(",","|",$openload))).'</movie1>
     </item>
     ';
     }
}
} else {
    $l2="https://gostream.is/ajax/movie_token?eid=".$ep."&mid=".$link."&_=".$time;
    //echo $l2;
    /*
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $l2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
    curl_setopt ($ch, CURLOPT_REFERER, "https://gomovies.to");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $h3 = curl_exec($ch);
    curl_close($ch);
    */
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l2.'" --no-check-certificate "'.$l2.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h3=shell_exec($exec);
    $x=str_between($h3,"_x='","'");
    $y=str_between($h3,"_y='","'");

    if ($tip_server == "embed")
      $l3="https://gostream.is/ajax/movie_embed/".$ep;
    else
      $l3="https://gostream.is/ajax/movie_sources/".$ep."?x=".$x."&y=".$y;
    //echo $l3;
    /*
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $l3);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
    curl_setopt ($ch, CURLOPT_REFERER, "https://gomovies.to");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $h4 = curl_exec($ch);
    curl_close($ch);
    */
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l3.'" --no-check-certificate "'.$l3.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $h4=shell_exec($exec);
    //echo $title."\r\n";
    $r=json_decode($h4,1);
    //print_r($r);
    if ($tip_server == "embed")
      $openload=$r["src"];
    else {
      $openload=$r["playlist"][0]["sources"][0]["file"];
      if (!$srt) $srt=$r["playlist"][0]["tracks"][0]["file"];
    }
    if ($openload) {
    $siteParts = parse_url($openload);
    $server=$siteParts['host'];
     echo '
     <item>
     <title>'.$server.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/link.php?file='.urlencode($openload).'";
     movie=geturl(url);
     ';
     if ($srt) {
     echo '
     srt="http://127.0.0.1/cgi-bin/scripts/util/srt_xml.php?file='.urlencode($srt).'";
     dummy=geturl(srt);
     ';
     }
     echo '
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
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer2.rss");
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
    <tit>'.trim($title).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <an>'.$year.'</an>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <movie>'.trim($openload).'</movie>
    <serial>'.urlencode($serial).'</serial>
    <movie1>'.urlencode(trim(str_replace(",","|",$openload))).'</movie1>
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
