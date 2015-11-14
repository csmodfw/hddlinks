<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _splice($sA,1); 
$sA = _slice($sA,31); 
$sA = _reverse($sA,47); 
$sA = implode($sA); 
return $sA;
};
?>
