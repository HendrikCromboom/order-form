<?php
//function sendMail($email, $mail){
//    mail($email, 'Your order from the Personal Ham Processors', $mail);
//}

function createMailBody($allOrderedProducts, $deliveryTime, $totalPrice, $email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    $mail = "Your Order will be delivered around ".$deliveryTime." \n At ".$street." ".$streetNumber." ".$city." ".$zip." \n The order will cost ".$totalPrice. " euro and include the following items: ".$allOrderedProducts." ! \n";
    //sendMail($email, $mail);
    echoResult($mail);
}
function echoResult($YEET){
    echo "<h1>$YEET</h1><br><br><br><br><br><br><hr>";
}