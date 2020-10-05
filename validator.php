<?php

function validate(){
    $email = $_POST['email'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $zip = $_POST['zipcode'];

    setSession($email, $street, $streetNumber, $city, $zip);
    validateEmail($email);
    validateStreet($street);
    validateStreetNumber($streetNumber);
    validateCity($city);
    validateZip($zip);


}
function validateEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        postEmailSomewhere();
    }else{
        throwErrorSomewhere();
    }
}
function validateStreet($street){
    if ($street != null){
        postEmailSomewhere();
    }else{
        throwErrorSomewhere();
    }
}
function validateStreetNumber($streetNumber){
    if (is_numeric($streetNumber)){
        postEmailSomewhere();
    }else{
        throwErrorSomewhere();
    }
}
function validateCity($city){
    if (is_numeric($city)){
        postEmailSomewhere();
    }else{
        throwErrorSomewhere();
    }
}
function validateZip($zip){
    if (is_numeric($zip)){
        postEmailSomewhere();
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
}
function postEmailSomewhere(){
    echo "good";
}
function throwErrorSomewhere(){
    echo "bad";
}
