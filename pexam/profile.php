<html>
<head>
	<title>Profile</title>
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
				<a><h1>Profile</h1></a>
		</div>
	</div><br><br>
	<div class="container aa p-5" style="border-top:3px solid lightblue;">
			<div class="row">
				<div class="col-3">
					<span style="font-size: 20px;">Basic Information</span>
				</div>
				<div class="col-3">
					
				</div>
				<div class="col-3">
					
				</div>
				<div class="col-3">
					<button class="btn btn-primary"><a href="editprofile.php" style="text-decoration:none; color: white;"><i class="bi bi-pencil-square"></i> Edit Profile</a></button>
				</div>
			</div><br>
			
<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$sql="select * from user_details where mail='$usermail'";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($query)){
?>
            <div>
				<img src="./rimage/<?php echo $row['picture'];?>" alt="User Profile Picture" style="width: 200px;height: 200px; border:1px solid lightgrey;">
			</div>
			<div>
				<h5>Name: <span><?php echo $row['name'];?></span></h5>
			</div>
			<div>
				<span style="font-size: 20px;">Email: </span><span style="color:blue;"><?php echo $row['mail'];?></span>
			</div>
			<div>
				<span style="font-size: 20px;">Contact: </span><span><?php echo $row['mobile'];?></span>
			</div>
<?php
}
?>
	</div><br><br>
	<?php
    include "footer.php";
    ?>
</body>
</html>