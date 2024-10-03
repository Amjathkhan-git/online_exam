<html>
<head>
	<title>Regesister</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style type="">
	.aa{
    	box-shadow:0px 2px 2px ;
    	border-radius:5px 5px 5px 5px;
    	width: 1045px;
    	padding: 5px;
    }
</style>
<body>
	<?php 
	include "nav-login.php";
	?>
	<div class="container aa p-5" style="border-top:2px solid blue ;margin-top:100px ;">
		<form action="regins.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="basic-url" class="form-label"><b>Name</b></label>
				<div class="input-group">
					<input type="text" class="form-control" id="basic-url" name="name" placeholder="Username" aria-describedby="basic-addon3 basic-addon4">
				</div>
			</div>
			<div class="mb-3">
				<label class="form-label"><b>Gender</b></label>
				<select class="form-select" name="gender" aria-label="Default select example">
					<option selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-2">
            	<label><b>Date of birth</b></label>
            </div>
            <div class="input-group mb-3">
            	<span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-week"></i></span>
            	<input type="date" class="form-control" name="dob" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-2">
            	<label><b>Mobile</b></label>
            </div>
            <div class="input-group mb-3">
            	<span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-week"></i></span>
            	<input type="text" class="form-control" name="mobile" placeholder="7898356587" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
            	<label class="form-label"><b>Education</b></label>
            	<select class="form-select" name="education" aria-label="Default select example">
            		<option selected>Select Education</option>
                    <option value="HSC">HSC</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Post Graduate">Post Graduate</option>
                </select>
            </div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label"><b>Email address</label><br>
				<span style="color:red;font-size:12px;"> * This will be your username</span></b>
				<input type="email" class="form-control" id="exampleInputEmail1" name="mail" placeholder="Enter email" required>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
				<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label"><b>Confirm Password</b></label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required>
			</div>
			<div class="mb-3">
            <label for="formFile" class="form-label"><b>Upload Image</b></label>
            <input class="form-control" type="file" id="formFile" name="img" >
        </div>
			<div class="mb-3" style="border-top: 1px solid lightgrey;padding: 15px 0px;">
				<button type="reset" class="btn btn-danger" >Reset</button>
				<button type="submit" class="btn btn-primary ms-3" name="click">Submit</button>
			</div>
			<div class="mb-3" style="border-top: 1px solid lightgrey;padding: 15px 0px;">
				<center>
					<button class="btn btn-warning" style="width: 500px;height: 50px;"><h5><a href="login.php" style="text-decoration: none;color: white;">Already have an account? Sign in</a></h5></button>
				</center>
			</div>
		</form>
	</div><br><br>
	<?php
    include "footer.php";
    ?>
</body>
</html> 