
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

echo !extension_loaded('openssl')?"Not Available":"Available";

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
$body = $emailMessage ;

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    
    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false; 
    $mail->Port = 25;            
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = “smtp”;                             // Send using SMTP
    $mail->Host       = "smtp.gmail.com"  ;                  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'magdalenatula21@gmail.com';                     // SMTP username
    $mail->Password   = 'Tymianek99';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('magdalenatula21@gmail.com');
    $mail->addAddress($email);     // Add a recipient






  // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}