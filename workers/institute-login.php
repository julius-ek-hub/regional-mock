<?php
include 'init.php';

institute_must_not_be_logged_in();

$contact = '';
$password = '';
$keep_login = false;
$errors = '';

if(sizeof($_POST) > 0){

    $contact = $_POST['contact'];
    $password = $_POST['password'];
    
    if (array_key_exists('keep_login', $_POST)){
        $keep_login = $_POST['keep_login'] == 'on' ? true : false;
    }

    if (empty($contact) || empty($password)){
        $errors = 'Contact and password required!';
    }else{

        $result = $conn->query("SELECT id, hashed_password FROM institutions WHERE email = '$contact' OR office_line = '$contact' OR mobile_line = '$contact'");
    
        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $hashed = $row['hashed_password'];

            if (password_verify($password, $hashed)){

            $_SESSION['institute_id'] = $row['id'];

            if ($keep_login){
                setcookie('institute_id', $row['id'], time() + (86400 * 30), "/");
            }
            header("Location: $base_url");

            } else {
                $errors = 'Incorrect contact or password!';
            }
        }else {
            $errors = 'Incorrect contact or password!';
        }
    }
}
?>