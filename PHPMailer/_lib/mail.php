<?php
error_reporting(E_ALL);
require("class.phpmailer.php");
$mail = new PHPMailer();$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = smtp.gmail.com;
$mail->SMTPAuth = true;
$mail->Username = 'kirti.bhat001@gmail.com';
$mail->Password = 'rohit*123';

$mail->From="mailer@example.com";
$mail->FromName="My site's mailer";
$mail->Sender="mailer@example.com";
$mail->AddReplyTo("replies@example.com", "Replies for my site");

$mail->AddAddress("kirti.bhat001@gmail.com");
$mail->Subject = "Test 1";

$mail->IsHTML(true);
$mail->Body = "<h1>Test 1 of PHPMailer html</h1><img src='http://wallpaper-gallery.net/images/ball/ball-17.jpg' style='width:220px; height:59px; margin-bottom:15px'><p>This is a test</p>";
$mail->AltBody="This is text only alternative body.";

if(!$mail->Send())
{
   echo "Error sending: " . $mail->ErrorInfo;;
}
else
{
   echo "Letter is sent";
}
?>