<?php
function s_dec($s) { 
$sA = str_split($s); 
$sA = _slice($sA,48); 
$sA = _reverse($sA,22); 
$sA = _slice($sA,1); 
$sA = _reverse($sA,11); 
$sA = implode($sA); 
return $sA;
};
?>
