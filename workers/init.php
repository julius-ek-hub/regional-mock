<?php

require 'var.php';

session_start();

try {

    $servername = CONSTANTS['servername'];
    $username = CONSTANTS['username'];
    $password = CONSTANTS['password'];
    $db = CONSTANTS['db'];

    $conn = new mysqli($servername, $username, $password);
    $conn->query("CREATE DATABASE IF NOT EXISTS $db");
    $conn = new mysqli($servername, $username, $password, $db);

    $conn->query("CREATE TABLE IF NOT EXISTS institutions (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        owner VARCHAR(30) NOT NULL,
        exam VARCHAR(50) NOT NULL,
        office_line VARCHAR(50) NOT NULL,
        mobile_line VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        established VARCHAR(50) NOT NULL,
        region VARCHAR(50) NOT NULL,
        division VARCHAR(50) NOT NULL,
        sub_division VARCHAR(50) NOT NULL,
        town VARCHAR(50) NOT NULL,
        students INT(5) NOT NULL,
        candidates INT(5),
        teachers INT(5),
        exam_max VARCHAR(100),
        exam_max_percentage INT(5),
        hashed_password VARCHAR(100)
    )");

    $conn->query("CREATE TABLE IF NOT EXISTS exams (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        cost_per_paper INT(10) NOT NULL,
        registration_fee INT(10) NOT NULL,
        min_papers INT(5) NOT NULL,
        max_papers INT(5) NOT NULL
    )");

    $exams_query = $conn->query("SELECT * FROM exams");

    if ($exams_query->num_rows == 0){
        $conn->query("INSERT INTO exams (name, cost_per_paper, registration_fee, min_papers, max_papers)  VALUES 
            ('GCE OL', 1000, 10000, 5, 11), 
            ('GCE AL', 2000, 15000, 3, 5), 
            ('BEPC', 2000, 15000, 4, 10), 
            ('PROBATOIRE', 1500, 10000, 4, 8), 
            ('BACCALAUREAT', 2000, 15000, 4, 8), 
            ('CAPIEMP', 2000, 15000, 4, 8), 
            ('CAPIET', 2000, 15000, 4, 8), 
            ('CAP INDUSTRIAL', 1000, 10000, 4, 8), 
            ('CAP TERTIARY', 1500, 10000, 4, 8), 
            ('ITVE INDUSTRIAL', 2500, 10000, 4, 8), 
            ('ITVE TERTIARY', 1000, 10000, 4, 8), 
            ('ATVE INDUSTRIAL', 1500, 10000, 4, 8), 
            ('ATVE TERTIARY', 2000, 10000, 4, 8)
        ");
        $exams_query = $conn->query("SELECT * FROM exams");
    }

    while ($row = $exams_query->fetch_assoc()) {
        $exam = $row['name'];
        $exam_papers_table_name = 'papers_' . implode('_', explode(' ', $exam));

        $conn->query("CREATE TABLE IF NOT EXISTS $exam_papers_table_name (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        )");

        $exams[$row['id']] = $row;
    }

    $institute_id = '';

    if (isset($_COOKIE['institute_id'])){
        $institute_id = (int)$_COOKIE['institute_id'];
    }else if (isset($_SESSION['institute_id'])){
        $institute_id = (int)$_SESSION['institute_id'];
    }

    if (isset($_COOKIE['admin']) || isset($_SESSION['admin'])){
        $admin = true;
    }

    if (!empty($institute_id)){

        $result = $conn->query("SELECT * FROM institutions WHERE id = '$institute_id'");

        $institute = $result->fetch_assoc();
    }

} catch (Exception $e) {
    header("Location: $base_url/pages/error-500.php?error=" . $e->getMessage());
}

function candidate_must_be_pending(){
    global $base_url;
    if (!isset($_SESSION['pending_candidate_id']) || 
        !isset($_SESSION['pending_candidate_exam_id']) || 
        !isset($_SESSION['pending_candidate_payment_amount'])){
        header("Location: $base_url");
    }
}

function institute_must_be_logged_in(){
    global $base_url;
    global $institute;
    if (empty($institute)){
        header("Location: $base_url/pages/institute-login.php");
    }elseif (!empty($institute) && empty($institute['hashed_password'])){
        header("Location: $base_url/pages/create-password.php");
    }
}

function admin_must_be_logged_in(){
    global $base_url;
    global $admin;
    if (!$admin){
        header("Location: $base_url/pages/admin-login.php");
    }
}
function admin_must_not_be_logged_in(){
    global $base_url;
    global $admin;
    if ($admin){
        header("Location: $base_url");
    }
}

function institute_must_not_be_logged_in(){
    global $base_url;
    global $institute;
    if (!empty($institute)){
        if (empty($institute['hashed_password'])){
            header("Location: $base_url/pages/create-password.php");
        }else {
            header("Location: $base_url");
        }
    }
}
?>