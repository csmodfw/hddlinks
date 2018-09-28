#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$server = $_GET["file"];
$loc=array(
"12" => "New York" ,
"13" => "Denver" ,
"4" => "Chicago" ,
"411" => "Denver" ,
"412" => "Denver" ,
"413" => "Los Angeles" ,
"414" => "Miami" ,
"415" => "New York" ,
"416" => "Seattle" ,
"421" => "Amsterdam" ,
"422" => "Frankfurt am Main" ,
"423" => "London" ,
"424" => "Madrid" ,
"425" => "Paris" ,
"426" => "Vienna" ,
"431" => "Chicago" ,
"432" => "Denver" ,
"433" => "Los Angeles" ,
"434" => "Miami" ,
"435" => "Miami" ,
"437" => "Chicago" ,
"438" => "Denver" ,
"439" => "New York" ,
"440" => "New York" ,
"441" => "Amsterdam" ,
"443" => "London" ,
"6" => "Seattle" ,
"7" => "Amsterdam" ,
"8" => "Los Angeles" ,
"9" => "Amsterdam" ,
"10" => "Sydney" ,
"15" => "Sydney" ,
"1" => "New York" ,
"11" => "London",
"2" => "Los Angeles" ,
"3" => "Los Angeles" ,
"5" => "New York"
);
if ($loc[$server])
 echo $server." (".$loc[$server].")";
else
 echo $server;
?>
