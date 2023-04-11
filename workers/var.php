<?php

/**
 * Use http://<IPv4>:<Port>/regional-mock; 
 * Where Port is the port in which the server is running on of your computer,
 * And IPv4 is the IPv4 of your machine on the network it is connected to.
 * Eg. http://192.168.2.2:80/regional-mock
 * Read README.md for details.
 */ 

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