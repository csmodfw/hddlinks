<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,13); 
$sA = _reverse($sA,69); 
$sA = _splice($sA,3); 
$sA = _slice($sA,2); 
$sA = _reverse($sA,79); 
$sA = _splice($sA,3); 
$sA = _slice($sA,36); 
$sA = implode($sA); 
return $sA;
};
?>
