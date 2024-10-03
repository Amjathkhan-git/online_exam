<html>
<head>
	<title>Ongoing Exam</title>
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
</style>
<body>
	<div class="container" style="width: 1045px;margin-top:100px;padding-bottom:15px;border-bottom:1px solid lightgrey;">
		<div class="row">
				<a><h1>Ongoing Exams</h1></a>
		</div>
	</div><br><br>
<?php 
include "nav-home.php";

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$sql="select * from title order by exid DESC";
$query=mysqli_query($con,$sql);
while($ongoing=mysqli_fetch_array($query)){

?>
	<div class="container aa" style="border-top: 3px solid lightblue;">
		<div>
			<h3><p><?php echo $ongoing['exam_name'];?></p></h3>
		</div>
		<hr>
<?php
$uexid=$ongoing['exid'];

$sql2="select count(exid)as tempid from question where exid='$uexid'";

$query2=mysqli_query($con,$sql2);
$urow=mysqli_fetch_array($query2);
?>
		<div>
			<span>Total Question: </span><span><?php echo $urow['tempid']; ?></span><br>
			<span>Dutation: </span><span><?php echo $ongoing['etime'];?></span>
		</div>
		<hr>
		<div >
			<button class="btn btn-warning text-white fs-6"><a href="instruction.php?exid=<?php echo $ongoing['exid'];?>" style="text-decoration:none;color: white;"><i class="bi bi-play-circle-fill h5"></i>  Apply Now</a></button>
		</div>
	</div><br><br>
<?php

}

include "footer.php";
?>
</body>
</html>