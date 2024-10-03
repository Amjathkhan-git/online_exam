<html>
<head>
	<title>Result</title>
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
	// assign a user mail in a variable
	session_start();
    $usermail=$_SESSION['email']; 

	include "nav-home.php";
	?>
	<div class="container" style="width: 1045px;margin-top:100px;padding-bottom:15px;border-bottom:1px solid lightgrey;">
		<div class="row">
				<a><h1>Results</h1></a>
		</div>
	</div><br><br>
<?php 


include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

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
		<button class="btn btn-success text-white fs-6"><a href="submit.php?exid=<?php echo $exid;?>&user=<?php echo $user;?>&time=<?php echo $time;?>&attempted=<?php echo $attempted;?>&unattempted=<?php echo $unattempted;?>" style="text-decoration:none;color: white;"><i class="bi bi-play-circle-fill h5"></i>  View Result</a></button>
	</div>
</div><br><br>
<?php
} //  while loop close

include "footer.php";
?>
</body>
</html>

