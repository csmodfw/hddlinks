#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$host = "http://127.0.0.1/cgi-bin";
error_reporting(0);

$ff="/tmp/n.txt";


$noob="http://superchillin.com";
$fh = fopen($ff, 'w');
fwrite($fh, $noob);
fclose($fh);
include ("../../common.php");

$noob_serv="/tmp/noob_serv.log";
if (!file_exists($noob_serv)) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://uphero.xpresso.eu/srt/noob_serv.dat");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
		$h = curl_exec($ch);
        curl_close($ch);

$fh = fopen($noob_serv, 'w');
fwrite($fh, $h);
fclose($fh);
}
?>
<rss version="2.0">
<script>
  cachePath = getStoragePath("key");
  optionsPath = cachePath + "noobroom_extra.dat";
  optionsArray = readStringFromFile(optionsPath);
  if(optionsArray == null)
  {
    numai_sub = "DA";
    alfabetic = "NU";
  arr = null;
  arr = pushBackStringArray(arr, numai_sub);
  arr = pushBackStringArray(arr, alfabetic);
  writeStringToFile(optionsPath, arr);
  }
  else
  {
    numai_sub = getStringArrayAt(optionsArray, 0);
    alfabetic = getStringArrayAt(optionsArray, 1);
  }
</script>
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
  info="Contribuiti cu subtitrari! http://uphero.xpresso.eu/srt/noob_free.php";
  start="0";
</onEnter>
<onExit>
setRefreshTime(-1);
</onExit>
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

  	<text redraw="yes" align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>"1=Doar subtitrate:" + numai_sub + ". 3=Sortate alfabetic: " + alfabetic;</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="254:254:254">
    <script>info;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
		image/movies.png
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
else if (userInput == "one" || userInput == "1")
{
if (numai_sub == "DA")
 numai_sub="NU";
else if (numai_sub == "NU")
 numai_sub="DA";
 arr = null;
 arr = pushBackStringArray(arr, numai_sub);
 arr = pushBackStringArray(arr, alfabetic);
 writeStringToFile(optionsPath, arr);
 redrawDisplay();
 "false";
}
else if (userInput == "three" || userInput == "3")
{
if (alfabetic == "DA")
 alfabetic="NU";
else if (alfabetic == "NU")
 alfabetic="DA";
 arr = null;
 arr = pushBackStringArray(arr, numai_sub);
 arr = pushBackStringArray(arr, alfabetic);
 writeStringToFile(optionsPath, arr);
 redrawDisplay();
 "false";
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

	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/noob_free_s.php?query=".$noob.","; ?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
	
<channel>
	<title>Movies from Noobroom</title>
	<menu>main menu</menu>
<item>
  <title>Căutare</title>
  <onClick>
		keyword = getInput();
		if (keyword != null)
		 {
	       jumpToLink("searchLink");
		  }
   </onClick>
</item>



<?php


  $title="Filme favorite";
  $link = $host."/scripts/filme/php/noob_free_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';


    $title="Latest";
    $link=$noob."/latest.php";
    $link1 = $host."/scripts/filme/php/noob_free.php?query=".urlencode($title).",".urlencode($link);
	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<annotation>'.$title.'</annotation>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
    $title="Latest (500)";
    $link=$noob."/latest.php";
    $link1 = $host."/scripts/filme/php/noob_free.php?query=".urlencode($title).",".urlencode($link).",500";
	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<annotation>'.$title.'</annotation>
	<mediaDisplay name="threePartsView"/>
	</item>
	';

    $title="Ultimele subtitrate";
    $link1 = $host."/scripts/filme/php/noob_free_sub.php";
	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<annotation>'.$title.'</annotation>
	<mediaDisplay name="threePartsView"/>
	</item>
	';


    $title="Release date";
	$link=$noob."/year.php";
    $link1 = $host."/scripts/filme/php/noob_free.php?query=".urlencode($title).",".urlencode($link);
	echo '
	<item>
	<title>'.$title.'</title>
	<link>'.$link1.'</link>
	<annotation>'.$title.'</annotation>
	<mediaDisplay name="threePartsView"/>
	</item>
	';



?>

</channel>
</rss>
