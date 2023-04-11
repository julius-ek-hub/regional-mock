<?php
include 'init.php';

institute_must_be_logged_in();

if (!isset($_GET['candidate_id'])){
    header("Location: $base_url");
}

$papers_selected = '';
$error = '';

$candidate_id = $_GET['candidate_id'];

$candidates_table = 'institute_' . $institute['id'] . '_candidates';
$candidate_info = $conn->query("SELECT * FROM $candidates_table  WHERE id = '$candidate_id'");

if ($candidate_info->num_rows != 1){
    header("Location: $base_url");
}
$candidate_info = $candidate_info->fetch_assoc();
$exam = $exams[$candidate_info['exam']];
$num_papers = sizeof(explode(',',  $candidate_info['paper_names']));
$total = $num_papers*$exam['cost_per_paper'] + $exam['registration_fee'];
?>