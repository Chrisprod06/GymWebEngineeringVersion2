<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'dbh.inc.php';
    $classID= $_POST['classID'];
    $className = $_POST['className'];
    $day = $_POST['day'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $trainerID = $_POST['trainerID'];

    //Update field in database
    $sql = "UPDATE classes SET className=?, day=?, startDate=?, endDate=?, startTime=?, endTime=?, trainerID=? WHERE  classID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../classes.php?error=stmtFailed');
        exit();
    }

    
    mysqli_stmt_bind_param($stmt, "ssssssi" ,$className,$day,$startDate,$endDate,$startTime,$endTime,$trainerID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location:../customers.php?error=stmtFailed');
        exit();
    } else {
        header('Location:../customers.php?update=successful');
        exit();
    }

    mysqli_stmt_close($stmt);
    exit();
}else{
    header('Location:../customers.php');
    exit();
}
