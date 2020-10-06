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
        validateStreet($street, $streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorEmail;
        $errorEmail = 'red';

    }
}
function validateStreet($street, $streetNumber, $city, $zip, $orderedStuff, $products){
    if ($street != null){
        validateStreetNumber($streetNumber, $city, $zip, $orderedStuff, $products);
    }else{
        global $errorStreet;
        $errorStreet = 'red';
    }
}
function validateStreetNumber($streetNumber, $city, $zip, $orderedStuff, $products){
    if (is_numeric($streetNumber)){
        validateCity($city, $zip, $orderedStuff, $products);
    }else{
        global $errorStreetNumber;
        $errorStreetNumber = 'red';
    }
}
function validateCity($city, $zip, $orderedStuff, $products){
    if (!is_numeric($city)){
        validateZip($zip, $orderedStuff, $products);
    }else{
        global $errorCity;
        $errorCity = 'red';
    }
}
function validateZip($zip, $orderedStuff, $products){
    if (is_numeric($zip)){
        orderStuff($orderedStuff, $products);
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
    }
    setTotalValue($totalPrice);
    echo "Will cost ".$totalPrice. " euro"; echo "Will be delivered around ". date("H:i",time()+7200);

}
