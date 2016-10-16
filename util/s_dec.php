<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _splice($sA,2); 
$sA = _slice($sA,6); 
$sA = _reverse($sA,64); 
$sA = _splice($sA,3); 
$sA = _slice($sA,53); 
$sA = _reverse($sA,58); 
$sA = _slice($sA,46); 
$sA = _slice($sA,56); 
$sA = implode($sA); 
return $sA;
};
?>
