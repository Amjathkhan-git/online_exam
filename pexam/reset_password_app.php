<?php

// assign a user mail in a variable
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

// Check if OTP is valid
if (isset($_SESSION['otp_valid']) && $_SESSION['otp_valid'] == true) {
    // Check if form is submitted
    if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_SESSION['email'];

        // Validate new password and confirm password
        if ($new_password == $confirm_password) {
            // Hash new password
            $hashed_password = $new_password;

            // Update user's password in database
            $query = "UPDATE user_details SET password = '$hashed_password' WHERE mail = '$email'";
            mysqli_query($con, $query);

            // Display success message
            echo "<script> alert('Password reset successfully! login with your new password.');
            window.location.href='login.php';</script>";

        } else {
            echo "New password and confirm password do not match.";
        }
    }
} else {
    echo "Invalid OTP. Please try again.";
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
                <label for="example" class="form-label"><b>New Password</b></label>
                <input type="text" name="new_password" class="form-control" id="example" placeholder="Enter your OTP" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Confirm Password</b></label>
                <input type="text" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter your OTP" required>
            </div>
            <button type="submit" class="btn btn-warning text-white">Reset Password</button><br><br>
    </div><br><br>
</form>
</body>
</html>