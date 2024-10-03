<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Question</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <!-- bootstrap icon link -->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.php" class="navbar-brand">
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                 
                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6Z4lGuV6X0zY7paWXNXebBKaOszBhrfbz7Q&s" style="width:100px;margin-left:50px ;" />
                </a>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="index.php" >
                        <i class="icon-table"></i> Dashboard
	   
                       
                    </a>                   
                </li>

                <li class="panel active">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> Questions
                    </a>
                    <ul class="in" id="form-nav">
                        <li class=""><a href="forms_general.php"><i class="icon-angle-right"></i> Add </a></li>
                        <li class=""><a href="forms_advance.php"><i class="icon-angle-right"></i> Display </a></li>
                    </ul>
                </li>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="bi bi-people-fill"></i> Student
                    </a>
                    <ul class="collapse" id="pagesr-nav">
                        <li><a href="pages_calendar.php"><i class="icon-angle-right"></i> Student Details </a></li>
                    </ul>
                </li>
                
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#result-nav">
                        <i class="bi bi-activity"></i>Exam Result
                    </a>
                    <ul class="collapse" id="result-nav">
                        <li><a href="result_ad.php"><i class="icon-angle-right"></i>Result</a></li>
                    </ul>
                </li>
                
                <li><a href="logout.php"><i class="icon-signin"></i> Login Page </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Exam Questions</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Question
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="title.php" method="POST">
<?php
include"db.php";
$sql="select count(exid)as tempid from title";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query)){
$add=$row['tempid']+1;
$execute = str_pad($add,5,"Ex000",STR_PAD_LEFT);
}
?>
                                        <div class="form-group">
                                            <label>Exam Id</label>
                                            <input class="form-control" name="exid" id="exid" value='<?php echo $execute;?>' readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" placeholder="Enter text" required>
                                                <option >choose category</option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="English">English</option>
                                                <option value="Maths">Maths</option>
                                                <option value="Science">Science</option>
                                                <option value="Social Science">Social Science</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Exam Name:</label>
                                            <input class="form-control" name="exname" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Time:</label>
                                            <input type="number" class="form-control" name="time" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Marks:</label>
                                            <input class="form-control" name="total" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Marks(each question):</label>
                                            <input class="form-control" name="mark" placeholder="Enter text" required>
                                        </div>
<?php
include"db.php";
$sql="select count(qid)as tempid from question";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query)){
$add=$row['tempid']+1;
$execute = str_pad($add,7,"Q000000",STR_PAD_LEFT);
}
?>
                                        <div class="form-group">
                                            <label>Question Id</label>
                                            <input class="form-control" id="qid" value='<?php echo $execute;?>' readonly>
                                            <span id="qid1" hidden><?php echo $execute;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Question</label>
                                            <textarea class="form-control" id="que" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Option-1</label>
                                            <input class="form-control" id="op1" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-2</label>
                                            <input class="form-control" id="op2" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-3</label>
                                            <input class="form-control" id="op3" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-4</label>
                                            <input class="form-control" id="op4" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input class="form-control" id="ans" placeholder="Enter text">
                                        </div>
                                        <button type="button" class="btn btn-primary">Next</button><br><br>
                                        <div >
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="font-size: 11px;">
                                                        <th>Ex Id</th>
                                                        <th>Question Id</th>
                                                        <th>Question</th>
                                                        <th>Option-1</th>
                                                        <th>Option-2</th>
                                                        <th>Option-3</th>
                                                        <th>Option-4</th>
                                                        <th>Answer</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="app">
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Admin &nbsp;2024 &nbsp;</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
         $(document).ready(function(){
            $(".btn-primary").click(function(){

                var exid=$("#exid").val();
                var qid=$("#qid").val();
                var que=$("#que").val();
                var op1=$("#op1").val();
                var op2=$("#op2").val();
                var op3=$("#op3").val();
                var op4=$("#op4").val();
                var ans=$("#ans").val();

                var markup ="<tr><td>"+exid+"</td><td>"+qid+"</td><td>"+que+"</td><td>" + op1 + "</td><td>" + op2 + "</td><td>" + op3 + "</td><td>" + op4 + "</td><td>"+ans+"<td></tr>";

                $("#app").append(markup);

                $.ajax({
                    url:"question_insert.php",
                    type:"GET",
                    data:{exid:exid,qid:qid,que:que,op1:op1,op2:op2,op3:op3,op4:op4,ans:ans},
                    success:function(response){

                    }
                });

                var a1 = $("#qid1").text().replace(/\D+/g, ''); // extract numeric part of the string
                var a2 = parseInt(a1, 10) + 1; // parse as integer with radix 10
                if (!isNaN(a2)) { // check if a2 is a number
                    var qidValue = "Q000000".substr(0, 7 - a2.toString().length) + a2;
                    $("#qid").val(qidValue);
                    $("#qid1").text(a2);
                } else {
                    console.log("Invalid input: " + a1);
                }
            });
        });
   </script>
</html>


