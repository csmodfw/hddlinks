#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $user = $queryArr[0];
   $pass = $queryArr[1];
}
$noob=urlencode(base64_encode($user));
$auth=urlencode(base64_encode($pass));
print '.superchillin.com	TRUE	/	FALSE	0	noob	'.$noob.'
.superchillin.com	TRUE	/	FALSE	0	auth	'.$auth;

?>
