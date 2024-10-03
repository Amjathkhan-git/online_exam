<?php 
include 'db.php';

$exid=$_POST['exid'];
$category=$_POST['category'];
$exname=$_POST['exname'];
$time=$_POST['time'];
$total=$_POST['total'];
$mark=$_POST['mark'];

$sql="INSERT INTO title(exid,category,exam_name,etime,total,mark)VALUES('$exid','$category','$exname',$time,'$total','$mark')";
echo $sql;
if(mysqli_query($con,$sql)){
	echo "insert successfully";
}else{
	echo "Failed";
}
header('location:forms_general.php');
?>