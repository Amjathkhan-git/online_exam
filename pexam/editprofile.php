<html>
<head>
	<title>Exams For You</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style type="text/css">
.aa{
	border: 1px solid lightgrey;
	border-radius: 2px;
    width: 1045px;
    padding: 5px;
    }
</style>
<body>
    <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
	<?php 
	include "nav-home.php";
	?>
	<div class="container" style="width: 1045px;margin-top:100px;padding-bottom:15px;border-bottom:1px solid lightgrey;">
		<div class="row">
<?php

    // assign a user mail in a variable
    session_start();
    $usermail=$_SESSION['email']; 

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$sql="select * from user_details where mail='$usermail'";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query)){
?>
				<a><h1><?php echo $row['name'];?></h1></a>
		</div>
	</div><br><br>
	<div class="container aa">		
	   <div class="mb-3">
          <label for="basic-url" class="form-label"><b>Name</b></label>
          <div class="input-group">
             <input type="text" class="form-control" id="basic-url" name="name" value="<?php echo $row['name'];?>" aria-describedby="basic-addon3 basic-addon4">
          </div>
        </div>
        <div class="mb-3">
        	<label class="form-label"><b>Gender</b></label>
            <select class="form-select" name="gender" aria-label="Default select example">
            <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>  
            </select>
        </div>
        <div class="mb-2">
        	<label><b>Email</b><br>
                <span style="color:red;font-size:12px;"> * can't change</span>
            </label>
        </div>
        <div class="input-group mb-3">
        	<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
        	<input type="text" class="form-control" name="mail" value="<?php echo $row['mail'];?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
        </div>
        <div class="mb-2">
        	<label><b>Date of birth</b></label>
        </div>
        <div class="input-group mb-3">
        	<span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-week"></i></span>
        	<input type="date" class="form-control" name="dob" value="<?php echo $row['dob'];?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="mb-2">
        	<label><b>Mobile</b></label>
        </div>
        <div class="input-group mb-3">
        	<span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-week"></i></span>
        	<input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile'];?>" placeholder="7898356587" aria-label="Username" aria-describedby="basic-addon1">
        </div>
       <div class="mb-3">
        <label class="form-label"><b>Education</b></label>
        <select class="form-select" name="education" aria-label="Default select example">
           <option value="<?php echo $row['education'];?>"><?php echo $row['education'];?></option>
           <option value="HSC">HSC</option>
           <option value="Graduate">Graduate</option>
           <option value="Post Graduate">Post Graduate</option>   
        </select>
        </div>
        <div class="mb-2">
    <label>
        <b>Image</b>
    </label>
</div>
<div class="input-group mb-3">
    <input type="file" class="form-control" name="pic" aria-label="Username" aria-describedby="basic-addon1">
</div>
        <div>
        	<center><button class="btn btn-success" name="upload">Update</button></center><br>
        </div>
    </div><br><br>

	<?php

    }

    include "footer.php";
    ?>
</form>
</body>
</html>