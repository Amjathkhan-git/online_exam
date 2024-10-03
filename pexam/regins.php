<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

if(isset($_POST['click'])){
	$name=$_POST['name'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $mobile=$_POST['mobile'];
    $education=$_POST['education'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];

    $filename=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['tmp_name'];
    $folder="./rimage/".$filename;

    $sql="insert into user_details(name,gender,dob,mobile,education,mail,password,picture)values('$name','$gender','$dob','$mobile','$education','$mail','$password','$filename')";

    if(mysqli_query($con,$sql)){
    	echo "insert successfully";
    }
    if(move_uploaded_file($tmpname,$folder)){
        echo " upload successfully";
    }else{
        echo "error";
    }
    header('location:login.php');
}
?>