#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["page"];
//page=1,release,".urlencode($link).",".urlencode($title);
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $tip=$queryArr[1];
   if ($tip == "search") {
   $link = urldecode($queryArr[2]);
   $page_title="Cautare: ".urldecode($queryArr[3]);
   } else {
   $link = urldecode($queryArr[2]);
   $page_title=urldecode($queryArr[3]);
   }
   //if ($tip=="search" || $tip=="actor") $page_title="Cauta:".$link;
   $link=str_replace(" ","+",$link);
   $link=str_replace("+","%20",$link);

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
      right for more
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
else if (userInput == "one1" || userInput == "11")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
img=getItemInfo(getFocusItemIndex(),"image");
tit=getItemInfo(getFocusItemIndex(),"tit");
year=getItemInfo(getFocusItemIndex(),"an");
id=getItemInfo(getFocusItemIndex(),"id");
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/filme/php/flixanity_s_add.php?mod=add," + urlEncode(movie) + "," + urlEncode(tit) + "," + urlEncode(img) + "," + urlEncode(year) + "," + urlEncode(id);
 dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "right" || userInput == "R")
{
tit=getItemInfo(getFocusItemIndex(),"tit");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=movie" + tit;
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
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/filme-online_to_f.php?page=1,search,";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
<fs>
<link>http://127.0.0.1/cgi-bin/scripts/filme/php/fs1.php</link>
</fs>
<channel>
	<title><?php echo $page_title; ?></title>
	<menu>main menu</menu>


<?php
if ($page==1 && $tip=="release") {

echo '
<item>
  <title>Căutare film</title>
  <onClick>
        keyword = getInput("Input", "doModal");
		if (keyword != null)
		 {
	       jumpToLink("searchLink");
		  }
   </onClick>
</item>
';

}
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
    if (!function_exists('json_last_error_msg')) {
        function json_last_error_msg() {
            static $ERRORS = array(
                JSON_ERROR_NONE => 'No error',
                JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
                JSON_ERROR_STATE_MISMATCH => 'State mismatch (invalid or malformed JSON)',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
                JSON_ERROR_SYNTAX => 'Syntax error',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
            );

            //$error = json_last_error();
            $error='No error';
            return isset($ERRORS[$error]) ? $ERRORS[$error] : 'Unknown error';
        }
    }
if($page > 1) { ?>
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page-1).",".$tip.",".urlencode($link).",".urlencode($page_title);

?>
<title>Previous Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina anterioara</annotation>
<image1>image/left.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php
//https://gostream.is/
//https://filme-online.to/tip/film/all/all/all/all
if ($tip=="release") {
  $requestLink="https://filme-online.to/tip/film/all/all/all/all";
  $requestLink="https://filme-online.to/ajax/filtru.php";
  $post="tip=film&offset=".(48*($page-1))."&genres=all&year=all&subbed=all&quality=all";
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "https://filme-online.to");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $html = curl_exec($ch);
  curl_close($ch);
  */
  //echo $html;

$exec = '-q --header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$requestLink.'" --no-check-certificate "'.$requestLink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
/*
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$requestLink.'" --no-check-certificate "'.$requestLink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
      */
} else {
  //$requestLink="https://gomovies.to/ajax/suggest_search".$page;
  //$post="keyword=star+trek&token=dd2ca4d87518d2478db392b95ecf2c7e";
  $requestLink="https://filme-online.to/search/".str_replace("%20","+",$link);
  //https://filme-online.to/ajax/search_suggest.php
  //keyword=star+&token=ce2a8383a910395579c5c88e17837f7f
  //https://filme-online.to/search/star+trek
  /*
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "https://filme-online.to/");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close($ch);
  */

      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$requestLink.'" --no-check-certificate "'.$requestLink.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);

}
//echo $html;
 $videos = explode('data-movie-id="', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {

  $t1 = explode('"', $video);
  $link1 = $t1[0];

  $t1 = explode('title="', $video);
  $t2 = explode('"', $t1[1]);
  $title11 = $t2[0];
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('data-original="', $video);
  $t2 = explode('"', $t1[1]);
  $t3=explode("url=",$t2[0]);
  $image = $t3[1];

  $image=str_replace("https","http",$image);
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
  $title=$title11; //." (".$year.")";
  //$image1="http://127.0.0.1/cgi-bin/scripts/filme/php/https.php?file=movie".urlencode(trim(str_replace(",","^",$title)));
  //$id_t=$id1;
  $season="";
  $episod="";
   //$link2=$host."/scripts/filme/php/flixanity_s_ep.php?file=".urlencode($link1).",".urlencode($title).",".$id1.",".$id_t.",series,".urlencode($image);

   $link2=$host."/scripts/filme/php/filme-online_to_link.php?file=".urlencode($link1).",".urlencode(str_replace(",","^",$title)).",".$season.",".$episod.",movie,".urlencode($image);
   if ($title) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$link2.'</link>
    <image>'.$image.'</image>
    <image1>'.$image1.'</image1>
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
<item>
<?php
$sThisFile = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME'];
if ($tip=="search")
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($link);
else
$url = $sThisFile."?page=".($page+1).",".$tip.",".urlencode($link).",".urlencode($page_title);
?>
<title>Next Page</title>
<link><?php echo $url;?></link>
<annotation>Pagina urmatoare</annotation>
<image1>image/right.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
