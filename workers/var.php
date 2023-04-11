<?php

// $base_url = "http://192.168.1.228:80/regional-mock";
$base_url = "http://localhost/regional-mock";

$conn = "";
$exams = array();

// Current session
$institute = '';
$admin = false;


define('CONSTANTS', array(
    "servername" => "localhost",
    "username" => "root",
    "password" => "",
    "db" => "rdse_db",
    "base_url" => $base_url,
    "carousel_images" => array(
        "$base_url/assets/images/students-1.jpeg", 
        "$base_url/assets/images/students-3.jpg", 
        "$base_url/assets/images/bgs.jpg", 
        "$base_url/assets/images/gce-1.jpg",
    )
))

?>