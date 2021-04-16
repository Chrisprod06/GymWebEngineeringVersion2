<?php
session_start();

if(isset($_POST['submitSendMessage'])){
    $userID= (int)$_SESSION['userID'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO contactqueries(userID,subject,message) VALUES (?,?,?);";
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../sendMessageAdmin.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"iss",$userID,$subject,$message);
    if(!mysqli_stmt_execute($stmt)){
        header("Location:../sendMessageAdmin.php?message=notSent");
    }else{
        header("Location:../sendMessageAdmin.php?message=sent");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();

}else{
    header("Location: ../sendMessageAdmin.php");
    exit();
}