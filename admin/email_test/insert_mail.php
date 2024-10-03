<?php 

$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';

use phpmailer\phpmailer\phpMailer;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\Exception;

$mail=new PHPMailer(true);

try{

	$mail->isSMTP();                                   //send using SMTP
	$mail->Host='SMTP.gmail.com';                      //Set the server to send through                                  
	$mail->SMTPAuth=true;                              //Enable SMTP authentication
	$mail->Username='ajkveera@gmail.com';               //SMTP username
	$mail->Password='giolvnusgnksexcg';                 //SMTP password
	$mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;     //Enable implicit TLS encryption
	$mail->Port=465;                                   //TCP port to connect to;use 587 if you



//Recipients
$mail->setFrom('ajkveera@gmail.com','amjath');
$mail->addAddress('akarjun005@gmail.com');    //Add a recipient

$message="email".$email."/n"."subject".$subject."/n"."message".$message;

//Content
$mail->isHTML(true);         //Set email format to HTML
$mail->Subject='Hi this is ajk';
$mail->Body=$message;
$mail->AltBody='This is the not-HTML clients';

$mail->send();
echo "message sent successfully!!!";
}
catch (Exception $e){
	echo "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
}
	header('location:index_mail.php');
?>

