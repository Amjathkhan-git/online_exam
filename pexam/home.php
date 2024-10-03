<html>
<head>
	<title>Home</title>
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
	.a1{
		padding: 10px 20px;
		padding-right: 120px;
		padding-top:20px;
		padding-bottom:20px ;
		border-top: 2px solid lightblue;
		border-radius: 5px;
		width: 1045px;
	}
</style>
<body>
	<?php
    
    // assign a user mail in a variable
	session_start();
    $usermail=$_SESSION['email']; 

	include "nav-home.php";
	?>
	<div class="container aa border border-top-2" style="margin-top:100px">
		<div class="row">
			<div class="col-10">
				<a><h5>Ongoing Exam's</h5></a>
			</div>
			<div class="col-2">
				<button class="btn btn-info text-white fs-6 ms-5" ><a href="ongoing.php" style="text-decoration:none;color: white;">  View All</a></button>
			</div>
		</div>
	</div><br><br>
<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$sql="select * from title order by exid DESC limit 2";
$query=mysqli_query($con,$sql);
while($ongoing=mysqli_fetch_array($query)){

?>
	<div class="container aa" style="border-top: 3px solid lightblue;">
		<div>
			<h3><p style="border-bottom: 1px solid lightgrey;padding:15px 0px ;"><?php echo $ongoing['exam_name'];?></p></h3>
		</div>
		<div>
<?php
$uexid=$ongoing['exid'];

$sql2="select count(exid)as tempid from question where exid='$uexid'";

$query2=mysqli_query($con,$sql2);
$urow=mysqli_fetch_array($query2)
?>
			<p>Total Question:<?php echo $urow['tempid']; ?></p>
			<p style="border-bottom: 1px solid lightgrey;padding-bottom:15px ;">Dutation :<?php echo $ongoing['etime'];?></p>
		</div>
		<div>
			<button class="btn btn-warning text-white fs-6"><a href="instruction.php?exid=<?php echo $ongoing['exid'];?>" style="text-decoration:none;color:white;"><i class="bi bi-play-circle-fill h5"></i>  Apply Now</a></button>
		</div>
	</div><br><br>
<?php 		
} // close of  while loop
?>
	<div class="container aa border border-top-2">
		<div class="row">
			<div class="col-10">
				<a><h5>Category</h5></a>
			</div>
			<div class="col-2">
				<button class="btn btn-info text-white fs-6 ms-5" ><a href="category.php" style="text-decoration:none;color: white;">  View All</a></button>
			</div>
		</div>
	</div><br><br>
<?php 

$sql3="select * from title order by exid DESC limit 2";
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
	<div class="container aa border border-top-2">
	<div class="row">
		<div class="col-10">
			<a><h5>Results</h5></a>
		</div>
		<div class="col-2">
			<button class="btn btn-info text-white fs-6 ms-5" ><a href="result.php" style="text-decoration:none;color: white;">  View All</a></button>
		</div>
	</div>
</div><br><br>
<?php 

$sql4="select * from result where user='$usermail' order by exid DESC limit 2";
$query4=mysqli_query($con,$sql4);
while($row4=mysqli_fetch_array($query4)){
    $exid=$row4['exid'];
	$user=$row4['user'];
	$time=$row4['time'];
	$attempted=$row4['attempted'];
	$unattempted = isset($_GET['not_attempted']) ? $_GET['not_attempted'] : 0;
?>
<div class="container aa" style="border-top: 3px solid lightblue;">
	<div>
		<h3><p style="border-bottom: 1px solid lightgrey;padding:15px 0px ;"><?php echo $row4['exam'];?></p></h3>
	</div>
	<div>
		<p>Total Question: <?php echo $row4['t_question'];?></p>
		<p>Dutation : <?php echo $row4['t_time'];?>Min.</p>
		<p>Total Marks: <?php echo $row4['t_marks'];?></p>
		<p style="border-bottom: 1px solid lightgrey;padding-bottom:15px ;font-weight: bold;color: #33d6ff;">Marks Obained: <?php echo $row4['marks'];?></p>
	</div>
	<div>
		<button class="btn btn-success text-white fs-6">
			<a href="submit.php?exid=<?php echo $exid;?>&user=<?php echo $user;?>&time=<?php echo $time;?>&attempted=<?php echo $attempted;?>&unattempted=<?php echo $unattempted;?>" style="text-decoration:none;color: white;">
				<i class="bi bi-play-circle-fill h5"></i>  
				View Result
			</a>
		</button>
	</div>
</div><br><br>
<?php
} // while loop close

include "footer.php";
?>
</body>
</html>