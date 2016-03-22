<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _splice($sA,1); 
$sA = _slice($sA,55); 
$sA = _slice($sA,32); 
$sA = _slice($sA,39); 
$sA = _reverse($sA,77); 
$sA = _splice($sA,3); 
$sA = _reverse($sA,6); 
$sA = _slice($sA,66); 
$sA = _splice($sA,3); 
$sA = implode($sA); 
return $sA;
};
?>
