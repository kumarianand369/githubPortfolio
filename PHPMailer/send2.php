<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name']) && isset($_POST['email'])){
     $name = $_POST["name"];
     $email = $_POST["email"];
     $message = $_POST["message"];
    
//require 'vendor/autoload.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
$mail->isSMTP();  
$mail->SMTPAuth   = true;  
$mail->Host       = 'smtp.gmail.com';  
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
$mail->Port       = 465;  
$mail->Username   = 'kumarianand369@gmail.com';                     //SMTP username
$mail->Password   = 'diybrlavvqvqzjqz'; 


 //Recipients
 $mail->setFrom('kumarianand369@gmail.com', 'Khushi');
 //$mail->setFrom('$email', '$name');
 //$mail->addAddress($email, $name);     //Add a recipient

$mail->setFrom('kumarianand369@gmail.com', 'Khushi');
//$mail->addReplyTo('kumarianand369@gmail.com', 'Khushi');
$mail->addAddress('kumarianand369@gmail.com'); 

 $mail->Subject = 'Khushi Contact Form';
 $mail->Body    = "Hello Khushi,

$name has sent below message

 $message 

 Reach out to them at $email
 


 Kind Regards,
 Khushbu";

 if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
} else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));

 //echo "<div class='success'>Message has been sent</div>";


}

?>