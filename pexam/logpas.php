<!-- // login.php -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

    $email = $_POST["email"];
    $password =$_POST["password"];

    // Query to retrieve user information
    $sql = "SELECT password FROM user_details WHERE mail='$email'";
    $query=mysqli_query($con,$sql);

    if (mysqli_num_rows($query)> 0) {
        $row =mysqli_fetch_array($query);
        $hashed_password = $row["password"];

        // Verify password
        if ($password==$hashed_password) {
            // Start session
            session_start();
            $_SESSION["email"] = $email;

            // Redirect to protected page
            header("Location: home.php");
            exit;
        } else {
            echo "<script>alert('Invalid password'); window.location.href='http://localhost/online/pexam/login.php';</script>";
        }
    } else {
        echo "<script>alert('Mail id is not found'); window.location.href='http://localhost/online/pexam/login.php';</script>";
    }

?>
