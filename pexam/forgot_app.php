<?php 

session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\Exception;

require 'email_test\vendor\phpmailer\src\Exception.php';
require 'email_test\vendor\phpmailer\src\SMTP.php';
require 'email_test\vendor\phpmailer\src\PHPMailer.php';

// Check if form is submitted
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $_SESSION["email"] = $email;

    // Check if email exists in database
    $query = "SELECT * FROM user_details WHERE mail = '$email'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);
    echo "$email"."and".$otp;

        // Update user's OTP in database
        $query2 = "UPDATE user_details SET otp = '$otp' WHERE  mail= '$email'";
        mysqli_query($con, $query2);

        // Send OTP to user's email address using PHPMailer
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ajkveera@gmail.com';
        $mail->Password = 'giol vnus gnks excg';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS enctyption
        $mail->Port = 465;
        $mail->setFrom('ajkveera@gmail.com', 'Amjath');
        $mail->addAddress($email, 'Arjuns');
        $mail->Subject = 'Forgot Password OTP';
        $mail->Body = 'Your OTP is: ' . $otp;
        $mail->send();

        // Display success message
        echo "<script>alert('OTP sent successfully! Please enter the OTP below.'); window.location.href='validate_otp_app.php';</script>";

    } else {
        echo "Email address not found.";
    }
}

?>
<html>
<head>
    <title>forgot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style type="text/css">
    .aa{
        box-shadow:0px 2px 2px ;
        border-radius:5px 5px 5px 5px;
        width: 1045px;
        padding: 5px;
    }
    .a1{
        padding: 10px 20px;
        padding-right: 120px;
        padding-top:20px;
        padding-bottom:20px ;
        border-top: 2px solid lightblue;
        border-radius: 5px;
        width: 1045px;
    }
</style>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container aa  p-5" style="border-top:2px solid blue ;margin-top: 100px;">
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-warning text-white">Send OTP</button><br><br>
    </div><br><br>
</form>
</body>
</html>



