#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
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

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  image/tv_radio.png
		</image>
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
					  annotation = getItemInfo(idx, "title");
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
<amigo>
<link>
  <script>
  url2="http://hddlinks.p.ht/tv_rom2.php?pass=" + pass;
  url2;
</script>
</link>
</amigo>

  <channel>

    <title>TV Live</title>

<item>
<title>TV Live - favorite list</title>
<link><?php echo $host; ?>/scripts/tv/php/ohlulz_fav.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>România - posturi nationale si locale</title>
<link><?php echo $host; ?>/scripts/tv/tv_rom_new.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>TVR</title>
<link><?php echo $host; ?>/scripts/tv/tvr.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<?php
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f)) {
echo '
<item>
<title>Ines</title>
<link>'.$host.'/scripts/tv/ines.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
';
echo '
<item>
<title>gazw</title>
<link>'.$host.'/scripts/tv/gazv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
';

}
/*
$f="/usr/local/etc/dvdplayer/digi.m3u";
//$f="D:\EasyPHP\data\localweb\scripts1\digi.m3u";
if (file_exists($f)) {
echo '
<item>
<title>Spyce TV</title>
<link>'.$host.'/scripts/tv/php/spyce.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
';
}
*/
?>
<!--
<item>
<title>Dolce TV</title>
<link><?php echo $host; ?>/scripts/tv/dolce.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
 -->
<!--
<item>
<title>Voyo TV</title>
<link><?php echo $host; ?>/scripts/tv/voyo.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>Seenow TV (Freezone)</title>
<link><?php echo $host; ?>/scripts/tv/php/seenow_e.php?query=1,http://www.seenow.ro/freezone-9-pagina-,Seenow+TV+(freezone)</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>Seenow TV (Freezone)</title>
<link><?php echo $host; ?>/scripts/tv/php/seenow_e1.php?query=1,http://www.seenow.ro/freezone-9-pagina-,Seenow+TV+(freezone)</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>iptvro</title>
<link><?php echo $host; ?>/scripts/tv/php/iptvro_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>Seenow TV (Abonament)</title>
<link><?php echo $host; ?>/scripts/tv/php/seenow_e.php?query=1,http://www.seenow.ro/tv-60-pagina-,Seenow+TV+(abonament)</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>Filmbox TV (Abonament)</title>
<link><?php echo $host; ?>/scripts/tv/php/seenow_e.php?query=1,http://www.seenow.ro/ro/filmbox-live-62-pagina-,Filmbox+TV+(abonament)</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TVRPlus TV</title>
<link>/usr/local/etc/www/cgi-bin/scripts/tv/php/tvrplus_tv.rss</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>Diverse playlist</title>
<link><?php echo $host; ?>/scripts/tv/php/playlist_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>tvpemobil</title>
<link><?php echo $host; ?>/scripts/tv/php/tvpemobil_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>neterra</title>
<link><?php echo $host; ?>/scripts/tv/neterra.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>iptvsatlinks</title>
<link><?php echo $host; ?>/scripts/tv/php/iptvsatlinks_main.php?page=1</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>arconaitv.us</title>
<link><?php echo $host; ?>/scripts/tv/php/arconaitv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>iptv.filmover</title>
<link><?php echo $host; ?>/scripts/tv/php/filmover_main.php?page=1</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>dailyiptvlist</title>
<link><?php echo $host; ?>/scripts/tv/php/dailyiptvlist_main.php?page=1</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<!--
<item>
<title>România - Exclusiv</title>
<link>/usr/local/etc/www/cgi-bin/scripts/tv/tv_rom3.rss</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>România - WebTV (Massive Telecom)</title>
<link><?php echo $host; ?>/scripts/tv/webtv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>România - Special TV</title>
<link><?php echo $host; ?>/scripts/tv/tv_rom4.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>România - Digi TV</title>
<link><?php echo $host; ?>/scripts/tv/digitv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>România - Orange TV</title>
<link><?php echo $host; ?>/scripts/tv/orange.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>România - Voyo TV</title>
<link><?php echo $host; ?>/scripts/tv/voyo_tv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>România - VideosapTv</title>
<link><?php echo $host; ?>/scripts/tv/replayro.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>România - amigo TV</title>
<onClick>
<script>
optionsPath="/usr/local/etc/dvdplayer/amigo.dat";
pass = readStringFromFile(optionsPath);
if (pass == null)
{
 keyword = getInput();
 if (keyword != null)
 {
  url1="http://hddlinks.p.ht/reg.php?pass=" + keyword;
  msg=getUrl(url1);
  if (msg=="ok")
  {
   writeStringToFile(optionsPath, keyword);
   pass=keyword;
   jumpToLink("amigo");
  }
 }
}
else
{
 jumpToLink("amigo");
 }
 </script>
</onClick>
 </item>
-->

<!--
<item>
<title>TVR Plus</title>
<link><?php echo $host; ?>/scripts/tv/tvrplus_tv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>Spice TV</title>
<link><?php echo $host; ?>/scripts/tv/spice.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>PBX România</title>
<link><?php echo $host; ?>/scripts/tv/pbx.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>Youtube live</title>
<link><?php echo $host; ?>/scripts/php1/yt_playlist.php?query=1,PLU12uITxBEPFy1nVJaDM-nGeB2q66Z4nP,%28playlist%29+Youtube+Live</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>streams.magazinmixt.ro</title>
<link><?php echo $host; ?>/scripts/tv/php/magazin_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>oklivetv</title>
<link><?php echo $host; ?>/scripts/tv/php/oklivetv_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<?php
error_reporting(0);
$f="/usr/local/etc/dvdplayer/astra.m3u11";
if (file_exists($f)) {
/*
echo '
<item>
<title>Astra</title>
<link>'.$host.'/scripts/tv/astra.php</link>
<annotation>Astra TV</annotation>
<media:thumbnail url="image/tv_radio.png" />
</item>
';
*/

echo '
<item>
<title>gazv</title>
<link>'.$host.'/scripts/tv/gazv.php</link>
<annotation>Gazv TV</annotation>
<media:thumbnail url="image/tv_radio.png" />
</item>
';
/*
echo '
<item>
<title>gazv1</title>
<link>'.$host.'/scripts/tv/gazv1.php</link>
<annotation>Gazv TV</annotation>
<media:thumbnail url="image/tv_radio.png" />
</item>
';
*/
}
?>

<item>
<title>TV Live - Muzică</title>
<link><?php echo $host; ?>/scripts/tv/music_tv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>TV Live - Sport extern</title>
<link><?php echo $host; ?>/scripts/tv/tv_sport_live.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Shows</title>
<link><?php echo $host; ?>/scripts/tv/tvshows.php?query=1</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>Youtube live</title>
<link><?php echo $host; ?>/scripts/tv/yt_live_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->

<item>
<title>FilmOn</title>
<link><?php echo $host; ?>/scripts/tv/php/filmon_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>

<!--
<item>
<title>Playlist from database.eu.pn</title>
<link><?php echo $host; ?>/scripts/tv/simpletv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>WEBTV MD</title>
<link><?php echo $host; ?>/scripts/tv/webtv_md.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live - IPTV Player</title>
<link><?php echo $host; ?>/scripts/tv/tv_iptv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live from ilive.to</title>
<link><?php echo $host; ?>/scripts/tv/ilive.php?query=1,</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live from veohcast.tv</title>
<link><?php echo $host; ?>/scripts/tv/veohcast.php?query=1,</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live from freedocast.com</title>
<link><?php echo $host; ?>/scripts/tv/freedocast.php?query=1,</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live from Justin.tv</title>
<link><?php echo $host; ?>/scripts/tv/php/justintv_main.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live from skystreamlive.com</title>
<link><?php echo $host; ?>/scripts/tv/skystreamlive.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live - Deutschland (youfreetv.net)</title>
<link><?php echo $host; ?>/scripts/tv/youfreetv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live - Deutschland (tv-kino.net)</title>
<link><?php echo $host; ?>/scripts/tv/tv-kino.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>TV Live - Vietnam (vtc.com.vn)</title>
<link><?php echo $host; ?>/scripts/tv/vtc.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
<item>
<title>mozhay TV (Russian) - press Audio to change channel</title>
<link><?php echo $host; ?>/scripts/tv/mozhay.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->

<!--
<item>
<title>Liste TV Live online</title>
<link>http://hdforall.uphero.com/tv1/temp_tv.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
-->
</channel>
</rss>                                                                                                                             
