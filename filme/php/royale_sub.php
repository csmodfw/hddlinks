#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
   function generateResponse($request)
    {
        $context  = stream_context_create(
            array(
                'http' => array(
                    'method'  => "POST",
                    'header'  => "Content-Type: text/xml",
                    'content' => $request
                )
            )
        );
        $response     = file_get_contents("http://api.opensubtitles.org/xml-rpc", false, $context);
        return $response;
    }
function round_fix($s) {
 $i=(int)($s);
 if (($s-$i) < 1/2)
   $r=$i;
 else
   $r=$i+1;
 return $r;
}
//$data = gzdecode(base64_decode($res['data'][0]['data']));
//PHP: if you download subtitles from XML-RPC,
//use: gzinflate(substr(base64_decode($subs_b64_data_from_xmlrpc),10)),
//if gz from web: gzinflate(substr($gz_subtitles),10);
//error_reporting(0);

exec ("rm -f /tmp/test.xml");
$query = $_GET["file"];
//page=1,release,".urlencode($link).",".urlencode($title);
if($query) {
   $queryArr = explode(',', $query);
   $tip = $queryArr[0];
   $file=$queryArr[1];
}
if ($tip=="nob1") {
 $f="http://uphero.xpresso.eu/srt/m/".$file.".srt";
 $h=file_get_contents($f);
} else if ($tip=="nob2") {
 $f="http://uphero.xpresso.eu/srt/s/".$file.".srt";
 $h=file_get_contents($f);
} else {
$f="/tmp/opensub.txt";
$token=file_get_contents($f);
$request="<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>
<methodCall>
<methodName>DownloadSubtitles</methodName>
<params>
 <param>
  <value>
   <string>".$token."</string>
  </value>
 </param>
 <param>
  <value>
   <array>
    <data>
     <value>
      <string>".$file."</string>
     </value>
    </data>
   </array>
  </value>
 </param>
</params>
</methodCall>";
//echo $request;
$response = generateResponse($request);
//echo $response;
$t1=explode("data",$response);
$data=str_between($t1[3],"<string>","</string>");
//echo $data;
//$h = gzinflate(base64_decode($data));
//$h = gzinflate(substr(base64_decode($data),10));
$a1=base64_decode($data);
$f="/tmp/opensub.srt.gz";
file_put_contents($f,$a1);
$exec="/usr/local/bin/Resource/www/cgi-bin/scripts/funzip /tmp/opensub.srt.gz";
$h = shell_exec($exec);
}
file_put_contents("/tmp/s.srt",$h);
?>
