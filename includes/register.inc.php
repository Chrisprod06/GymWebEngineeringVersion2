<?php
session_start();
//check if user uses this script using the submit button else send them back
if (isset($_POST['submitRegister'])) {

    //get data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['repeatPassword'];
    $role = $_SESSION['role'];



    //requires
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //error handlers

    //need to create telephone function validation

    if (invalidEmail($email) !== false) {
        header('location: ../register.php?error=invalidEmail');
        exit();
    }

    if (pwdMatch($password, $rePassword) !== false) {
        header('location: ../register.php?error=invalidPassword');

       
        exit();
    }
    if (emailExists($conn, $email, $role, 1) !== false) {
        header('location: ../register.php?error=emailExists');
        exit();
    }

    //add user to database
    createUser($conn, $firstname, $lastname, $telephone, $address, $email, $password, $role);
} else {
    header('location: ../register.php');
    exit();
}
