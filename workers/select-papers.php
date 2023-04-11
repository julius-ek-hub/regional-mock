<?php
include 'init.php';

if (empty($institute)){
    header("Location: $base_url");
}elseif (empty($institute['hashed_password'])){
    header("Location: $base_url/pages/create-password.php");
}
if (!isset($_SESSION['pending_candidate_id']) || !isset($_SESSION['pending_candidate_exam_id'])){
    header("Location: $base_url");
}
$papers_selected = '';
$error = '';

$pending_candidate_id = $_SESSION['pending_candidate_id'];
$pending_candidate_exam_id = $_SESSION['pending_candidate_exam_id'];
$candidates_table = $table = 'institute_' . $institute['id'] . '_candidates';
$papers_allowed = array();

$exam = $exams[(int)$pending_candidate_exam_id]['name'];
$exam_info = $conn->query("SELECT * FROM exams WHERE id = '$pending_candidate_exam_id'")->fetch_assoc();
$papers_table = 'papers_' . implode('_', explode(' ', strtolower($exam)));
$papers_query = $conn->query("SELECT * FROM $papers_table");
$error_message = 'Minimum papers = ' . $exam_info['min_papers'] . ', Maximum papers = ' . $exam_info['max_papers'];

while($row = $papers_query->fetch_assoc()){
    $papers_allowed[$row['id']] = $row['name'];
}


if(isset($_POST['papers_selected'])){
    if(!empty($_POST['papers_selected'])){

        $papers_selected = $_POST['papers_selected'];
        $candidates_table = 'institute_' . $institute['id'] . '_candidates';
        $paper_names = array();
        foreach (explode(',', $papers_selected) as $key => $value) {
            $paper_names[$key] = $papers_allowed[(int)$value];
        }

        $total = sizeof($paper_names);

        if ($total > $exam_info['max_papers'] || $total < $exam_info['min_papers']){
            $error = $error_message;
        } else {

            $paper_names_str = implode(', ', $paper_names);
    
            $conn->query("UPDATE $candidates_table SET paper_ids = '$papers_selected', paper_names = '$paper_names_str' WHERE id = '$pending_candidate_id'");
    
            $_SESSION['pending_candidate_payment_amount'] = (sizeof($paper_names) * $exam_info['cost_per_paper'] + $exam_info['registration_fee']);
            header("Location: $base_url/pages/select-payment.php");
        }

    }else{
        $error = $error_message;
    }
}
?>