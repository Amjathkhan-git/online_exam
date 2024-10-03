<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Display</title>
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
                    <h1 class="page-header">Exam Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Question Edit
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="question_update.php" method="POST">
<?php
include "db.php";

$qid = $_GET['qid'];
$sql = "select * from question where qid='$qid'";

$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) {
    

?>
                                       <div class="form-group">
                                            <label>Exam Id</label>
                                            <input class="form-control" name="exid" id="exid" value='<?php echo $row['exid'];?>' readonly>
                                        </div>
                                       <div class="form-group">
                                            <label>Question Id</label>
                                            <input class="form-control" name="qid" value='<?php echo $row['qid'];?>' readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input class="form-control" value="<?php echo $row['question'];?>" name="que" rows="5" >
                                        </div>
                                        <div class="form-group">
                                            <label>Option-1</label>
                                            <input class="form-control" name="op1" value="<?php echo $row['option1'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-2</label>
                                            <input class="form-control" name="op2" value="<?php echo $row['option2'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-3</label>
                                            <input class="form-control" name="op3" value="<?php echo $row['option3'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Option-4</label>
                                            <input class="form-control" name="op4" value="<?php echo $row['option4'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input class="form-control" name="ans" value="<?php echo $row['answer'];?>">
                                        </div>
<?php 
}
?>
                                        <button type="submit" class="btn btn-success">Submit Button</button>
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
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
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
        
     </script>
</html>

