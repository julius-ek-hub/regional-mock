<?php
include 'init.php';

institute_must_be_logged_in();

$fname = '';
$mname = '';
$lname = '';
$sex = 'M';
$dob = '';
$exam = '';
$pob = '';
$father = '';
$mother = '';
$candidates_table = 'institute_' . $institute['id'] . '_candidates';
$institute_exams = array();

$institute_exams_ids = explode(',', $institute['exam']);

foreach ($institute_exams_ids as $key => $value) {
    $institute_exams[(int)$value] = $exams[(int)$value];
}


if(isset($_POST) && sizeof($_POST) > 0){
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $exam = $_POST['exam'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $pob = $_POST['pob'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $date = date('d-m-Y');

    $conn->query("INSERT INTO $candidates_table (
        fname, 
        mname,
        lname, 
        exam, 
        sex, 
        dob, 
        pob, 
        father, 
        mother, 
        reg_date
    ) VALUES (
        '$fname', 
        '$mname', 
        '$lname', 
        '$exam', 
        '$sex', 
        '$dob', 
        '$pob', 
        '$father', 
        '$mother', 
        '$date'
    )");

$id = $conn->insert_id;
$candidate_number = 'RM-' . date('Y') . $id . $institute['id'];

$conn->query("UPDATE $candidates_table SET candidate_number = '$candidate_number' WHERE id = '$id'");

$_SESSION['pending_candidate_id'] = $id;
$_SESSION['pending_candidate_exam_id'] = $exam;
header("Location: $base_url/pages/select-papers.php");
}
?>