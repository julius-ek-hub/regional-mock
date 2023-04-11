<?php
include 'init.php';

institute_must_be_logged_in();
candidate_must_be_pending();

$papers_selected = '';

$pending_candidate_id = $_SESSION['pending_candidate_id'];
$pending_candidate_exam_id = $_SESSION['pending_candidate_exam_id'];
$pending_candidate_payment_amount = $_SESSION['pending_candidate_payment_amount'];
$candidates_table = 'institute_' . $institute['id'] . '_candidates';
$papers_allowed = array();

$exam = $exams[(int)$pending_candidate_exam_id]['name'];
$cost_per_paper = $conn->query("SELECT * FROM exams WHERE id = '$pending_candidate_exam_id'")->fetch_assoc()['cost_per_paper'];
$papers_table = 'papers_' . implode('_', explode(' ', strtolower($exam)));
$papers_query = $conn->query("SELECT * FROM $papers_table");

while($row = $papers_query->fetch_assoc()){
    $papers_allowed[$row['id']] = $row['name'];
}


if(isset($_POST['name'])){

    $name = $_POST['name'];
    $card_type = $_POST['card-type'];
    $card_no = $_POST['card-no'];
    $expiry = $_POST['expiry-date'];
    $csv = $_POST['csv'];

    // Perform payment here
    
    $conn->query("UPDATE $candidates_table SET status = 'Paid' WHERE id = '$pending_candidate_id'");
    header("Location: $base_url/pages/registration-receipt.php?candidate_id=$pending_candidate_id");
    unset($_SESSION["pending_candidate_id"]);
    unset($_SESSION["pending_candidate_exam_id"]);
    unset($_SESSION["pending_candidate_payment_amount"]);
}
?>