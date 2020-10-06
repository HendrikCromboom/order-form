<?php
$totalValue = 0;

if($_COOKIE['totalValue'] == null){
    $_COOKIE['totalValue'] = $totalValue;
    setcookie('totalValue', $totalValue, time() + 60*60*24*30, '/');
}else{$totalValue = $_COOKIE['totalValue'];}

function setTotalValue($val){
    global $totalValue;
    $totalValue = $_COOKIE['totalValue'];
    $totalValue += $val;
    $_COOKIE['totalValue'] = $totalValue;
    setcookie('totalValue', $totalValue, time() + 60*60*24*30, '/');
}
