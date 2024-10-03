<?php 

require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';

use phpmailer\phpmailer\phpMailer;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\Exception;

$mail=new PHPMailer(true);

try{

	$mail->isSMTP();                                   
	$mail->Host='SMTP.gmail.com';                                                        
	$mail->SMTPAuth=true;                              
	$mail->Username='ajkveera@gmail.com';               
	$mail->Password='giolvnusgnksexcg';                 
	$mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;     
	$mail->Port=465;                                   

    $mail->setFrom('ajkveera@gmail.com','amjath');
    $mail->addAddress($_POST['mail']);    

    $mail->isHTML(true);         
    $mail->Subject=$_POST['subject'];
    $mail->Body=$_POST['body'];
    $mail->AltBody='This is the not-HTML clients';

    $mail->send();

    echo "your mail has sent successfully";

}
catch (Exception $e){
	echo "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
}
	header('location:wel_mail.php');
?>

