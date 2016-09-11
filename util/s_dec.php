<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _reverse($sA,29); 
$sA = _splice($sA,2); 
$sA = _slice($sA,17); 
$sA = _reverse($sA,59); 
$sA = _slice($sA,1); 
$sA = _splice($sA,1); 
$sA = implode($sA); 
return $sA;
};
?>
