<?php
include 'init.php';

session_destroy();
setcookie('institute_id', '', time() - 3600, "/");
setcookie('admin', '', time() - 3600, "/");
header("Location: $base_url/pages/institute-login.php");

?>