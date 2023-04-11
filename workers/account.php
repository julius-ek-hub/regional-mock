<?php
include 'init.php';

institute_must_be_logged_in();

$exam = '';

if(isset($_GET['exam']) && is_numeric($_GET['exam'])){
    $exam = $_GET['exam'];
}

$institute_exams = array();
$institute_exam_names = array();
$institute_exams_ids = explode(',', $institute['exam']);

foreach ($institute_exams_ids as $key => $value) {
    $institute_exams[(int)$value] = $exams[(int)$value];
    $institute_exam_names[] = $exams[(int)$value]['name'];
}
$table_name = 'institute_' . $institute['id'] . '_candidates';
$all_candidate = $conn->query("SELECT * FROM $table_name" . (empty($exam) ? '': " WHERE exam = '$exam'"))->fetch_all();

?>