<html>
<head>
	<title>Instruction</title>
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
	.circle {
  display: inline-block;
  width: 30px;
  height: 30px;
  border: 1px solid black;
  border-radius: 50%;
  background-color: #ccc;
  text-align: center;
  position: relative;
}

.circle-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 15px;
  font-weight: bold;
  color: white;
}

</style>
<body>
<?php 
include "nav-home.php";


include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$exid=$_GET['exid'];

$sql="select * from title where exid='$exid' limit 1";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);  

?>
	<div class="container aa p-5" style="border-top: 3px solid lightblue;margin-top:100px;">
		<div>
			<span style="font-size:25px">Exam Title: </span>
			<span style="font-size:25px"><?php echo $row['exam_name']; ?></span>
		</div><br>
		<div>
			<span>Subject: </span>
			<span><?php echo $row['category']; ?></span>
		</div><br>
		<div>
			<span>Total Questions: </span>
<?php
$uexid=$row['exid'];

$sql2="select count(exid)as tempid from question where exid='$uexid'";

$query2=mysqli_query($con,$sql2);
$urow=mysqli_fetch_array($query2);
?>
			<span><?php echo $urow['tempid']; ?></span>
		</div><br>
		<div>
			<span>Total Marks: </span>
			<span><?php echo $row['total']; ?></span>
		</div><br>
		<div>
			<span>Time: </span>
			<span id="exam-time"><?php echo $row['etime']; ?> minutes</span>
		</div><br>
		<div>
			<span>Marks of each question: </span>
			<span><?php echo $row['mark']; ?></span>
		</div><br><br>
		<div style="color:red;">
			<h3>Considered Cheating Attempt</h3>
				<ul>
					<li>Capturing screencast/screenshot/screen recording while solving the exam.</li>
					<li>Copy/paste questions or the answer.</li>
					<li>Opening any other application/browser new tab.</li>
				</ul>
				<hr style="color:lightgray;">
		</div>
		<div style="padding-left: 20px;">
			<button class="btn btn-primary"><a href="exam.php?exid=<?php echo $row['exid']; ?>" style="text-decoration:none;color: white;"><i class="bi bi-play-circle"></i> Start Exam</a></button>
		</div><br>
	</div><br>
	<div class="container aa" style="border-top: 3px solid orange;">
		<div class="row">
				<a><h4>Instructions</h4></a>
		</div><br>
		<div style="background: red;color: white;padding: 5px;border-radius: 3px;">
			<p>***Will track all of your window activity and this activity will be sent to the examiner.</p>
		</div>
		<br>
		<div class="container" style="border:1px solid lightgrey;padding: 10px;">
			<div class="row">
				<div class="col" >
					<span class="circle">
						<span class="circle-text">1</span>
          </span>
		    </div>
		    <div class="col-11">
          <span>Question not visited.</span>
        </div>
      </div>
      <hr>
      <div class="row">
				<div class="col" >
					<span class="circle" style="background: orange;">
						<span class="circle-text">1</span>
          </span>
		    </div>
		    <div class="col-11">
          <span>You have visited question.</span>
        </div>
      </div>
      <hr>
      <div class="row">
				<div class="col" >
					<span class="circle" style="background: green;">
						<span class="circle-text">1</span>
          </span>
		    </div>
		    <div class="col-11">
          <span>You have submitted the answers</span>
        </div>
      </div>
		</div>
	</div><br><br>
	
	<?php
  include "footer.php";
  ?>
</body>
</html>