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

#timer {
  margin-left: auto;
  margin-right: auto;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
<body>
	<?php 
	include "nav-exam.php";
	?>
	<div class="container fixed" style="margin-top:100px;">
		<center>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">1</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">2</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">3</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">4</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">5</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">6</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">7</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">8</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">9</span>
			</span>
		</button>
		<button class="btn" style="background:none">
			<span class="circle">
				<span class="circle-text">10</span>
			</span>
		</button>

	</center>
	</div><br>
<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

session_start();

$usermail=$_SESSION['email']; // user mail
$exid=$_GET['exid'];   // get data from instruction's startexam button

$sql="select * from question where exid='$exid' limit 1";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query)){

?>
	<div class="container aa p-5" style="border-top: 3px solid orange;">
  <div>
  	<span id="exid" hidden><?php echo $row['exid']; ?></span>
    <h4>Question <span id="qid"><?php echo $row['qid']; ?></span></h4>
    <span id="user" hidden><?php echo $_SESSION['email'];?></span>
  </div><br>
  <div>
    <span id="question"><?php echo $row['question']; ?></span>
  </div><br>
  <hr style="1px solid lightgrey">		
  <div>
    <div>
      <input type="radio" name="option" id="option1" value="<?php echo $row['option1']; ?>">
      <label for="option1"><?php echo $row['option1']; ?></label>
    </div><br>
    <div>
      <input type="radio" name="option" id="option2" value="<?php echo $row['option2']; ?>">
      <label for="option2"><?php echo $row['option2']; ?></label>
    </div><br>
    <div>
      <input type="radio" name="option" id="option3" value="<?php echo $row['option3']; ?>">
      <label for="option3"><?php echo $row['option3']; ?></label>
    </div><br>
    <div>
      <input type="radio" name="option" id="option4" value="<?php echo $row['option4']; ?>">
      <label for="option4"><?php echo $row['option4']; ?></label>
    </div><br>
    <div hidden>
    	<span id="answer"><?php echo $row['answer'];?></span>
    </div>
  </div>
  <hr style="1px solid lightgrey">
  <div>
    <button class="btn btn-primary" >Previous</button>
    <button class="btn btn-warning" style="color:white;float: right;margin-right: 30px;">Next</button>
  </div><br>
</div>
<?php 
} // while close
?>
	<center><hr style="width: 1045px;"></center><br><br>
	<div>
		<center>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 1045px;height: 50px;"><b> Sumbit Exam</b></button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Exam Summary</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div style="background:blue;color:white;font-size: 20px;margin-bottom:5px;">
								<span>Total Questions: </span>
<?php
$uexid=$_GET['exid'];

$sql2="select count(exid)as tempid from question where exid='$uexid'";

$query2=mysqli_query($con,$sql2);
$urow=mysqli_fetch_array($query2);
?>
		     	     <span><?php echo $urow['tempid']; ?></span>
							</div>
<!--  Display the counts in the modal -->
              <div style="background:green;color:white;font-size: 20px;margin-bottom:5px;">
              	<span>Attempted Question: </span>
              	<span id="attempted"></span>
              </div>
              <div style="background:orange;color:white;font-size: 20px;margin-bottom:5px;">
              	<span>Not Attempted Questions: </span>
              	<span id="not_attempted"></span>
              </div>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>

			      	<!-- Modify the submit exam button to stop the timer when clicked -->
              <button type="button" id="submit-exam-button" class="btn btn-primary submit" onclick="clearInterval(timerInterval);" style="text-decoration:none;color:white;"><i class="bi bi-check2-circle"></i> Submit Exam</button>
			      </div>
			    </div>
			  </div>
			</div>
		</center>
	</div><br>
	<?php

    include "footer.php";

    $sql="select * from title where exid='$uexid'";
    $query=mysqli_query($con,$sql);
    $trow=mysqli_fetch_array($query)

    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
  // Timer functionality
let time = <?php echo $trow['etime'];?> * 60000; // 30 minutes in milliseconds
let timerInterval;

function startTimer() {
  timerInterval = setInterval(() => {
    let minutes = Math.floor(time / 60000);
    let seconds = Math.floor((time % 60000) / 1000);
    document.getElementById("timer-display").innerHTML = minutes + ":" + seconds.toString().padStart(2, "0");
    time -= 1000;
    if (time <= 0) {
      clearInterval(timerInterval);
      alert("Time's up!");
      window.location.href = "http://localhost/online/pexam/submit.php";
    }
  }, 1000);
}

startTimer();

// Document ready event handler
$(document).ready(function() {
  // Store answers in an object
  var answers = {};

$(".btn-warning").click(function() {
  var qid = $("#qid").text();
  var exid = $("#exid").text();
  var user = $("#user").text();
  var question = $("#question").text();
  var option = $("input[name='option']:checked").val() || 'No answer';
  var answer = $("#answer").text();

  // Store the answer in the answers object
  answers[qid] = option;

  // Unselect the radio buttons
  $("input[name='option']").prop('checked', false);

  // If this is the last question, trigger the submission of the exam
  if (qid == <?php echo $urow['tempid']; ?>) {
    $('#exampleModal').modal('show');
  } else {
    // Send AJAX request to get the next question
    $.ajax({
      url: "question_next.php",
      method: "GET",
      data: {
        qid: qid,
        exid: exid,
        question: question,
        user: user,
        option: option,
        answer: answer
      },
      success: function(response) {
        response = JSON.parse(response);
        if (response.message === 'No more questions') {
          // Trigger submission of exam
          $('#exampleModal').modal('show');
        } else {
          // Update the question and options
          $("#exid").text(response.exid);
          $("#qid").text(response.qid);
          $("#question").text(response.question);
          $("#option1").val(response.option1);
          $('label[for="option1"]').text(response.option1);
          $("#option2").val(response.option2);
          $('label[for="option2"]').text(response.option2);
          $("#option3").val(response.option3);
          $('label[for="option3"]').text(response.option3);
          $("#option4").val(response.option4);
          $('label[for="option4"]').text(response.option4);
          $("#answer").text(response.answer);

          // Count answered and unanswered questions
          $("#attempted").text(response.attempted);
          $("#not_attempted").text(response.not_attempted);

          // Unselect the radio buttons
          $("input[name='option']").prop('checked', false);

          // Update the radio button selection based on the stored answer
          if (answers[response.qid]) {
            $("input[name='option'][value='" + answers[response.qid] + "']").prop('checked', true);
          }
        }
      }
    });
  }
});


  // Previous question button click event handler
$(".btn-primary").click(function() {
  var qid = $("#qid").text();
  var exid = $("#exid").text();
  var question = $("#question").text();
  var option = $("input[name='option']:checked").val() || 'No answer';
  var answer = $("#answer").text();

  // Store the answer in the answers object
  answers[qid] = option;

  // Send AJAX request to get the previous question
  $.ajax({
    url: "question_previous.php",
    method: "GET",
    data: {
      qid: qid,
      exid: exid,
      question: question,
      option: option,
      answer: answer
    },
    success: function(response) {
      response = JSON.parse(response);
      $("#exid").text(response.exid);
      $("#qid").text(response.qid);
      $("#question").text(response.question);
      $("#option1").val(response.option1);
      $('label[for="option1"]').text(response.option1);
      $("#option2").val(response.option2);
      $('label[for="option2"]').text(response.option2);
      $("#option3").val(response.option3);
      $('label[for="option3"]').text(response.option3);
      $("#option4").val(response.option4);
      $('label[for="option4"]').text(response.option4);
      $("#answer").text(response.answer);

      // Restore the selected option based on the stored answer
      if (answers[response.qid]) {
        $("input[name='option'][value='" + answers[response.qid] + "']").prop('checked', true);
      }
    }
  });
});

$(".submit").click(function() {
  var exid = $("#exid").text();
  var user = $("#user").text();

  var time=$("#timer-display").text();

  var attempted=$("#attempted").text();
  var unattempted=$("#not_attempted").text();

  window.location.href="http://localhost/online/pexam/submit.php?exid="+exid+"&user="+user+"&attempted="+attempted+"&unattempted="+unattempted+"&time="+time;
});

  // Modal "Close" button click event handler
  $('#exampleModal').on('hidden.bs.modal', function(e) {
     // Restore the selected option when the modal is closed
     var qid = $("#qid").text();
     if (answers[qid]) {
      $("input[name='option'][value='" + answers[qid] + "']").prop('checked', true);
    }
  });

});
</script>
</html>