<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,48); 
$sA = _reverse($sA,70); 
$sA = _slice($sA,8); 
$sA = _slice($sA,28); 
$sA = _splice($sA,2); 
$sA = _slice($sA,22); 
$sA = _slice($sA,61); 
$sA = _splice($sA,2); 
$sA = _slice($sA,59); 
$sA = implode($sA); 
return $sA;
};
?>
