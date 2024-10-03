<html>
<head>
	<title>Categorys</title>
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

	$tamil='Tamil';
	$english='English';
	$maths='Maths';
	$science='Science';
	$social='Social Science';

	?>
	<div class="container" style="width: 1045px;margin-top:100px;padding-bottom:15px;border-bottom:1px solid lightgrey;">
		<div class="row">
				<a><h1>Category</h1></a>
		</div>
	</div><br><br>
	<center>
		<div class="container" style="width: 1045px;">
			<div class="d-grid gap-2">
				<button class="btn btn-lg btn-primary text-uppercase fw-bold fs-4">
					<a href="category_view.php?cate=<?php echo $tamil;?>" style="text-decoration: none;color: white;">
						TAMIL
					</a>
				</button>
                <button class="btn btn-lg btn-secondary text-uppercase fw-bold fs-4">
                	<a href="category_view.php?cate=<?php echo $english;?>" style="text-decoration:none;color: white;">
                		ENGLISH
                	</a>
                </button>
                <button class="btn btn-lg btn-success text-uppercase fw-bold fs-4">
                	<a href="category_view.php?cate=<?php echo $maths;?>" style="text-decoration:none;color: white;">
                		MATHS
                	</a>
                </button>
                <button class="btn btn-lg btn-info text-uppercase fw-bold fs-4">
                	<a href="category_view.php?cate=<?php echo $science;?>" style="text-decoration:none;color: white;">
                		SCIENCE
                	</a>
                </button>
                <button class="btn btn-lg btn-warning text-uppercase fw-bold fs-4">
                	<a href="category_view.php?cate=<?php echo $social;?>" style="text-decoration:none;color: white;">
                		SOCIAL SCIENCE
                	</a>
                </button>
            </div>
        </div><br><br>
    </center>
	
	<?php
    include "footer.php";
    ?>
</body>
</html>