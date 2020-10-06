<?php
function validate($products){
    if ($_POST['email'] != null){
    $email = $_POST['email'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $zip = $_POST['zipcode'];}
    else{
        $email = $_SESSION["email"];
        $street = $_SESSION["street"];
        $streetNumber = $_SESSION["streetNumber"];
        $city = $_SESSION["city"];
        $zip = $_SESSION["zip"];
    }
    $orderedStuff = $_POST['products'];
    setSession($email, $street, $streetNumber, $city, $zip);
    validateEmail($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
}
function validateEmail($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        validateStreet($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorEmail;
        $errorEmail = 'red';

    }
}
function validateStreet($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if ($street != null){
        validateStreetNumber($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorStreet;
        $errorStreet = 'red';
    }
}
function validateStreetNumber($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if (is_numeric($streetNumber)){
        validateCity($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorStreetNumber;
        $errorStreetNumber = 'red';
    }
}
function validateCity($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if (!is_numeric($city)){
        validateZip($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorCity;
        $errorCity = 'red';
    }
}
function validateZip($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if (is_numeric($zip) && $zip> 1000){
        orderStuff($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorZip;
        $errorZip = 'red';
    }
}
function setSession($email, $street, $streetNumber, $city, $zip){
    $_SESSION["email"] = $email;
    $_SESSION["street"] = $street;
    $_SESSION["streetNumber"] = $streetNumber;
    $_SESSION["city"] = $city;
    $_SESSION["zip"] = $zip;
}
function orderStuff($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
  for($i=0; $i<count($products); $i++){
      if($orderedStuff[$i]==null){
          $orderedStuff[$i]= 0;
      }
  }
  calculateCost($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
}
function calculateCost($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    $totalPrice = 0;
    $deliveryTime = date("H:i",time()+7200);
    $productNamesArr = [];
    foreach ($orderedStuff AS $i => $stuffs){
        if($stuffs == 1){
            $totalPrice += $products[$i]['price'];
            array_push($productNamesArr, $products[$i]['name']);
        }
    }
    $allOrderedProducts = implode( ', ', $productNamesArr);
    setTotalValue($totalPrice);
    if($totalPrice>0){createMailBody($allOrderedProducts, $deliveryTime, $totalPrice, $email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);}

}
