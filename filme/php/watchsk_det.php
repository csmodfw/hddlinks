#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
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
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $tit = urldecode($queryArr[1]);
   $tit=str_replace("/",",",$tit);
   $tit=str_replace("\\","",$tit);
   $tit=str_replace("&amp;","&",$tit);
}
//http://vumoo.at/popup/movie_info/88871
/*
require_once 'httpProxyClass.php';
require_once 'cloudflareClass.php';

$httpProxy   = new httpProxy();
$httpProxyUA = 'proxyFactory';

$requestLink = "http://vumoo.at/popup/movie_info/".$link;
$requestPage = json_decode($httpProxy->performRequest($requestLink));
//echo $requestLink;
// if page is protected by cloudflare
if($requestPage->status->http_code == 503) {
	// Make this the same user agent you use for other cURL requests in your app
	cloudflare::useUserAgent($httpProxyUA);

	// attempt to get clearance cookie
	if($clearanceCookie = cloudflare::bypass($requestLink)) {
		// use clearance cookie to bypass page
		$requestPage = $httpProxy->performRequest($requestLink, 'GET', null, array(
			'cookies' => $clearanceCookie
		));
		// return real page content for site
		$requestPage = json_decode($requestPage);
		//echo $requestPage->content;
		$html = $requestPage->content;
	} else {
		// could not fetch clearance cookie
        $html="";
	}
}
*/
$requestLink = $link;
//$cookie="/tmp/vumoo.txt";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $requestLink);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt ($ch, CURLOPT_REFERER, "http://www.watchfree.to");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  //curl_setopt($ch, CURLOPT_HEADER,1);
  $html = curl_exec($ch);
  curl_close($ch);
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$a1=explode('div class="video-page-container',$html);
$html=$a1[1];
$t1=explode('src="',$a1[1]);
$t2=explode('"',$t1[1]);
$img=$t2[0];
$img=str_replace("https","http",$img);
$t1=explode('class="icon-calendar">',$html);
$t2=explode('<',$t1[1]);
$year=trim($t2[0]);


$imdb="IMDB Rating: ".trim(str_between($html,"IMDB:",'<'));
$t3=explode('<p>',$t1[1]);
$t4=explode("</p",$t3[1]);
$gen="Gen: ".trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$t4[0]));
$durata="";

//$t1=explode('"movie_actors">',$html);
//$t2=explode("</span",$t1[1]);
//$cast = "Stars: ".trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$t2[0]));
$cast="";
//$desc=trim(str_between($html,'class="synopsis">',"<"));
$t1=explode('class="video-page-desc">',$html);
$t2=explode("<",$t1[1]);
$desc = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$t2[0]));
$ttxml .=$tit."\n"; //title
$ttxml .= $year."\n";     //an
$ttxml .=$img."\n"; //image
$ttxml .=$gen."\n"; //gen
$ttxml .=$durata."\n"; //regie
$ttxml .=$imdb."\n"; //imdb
$ttxml .=$cast."\n"; //actori
$ttxml .=$desc."\n"; //descriere
//echo $ttxml;
$new_file = "/tmp/movie.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

