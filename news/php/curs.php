#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' ?>"; ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<mediaDisplay name="threePartsView" 
	showDefaultInfo="no" 
	bottomYPC="0" 
	itemGap="0" 
	itemPerPage="10" 
	showHeader="no" 
	sideLeftWidthPC="0" 
	itemImageXPC="0" 
	itemImageHeightPC="0" 
	itemImageWidthPC="0" 
	itemXPC="10" 
	itemYPC="10" 
	itemWidthPC="50" 
	itemHeightPC="8" 
	capWidthPC="55" 
	unFocusFontColor="101:101:101" 
	focusFontColor="255:255:255" 
	idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
	<idleImage>image/POPUP_LOADING_01.png </idleImage>
	<idleImage>image/POPUP_LOADING_02.png </idleImage>
	<idleImage>image/POPUP_LOADING_03.png </idleImage>
	<idleImage>image/POPUP_LOADING_04.png </idleImage>
	<idleImage>image/POPUP_LOADING_05.png </idleImage>
	<idleImage>image/POPUP_LOADING_06.png </idleImage>
	<idleImage>image/POPUP_LOADING_07.png </idleImage>
	<idleImage>image/POPUP_LOADING_08.png </idleImage>
</mediaDisplay>
<channel>
	<title>Curs Valutar</title>
	<menu>main menu</menu>
<?php
//m.cursbnr.ro
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$l = "http://m.cursbnr.ro/";
$l="https://www.cursbnr.ro/";
/*
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch,CURLOPT_REFERER,$l);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $html = curl_exec($ch);
  curl_close ($ch);
*/
      $ua="Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0";
      $exec = '-q -U "'.$ua.'" --referer="'.$l.'" --no-check-certificate "'.$l.'" -O -';
      $exec = "/usr/local/bin/Resource/www/cgi-bin/scripts/wget ".$exec;
      $html=shell_exec($exec);
  //echo $html;
//$title = str_between($html,'<table width="100%"',"</p>");
$t1=explode('<div id="infoText">',$html);
$title=str_between($html,"data de <strong>","</strong");
    echo '<item>';
    echo '<title>'.$title.'</title>';
    echo '</item>
    ';
//$html=str_between($html,'<table width="100%"','</table');
$videos = explode('td class="text-center hidden-xs', $html);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
    $t1=explode(">",$video);
    $t2=explode("<",$t1[1]);
    $title1=$t2[0];
    //$title1=str_between($video,'<td>','</td');
    //$title1=str_replace("<b>","",$title1);
    //$title1=str_replace("</b>","",$title1);
    $title2=str_between($video,'<td class="text-center">','<');
    //$title2=str_replace("<b>","",$title2);
    //$title2=str_replace("</b>","",$title2);
    $title=$title1." = ".$title2." RON";
    //$t1 = explode('<b>', $video);
    //$t2 = explode('</b>', $t1[1]);
    //$title = $t2[0].'RON';
    echo '<item>';
    echo '<title>'.$title.'</title>';
    echo '</item>
    ';
  }
  ?>
  </channel>
  </rss>
