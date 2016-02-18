<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _splice($sA,3); 
$sA = _slice($sA,27); 
$sA = _reverse($sA,23); 
$sA = _splice($sA,2); 
$sA = _slice($sA,29); 
$sA = _splice($sA,2); 
$sA = _reverse($sA,70); 
$sA = _splice($sA,3); 
$sA = implode($sA); 
return $sA;
};
?>
