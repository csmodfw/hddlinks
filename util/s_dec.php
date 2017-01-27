<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _reverse($sA,64); 
$sA = _splice($sA,2); 
$sA = _reverse($sA,64); 
$sA = _slice($sA,5); 
$sA = _splice($sA,1); 
$sA = _slice($sA,7); 
$sA = _reverse($sA,62); 
$sA = implode($sA); 
return $sA;
};
?>
