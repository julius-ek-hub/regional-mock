<?php
include 'init.php';

if (empty($institute) || !empty($institute['hashed_password'])){
    header("Location: $base_url");
}

$institute_id = $institute['id'];
$password = '';
$password_repeat = '';
$keep_login = false;

$errors = '';

if(isset($_POST) && sizeof($_POST) > 0){

    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if (array_key_exists('keep_login', $_POST)){
        $keep_login = $_POST['keep_login'] == 'on' ? true : false;
    }

    if (empty($password) || empty($password_repeat)){
        $errors = 'Both fields required!';
    } elseif ($password != $password_repeat){
        $errors = 'Passwords did not match';
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->query("UPDATE institutions SET hashed_password = '$hashed' WHERE id = '$institute_id'");
    
        if ($query){

            if ($keep_login){
                setcookie('institute_id', $institute_id, time() + (86400 * 30), "/");
            }

            header("Location: $base_url");
        }
    }
}
?>