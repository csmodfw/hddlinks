<?php
function diacritice($input) {
$string = urlencode($input);
	$string = str_replace("\xC3\x84\xE2\x80\x9A","\xC4\x82",$string);
	$string = str_replace("\xC3\x84\xC2\x83","\xC4\x83",$string);
    $string = str_replace("\xC4\x82\xC5\xBD","\xC3\x8E",$string);
    $string = str_replace("\xC4\x82\xC2\xAE","\xC3\xAE",$string);
    $string = str_replace("\xC4\xB9\xCB\x98","\xC5\xA2",$string);
    $string = str_replace("\xC4\xB9\xC5\x81","\xC5\xA3",$string);
    $string = str_replace("\xC4\x82\xE2\x80\X9A","\xC3\x82",$string);
    $string = str_replace("\xC4\x82\xCB\x98","\xC3\xA2",$string);
    $string = str_replace("\xC4\xB9\xC5\xBE","\xC5\x9E",$string);
    $string = str_replace("\xC4\xB9\xC5\xBA","\xC5\x9F",$string);
    $string = str_replace("\xC4\x8C\xC5\xA1","\xC5\xA2",$string);
    $string = str_replace("\xC4\x8C\xE2\x80\x99","\xC5\xA3",$string);
    $string = str_replace("\xC4\x8C\xC2\x98","\xC5\x9E",$string);
    $string = str_replace("\xC4\x8C\xE2\x84\xA2","\xC5\x9F",$string);
	$string = str_replace("\xC3\xA2\xE2\x84\xA2\xC5\x9E","\xE2\x99\xAA",$string);
$search = array("%C4%82", "%C4%83", "%C3%82", "%C3%A2", "%C3%8E", "%C3%AE", "%C8%98", "%C8%99", "%C8%9A", "%C8%9B", "%C5%9E", "%C5%9F", "%C5%A2", "%C5%A3");
$replace = array('A', 'a', 'A', 'a', 'I', 'i', 'S', 's', 'T', 't', 'S', 's', 'T', 't');
$out = str_replace($search, $replace, $string);
return urldecode($out);
}
function fix_enc($h) {
 if (function_exists("mb_convert_encoding")) {
    $map = array(
        chr(0x8A) => chr(0xA9),
        chr(0x8C) => chr(0xA6),
        chr(0x8D) => chr(0xAB),
        chr(0x8E) => chr(0xAE),
        chr(0x8F) => chr(0xAC),
        chr(0x9C) => chr(0xB6),
        chr(0x9D) => chr(0xBB),
        chr(0xA1) => chr(0xB7),
        chr(0xA5) => chr(0xA1),
        chr(0xBC) => chr(0xA5),
        chr(0x9F) => chr(0xBC),
        chr(0xB9) => chr(0xB1),
        chr(0x9A) => chr(0xB9),
        chr(0xBE) => chr(0xB5),
        chr(0x9E) => chr(0xBE),
        chr(0x80) => '&euro;',
        chr(0x82) => '&sbquo;',
        chr(0x84) => '&bdquo;',
        chr(0x85) => '&hellip;',
        chr(0x86) => '&dagger;',
        chr(0x87) => '&Dagger;',
        chr(0x89) => '&permil;',
        chr(0x8B) => '&lsaquo;',
        chr(0x91) => '&lsquo;',
        chr(0x92) => '&rsquo;',
        chr(0x93) => '&ldquo;',
        chr(0x94) => '&rdquo;',
        chr(0x95) => '&bull;',
        chr(0x96) => '&ndash;',
        chr(0x97) => '&mdash;',
        chr(0x99) => '&trade;',
        chr(0x9B) => '&rsquo;',
        chr(0xA6) => '&brvbar;',
        chr(0xA9) => '&copy;',
        chr(0xAB) => '&laquo;',
        chr(0xAE) => '&reg;',
        chr(0xB1) => '&plusmn;',
        chr(0xB5) => '&micro;',
        chr(0xB6) => '&para;',
        chr(0xB7) => '&middot;',
        chr(0xBB) => '&raquo;',
    );
	$h = html_entity_decode(mb_convert_encoding(strtr($h, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');

	$h = str_replace("\xC3\x84\xE2\x80\x9A","\xC4\x82",$h);
	$h = str_replace("\xC3\x84\xC2\x83","\xC4\x83",$h);
    $h = str_replace("\xC4\x82\xC5\xBD","\xC3\x8E",$h);
    $h = str_replace("\xC4\x82\xC2\xAE","\xC3\xAE",$h);
    $h = str_replace("\xC4\xB9\xCB\x98","\xC5\xA2",$h);
    $h = str_replace("\xC4\xB9\xC5\x81","\xC5\xA3",$h);
    $h = str_replace("\xC4\x82\xE2\x80\X9A","\xC3\x82",$h);
    $h = str_replace("\xC4\x82\xCB\x98","\xC3\xA2",$h);
    $h = str_replace("\xC4\xB9\xC5\xBE","\xC5\x9E",$h);
    $h = str_replace("\xC4\xB9\xC5\xBA","\xC5\x9F",$h);
    $h = str_replace("\xC4\x8C\xC5\xA1","\xC5\xA2",$h);
    $h = str_replace("\xC4\x8C\xE2\x80\x99","\xC5\xA3",$h);
    $h = str_replace("\xC4\x8C\xC2\x98","\xC5\x9E",$h);
    $h = str_replace("\xC4\x8C\xE2\x84\xA2","\xC5\x9F",$h);
	$h = str_replace("\xC3\xA2\xE2\x84\xA2\xC5\x9E","\xE2\x99\xAA",$h);
	return $h;
	} else {
      return $h;
    }
}
function fix_s($s) {
     $s = str_replace("&amp;","&",$s);
     $s = str_replace("&ordm;","s",$s);
     $s = str_replace("&Ordm;","S",$s);
     $s = str_replace("&thorn;","t",$s);
     $s = str_replace("&Thorn;","T",$s);
     $s = str_replace("&icirc;","i",$s);
     $s = str_replace("&Icirc;","I",$s);
     $s = str_replace("&atilde;","a",$s);
     $s = str_replace("&Atilde;","I",$s);
     $s = str_replace("&ordf;","S",$s);
     $s = str_replace("&acirc;","a",$s);
     $s = str_replace("&Acirc;","A",$s);
     $s=str_replace("&ldquo;","'",$s);
     $s = str_replace("&#8220;","'",$s);
     $s = str_replace("&#8221;","'",$s);
     $s = str_replace("&#8217;","'",$s);
     $s = str_replace("&#8211;","-",$s);
     $s = str_replace("&nbsp;","",$s);
     $s = str_replace("&quot;","'",$s);
     $s=str_replace("&bdquo;","'",$s);
     $s=str_replace("&rdquo;","'",$s);
     $s=str_replace("&#8","",$s);
     
    $s=str_replace("\u015e","S",$s);
    $s=str_replace("\u015f","s",$s);
    $s=str_replace("\u0163","t",$s);
    $s=str_replace("\u0162","T",$s);
    $s=str_replace("\u0103","a",$s);
    $s=str_replace("\u0102","A",$s);
    $s=str_replace("\u00a0"," ",$s);
    $s=str_replace("\u00e2","a",$s);
    $s=str_replace("\u021b","t",$s);
    $s=str_replace("\u201e","'",$s);
    $s=str_replace("\u201d","'",$s);
    $s=str_replace("\u0219","s",$s);
    $s=str_replace("\u00ee","i",$s);
    $s=str_replace("\u00ce","I",$s);
    $s=str_replace("\u021a","T",$s);
    $s=str_replace("\u00c2","A",$s);
    $s=str_replace("\u0218","S",$s);
    $s=str_replace("\u00f6","oe",$s);
    $s=str_replace("\u00fc","u",$s);
    $s=str_replace("\u00e4","a",$s);
    $s=str_replace("\u00e9","e",$s);
    $s=str_replace("\/","/",$s);

    $s=urlencode($s);
    $s=str_replace("%C8%99","s",$s);
    $s=str_replace("%C8%9B","t",$s);
    $s=str_replace("%C8%98","S",$s);
    $s=str_replace("%C4%83","a",$s);
    $s=str_replace("%C3%A3","a",$s);
    $s=str_replace("%C3%AE","i",$s);
    $s=str_replace("%C3%A2","a",$s);
    $s=str_replace("%C5%A3","t",$s);
    $s=str_replace("%C3%8E","I",$s);
    $s=str_replace("%C8%9A","T",$s);
    $s=str_replace("%C5%9F","s",$s);
    $s=str_replace("%E2%80%99","'",$s);
    
    $s=str_replace("%3E%3E","<",$s);
    $s=str_replace("%3C%3C",">",$s);
    
    $s=str_replace("<","",$s);
    $s=str_replace(">","",$s);
    $s=urldecode($s);
     return $s;
}
$check="http://hddlinks.p.ht/c.php?";
$check="http://hddlinks.pht.ro/c.php?";
$check="http://hdforall.freehostia.com/c.php?"
?>
