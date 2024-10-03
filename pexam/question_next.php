<?php

include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$qid = $_GET['qid'];
$exid = $_GET['exid'];
$user = $_GET['user'];
$question = $_GET['question'];
$option = $_GET['option'];
$answer = $_GET['answer'];

$arr = [];

// Insert or update the user's answer
$check_sql = "select * from answer_tab where qid = '$qid' and user='$user'";
$check_query = mysqli_query($con, $check_sql);

if (mysqli_num_rows($check_query) > 0) {
    if (empty($option)) {
        $option = 'No answer'; // default value when no option is selected
    }
    if($option==$answer){
        $validate="correct";
    }else{
        $validate="wrong";
    }
    $sql3 = "update answer_tab set options = '$option',validation='$validate' where qid = '$qid' and user='$user'";
    $query3 = mysqli_query($con, $sql3);
} else {
    if (empty($option)) {
        $option = 'No answer'; // default value when no option is selected
    }
    if($option==$answer){
        $validate="correct";
    }else{
        $validate="wrong";
    }
    $sql2 = "insert into answer_tab (exid,qid,user,question,options,answer,validation) values ('$exid','$qid','$user','$question','$option','$answer','$validate')";
    $query2 = mysqli_query($con, $sql2);
}

// Retrieve the next question
$sql = "select * from question where qid > '$qid' and exid='$exid' limit 1";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $arr['exid'] = $row['exid'];
        $arr['qid'] = $row['qid'];
        $arr['question'] = $row['question'];
        $arr['option1'] = $row['option1'];
        $arr['option2'] = $row['option2'];
        $arr['option3'] = $row['option3'];
        $arr['option4'] = $row['option4'];
        $arr['answer'] = $row['answer'];
    }
} else {
    // If there is no next question, return a message or handle it accordingly
    $arr['message'] = 'No more questions';
}

// Count answered and unanswered questions
$answered_sql = "select count(*) as answered from answer_tab where user='$user' and exid='$exid'";
$answered_query = mysqli_query($con, $answered_sql);
$answered_row = mysqli_fetch_array($answered_query);
$arr['attempted'] = $answered_row['answered'];

$total_sql = "select count(*) as total from question where exid='$exid'";
$total_query = mysqli_query($con, $total_sql);
$total_row = mysqli_fetch_array($total_query);
$arr['total'] = $total_row['total'];

$arr['not_attempted'] = $arr['total'] - $arr['attempted'];

echo json_encode($arr);
?>