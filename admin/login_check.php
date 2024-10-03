<!-- // login.php -->

<?php
include "db.php";

    $email = $_POST["email"];
    $password =$_POST["password"];

    // Query to retrieve user information
    $sql = "SELECT * FROM admin_details ";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

    if ($row['email']==$email){

        // Verify password
        if ($password==$row["password"]) {
            
            $email=$row['email'];

            // Redirect to protected page
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password'); window.location.href='http://localhost/online/admin/logout.php';</script>";
        }
    } else {
        echo "<script>alert('Mail id is not found'); window.location.href='http://localhost/online/admin/logout.php';</script>";
    }

?>
