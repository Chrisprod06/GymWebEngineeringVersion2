<?php
session_start();
if (isset($_POST['submitLogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role= (int)$_SESSION['role'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    


    //error handlers
    if (invalidEmail($email) !== false) {
        header('Location: ../login.php?error=invalidEmail');
        exit();
    }

    loginUser($conn, $email, $password, $role);

    
} else {
    header('location: ../login.php');
    

    exit();
}
