<?php 
include "db.php";

$exid=$_POST['exid'];
$qid=$_POST['qid'];
$que=$_POST['que'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];
$op4=$_POST['op4'];
$ans=$_POST['ans'];
echo $exid;

$sql="update  question set question='$que',option1='$op1',option2='$op2',option3='$op3',option4='$op4',answer='$ans' where qid='$qid'";
if(mysqli_query($con,$sql)){
	echo "Updated successfully";
}else{
	echo "Error".mysqli_error($con);
}
header('location:exam_view.php?exid='.$exid);
?>