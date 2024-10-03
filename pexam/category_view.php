<html>
<head>
	<title>Category view</title>
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
	<?php 
	include "nav-home.php";
	?>
	<div class="container" style="width: 1045px;margin-top:100px;padding-bottom:15px;border-bottom:1px solid lightgrey;">
		<div class="row">
				<a><h1>Results</h1></a>
		</div>
	</div><br><br>
<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$cate=$_GET['cate'];

$sql3="select * from title where category='$cate' order by exid DESC";
$query3=mysqli_query($con,$sql3);
while($row3=mysqli_fetch_array($query3)){
?>
	<div class="container aa" style="border-top: 3px solid lightgreen;">
		<div>
			<h3><p style="border-bottom: 1px solid lightgrey;padding:15px 0px;color:lightgreen;"><?php echo $row3['category']; ?></p></h3>
		</div>
		<div>
			<h6>Exam Title: <?php echo $row3['exam_name']; ?></h6>
			<p>Time: <?php echo $row3['etime']; ?></p>
			<p>Total Marks: <?php echo $row3['total']; ?></p>
		</div>
		<div>
			<button class="btn btn-warning text-white fs-6"><a href="instruction.php?exid=<?php echo $row3['exid'];?>" style="text-decoration:none;color:white;"><i class="bi bi-play-circle-fill h5"></i>  Apply Now</a></button>
		</div>
	</div><br><br>
<?php 
}
?>
<?php
include "footer.php";
?>
</body>
</html>

