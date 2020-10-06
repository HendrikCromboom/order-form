<?php
$totalValue = 0;

if($_COOKIE['totalValue'] == null){
    setcookie('totalValue', $totalValue, 36000, '/');
}else{$totalValue = $_COOKIE['totalValue'];}

function setTotalValue($val){
    global $totalValue;
    $totalValue = $_COOKIE['totalValue'];
    $totalValue += $val;
    setcookie('totalValue', $totalValue, 36000, '/');
}
