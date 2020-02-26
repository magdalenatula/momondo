<?php


$firstName = $_POST['txtFirstName'];
$lastName = $_POST['txtLastName'];
$toPhone  = $_POST['txtPhoneNumber'];
$email  = $_POST['txtEmail'];
$emailMessage = 'Thanks '.$firstName .' ' .$lastName .'for booking a trip';

require ("PHPMailer/send-email.php");


if( isset($firstName) && isset($lastName) && isset($toPhone) && isset($email) )
{

    echo $firstName;
    echo $lastName;
    echo $toPhone;
    echo $email;

    $fromPhone = '50158865';
    $sApiKey = 'M0D4WawxeWotFrATX0zEDcLfl1Wk3QmopVZzvpz4NdLD0HEPik';
    $sMessage = urlencode('Thanks '.$firstName .' ' .$lastName .'for booking a trip' );
    
    echo file_get_contents("https://fatsms.com/apis/api-send-sms?to-phone=$toPhone&message=$sMessage&from-phone=$fromPhone&api-key=M0D4WawxeWotFrATX0zEDcLfl1Wk3QmopVZzvpz4NdLD0HEPik");
    header('Location: add-new-trip.php');
    exit();
}