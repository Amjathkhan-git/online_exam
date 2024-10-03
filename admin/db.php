<?php 

$ser="localhost";
$use="root";
$pas="";
$db="pro";

$con=mysqli_connect($ser,$use,$pas,$db);

if(!$con){
	die("Error".mysqli_connect_error());
}
return $con;
?>
