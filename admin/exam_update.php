<?php 
include "db.php";

$exid=$_POST['exid'];
$exname=$_POST['exname'];
$time=$_POST['time'];
$total=$_POST['total'];
$mark=$_POST['mark'];

$sql="update  title set exam_name='$exname',etime='$time',total='$total',mark='$mark' where exid='$exid'";
if(mysqli_query($con,$sql)){
	echo "Updated successfully";
}else{
	echo "Error".mysqli_error($con);
}

header('location:forms_advance.php');
?>