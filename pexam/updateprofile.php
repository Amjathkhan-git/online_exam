<?php
session_start();
$usermail=$_SESSION['email'];

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$education = $_POST['education'];
$mail = $_POST['mail'];

$filename = $_FILES['pic']['name'];
$tmp_name = $_FILES['pic']['tmp_name'];
$folder = "./rimage/".$filename;

if (isset($_FILES['pic']['tmp_name'])) {
    $sql = "UPDATE user_details SET name='$name', gender='$gender', dob='$dob', mobile='$mobile', education='$education',picture='$filename' WHERE mail='$usermail'";
}

$sql = "UPDATE user_details SET name='$name', gender='$gender', dob='$dob', mobile='$mobile', education='$education'  WHERE mail='$usermail'";

$query = mysqli_query($con, $sql);

// Check if file upload is successful
if (move_uploaded_file($tmp_name, $folder)) {
    echo "Image uploaded successfully";
} else {
    echo "Error uploading image";
}

// header('location:profile.php');
?> 
 
<?php 
/*
session_start();
$usermail=$_SESSION['email'];

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$education = $_POST['education'];
$mail = $_POST['mail'];

$fname = $_FILES['img']['name'];
$tmpname = $_FILES['img']['tmp_name'];
$folder = "./rimage/".$fname;

// echo $_FILES['image']['size'];
// echo "<br>rimage".$_FILES['img']['name'];
  // Update image if a new one is uploaded
  if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
    /*
    $_FILES is a superglobal array in PHP that stores information about uploaded files.
    ['image'] refers to the name of the form field that the file was uploaded from.
    ['size'] refers to the size of the uploaded file in bytes.
    */

  // Update the image field
/*  $sql = "UPDATE user_details SET picture='$fname' WHERE mail='$usermail'";
  $con->query($sql);
  if (move_uploaded_file($tmpname,$folder)){
  echo "<h3>image uploaded Successfully!</h3>";
}
}

// Update the name and mobile fields
$sql = "UPDATE user_details SET name='$name', gender='$gender', dob='$dob', mobile='$mobile', education='$education'  WHERE mail='$usermail'";
$con->query($sql);

  echo "Data updated successfully!";
  header("Location:profile.php");
  exit;
}

$con->close(); */

?>