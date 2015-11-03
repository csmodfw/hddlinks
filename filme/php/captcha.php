#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
exec ("rm -f /usr/local/etc/www/cgi-bin/scripts/filme/php/captcha.png");
exec ("rm -f /tmp/captcha.txt");
exec ("rm -f /tmp/ticket.txt");
$filelink = urldecode($_GET["file"]);
if (strpos($filelink,"openload") !== false) {
   $filelink=str_replace("openload.co/f/","openload.co/embed/",$filelink);
   preg_match('/openload\.co\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $filelink, $match);
   $file = $match[2];
   $key="UebmYlZN";
   $login="de2a2a3fe31fdb89";
   $ticket="https://api.openload.co/1/file/dlticket?file=".$file."&login=".$login."&key=".$key;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ticket);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $ret = curl_exec($ch);
      curl_close($ch);
      //echo $ret;
  $t=str_between($ret,'ticket":"','"');
  $a=str_between($ret,'captcha_url":"','"');
  $a=str_replace("\/","/",$a);
  if (!$a) $a="https://openload.co/dlcaptcha/INeu9bfld_Y.png";
  if ($a) {
      $ch = curl_init();
      $fp = fopen('/usr/local/etc/www/cgi-bin/scripts/filme/php/captcha.png', 'w+');
      curl_setopt($ch, CURLOPT_URL, $a);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FILE, $fp);
      $ret = curl_exec($ch);
      curl_close($ch);
      fclose($fp);
      $new_file = "/tmp/ticket.txt";
      $fh = fopen($new_file, 'w');
      fwrite($fh, $t);
      fclose($fh);
  }
}
?>
