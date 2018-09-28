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
  middleItem = Integer(itemCount / 2);
  redrawDisplay();
</onRefresh>

	<mediaDisplay name=photoView
	  centerXPC=7
		centerYPC=30
		centerHeightPC=40
columnCount=5
	  rowCount=1
		menuBorderColor="55:55:55"
		sideColorBottom="0:0:0"
		sideColorTop="0:0:0"
	  backgroundColor="0:0:0"
		imageBorderColor="0:0:0"
		itemBackgroundColor="0:0:0"
		itemGapXPC=0
		itemGapYPC=1
		sideTopHeightPC=22
		bottomYPC=85
		sliding=yes
		showHeader=no
		showDefaultInfo=no
		idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>

		<!--  lines="5" fontSize=15 -->
		<text align="center" redraw="yes"
  lines=3 fontSize=17
		      offsetXPC=5 offsetYPC=65 widthPC=90 heightPC=20
		      backgroundColor=0:0:0 foregroundColor=120:120:120>
			<script>print(annotation); annotation;</script>
		</text>

		<text align="center" redraw="yes" offsetXPC=10 offsetYPC=85 widthPC=80 heightPC=10 fontSize=15 backgroundColor=0:0:0 foregroundColor=75:75:75>
			<script>print(location); location;</script>
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
			<image>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "annotation");
					}
					getItemInfo(idx, "image");
				</script>
			 <offsetXPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 12;
			   </script>
			 </offsetXPC>
			 <offsetYPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 6;
			   </script>
			 </offsetYPC>
			 <widthPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 100; else 75;
			   </script>
			 </widthPC>
			 <heightPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 50; else 37;
			   </script>
			 </heightPC>
			</image>

			<text align="center" lines="4" offsetXPC=0 offsetYPC=55 widthPC=100 heightPC=45 backgroundColor=-1:-1:-1>
				<script>
					idx = getQueryItemIndex();
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "18"; else "14";
  				</script>
				</fontSize>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "75:75:75";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>

  <onUserInput>
    <script>
      ret = "false";
      userInput = currentUserInput();
      majorContext = getPageInfo("majorContext");

      print("*** majorContext=",majorContext);
      print("*** userInput=",userInput);

      if(userInput == "one" || userInput == "1")
      {
        if(itemCount &gt;= 1)
        {
          setFocusItemIndex(0);
          redrawDisplay();
        }
      }
      else if(userInput == "two" || userInput == "2")
      {
        if(itemCount &gt;= 2)
        {
          setFocusItemIndex(1);
          redrawDisplay();
        }
      }
      else if(userInput == "three" || userInput == "3")
      {
        if(itemCount &gt;= 3)
        {
          setFocusItemIndex(2);
          redrawDisplay();
        }
      }
      else if(userInput == "four" || userInput == "4")
      {
        if(itemCount &gt;= 4)
        {
          setFocusItemIndex(3);
          redrawDisplay();
        }
      }
      else if(userInput == "five" || userInput == "5")
      {
        if(itemCount &gt;= 5)
        {
          setFocusItemIndex(4);
          redrawDisplay();
        }
      }
      else if(userInput == "six" || userInput == "6")
      {
        if(itemCount &gt;= 6)
        {
          setFocusItemIndex(5);
          redrawDisplay();
        }
      }
      else if(userInput == "seven" || userInput == "7")
      {
        if(itemCount &gt;= 7)
        {
          setFocusItemIndex(6);
          redrawDisplay();
        }
      }
      else if(userInput == "eight" || userInput == "8")
      {
        if(itemCount &gt;= 8)
        {
          setFocusItemIndex(7);
          redrawDisplay();
        }
      }
      else if(userInput == "nine" || userInput == "9")
      {
        if(itemCount &gt;= 9)
        {
          setFocusItemIndex(8);
          redrawDisplay();
        }
      }
      if(userInput == "zero" || userInput == "0")
      {
        if(itemCount &gt;= 10)
        {
          setFocusItemIndex(9);
          redrawDisplay();
        }
      }
      else if (userInput == "pagedown" || userInput == "pageup" || userInput == "PD" || userInput == "PG")
      {
        itemSize = getPageInfo("itemCount");
        idx = Integer(getFocusItemIndex());
        if (userInput == "pagedown")
        {
          idx -= -5;
          if(idx &gt;= itemSize)
            idx = itemSize-1;
        }
        else
        {
          idx -= 5;
          if(idx &lt; 0)
            idx = 0;
        }
        setFocusItemIndex(idx);
        setItemFocus(idx);
        redrawDisplay();
        ret = "true";
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

    <title>Stiri si Emisiuni din Moldova</title>

<item>
<title>Publika.Md</title>
<link><?php echo $host; ?>/scripts/tv/php/publika.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/publika.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/publika.jpg</image>
<location>http://publika.md/</location>
<annotation>Site-ul de stiri care iti ofera informatia proaspata corecta obiectiva si documentata despre stirile de ultima ora.</annotation>
</item>
<!--
<item>
<title>JurnalTV</title>
<link><?php echo $host; ?>/scripts/tv/php/jurnaltv.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/jurnaltv.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/jurnaltv.jpg</image>
<location>http://jurnaltv.md/</location>
<annotation>JurnalTV - Prima televiziune de stiri din Republica Moldova</annotation>
</item>
-->
<item>
<title>Moldova in Direct</title>
<link><?php echo $host; ?>/scripts/tv/php/moldova-in-direct_main.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/moldova-in-direct.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/moldova-in-direct.jpg</image>
<location>http://www.trm.md/ro/moldova-in-direct/</location>
<annotation>Emisiune difuzata de postul Moldova 1</annotation>
</item>

<item>
<title>In PROfunzime</title>
<link><?php echo $host; ?>/scripts/tv/php/in-profunzime.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/in-profunzime.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/in-profunzime.png</image>
<location>http://inprofunzime.md/emisiuni/shows/in-profunzime-cu-lorena-bogza/</location>
<annotation>Emisiune difuzata de postul PROTV</annotation>
</item>

<item>
<title>ProTV Moldova</title>
<link><?php echo $host; ?>/scripts/tv/php/protv_md.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/protv.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/protv.jpg</image>
<location>http://www.protv.md/</location>
<annotation>Vezi aici emisiuni inregistrate ale postului TV ProTV Moldova</annotation>
</item>
<!--
<item>
<title>Europa libera</title>
<link><?php echo $host; ?>/scripts/tv/php/europalibera.php?query=1,</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/protv.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/protv.jpg</image>
<location>https://www.europalibera.org/z/453</location>
<annotation>Vezi aici emisiuni inregistrate ale postului Europa Libera</annotation>
</item>
-->
<!--
<item>
<title>Pahomi - Realitatea</title>
<link><?php echo $host; ?>/scripts/tv/php/pahomi.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/realitatea.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/realitatea.png</image>
<location>http://www.realitatea.md/emisiuni/pahomi.html</location>
<annotation>O emisiune în care vom invita la un dialog sincer oamenii care fac politica în Republica Moldova si cei care o pot influenta.</annotation>
</item>
-->
<item>
<title>PunctulpeAZi</title>
<link><?php echo $host; ?>/scripts/php1/facebook.php?query=1,PunctulpeAZi,PunctulpeAZi,</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png</image>
<location>http://facebook.com/PunctulpeAZi</location>
<annotation>Emisiune PunctulpeAZi pe facebook</annotation>
</item>

<item>
<title>agora.md</title>
<link><?php echo $host; ?>/scripts/php1/facebook.php?query=1,agora.md,agora.md,</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png</image>
<location>http://facebook.com/agora.md</location>
<annotation>Emisiunea agora.md pe facebook</annotation>
</item>

<item>
<title>TVRMoldova</title>
<link><?php echo $host; ?>/scripts/php1/facebook.php?query=1,TVRMoldova,TVRMoldova,</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png</image>
<location>http://facebook.com/TVRMoldova</location>
<annotation>TVRMoldova pe facebook</annotation>
</item>

<item>
<title>TVRMoldova (youtube)</title>
<link><?php echo $host; ?>/scripts/tv/php/tvrmoldova.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/tvrstiri.png</image>
<location>https://www.youtube.com/channel/UCK1s1xxDRmGFno5j2nqqWXQ</location>
<annotation>TVRMoldova</annotation>
</item>

<item>
<title>privesc.eu</title>
<link><?php echo $host; ?>/scripts/tv/php/privesc_main.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/privesc.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/privesc.jpg</image>
<location>http://www.privesc.eu</location>
<annotation>Privesc.eu</annotation>
</item>

</channel>
</rss>
