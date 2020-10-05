<?php
$totalValue = 0;
if ($_COOKIE[$totalValue] != null) {$totalValue = $_COOKIE[$totalValue];}
function setTotalValue($val){
    global $totalValue;
    $totalValue += $val;
    setcookie($totalValue);
}
