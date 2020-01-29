<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "epixelservices.com";//"webdevelopmentcompanyusa.com";  /*SMTP server*/
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 587;//465;
$mail->Username = "admin@epixelservices.com";  /*Username*/
$mail->Password = "FYGFOWUsoYDz";    /**Password**/

$mail->From = "andy.summer@epixelservices.com";    /*From address required*/
$mail->FromName = "Test from Info";
$mail->AddAddress('c.k.roy90@gmail.com', 'To'); 
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Test message from server";
$mail->Body = "Test Mail<b>in bold!</b>";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";

?>