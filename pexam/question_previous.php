<?php
include $_SERVER['DOCUMENT_ROOT'] . "/online/admin/db.php";

$qid = $_GET['qid'];
$exid = $_GET['exid'];

$arr = [];

// Retrieve the previous question
$sql = "select * from question where qid < '$qid' and exid='$exid' order by qid desc limit 1";
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
    // If there is no previous question, return a message or handle it accordingly
    $arr['message'] = 'No previous question';
}


echo json_encode($arr);
?>