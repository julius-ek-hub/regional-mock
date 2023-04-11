<?php
include 'init.php';

admin_must_not_be_logged_in();

$username = '';
$password = '';
$keep_login = false;
$errors = '';

if(sizeof($_POST) > 0){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (array_key_exists('keep_login', $_POST)){
        $keep_login = $_POST['keep_login'] == 'on' ? true : false;
    }

    if (empty($username) || empty($password)){
        $errors = 'Username and password required!';
    }else{

        if ($password == 'admin' && $username == 'admin'){

        $_SESSION['admin'] = true;

        if ($keep_login){
            setcookie('admin', true, time() + (86400 * 30), "/");
        }
        if(isset($_GET['return_to']) && filter_var($_GET['return_to'], FILTER_VALIDATE_URL)){
            header("Location:" . $_GET['return_to']);
        }else {
            header("Location: $base_url");
        }

        } else {
            $errors = 'Incorrect username or password!';
        }
    }
}
?>