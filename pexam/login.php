<html>
<head>
	<title>Login</title>
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
  <form action="logpas.php" method="POST">
	<?php 
	include "nav-login.php";
  ?>
	<div class="container aa  p-5" style="border-top:2px solid blue ;margin-top: 100px;">
		
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Username/Email">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1">
				<a href="forgot_app.php" style="text-decoration: none; color: red;">forgot password</a>
			</div>
			<button type="submit" class="btn btn-warning text-white">Login</button><br><br>
			<div>
				<a href="reges.php" style="text-decoration: none;">Sign Up for Online Exams</a>
			</div>
	
	</div><br><br>
	
   <?php
   include "footer.php";
   ?>
  </form>
</body>
</html>



