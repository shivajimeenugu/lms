<?php

require("/PHPMailer-master/src/PHPMailer.php");
require("/PHPMailer-master/src/SMTP.php");
    
if (isset( $_POST['email'] )){

$mailidofstd=$_POST['email'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'shivaji@dr.com';                 // SMTP username
$mail->Password = 'shivaji.MS';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->SMTPDebug = 3;
$mail->setFrom($mailidofstd, 'LMS@DRYCJAMES');
$mail->addAddress('$mailidofstd', 'LMS@DRYCJAMES');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
//$mail->addAttachment('images/php-send-email.png');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Email From LMS@DRYCJAMES';
$mail->Body    = '.'$hash'.</b>';
$mail->AltBody = 'Hello brother how are you this email is send form phpmailer library its very easy!</';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}}