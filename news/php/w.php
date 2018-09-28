#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>"; ?>
<rss version="2.0">
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//$loc="Bacau, Romania";
//$alert="PerturbÄƒri potenÅ£iale cauzate de furtunÄƒ de la V 01:00 EEST pÃ¢nÄƒ la V 05:00 EEST";
$link="https://ipinfodb.com/";
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$link.'" --no-check-certificate "'.$link.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
$t1=explode("Weather",$html);
$t2=explode("(",$t1[1]);
$t3=explode(")",$t2[1]);
$id=$t3[0];
$l="https://weather.com/ro-RO/vreme/astazi/l/".$id;
$ua="Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X)";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //curl_setopt($ch, CURLOPT_REFERER, "http://hqq.tv/");
      $h = curl_exec($ch);
      curl_close($ch);
//echo $h;
$t1=explode('window.env =',$h);
$t1=explode('window.__data=',$h);
$t2=explode(';window.experience',$t1[1]);
$h1=$t2[0];
//echo $h1;
$r=json_decode($h1,1);
$alert=$r["ads"]["adaptorParams"]["alerts"]["data"]["vt1alerts"][0]["headline"];
$d=$r["dal"]["Location"];
$key = key($d);
$loc=" ".$d[$key]["data"]["prsntNm"];
//$d=$r["dal"]["DailyForecast"];
//$key = key($d);
$obs = $r["dal"]["Observation"];
$key = key($obs);
$acum = $obs[$key]["data"]["vt1observation"];
$time=$acum["observationTime"];
$d=$r["dal"]["HourlyForecast"];
$key = key($d);
$next=$d[$key]["data"]["vt1hourlyForecast"];
//echo $time;
//2018-06-13T10:54:42+0300
preg_match("/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/",$time,$m);
$acum_text = 'Actualizat la ora: '.$m[4].":".$m[5]."\r\n";
$acum_text .= "Temperatura: ".$acum["temperature"]."°C ,".$acum["phrase"].", (Temp. resimtita: ".$acum["feelsLike"]."°C)"."\r\n";
$acum_text .= "Presiunea: ".$acum["altimeter"]."mb ,".$acum["barometerTrend"]."\r\n";
$acum_text .= "Vant: ".$acum["windDirCompass"]." ".$acum["windSpeed"]." km/h"."\r\n";
$acum_text .= "Umiditate: ".$acum["humidity"]."%"."\r\n";
$acum_text .= "Indice UV: ".$acum["uvIndex"].", ".$acum["uvDescription"]."\r\n"."\r\n";
$acum_text .= "Evolutia in urmatoarele ore"."\r\n";
for ($k=0;$k<12;$k++) {
 $ora=$next[$k]["processTime"];
 $temp=$next[$k]["temperature"];
 $desc=$next[$k]["phrase"];
 preg_match("/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/",$ora,$m);
 $acum_text .= 'Ora: '.$m[4].":".$m[5]." Temp. ".$temp."°C ,".$desc."\r\n";
}
file_put_contents("/tmp/w.rss",$acum_text);
$d=$r["dal"]["DailyForecast"];
$key = key($d);
$prog=$d[$key]["data"]["vt1dailyForecast"];
$ras=$prog[0]["sunrise"];
preg_match("/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/",$ras,$m);

$ap=$prog[0]["sunset"];
preg_match("/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/",$ap,$n);
$soare="Rasarit: ".$m[4].":".$m[5]." ,Apus: ".$n[4].":".$n[5];
$luna="Luna: ".$prog[0]["moonPhrase"];
for ($k=0;$k<4;$k++) {
  $time=$prog[$k]["validDate"];
  preg_match("/(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)/",$time,$m);
  $day=$prog[$k]["dayOfWeek"];
  $ziua=$prog[$k]["day"];
  $noaptea=$prog[$k]["night"];
  $ziua1=$day["dayPartName"];
  $noaptea1=$noaptea["dayPartName"];
  $prog_text .= $day.", ".$m[3]."-".$m[2]."-".$m[1]."\r\n";
  $prog_text .= "Ziua: ".$ziua["narrative"]."\r\n";
  $prog_text .= "Noaptea: ".$noaptea["narrative"]."\r\n"."\r\n";
}
file_put_contents("/tmp/w1.rss",$prog_text);
//==========================================================

?>
<onEnter>
  descriere = readStringFromFile("/tmp/w.rss");
  descriere1 = readStringFromFile("/tmp/w1.rss");
</onEnter>
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
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>

		<backgroundDisplay>
			<image  offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
   /usr/local/etc/www/cgi-bin/scripts/news/image/vremea_bg.jpg
			</image>
		</backgroundDisplay>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" offsetXPC="5" offsetYPC="5" widthPC="44" heightPC="8" fontSize="17" backgroundColor="0:64:128" foregroundColor="100:200:255">
<?php echo $loc; ?>
</text>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" offsetXPC="51" offsetYPC="5" widthPC="44" heightPC="4" fontSize="10" backgroundColor="0:64:128" foregroundColor="100:200:255">
<?php echo $soare; ?>
</text>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" offsetXPC="51" offsetYPC="9" widthPC="44" heightPC="4" fontSize="10" backgroundColor="0:64:128" foregroundColor="100:200:255">
<?php echo $luna; ?>
</text>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" lines="25" offsetXPC="5" offsetYPC="15" widthPC="44" heightPC="70" fontSize="10" backgroundColor="0:64:128" foregroundColor="100:200:255">
<script>descriere;</script>
</text>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" lines="25" offsetXPC="51" offsetYPC="15" widthPC="44" heightPC="70" fontSize="10" backgroundColor="0:64:128" foregroundColor="100:200:255">
<script>descriere1;</script>
</text>
<text  fontFile="/usr/local/etc/www/cgi-bin/scripts/util/arialrb.ttf" redraw="yes" align="left" offsetXPC="5" offsetYPC="87" widthPC="90" heightPC="8" fontSize="10" backgroundColor="0:64:128" foregroundColor="100:200:255">
<?php echo $alert; ?>
</text>
<onUserInput>
<script>
      ret = "false";
      if(userInput == "right" || userInput == "R")
      {
        ret = "true";
      }
      ret;
</script>
</onUserInput>
</mediaDisplay>
<channel>
	<title>Vremea</title>
</channel>
</rss>
