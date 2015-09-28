<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,55); 
$sA = _slice($sA,69); 
$sA = _slice($sA,61); 
$sA = _splice($sA,2); 
$sA = _reverse($sA,56); 
$sA = implode($sA); 
return $sA;
};
?>
