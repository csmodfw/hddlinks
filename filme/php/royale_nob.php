#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
error_reporting(0);
$f="/usr/local/etc/dvdplayer/royale_serv.txt";
if (file_exists($f))
   $server=file_get_contents($f);
else
   $server="streamroyale.com";
$new_file = "/tmp/fs.dat";
$f=file_get_contents($new_file);
$t1=explode("\n",$f);
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
   $tit2=$tit;
else {
  preg_match("/s(\d+)e(\d+)/",$ep,$m);
  $sezon=$m[1];
  $episod=$m[2];
  $name = $r["seasons"][$sezon-1]["episodes"][$episod-1]["name"];
  $tit2=$sezon."x".$episod." - ".$name;
}
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<onEnter>
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
	itemWidthPC="80"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="80"
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
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
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
else if (userInput == "two" || userInput == "2")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/fs_del.php");
 "true";
}
ret;
</script>
</onUserInput>
      		
</mediaDisplay>
<channel>
	<title><?php echo str_replace("&","&amp;",$tit2); ?></title>
	<menu>main menu</menu>
<?php
echo '
<item>
<title>Cauta pe titrari.ro</title>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/titrari_main.php?query=1,royale</link>
<mediaDisplay name="threePartsView"/>
</item>
';
echo '
<item>
<title>Cauta pe subs.ro</title>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/subs_main.php?query=1,royale</link>
<mediaDisplay name="threePartsView"/>
</item>
';
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function decode_entities($text) {
    $text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
    $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
    $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
    return $text;
}
function get_value($q, $string) {
   $t1=explode($q,$string);
   return str_between($t1[1],"<string>","</string>");
}
   function generateResponse($request)
    {
        $context  = stream_context_create(
            array(
                'http' => array(
                    'method'  => "POST",
                    'header'  => "Content-Type: text/xml",
                    'content' => $request
                )
            )
        );
        $response     = file_get_contents("http://api.opensubtitles.org/xml-rpc", false, $context);
        return $response;
    }


if ($tip=="movie") {
/*
$f="/tmp/nob_list.txt";
if (!file_exists($f)) {
$out="";
$srt==array();
$link="http://uphero.xpresso.eu/srt/m/glob.php";
$html=file_get_contents($link);
$videos = explode(",", $html);
for ($k=0;$k<count($videos)-1;$k++) {
  $t1=explode('.',$videos[$k]);
  $id_srt=trim($t1[0]);
  $srt[$id_srt]="exista";
}
  $l1="http://superchillin.com/api/dump.php";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://superchillin.com");
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  $r=explode("\n",$html);
//$movies=array();
for ($k=count($r)-1;$k>=0;$k--) {
  if ($r[$k]) {
    $m=explode("***",$r[$k]);
    //if (preg_match("/scifi|sci-fi/i",$m[6])) {
    $id=$m[0];
    if ($srt[$id]) {
      $out .=$id."|".$m[3]."|".$m[1]."\n";
  }
}
}
file_put_contents($f,$out);
$h_nob=$out;
} else {
$h_nob=file_get_contents($f);
}
*/
$f="/tmp/nob_list.txt";
if (!file_exists($f)) {
$link="http://uphero.xpresso.eu/royale/movies.txt";
$out=file_get_contents($link);
file_put_contents($f,$out);
$h_nob=$out;
} else {
$h_nob=file_get_contents($f);
}
$t=explode("\n",$h_nob);
for ($k=0;$k<count($t);$k++) {
  $m=explode("|",$t[$k]);
  if ($imdbid == $m[1]) {
	    echo'
	    <item>
	    <title>(nob) '.$m[2].'</title>
        <onClick>
        <script>
        showIdle();
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/royale_sub.php?file=nob1,'.$m[0].'");
        cancelIdle();
        </script>
        </onClick>
        <annotation>Alegeti o subtitrare,return,play</annotation>
        </item>
       ';
  
  }
}
} else {  //ep on nob
/*
 $l="http://superchillin.com/api/cipac/series_dump.php";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://superchillin.com");
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h1 = curl_exec($ch);
  curl_close($ch);
  //echo $h1;
  $find = 'imdb":"'.$imdbid.'"';
  if (strpos($h1,$find) !== false) {
   $z=json_decode($h1,1);
   //print_r ($z);
   $id_s="";
   foreach ($z as $key => $val) {
     if ($z[$key]["imdb"] == $imdbid) {
      $id_s= $z[$key]["id"];
      break;
    }
   }
   //echo $id_s;
   //die();
   if ($id_s) {
     $l="http://superchillin.com/api/cipac/episodes_dump.php?id=".$id_s;
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $l);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     curl_setopt ($ch, CURLOPT_REFERER, "http://superchillin.com");
     curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
     $h2 = curl_exec($ch);
     curl_close($ch);
     $id_ep="";
     $z=json_decode($h2,1);
     foreach ($z as $key => $val) {
      if ($z[$key]["season"] == $sezon && $z[$key]["episode"] == $episod) {
        $id_ep= $z[$key]["id"];
        $ep_tit= $z[$key]["title"];
        break;
      }
     }
   }
   */
   $l="http://uphero.xpresso.eu/royale/".$imdbid.".txt";
   $h2=file_get_contents($l);
     $id_ep="";
     $z=json_decode($h2,1);
     if ($z) {
     foreach ($z as $key => $val) {
      if ($z[$key]["season"] == $sezon && $z[$key]["episode"] == $episod) {
        $id_ep= $z[$key]["id"];
        $ep_tit= $z[$key]["title"];
        break;
      }
     }
     }
   if ($id_ep) {
    $link="http://uphero.xpresso.eu/srt/s/glob.php";
    $html=file_get_contents($link);
    if (strpos($html,",".$id_ep.".srt") !== false) {

	    echo'
	    <item>
	    <title>(nob) '.$ep_tit.'</title>
        <onClick>
        <script>
        showIdle();
        dummy=getURL("http://127.0.0.1/cgi-bin/scripts/filme/php/royale_sub.php?file=nob2,'.$id_ep.'");
        cancelIdle();
        </script>
        </onClick>
        <annotation>Alegeti o subtitrare,return,play</annotation>
        </item>
       ';

   }
   }
}
//}
/////////////////////////////////////////////////////////////////////////

?>
</channel>
</rss>
