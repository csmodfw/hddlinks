#!/usr/local/bin/Resource/www/cgi-bin/php
<?php

$l="http://olpair.com/";
$head=array(
'User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
'Accept-Encoding: deflate',
'Referer: http://olpair.com/',
'Cookie: __cfduid=d5e7218af7f3f86c65986a0e56154eaeb1495636530; PHPSESSID=rele1f1e68tdu77q6sn14m5qn0; _csrf=f9481fe38c6e99ac61a7d8d4caf004c8934397688b33a7351e094bf0581c7647a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22kCtsfySuOxjvFRlzrcByPbvCnBPKIBLv%22%3B%7D; _olbknd=w6; MarketGidStorage=%7B%220%22%3A%7B%22svspr%22%3A%22%22%2C%22svsds%22%3A2%2C%22TejndEEDj%22%3A%22MTQ5NTYzNjU0NjgxMjc1ODE0NTcyMQ%3D%3D%22%7D%2C%22C75814%22%3A%7B%22page%22%3A2%2C%22time%22%3A1495636568907%7D%2C%22C76942%22%3A%7B%22page%22%3A2%2C%22time%22%3A1495636578193%2C%22popupTime%22%3A1495636575849%7D%7D',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Cache-Control: max-age=0',
'Content-Type: application/x-www-form-urlencoded',
'Content-Length: 978'
);
$post="_csrf=ZGpSS3FFekYPKSY4FzwpMysSOD03FxY8FgkQMiEnDAUKKAIAOAc2MA%3D%3D&PairModel%5Botherip%5D=&PairModel%5BreCaptcha%5D=03AOPBWq_1uxpJmhHc5_gaMnVDwHAH2IDTkqoKUzhaZOborEBCH2a3P3ZMtrm0tq-hgWo-cvar58mJ2R3vxBFAFBK4gU4A_KraA215f7kEOLEzCpcazzpxVbpwYwzcSwLBJit3PdEk_9XdHoy39lLMkJcMu6cQnhZ5BERG2R_Nbz1K6J4L3scrvcl0kYXeXUUdWqATTk_ELrwyx5jOplMca03gmqUWkqGUpBru4i9inwz1Vyt7gPr8Hm--PiiIFHITPCuRKIvqPiLqt2Rd_G0BrDn5BNU82QDnTGm85LMB2rG2TI6XQy5PddnWM9N8mOIGdcKFRVe5fBhLsBI5RC7uGUZS69AzFdxoJ0LazfOMhcQlj5vdab2QOrisnmF64lynK295CNE4-P3K5qE-eRqBccFYIF60j1vf0A&g-recaptcha-response=03AOPBWq_1uxpJmhHc5_gaMnVDwHAH2IDTkqoKUzhaZOborEBCH2a3P3ZMtrm0tq-hgWo-cvar58mJ2R3vxBFAFBK4gU4A_KraA215f7kEOLEzCpcazzpxVbpwYwzcSwLBJit3PdEk_9XdHoy39lLMkJcMu6cQnhZ5BERG2R_Nbz1K6J4L3scrvcl0kYXeXUUdWqATTk_ELrwyx5jOplMca03gmqUWkqGUpBru4i9inwz1Vyt7gPr8Hm--PiiIFHITPCuRKIvqPiLqt2Rd_G0BrDn5BNU82QDnTGm85LMB2rG2TI6XQy5PddnWM9N8mOIGdcKFRVe5fBhLsBI5RC7uGUZS69AzFdxoJ0LazfOMhcQlj5vdab2QOrisnmF64lynK295CNE4-P3K5qE-eRqBccFYIF60j1vf0A";
  $ch = curl_init($l);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  $h = curl_exec($ch);
  curl_close($ch);
if (strpos($h,"Pairing sucessful!"))
  echo "good job";
else
  echo "not so good job...";
?>
