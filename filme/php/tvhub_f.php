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
	<image  redraw="yes" offsetXPC=60 offsetYPC=25 widthPC=30 heightPC=25>
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
	    <script>"<?php echo $host."/scripts/filme/php/tvhub_f.php?page=1,search,";?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
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
  <title>Căutare filme</title>
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
/*
  $title="Seriale favorite";
  $link1 = $host."/scripts/filme/php/flixanity_s_fav.php";
  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link1.'</link>
  <image></image>
  </item>
  ';
}
*/
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
function rr($js_code) {
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
return $js_code;
}

function getClearanceLink($content, $url) {
  sleep (4);
  preg_match_all('/name="\w+" value="(.+?)"/', $content, $matches);
        $params = array();
        list($params['s'],$params['jschl_vc'], $params['pass']) = $matches[1];
$uri = parse_url($url);

$host=$uri["host"];
$result="";
$t1=explode('id="cf-dn',$content);
$t2=explode(">",$t1[1]);
$t3=explode("<",$t2[1]);
$cf=$t3[0];

preg_match("/f\,\s?([a-zA-z0-9]+)\=\{\"([a-zA-Z0-9]+)\"\:\s?([\/!\[\]+()]+|[-*+\/]?=[\/!\[\]+()]+)/",$content,$m);

eval("\$result=".rr($m[3]).";");
$pat="/".$m[1]."\.".$m[2]."(.*)+\;/";
preg_match($pat,$content,$p);
$t=explode(";",$p[0]);
for ($k=0;$k<count($t);$k++) {
 if (substr($t[$k], 0, strlen($m[1])) == $m[1]) {
   if (strpos($t[$k],"function(p){var p") !== false) {
     $a1=explode ("function(p){var p",$t[$k]);
     $t[$k]=$a1[0].$cf;
     $line = str_replace($m[1].".".$m[2],"\$result ",rr($t[$k])).";";
     eval($line);
   } else if (strpos($t[$k],"(function(p){return") !== false) {
     $a1=explode("(function(p){return",$t[$k]);
     $a2=explode('("+p+")")}',$a1[1]);
     $line = "\$index=".rr(substr($a2[1], 0, -2)).";";
     eval ($line);
     $line=str_replace($m[1].".".$m[2],"\$result ",rr($a1[0])." ".ord($host[$index]).");");
     eval ($line);
   } else {
     $line = str_replace($m[1].".".$m[2],"\$result ",rr($t[$k])).";";
     eval($line);
   }
 }
}
$params['jschl_answer'] = round($result, 10);
return sprintf("%s://%s/cdn-cgi/l/chk_jschl?%s",
                $uri['scheme'],
                $uri['host'],
                http_build_query($params)
            );
}
    function getClearanceLink_old($content, $url)
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
        //list($params['jschl_vc'], $params['pass']) = $matches[1];
        list($params['s'],$params['jschl_vc'], $params['pass']) = $matches[1];
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
            //echo $uri['host'];
            $params['jschl_answer'] += strlen($uri['host'])  ;
            //$params['jschl_answer'] += strlen("www2.123netflix.pr") ;
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
$ua = $_SERVER['HTTP_USER_AGENT'];
$cookie="/tmp/cloud.dat";

//$requestLink="http://hdpopcorns.co/category/latest-movies/";
if ($page==1 && $tip !="search") {
  if (file_exists($cookie)) unlink ($cookie);
  $requestLink="https://tvhub.org/";
  $exec_path="/usr/local/bin/Resource/www/cgi-bin/scripts/wget ";
  $exec = '--content-on-error -q -S --header="Connection: keep-alive" -U "'.$ua.'" --referer="'.$requestLink.'" --no-check-certificate "'.$requestLink.'" -O - 2>&1';
  $exec = $exec_path.$exec;
  $html=shell_exec($exec);
  //echo $html;
  if (strpos($html,"503 Service") !== false) {
     $rez = getClearanceLink($html,$requestLink);
     //echo $rez."\n";
     $exec = '-q  --load-cookies  '.$cookie.' --save-cookies '.$cookie.' -U "'.$ua.'" --no-check-certificate "'.$rez.'" -O -';
     $exec = $exec_path.$exec;
     //echo $exec;
     $h=shell_exec($exec);
     //echo $h;
     //echo (file_get_contents($cookie));
  }
}
/////////////////////////////////////////////////////////////
//https://serialenoi.online/wp-admin/admin-ajax.php

if ($tip=="search")
   $requestLink = "https://tvhub.org/?s=".str_replace(" ","+",$link);
else
   $requestLink="https://tvhub.org/lista-filme/page/".$page."/";

      $exec = '--content-on-error -S --keep-session-cookies -U "'.$ua.'" --referer="https://tvhub.org" --load-cookies  '.$cookie.' --save-cookies '.$cookie.' --no-check-certificate "'.$requestLink.'" -O - 2>&1';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      //echo $exec."\n";
      $html=shell_exec($exec);
      //echo (file_get_contents($cookie));
//echo $html;
//////////////////////////////////////////////////////////////////////////
if ($tip=="release")
 $videos = explode('div id="mt-', $html);
else
 $videos = explode('div id="mt-', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {

  $t1 = explode('href="', $video);
  $t2 = explode('"', $t1[1]);
  $link1 = $t2[0];
  $t1 = explode('alt="', $video);
  $t2 = explode('"', $t1[1]);
  $title11 = $t2[0];
  $id1=$link1;
  //$title=trim(preg_replace("/- filme online subtitrate/i","",$title));
  $t1 = explode('src="', $video);
  $t2 = explode('"', $t1[1]);
  $image = $t2[0];
  //$image=str_replace("https","http",$image);

  $image=$host."/scripts/filme/php/r_wget.php?file=".urlencode($image);
  //$image=$host."/scripts/util/wget.cgi?link=".$image.",referer=https://tvhub.ro";
  $image1=$image;
  //$year=trim(str_between($video,'movie-date">','<'));
  $title=$title11; //." (".$year.")";
  $title=html_entity_decode($title,ENT_QUOTES,'UTF-8');
  //$image1="http://127.0.0.1/cgi-bin/scripts/filme/php/https.php?file=series".urlencode(trim(str_replace(",","^",$title)));
  //$id_t=$id1;
  $id_t="";
   $link2=$host."/scripts/filme/php/filme_link.php?file=".urlencode($link1).",".urlencode(str_replace(",","^",$title));
   if ($title) {
     echo '
     <item>
     <title>'.str_replace("&","&amp;",str_replace("&amp;","&",$title)).'</title>
     <link>'.$link2.'</link>
    <title1>'.urlencode(trim(str_replace(",","^",$title))).'</title1>
    <link1>'.urlencode($link1).'</link1>
    <image>'.$image.'</image>
    <image1>'.$image1.'</image1>
    <tit>'.urlencode(trim(str_replace(",","^",$title))).'</tit>
    <tit1>'.urlencode(trim(str_replace(",","^",$title))).'</tit1>
    <id>'.$id1.'</id>
    <idt>'.$id_t.'</idt>
    <movie>'.trim($link1).'</movie>
    <movie1>'.urlencode(trim($link1)).'</movie1>
    <media:thumbnail url="'.$image.'" />
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
