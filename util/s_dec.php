<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,40); 
$sA = _splice($sA,3); 
$sA = _slice($sA,53); 
$sA = _slice($sA,11); 
$sA = _splice($sA,3); 
$sA = _reverse($sA,8); 
$sA = _splice($sA,3); 
$sA = _slice($sA,16); 
$sA = _reverse($sA,75); 
$sA = implode($sA); 
return $sA;
};
?>
