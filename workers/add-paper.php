<?php
include 'init.php';

$error = '';
$success = '';
$exam_index = '';

if(isset($_POST['paper']) && isset($_POST['exam'])){

    $exam_index = $_POST['exam'];
    $paper = $_POST['paper'];

    if ($admin){
        if (!empty($exam_index) && !empty($paper)){
            $exam_name = $exams[(int)$exam_index]['name'];
            $papers_table = 'papers_' . implode('_', explode(' ', strtolower($exam_name)));
            $exists_count = $conn->query("SELECT name FROM $papers_table WHERE LOWER(name) = LOWER('$paper')")->num_rows;
    
            if ($exists_count == 0){
                $conn->query("INSERT INTO $papers_table(name) VALUES('$paper')");
                $success = $paper . ' successfully added to ' . $exam_name;
            }else{
                $error = $paper . ' already exists in ' . $exam_name;
            }
        
        }else{
            $error = 'Both fields required!';
        }
    } else {
        $error = "Only Admins can add subjects. First <u><a href='$base_url/pages/admin-login.php?return_to=$base_url/pages/add-paper.php'>Login as Admin</a></u>";
    }

}
?>