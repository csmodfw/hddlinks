#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<script>
	setRefreshTime(-1);
	enablenextplay = 0;
	itemCount = getPageInfo("itemCount");
</script>
<onExit>
setRefreshTime(-1);
</onExit>
<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
	if ( Integer( 1 + getFocusItemIndex() ) != getPageInfo("itemCount") && enablenextplay == 1 && playvideo == getFocusItemIndex()) {
		ItemFocus = getFocusItemIndex();
		setFocusItemIndex( Integer( 1 + getFocusItemIndex() ) );
		redrawDisplay();
		setRefreshTime(-1);
		"true";
	}

	if ( enablenextplay == 1 ) {
		enablenextplay = 0;
		url=getItemInfo(getFocusItemIndex(),"paurl");
		movie=getUrl(url);
		playItemUrl(movie,10);

		if ( Integer( 1 + getFocusItemIndex() ) == getPageInfo("itemCount") ) {
			enablenextplay = 0;
			setRefreshTime(-1);
		} else {
			playvideo = getFocusItemIndex();
			setRefreshTime(4000);
			enablenextplay = 1;
		}
	} else {
		setRefreshTime(-1);
		redrawDisplay();
		"true";
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
	sliding="no" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<text align="justify" redraw="yes"
          lines="8" fontSize=17
		      offsetXPC=55 offsetYPC=58 widthPC=40 heightPC=32
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="58" offsetYPC="52" widthPC="40" heightPC="5" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(pub); pub;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(titlu); titlu;</script>
		</text>
		<image  redraw="yes" offsetXPC=63 offsetYPC=20 widthPC=25 heightPC=30>
  <script>print(img); img;</script>
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
                      img = getItemInfo(idx,"image");
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
  			    if(focus==idx) "14"; else "14";
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

    <title>Canale muzica youtube</title>
    <menu>main menu</menu>
    <item>
    <title>Cat Music</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,catmusicoffice,,,Cat+Music</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,catmusicoffice,,,Cat+Music</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,catmusicoffice,,,Cat+Music</paurl>
    <name>Cat_Music.mp4</name>
    <annotation>Cool music, fresh artists and amazing hits - welcome to Cat Music's YouTube Channel! Over the last 20 years, Cat Music has been representing some of the ...</annotation>
    <image>http://lh5.googleusercontent.com/-6xgSVLwpLek/AAAAAAAAAAI/AAAAAAAAAAA/BtThpgUgWtc/photo.jpg</image>
    <durata></durata>
    <pub>2007-01-23T10:19:28.000Z</pub>
    <link1>catmusicoffice</link1>
    <title1>%28user%29+Cat+Music</title1>
    <media:thumbnail url="http://lh5.googleusercontent.com/-6xgSVLwpLek/AAAAAAAAAAI/AAAAAAAAAAA/BtThpgUgWtc/photo.jpg" />
    </item>

    <item>
    <title>Relax My Cat</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,relaxmycat,,,Relax+My+Cat</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,relaxmycat,,,Relax+My+Cat</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,relaxmycat,,,Relax+My+Cat</paurl>
    <name>Relax_My_Cat.mp4</name>
    <annotation>UNIQUE RELAXING CAT MUSIC MADE TO HELP CATS REMAIN CALM OR GO TO SLEEP. ♫ Available on iTunes so you can take your music anywhere: ...</annotation>
    <image>http://lh5.googleusercontent.com/-oJhah0_gBLE/AAAAAAAAAAI/AAAAAAAAAAA/op31HhQFUD4/photo.jpg</image>
    <durata></durata>
    <pub>2013-04-15T18:02:53.000Z</pub>
    <link1>relaxmycat</link1>
    <title1>%28user%29+Relax+My+Cat</title1>
    <media:thumbnail url="http://lh5.googleusercontent.com/-oJhah0_gBLE/AAAAAAAAAAI/AAAAAAAAAAA/op31HhQFUD4/photo.jpg" />
    </item>

    <item>
    <title>MediaProMusic</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,MediaProMusic,,,MediaProMusic</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,MediaProMusic,,,MediaProMusic</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,MediaProMusic,,,MediaProMusic</paurl>
    <name>MediaProMusic.mp4</name>
    <annotation>Record label 16 General Dona, Sector 1, cod 010782 Bucuresti, Romania Tel: +40 31 82 56 063 Fax: +40 31 82 56 013 Licensing: +40 (318) 256 058 ...</annotation>
    <image>http://lh5.googleusercontent.com/-SkMps--WqT0/AAAAAAAAAAI/AAAAAAAAAAA/tjcBMeZcB7U/photo.jpg</image>
    <durata></durata>
    <pub>2007-10-01T11:41:04.000Z</pub>
    <link1>MediaProMusic</link1>
    <title1>%28user%29+MediaProMusic</title1>
    <media:thumbnail url="http://lh5.googleusercontent.com/-SkMps--WqT0/AAAAAAAAAAI/AAAAAAAAAAA/tjcBMeZcB7U/photo.jpg" />
    </item>
    
    <item>
    <title>RotonMusicTV</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,RotonMusicTV,,,RotonMusicTV</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,RotonMusicTV,,,RotonMusicTV</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,RotonMusicTV,,,RotonMusicTV</paurl>
    <name>RotonMusicTV.mp4</name>
    <annotation>Roton Music TV is the channel where hitmakers gather! With more than 20 years of experience in the music industry, Roton earned its position in the top of the ...</annotation>
    <image>http://lh6.googleusercontent.com/-6ev6gvW2A1E/AAAAAAAAAAI/AAAAAAAAAAA/aV1VofirkqQ/photo.jpg</image>
    <durata></durata>
    <pub>2012-09-03T07:28:07.000Z</pub>
    <link1>RotonMusicTV</link1>
    <title1>%28user%29+RotonMusicTV</title1>
    <media:thumbnail url="http://lh6.googleusercontent.com/-6ev6gvW2A1E/AAAAAAAAAAI/AAAAAAAAAAA/aV1VofirkqQ/photo.jpg" />
    </item>
    
    <item>
    <title>musicroton</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,musicroton,,,musicroton</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,musicroton,,,musicroton</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,musicroton,,,musicroton</paurl>
    <name>musicroton.mp4</name>
    <annotation></annotation>
    <image>http://i.ytimg.com/i/OzSFwjkQD6oQohRf4D6ndA/mq1.jpg</image>
    <durata></durata>
    <pub>2007-07-09T08:32:50.000Z</pub>
    <link1>musicroton</link1>
    <title1>%28user%29+musicroton</title1>
    <media:thumbnail url="http://i.ytimg.com/i/OzSFwjkQD6oQohRf4D6ndA/mq1.jpg" />
    </item>
    
    <item>
    <title>HaHaHa Production</title>
    <link>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,hahahaproductioncom,,,HaHaHa+Production</link>
    <download>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,hahahaproductioncom,,,HaHaHa+Production</download>
    <paurl>http://127.0.0.1/cgi-bin/scripts/php1/youtube_user.php?query=1,hahahaproductioncom,,,HaHaHa+Production</paurl>
    <name>HaHaHa_Production.mp4</name>
    <annotation>HaHaHa Production : Music production / mixing / mastering / management.</annotation>
    <image>http://lh5.googleusercontent.com/-OXGJi6GepZY/AAAAAAAAAAI/AAAAAAAAAAA/GzCrFdW2Cog/photo.jpg</image>
    <durata></durata>
    <pub>2009-09-16T04:49:31.000Z</pub>
    <link1>hahahaproductioncom</link1>
    <title1>%28user%29+HaHaHa+Production</title1>
    <media:thumbnail url="http://lh5.googleusercontent.com/-OXGJi6GepZY/AAAAAAAAAAI/AAAAAAAAAAA/GzCrFdW2Cog/photo.jpg" />
    </item>
</channel>
</rss>
