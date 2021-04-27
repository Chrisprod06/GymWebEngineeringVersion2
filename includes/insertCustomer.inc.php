<?php
if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';
    
    $first = mysqli_real_escape_string($conn,$_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role= 3;

    $sql = "INSERT INTO users (firstname, lastname, telephone,address, email, password, role) VALUES (?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"ssisssi", $first, $last, $phone,$address, $email, $hashedPwd,$role);
        mysqli_stmt_execute($stmt);
    }             
        header('Location: ../customers.php?registration=success');
        exit();
}

else if(isset($_POST['cancel'])){
    header('Location: ../customers.php?registration=cancel');
    exit();
}
else{
    header('Location: ../customers.php?registration=error');
    exit();
}