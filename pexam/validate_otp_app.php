<?php

// assign a user mail in a variable
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

// Check if form is submitted
if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $email = $_SESSION['email'];

    echo "$email";

    // Check if OTP is valid
    $query = "SELECT * FROM user_details WHERE mail = '$email' AND otp = '$otp'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        // OTP is valid, proceed to password reset
        $_SESSION['otp_valid'] = true;
        header('Location: reset_password_app.php');
        exit;
    } else {
        echo "Invalid OTP.";
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
                <label for="exampleInputEmail1" class="form-label"><b>OTP</b></label>
                <input type="number" name="otp" class="form-control" id="exampleInputEmail1" placeholder="Enter your OTP" required>
            </div>
            <button type="submit" class="btn btn-warning text-white">Verify OTP</button><br><br>
    </div><br><br>
</form>
</body>
</html>