<?php
include 'init.php';

if (empty($institute)){
    header("Location: $base_url");
}elseif (empty($institute['hashed_password'])){
    header("Location: $base_url/pages/create-password.php");
}
if (!isset($_SESSION['pending_candidate_id']) || !isset($_SESSION['pending_candidate_exam_id']) || !isset($_SESSION['pending_candidate_payment_amount'])){
    header("Location: $base_url");
}
$papers_selected = '';

$pending_candidate_id = $_SESSION['pending_candidate_id'];
$pending_candidate_exam_id = $_SESSION['pending_candidate_exam_id'];
$pending_candidate_payment_amount = $_SESSION['pending_candidate_payment_amount'];
$candidates_table = $table = 'institute_' . $institute['id'] . '_candidates';
$papers_allowed = array();

$exam = $exams[(int)$pending_candidate_exam_id]['name'];
$cost_per_paper = $conn->query("SELECT * FROM exams WHERE id = '$pending_candidate_exam_id'")->fetch_assoc()['cost_per_paper'];
$papers_table = 'papers_' . implode('_', explode(' ', strtolower($exam)));
$papers_query = $conn->query("SELECT * FROM $papers_table");

while($row = $papers_query->fetch_assoc()){
    $papers_allowed[$row['id']] = $row['name'];
}


if(isset($_POST['papers_selected']) && !empty($_POST['papers_selected'])){

    $papers_selected = $_POST['papers_selected'];
    $candidates_table = 'institute_' . $institute['id'] . '_candidates';
    $paper_names = array();
    foreach (explode(',', $papers_selected) as $key => $value) {
        $paper_names[$key] = $papers_allowed[(int)$value];
    }
    echo implode(', ', $paper_names);
    $conn->query("UPDATE $candidates_table SET subject_ids = '$candidate_number' WHERE id = '$id'");
}
?>