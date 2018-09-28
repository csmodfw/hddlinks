#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
set_time_limit(30);
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $pagetitle = trim(urldecode($queryArr[1]));
   $pagetitle=str_replace(urldecode("%C2%A0"),"",$pagetitle);
   $pagetitle = str_replace("\\","",$pagetitle);
   $pagetitle = str_replace("^",",",$pagetitle);
   $pagetitle = str_replace("&amp;","&",$pagetitle);
}
//$pagetitle="How I Met Your Mother";
//$link="http://www.filmeserialeonline.org/seriale/how-i-met-your-mother/";
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
		<text align="center" redraw="yes"
          lines="10" fontSize=17
		      offsetXPC=55 offsetYPC=55 widthPC=40 heightPC=42
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
   <script>print(desc); desc;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=22.5 widthPC=30 heightPC=25>
  <script>print(img); img;</script>
		</image>
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
					  desc = getItemInfo(idx, "desc");
					  annotation = getItemInfo(idx, "title");
					  img = getItemInfo(idx,"img_ep");
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

  "true";
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
<channel>
	<title><?php echo str_replace("&","&amp;",str_replace("&amp;","&",$pagetitle)); ?></title>
	<menu>main menu</menu>
<?php
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
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f))
   $user=true;
else
   $user=false;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, "https://filmeseriale.online");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  //$html=str_replace("script","zzzzz",$html);
  //echo $html;
$t1=explode('property="og:image" content="',$html);
$t2=explode('"',$t1[1]);
$pageimage=str_replace("https","http",$t2[0]);
$last_sez="";
$key="f8cf02e6b30bf8cc33c04c60695781aa";
$api_url="https://api.themoviedb.org/3/search/tv?api_key=".$key."&query=".urlencode($pagetitle);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT  ,10);
  curl_setopt($ch, CURLOPT_REFERER, "https://api.themoviedb.org");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
$r=json_decode($h,1);
$id_m=$r["results"][0]["id"];
//echo $id_m;
$videos = explode('class="numerando">', $html);
unset($videos[0]);
$videos = array_values($videos);
$n=0;
$title="";
foreach($videos as $video) {
    $t1 = explode('href="', $video);
if ( sizeof($t1)>1 ) {
    $t2 = explode('"', $t1[1]);
    $link = $t2[0];

    $t1=explode('<',$video);
    $title1=trim($t1[0]);
    preg_match("/(\d+)\s+x\s+(\d+)/",$title1,$m);
    //print_r ($m);
    $sez=$m[1];
    $ep=$m[2];
    $t2=explode('class="episodiotitle">',$video);
    $t3=explode("<",$t2[1]);
    $title2=trim($t3[0]);
    if ($user && $last_sez <> $sez && $id_m && !$title2) {
       $last_sez=$sez;
       $l="https://api.themoviedb.org/3/tv/".$id_m."/season/".$sez."?api_key=".$key;
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $l);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT  ,10);
       curl_setopt($ch, CURLOPT_REFERER, "https://api.themoviedb.org");
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       $h = curl_exec($ch);
       curl_close($ch);
       $r=json_decode($h,1);
       }
       if ($r) {
        $title2 = $r["episodes"][$ep-1]["name"];
        $desc=$r["episodes"][$ep-1]["overview"];
        $img_ep="http://image.tmdb.org/t/p/w780".$r["episodes"][$ep-1]["still_path"];
       }


    if ($title2)
    $title=$sez."x".$ep." - ".$title2;
    else
    $title=$sez."x".$ep;


      //$link = 'filme_link.php?file='.urlencode($link).",".urlencode($title);

   $link="http://127.0.0.1/cgi-bin/scripts/filme/php/filme_link.php?file=".$link.",".urlencode(str_replace(","," - ",str_replace(",","^",$pagetitle)." ".str_replace(",","^",$title)));
    echo '
    <item>
    <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
    <link>'.$link.'</link>
    <desc>'.$desc.'</desc>
    <img_ep>'.$img_ep.'</img_ep>
 		<media:thumbnail url="'.$pageimage.'" />
 		<mediaDisplay name="threePartsView"/>
    </item>
    ';
}
}
?>
</channel>
</rss>
