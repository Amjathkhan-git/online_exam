<html>
<head>
	<title>Exam</title>
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
	// include "nav-home.php";

	include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

    $uexid=$_GET['exid'];
    $user=$_GET['user'];

    $time=$_GET['time'];

    $attempted=$_GET['attempted'];
    $unattempted=$_GET['unattempted'];
 
    $sql="select * from title where exid='$uexid' limit 1";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

    $exam=$row['exam_name'];
    $t_marks=$row['total'];
    $t_time=$row['etime'];
    
    // total time less by current time
    $time=$t_time-$time; 

    $sql2="select count(exid)as tempid from question where exid='$uexid'";
    $query2=mysqli_query($con,$sql2);
    $urow=mysqli_fetch_array($query2);

    $t_question=$urow['tempid'];

    $sql3="SELECT COUNT(*) AS value FROM answer_tab WHERE exid = '$uexid' AND user = '$user' AND validation = 'correct'";
    $query3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_array($query3);

    $value=$row3['value']*$row['mark'];
    
    // Insert or update the user's result
    $check_sql = "select * from result where exid = '$uexid' and user='$user'";
    $check_query = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_query) > 0) {
    	$sql5 = "update result set time='$time', attempted='$attempted', not_attempted='$unattempted', marks='$value', exam='$exam', t_question='$t_question', t_marks='$t_marks', t_time='$t_time' where exid = '$uexid' and user='$user'";
    	$query5 = mysqli_query($con, $sql5);
    } else {
    	$sql6 = "insert into result (time, attempted, not_attempted, marks, exam, t_question, t_marks, t_time, exid, user) values ('$time', '$attempted', '$unattempted', '$value', '$exam', '$t_question', '$t_marks', '$t_time', '$uexid', '$user')";
    	$query6 = mysqli_query($con, $sql6);
    }

	?>
	<div class="container aa p-5" style="margin-top: 100px;border-top: 3px solid lightblue;">
		<div>
			<h3><p style="border-bottom: 1px solid lightgrey;padding:15px 0px ;">Exam: <?php echo $row['exam_name'];?></p></h3>
		</div>
		<div>
			<p>Total Question: <?php echo $urow['tempid'];?></p>
			<p>Marks: <?php echo $row['total'];?></p>
			<p style="padding-bottom:15px ;">Dutation : <?php echo $t_time;?> Min.</p>
		</div>
	</div><br><br>
	<div class="container aa" style="width:1050px;border-top: 2px solid blue;" >
		<div class="row" style="background:orange;color:white;font-size: 20px;margin:10px;height: 50px;font-size: 35px;;">
			<div class="col-1">
				<i style="padding:30px;" class="bi bi-question-octagon-fill"></i>
			</div>
			<div class="col-1"></div>
			<div class="col-10">
				<span>Attempted Questions: </span>
      		    <span><?php echo $attempted;?></span>
			</div>	
      	</div>
      	<div class="row" style="background:blue;color:white;font-size: 20px;margin:10px;height: 50px;font-size: 35px;;">
			<div class="col-1">
				<i style="padding:30px;" class="bi bi-clock"></i>
			</div>
			<div class="col-1"></div>
			<div class="col-10">
				<span>Time Spent: </span>
      		    <span><?php echo $time;?> Min</span>
			</div>	
      	</div>
      	<div class="row" style="background:green;color:white;font-size: 20px;margin:10px;height: 50px;font-size: 35px;;">
			<div class="col-1">
				<i style="padding:30px;" class="bi bi-clipboard-check"></i>
			</div>
			<div class="col-1"></div>
			<div class="col-10">
				<span>Marks Obtained: </span>
      		    <span><?php echo $value;?></span>
			</div>	
      	</div>
      	<div class="row" style="background:red;color:white;font-size: 20px;margin:10px;height: 50px;font-size: 35px;;">
			<div class="col-1">
				<i style="padding:30px;" class="bi bi-x-octagon"></i>
			</div>
			<div class="col-1"></div>
			<div class="col-10">
				<span>Not Attempted Questions: </span>
      		    <span><?php echo $unattempted;?></span>
			</div>	
      	</div>
    </div><br>
    <div class="container aa">
    	<div style="background:#1a8cff;color: white;height: 50px;padding: 10px;margin-bottom: 10px;">
    		<h3> Answer Sheet</h3>
    	</div>
    	<div class="container rounded-1 p-3" style="border:1px solid #d1e0e0;">
    	<?php

    	$sql4="select * from question where exid='$uexid'";
        $query4=mysqli_query($con,$sql4);
        while($row4=mysqli_fetch_array($query4)){

        ?>

    		<div>
    			<br>
    			<h5><?php echo $row4['qid'];?></h5><br>
    			<span><?php echo $row4['question'];?></span>
    		</div><br>
    		<div >
    			<button class="rounded-5" style="background:green;border: 1px solid green;color: white;width:100px;">Answer</button>
    		</div><br>
    		<div style="padding-left:2px">
    			<div>
				    <span><?php echo $row4['answer'];?></span>
			    </div><br>
			    <hr>
    	    </div>
<?php 
  } // close loop
?>
    </div><br><br>

	<?php
    include "footer.php";
    ?>
</body>
</html>