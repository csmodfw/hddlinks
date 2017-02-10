#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://fck-c06.empflix.com/dev6/0/001/278/0001278761.fid?key=9cae6fe65285c1bbd00f6f953124bef3&src=emp
//http://fck-c06.empflix.com/dev6/0/001/278/0001278761.fid?key=9cae6fe65285c1bbd00f6f953124bef3&src=emp
//http://fck-c02.empflix.com/dev2/0/001/283/0001283707.fid?key=7a30c311e942e6db40c73bbbe579c403&src=emp
//http://fck-c02.empflix.com/dev2/0/001/283/0001283707.fid?key=7a30c311e942e6db40c73bbbe579c403&src=emp
$l = $_GET["file"];
$link="http://www.pornhub.com/view_video.php?viewkey=".$l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  $html = curl_exec($ch);
  curl_close($ch);

//$out=trim(str_between($html,"var player_quality_720p = '","'"));
//if (!$out)  $out=trim(str_between($html,"var player_quality_480p = '","'"));
//if (!$out)  $out=trim(str_between($html,"var player_quality_240p = '","'"));
$t1=explode("var player_quality_720p",$html);
$t2=explode('"',$t1[1]);
$part1=$t2[1];
$t2=explode('"',$t1[2]);
$part2=$t2[1];
if (strpos($part1,"http") !== false)
 $out=$part1.$part2;
else
 $out=$part2.$part1;
if (!$out) {
$t1=explode("var player_quality_480p",$html);
$t2=explode('"',$t1[1]);
$part1=$t2[1];
$t2=explode('"',$t1[2]);
$part2=$t2[1];
if (strpos($part1,"http") !== false)
 $out=$part1.$part2;
else
 $out=$part2.$part1;
}
print $out;
?>
