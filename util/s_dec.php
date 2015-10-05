<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,19); 
$sA = _splice($sA,2); 
$sA = _reverse($sA,3); 
$sA = _splice($sA,2); 
$sA = _slice($sA,48); 
$sA = _reverse($sA,67); 
$sA = _splice($sA,2); 
$sA = _reverse($sA,27); 
$sA = implode($sA); 
return $sA;
};
?>
