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
	sliding="no" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
		<!--<image offsetXPC=5 offsetYPC=2 widthPC=20 heightPC=16>
		  <script>channelImage;</script>
		</image>-->
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
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
					  location = getItemInfo(idx, "location");
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
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/adult/php/tube8.php?query=1,"; ?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
<script>
    channelImage = "/usr/local/etc/www/cgi-bin/scripts/adult/image/tube8.png";
  </script>
<channel>
<title>tube8</title>
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
<item>
<title>Newest Videos</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/latest/,release</link>
</item>

<item>
<title>Amateur</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/amateur/6/,release</link>
</item>

<item>
<title>Anal</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/anal/13/,release</link>
</item>

<item>
<title>Asian</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/asian/12/,release</link>
</item>

<item>
<title>Blowjob</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/blowjob/7/,release</link>
</item>

<item>
<title>Ebony</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/ebony/4/,release</link>
</item>

<item>
<title>Erotic</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/erotic/11/,release</link>
</item>

<item>
<title>Fetish</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/fetish/5/,release</link>
</item>

<item>
<title>Gay</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/gay/9/,release</link>
</item>

<item>
<title>Hardcore</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/hardcore/1/,release</link>
</item>

<item>
<title>Latina</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/latina/14/,release</link>
</item>

<item>
<title>Lesbian</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/lesbian/8/,release</link>
</item>

<item>
<title>Mature</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/mature/2/,release</link>
</item>

<item>
<title>Shemale</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/shemale/15/,release</link>
</item>

<item>
<title>Strip</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/strip/10/,release</link>
</item>

<item>
<title>Teen</title>
<link><?php echo $host; ?>/scripts/adult/php/tube8.php?query=1,https://www.tube8.com/cat/teen/3/,release</link>
</item>

</channel>
</rss>
