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
  	<text align="left" offsetXPC="8" offsetYPC="3" widthPC="47" heightPC="4" fontSize="14" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Apasati tasta "info" pentru ajutor.
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
        image/adult.png
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

<title>Adult Channel - XXX</title>

<item>
<title>Tube8</title>
  <link><?php echo $host; ?>/scripts/adult/tube8.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>4tube</title>
  <link><?php echo $host; ?>/scripts/adult/php/4tube_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>extremetube</title>
  <link><?php echo $host; ?>/scripts/adult/php/extremetube_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>tjoob</title>
  <link><?php echo $host; ?>/scripts/adult/tjoob.php</link>
<mediaDisplay name="threePartsView"/>
</item>
<!--
<item>
<title>freepornvs</title>
  <link><?php echo $host; ?>/scripts/adult/php/freepornvs_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>redtube</title>
  <link><?php echo $host; ?>/scripts/adult/php/redtube_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>pornhub</title>
  <link><?php echo $host; ?>/scripts/adult/php/pornhub_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>jizzbunker</title>
  <link><?php echo $host; ?>/scripts/adult/php/jizzbunker_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>ah-me</title>
  <link><?php echo $host; ?>/scripts/adult/php/ah-me_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>xhamster</title>
  <link><?php echo $host; ?>/scripts/adult/php/xhamster_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>incestvidz</title>
  <link><?php echo $host; ?>/scripts/adult/php/incestvidz_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>slutload</title>
  <link><?php echo $host; ?>/scripts/adult/php/slutload_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>pornburst</title>
  <link><?php echo $host; ?>/scripts/adult/php/pornburst_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>pornjam</title>
  <link><?php echo $host; ?>/scripts/adult/php/pornjam_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>madthumbs</title>
  <link><?php echo $host; ?>/scripts/adult/php/madthumbs_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>pornfree.tv</title>
  <link><?php echo $host; ?>/scripts/adult/php/pornfree_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>XXX4PODS</title>
<link>http://xxx4pods.com/podcasts/podcast.xml</link>
<mediaDisplay name="threePartsView" sideLeftWidthPC="0" itemImageXPC="5" itemXPC="20" itemYPC="20" itemWidthPC="65" capWidthPC="70" unFocusFontColor="101:101:101" focusFontColor="255:255:255" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
<backgroundDisplay>
<image  offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
image/mele/backgd.jpg
</image>
</backgroundDisplay>
<image  offsetXPC=0 offsetYPC=2.8 widthPC=100 heightPC=15.6>
image/mele/rss_title.jpg
</image>
<text  offsetXPC=40 offsetYPC=8 widthPC=35 heightPC=10 fontSize=20 backgroundColor=-1:-1:-1 foregroundColor=255:255:255>
XXX4PODS
</text>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
</mediaDisplay>
</item>

<!--
  <item>
<title>Spankwire</title>
<link><?php echo $host; ?>/scripts/adult/php/spankwire_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
  <item>
<title>alotporn</title>
<link><?php echo $host; ?>/scripts/adult/php/alotporn_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
-->
  <item>
<title>xnxx</title>
<link><?php echo $host; ?>/scripts/adult/php/xnxx_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>xvideos</title>
<link><?php echo $host; ?>/scripts/adult/php/xvideos_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>anybunny</title>
<link><?php echo $host; ?>/scripts/adult/php/anybunny_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
<!--
  <item>
<title>datoporn</title>
<link><?php echo $host; ?>/scripts/adult/php/datoporn_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>
-->
  <item>
<title>milfzr</title>
<link><?php echo $host; ?>/scripts/adult/php/milfzr_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>thumbzilla</title>
<link><?php echo $host; ?>/scripts/adult/php/thumbzilla_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>fapbox</title>
<link><?php echo $host; ?>/scripts/adult/php/fapbox_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>youporn</title>
<link><?php echo $host; ?>/scripts/adult/php/youporn_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>taboop</title>
<link><?php echo $host; ?>/scripts/adult/php/taboop_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

  <item>
<title>spankbang</title>
<link><?php echo $host; ?>/scripts/adult/php/spankbang_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>thepornhd</title>
<link><?php echo $host; ?>/scripts/adult/php/thepornhd_main.php</link>
<mediaDisplay name="threePartsView"/>
</item>


</channel>
</rss>
