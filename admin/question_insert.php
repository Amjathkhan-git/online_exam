<?php 
include "db.php";

$exid=$_GET['exid'];
$qid=$_GET['qid'];
$que=$_GET['que'];
$op1=$_GET['op1'];
$op2=$_GET['op2'];
$op3=$_GET['op3'];
$op4=$_GET['op4'];
$ans=$_GET['ans'];

$sql="insert into question(exid,qid,question,option1,option2,option3,option4,answer)values('$exid','$qid','$que','$op1','$op2','$op3','$op4','$ans')";
if(mysqli_query($con,$sql)){
	echo "insert successfully";
}
?>