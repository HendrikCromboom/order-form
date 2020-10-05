<?php
function validate($products){
    $email = $_POST['email'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $zip = $_POST['zipcode'];
    $orderedStuff = $_POST['products'];
    setSession($email, $street, $streetNumber, $city, $zip);
    validateEmail($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products);
}
function validateEmail($email, $street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        validateStreet($street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        throwErrorSomewhere();
    }
}
function validateStreet($street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if ($street != null){
        validateStreetNumber($streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        throwErrorSomewhere();
    }
}
function validateStreetNumber($streetNumber, $city, $zip, $orderedStuff, $products){
    if (is_numeric($streetNumber)){
        validateCity($city, $zip, $orderedStuff, $products);
    }else{
        throwErrorSomewhere();
    }
}
function validateCity($city, $zip, $orderedStuff, $products){
    if (!is_numeric($city)){
        validateZip($zip, $orderedStuff, $products);
    }else{
        throwErrorSomewhere();
    }
}
function validateZip($zip, $orderedStuff, $products){
    if (is_numeric($zip)){
        orderStuff($orderedStuff, $products);
    }else{
        throwErrorSomewhere();
    }
}
function setSession($email, $street, $streetNumber, $city, $zip){
    $_SESSION["email"] = $email;
    $_SESSION["street"] = $street;
    $_SESSION["streetNumber"] = $streetNumber;
    $_SESSION["city"] = $city;
    $_SESSION["zip"] = $zip;
    $_SESSION["set"] = true;
}
function throwErrorSomewhere(){
    echo "bad";
}
function orderStuff($orderedStuff, $products){
  for($i=0; $i<count($products); $i++){
      if($orderedStuff[$i]==null){
          $orderedStuff[$i]= 0;
      }
  }
  calculateCost($orderedStuff, $products);
}
function calculateCost($orderedStuff, $products){
    $totalPrice = 0;
    foreach ($orderedStuff AS $i => $stuffs){
        if($stuffs == 1){
            $totalPrice += $products[$i]['price'];
        }
    } echo "Will cost ".$totalPrice. " euro"; echo "Will be delivered around ". date("H:i",time()+7200);
}