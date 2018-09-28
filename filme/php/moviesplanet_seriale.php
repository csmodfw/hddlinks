#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = urldecode($queryArr[1]);
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2= adauga la favorite ,3= re-logon,right for more
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=60>
         <script>print(image); image;</script>
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
					  annotation = getItemInfo(idx, "title");
					  image = getItemInfo(idx,"image1");
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
showIdle();
  t = getItemInfo(getFocusItemIndex(),"title1");
  l = getItemInfo(getFocusItemIndex(),"link1");
  i = getItemInfo(getFocusItemIndex(),"imdb");
  img = getItemInfo(getFocusItemIndex(),"image1");
  url="http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_add.php?mod=add," + l + "," + t + "," + i;
   dummy=getUrl(url);
 cancelIdle();
 redrawDisplay();
 ret="true";
}
else if (userInput == "three" || userInput == "3")
{
 url=geturl("http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_del.php");
 jumptolink("logon");
 "true";
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"link1");
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

	<logon>
	<link>
	<script>
	url="/usr/local/etc/www/cgi-bin/scripts/filme/php/moviesplanet.rss";
	url;
	</script>
	</link>
	</logon>
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/filme/php/moviesplanet_seriale.php?query=1,"; ?>" + urlEncode(keyword);</script>
	  </link>
	</searchLink>
<channel>
	<title>moviesplanet - seriale</title>
	<menu>main menu</menu>
<?php
//$query = $_GET["query"];

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
<image1>image/left.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>


<?php } ?>

<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
    function getClearanceLink($content, $url)
    {
        /*
         * 1. Mimic waiting process
         */
        sleep(4);

        /*
         * 2. Extract "jschl_vc" and "pass" params
         */
        preg_match_all('/name="\w+" value="(.+?)"/', $content, $matches);


        $params = array();
        list($params['jschl_vc'], $params['pass']) = $matches[1];
        // Extract CF script tag portion from content.
        $cf_script_start_pos    = strpos($content, 's,t,o,p,b,r,e,a,k,i,n,g,f,');
        $cf_script_end_pos      = strpos($content, '</script>', $cf_script_start_pos);
        $cf_script              = substr($content, $cf_script_start_pos, $cf_script_end_pos-$cf_script_start_pos);
        /*
         * 3. Extract JavaScript challenge logic
         */
        preg_match_all('/:[\/!\[\]+()]+|[-*+\/]?=[\/!\[\]+()]+/', $cf_script, $matches);
        //print_r ($matches);

            /*
             * 4. Convert challenge logic to PHP
             */
            $php_code = "";
            foreach ($matches[0] as $js_code) {
                // [] causes "invalid operator" errors; convert to integer equivalents
                $js_code = str_replace(array(
                    ")+(",
                    "![]",
                    "!+[]",
                    "[]"
                ), array(
                    ").(",
                    "(!1)",
                    "(!0)",
                    "(0)"
                ), $js_code);
                $php_code .= '$params[\'jschl_answer\']' . ($js_code[0] == ':' ? '=' . substr($js_code, 1) : $js_code) . ';';
            }
            //echo $php_code;
            /*
             * 5. Eval PHP and get solution
             */
            eval($php_code);
            // toFixed(10).
            $params['jschl_answer'] = round($params['jschl_answer'], 10);
            // Split url into components.
            $uri = parse_url($url);
            // Add host length to get final answer.
            $params['jschl_answer'] += strlen($uri['host']);
            /*
             * 6. Generate clearance link
             */
             //echo http_build_query($params);
            return sprintf("%s://%s/cdn-cgi/l/chk_jschl?%s",
                $uri['scheme'],
                $uri['host'],
                http_build_query($params)
            );
    }
if ($page == 1) {
exec ("rm -f /tmp/moviesplanet.txt");
}

if ($search =="release") {
if ($page == 1) {
echo '
<item>
  <title>Căutare</title>
  <onClick>
     keyword = getInput("Input", "doModal");
		if (keyword != null)
		 {
	       jumpToLink("searchLink");
		  }
   </onClick>
</item>
';
  $title="Lista serialelor favorite";
  $link = $host."/scripts/filme/php/moviesplanet_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <image></image>
  </item>
  ';

}
}
$host = "http://127.0.0.1/cgi-bin";
$pop="/usr/local/etc/dvdplayer/moviesplanet.txt";
//echo $l;
//$html = file_get_contents("http://uphero.xpresso.eu/movietv/m1.php?file=".$l."&res=".$res);
$cookie="/tmp/moviesplanet.txt";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0";
if ($page == 1) {
exec ("rm -f /tmp/moviesplanet.txt");
//exec ("rm -f /tmp/cloud.dat");
//$cookie="D://m.txt";

if (!file_exists($pop)) {
  $title="Trebuie sa aveti cont!";
	echo '
	<item>
	<title>'.$title.'</title>
	<link></link>
	<mediaDisplay name="threePartsView"/>
	</item>
	';
} else {
  $url="https://www.moviesplanet.tv/";
  $referer=$url;
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  //$exec_path = "D:/Temp/wget ";
  $exec = '--content-on-error -q -S --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$referer.'" --no-check-certificate "'.$url.'" -O - 2>&1';
  $exec = $exec_path.$exec;
  $response=shell_exec($exec);
  if (strpos($response,"HTTP/1.1 200 OK") === false) {
  $rez=getClearanceLink($response,$url);
  $exec = '-q --keep-session-cookies --load-cookies  '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$url.'" --no-check-certificate "'.$rez.'" -O -';
  $exec = $exec_path.$exec;
  $h=shell_exec($exec);
  }
  $handle = fopen($pop, "r");
  $c = fread($handle, filesize($pop));
  fclose($handle);
  $a=explode("|",$c);
  $a1=str_replace("?","@",$a[0]);
  $user=urlencode($a1);
  $user=str_replace("@","%40",$user);
  $pass=trim($a[1]);


$l="https://www.moviesplanet.tv/login";
$post="returnpath=%2F&username=".$user."&password=".$pass;
$exec = '-q --keep-session-cookies --load-cookies '.$cookie.' --save-cookies '.$cookie.' --header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$response=shell_exec($exec);
}
}
if (file_exists($pop)) {
if ($search=="release") {
$base="https://www.moviesplanet.tv/tv-shows";
if($page > 1) {
  $l =$base."/date/".$page;
} else {
	$page = 1;
  $l=$base;
}
//$l =$search."/date/".$page;
//echo $l;
$cookie="/tmp/moviesplanet.txt";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --keep-session-cookies --load-cookies '.$cookie.' -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$html=shell_exec($exec);
//echo $html;
$videos = explode('class="ml-item"', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $title=str_between($video,'class="mli-info"><h2>','</h2');
  if (!$title) {
    $t1=explode('id="title"',$video);
    $t2=explode('title="',$t1[1]);
    $t3=explode('"',$t2[1]);
    $title=$t3[0];
  }

  //$image=str_between($video,'timthumb.php?src=','"');
  $link1= str_between($video,'href="','"');
  if (!$title) {
    $t1=explode("show/",$link1);
    $title=$t1[1];
  }
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('timthumb.php?src=', $video);
  $t2 = explode('&', $t1[1]);
  $image = $t2[0];
  $t1=explode('data-jtip="',$video);
  $t2=explode('"',$t1[1]);
  //echo $t2[0];
  if (preg_match("/(tt\d+)/",$t2[0],$m))
     $imdb=$m[1];
  else
     $imdb="";
  $image1="http://127.0.0.1/cgi-bin/scripts/filme/php/r_m.php?file=".$image;
  //$image1=$image;
	if($link1!="") {
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
		//$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/fs.php?query=".$link.",".urlencode($title).",movie";
		$link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_s.php?file='.$link1.','.urlencode(str_replace(",","^",$title));
		echo'
		<item>
		<title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
		<link>'.$link.'</link>
	  <annotation>'.$title.'</annotation>
	  <image>'.$image.'</image>
	  <image1>'.$image1.'</image1>
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <imdb>'.$imdb.'</imdb>
	  <media:thumbnail url="image/movies.png" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
	}
	//}
}
} else {
$post="q=".str_replace(" ","+",$search)."&limit=100&timestamp=1234567890&verifiedCheck=";
$l="https://www.moviesplanet.tv/ajax/search.php";
$exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
$exec = '-q --keep-session-cookies --load-cookies '.$cookie.' --header="Accept-Encoding: deflate" --header="Content-Type: application/x-www-form-urlencoded"  --post-data="'.$post.'" -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
$exec = $exec_path.$exec;
$response=shell_exec($exec);
$r=json_decode($response,1);
$c=count($r);
for ($k=0;$k<$c;$k++) {
  $title=$r[$k]["title"];
  $image=$r[$k]["image"];
  $link1= $r[$k]["permalink"];
  $meta=$r[$k]["meta"];
  if (preg_match("/(tt\d+)\.jpg/",$image,$m))
     $imdb=$m[1];
  else
     $imdb="";
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));

  $image="http://127.0.0.1/cgi-bin/scripts/filme/php/r_m.php?file=".$image;
  //$image="image/movies.png";
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
   if (strpos($meta,"Movie") === false) {
		$link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/moviesplanet_s.php?file='.$link1.','.urlencode(str_replace(",","^",$title));
		echo'
		<item>
		<title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
		<link>'.$link.'</link>
	  <annotation>'.$title.'</annotation>
	  <image>'.$image.'</image>
	  <image1>'.$image1.'</image1>
    <title1>'.urlencode(str_replace(",","^",$title)).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <imdb>'.$imdb.'</imdb>
	  <media:thumbnail url="image/movies.png" />
	  <mediaDisplay name="threePartsView"/>
		</item>
		';
  }
}
}
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
<image1>image/right.jpg</image1>
<mediaDisplay name="threePartsView"/>
</item>
</channel>
</rss>
