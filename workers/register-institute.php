<?php
include 'init.php';

institute_must_not_be_logged_in();

$name = '';
$owner = '';
$established = '';
$exam = '';
$office_line = '';
$mobile_line = '';
$email = '';
$region = '';
$division = '';
$sub_division = '';
$town = '';
$students = '';
$candidates = '';
$teachers = '';
$exam_max = 1;
$exam_max_percentage = '';

if(isset($_POST) && sizeof($_POST) > 0){
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $established = $_POST['established'];
    $exam = $_POST['exam'];
    $office_line = $_POST['office_line'];
    $mobile_line = $_POST['mobile_line'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $division = $_POST['division'];
    $sub_division = $_POST['sub_division'];
    $town = $_POST['town'];
    $students = $_POST['students'];
    $candidates = $_POST['candidates'];
    $teachers = $_POST['teachers'];
    $exam_max = $_POST['exam_max'];
    $exam_max_percentage = $_POST['exam_max_percentage'];

    $conn->query("INSERT INTO institutions (
        name, 
        owner, 
        exam, 
        office_line, 
        mobile_line, 
        email, 
        established, 
        region, 
        division, 
        sub_division, 
        town, 
        students, 
        candidates, 
        teachers, 
        exam_max, 
        exam_max_percentage
    ) VALUES (
        '$name', 
        '$owner', 
        '$exam', 
        '$office_line', 
        '$mobile_line', 
        '$email', 
        '$established', 
        '$region', 
        '$division', 
        '$sub_division', 
        '$town', 
        '$students', 
        '$candidates', 
        '$teachers', 
        '$exam_max', 
        '$exam_max_percentage'
    )");

$id = $conn->insert_id;
$table = 'institute_' . $id . '_candidates';

$conn->query("CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(100) NOT NULL,
    mname VARCHAR(100) NOT NULL,
    lname VARCHAR(100) NOT NULL,
    sex CHAR(1) NOT NULL,
    dob VARCHAR(30) NOT NULL,
    pob VARCHAR(30) NOT NULL,
    father VARCHAR(50) NOT NULL,
    mother VARCHAR(50) NOT NULL,
    exam VARCHAR(50) NOT NULL,
    status VARCHAR(50) NOT NULL,
    candidate_number VARCHAR(50) NOT NULL,
    reg_date VARCHAR(50) NOT NULL,
    paper_ids VARCHAR(200) NOT NULL,
    paper_names VARCHAR(200) NOT NULL
)");

$_SESSION['institute_id'] = $id;
header("Location: $base_url/pages/create-password.php");
}
?>