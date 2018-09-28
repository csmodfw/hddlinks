#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = $queryArr[1];
}
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
//echo $f;
$t1=explode("\n",$f);
if ($search=="noob") {
$id=$t1[1];
$tit=$t1[0];
$subtitle = $t1[2];
$server = $t1[3];
$hd = $t1[4];
$tv= $t1[5];
$imdbid= $t1[6];

if ($tv==0) {
  $tip="movie";
} else {
  $tip="series";
  $tit2=$tit;
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
}
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";
}
if ($search=="tvseries") {
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[0]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $tit=str_replace("&amp;","&",$tit);

if ($tip=="series") {
  $sezon=$t1[2];
  $episod=$t1[3];

$l="http://www.tvseries.net".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $imdbid="";
  $t1=explode("imdb=",$html);
  $t2=explode('"',$t1[1]);
  $imdbid=$t2[0];
  $imdbid = str_replace("tt","",$imdbid);
  $t1=explode('h5 class="text-center">',$html);
  $t2=explode('<',$t1[1]);
  $tit=$t2[0];
  $tit=trim(preg_replace("/Season\s+\d+/i","",$tit));
  $tit=$tit." ".$sezon."x".$episod;
} else {
  //$tit2=$tit;
  $l="http://www.tvseries.net".$link;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $imdbid="";
  $t1=explode("imdb=",$html);
  $t2=explode('"',$t1[1]);
  $imdbid=$t2[0];
  $imdbid = str_replace("tt","",$imdbid);
}
  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";
}
if ($search=="royale") {
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="streamroyale.com";
$imdb=urldecode($t1[0]);
$ep=$t1[1];
$tip=$t1[2];
$cookie="/tmp/royale.txt";
$l="https://".$server."/api/v1/title/".$imdb;
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies  '.$cookie.' -U "'.$ua.'"  --no-check-certificate "'.$l.'" -O -';
//echo $exec;
$exec = $exec_path.$exec;
$html=shell_exec($exec);
$r=json_decode($html,1);
$tit=$r["title"];
$imdbid = str_replace("tt","",$imdb);
if ($tip=="movie")
   $tit2="";
else {
  preg_match("/s(\d+)e(\d+)/",$ep,$m);
  $sezon=$m[1];
  $episod=$m[2];
  $name = $r["seasons"][$sezon-1]["episodes"][$episod-1]["name"];
  $tit2=$sezon."x".$episod." - ".$name;
}

  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";
  
}
if ($search=="watch") {
$imdbid= $t1[4];
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[2]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);

  $tit=str_replace("&amp;","&",$tit);
  $tit2=urldecode($t1[0]);
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
if ($tip=="series") {
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
//echo $sezon." ".$episod."ceva";
}
  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";

}
if ($search=="watchsk") {
$imdbid= $t1[4];
$tip=trim($t1[5]);
//echo $tip;
$link=urldecode($t1[1]);

  $tit=urldecode($t1[2]);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);

  $tit=str_replace("&amp;","&",$tit);
  $tit2=urldecode($t1[0]);
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
if ($tip=="series") {
  preg_match("/(\d+)x(\d+)/",$tit2,$m);
  $sezon=$m[1];
  $episod=intval($m[2]);
//echo $sezon." ".$episod."ceva";
}
  $page1=($page-1)*20;
  //$l="https://www.titrari.ro/index.php?page=cautareavansata&z7=Star+Trek%3A+Voyager&z2=&z5=&z3=-1&z4=-1&z8=1&z9=All&z11=0&z6=0";
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=&z6=0&z7=".urlencode($tit)."&z8=1&z9=All&z10=&z11=0";
  //$l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";

}
if ($search=="planet") {
$imdb= $t1[4];
$link=urldecode($t1[1]);
$tit=urldecode($t1[0]);
$sezon=$t1[2];
$episod=$t1[3];
$tip=$t1[5];
if (!$imdb) {
$cookie="/tmp/moviesplanet.txt";
$ua="proxyFactory";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --load-cookies '.$cookie.'  -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
$exec = $exec_path.$exec;
//echo $exec;
$html=shell_exec($exec);
$t1=explode('class="thumb mvi-cover"',$html);
$t2=explode('url(',$t1[1]);
$t3=explode(')',$t2[1]);
  if (preg_match("/(tt\d+)\.jpg/",$t3[0],$m))
     $imdb=$m[1];
  else
     $imdb="";

$ttxml="";
$ttxml .=urlencode($tit)."\n"; //title
$ttxml .= urlencode($link)."\n";     //an
$ttxml .=$sezon."\n"; //image
$ttxml .=$episod."\n"; //gen
$ttxml .=$imdb."\n"; //regie
$ttxml .=$tip."\n"; //imdb
//$ttxml .=$imdb."\n"; //imdb

//echo $ttxml;
$new_file = "/tmp/fs.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
}
$imdbid = str_replace("tt","",$imdb);
$tit=str_replace("\'","'",$tit);

if ($tip=="movie") {
  $tit2="";
} else {
  $tit2=$sezon."x".$episod;
}
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";
//echo $imdbid;
}
if ($search=="cartoon") {
$imdbid= $t1[5];
$sezon=$t1[2];
if ($sezon) {
  $tip="series";
  $tit2=$t1[0];
  $tit2=str_replace("\\","",$tit2);
  $tit2=str_replace("^",",",$tit2);
  $tit=$t1[4];
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $link=$t1[1];
  $sezon=$t1[2];
  $episod=$t1[3];
} else {
  $tip="movie";
  $tit=$t1[0];
  $tit=str_replace("\\","",$tit);
  $tit=str_replace("^",",",$tit);
  $link=$t1[1];
}
  $page1=($page-1)*20;
  $l="https://www.titrari.ro/index.php?page=cautareavansata&z1=".$page1."&z2=&z3=-1&z4=-1&z5=".$imdbid."&z6=0&z7=&z8=1&z9=All&z10=&z11=0";
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
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>

		<text align="left" redraw="yes"
          lines="10" fontSize=17
		      offsetXPC=55 offsetYPC=25 widthPC=40 heightPC=42
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation1); annotation1;</script>
		</text>
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
                      annotation1 = getItemInfo(idx, "title");
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
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$tit))." ".str_replace("&","&amp;",str_replace("&amp;","&",$tit2)); ?></title>
	<menu>main menu</menu>


<?php



if($page > 1) { ?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page-1).",";
if($search) { 
  $url = $url.$search; 
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
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
$exec = '-q -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$h=shell_exec($exec);
$videos=explode('<h1><a style=color:black',$h);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
  $t1=explode(">",$video);
  $t2=explode("<",$t1[1]);
  $title=$t2[0];
  $t1=explode("<td class=comment",$video);
  //$t2=explode(">",$t1[1]);
  $t3=explode("</tr>",$t1[1]);
  $desc="<td class=comment".$t3[0];
  $desc = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$desc);
  $t1=explode("get.php?",$video);
  $t2=explode('>',$t1[1]);
  $link=$t2[0];
  echo '
  <item>
  <title>'.$title.'</title>
  <link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari.php?query='.$link.','.$search.'</link>
  <annotation>'.$desc.'</annotation>
    <mediaDisplay name="threePartsView"/>
    </item>
    ';
}

?>

<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page+1).",";
if($search) { 
  $url = $url.$search; 
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
