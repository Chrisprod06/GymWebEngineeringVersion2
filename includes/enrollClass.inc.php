<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';







    $classID = mysqli_escape_string($conn, $_POST['classID']);
    $customerID = mysqli_escape_string($conn, $_POST['customerID']);

    //Check if user is already enrolled and reject enrollment

    $sql = "SELECT customerID FROM enrolledclasses WHERE customerID=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../MyClassesCustomer.php?error=stmtFailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $customerID);
        if (!mysqli_stmt_execute($stmt)) {
            header("Location: ../MyClassesCustomer.php?error=stmtFailed");
            exit();
        }else{
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck>0){
                header("Location: ../MyClassesCustomer.php?error=alreadyEnrolled");
                exit();
            }
        }

    }

    mysqli_stmt_close($stmt);



    //Get trainerID that teaches this class
    $sql = "SELECT trainerID FROM classes WHERE classID=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../MyClassesCustomer.php?error=stmtFailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $classID);
        if (!mysqli_stmt_execute($stmt)) {
            header("Location: ../MyClassesCustomer.php?error=stmtFailed");
            exit();
        } else {
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
                $trainerID = $row['trainerID'];
            }
        }
    }
    mysqli_stmt_close($stmt);
    //Enroll to class
    $sql = "INSERT INTO enrolledclasses(customerID,trainerID,classID) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../MyClassesCustomer.php?error=stmtFailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "iii", $customerID, $trainerID, $classID);
        if (!mysqli_stmt_execute($stmt)) {
            header("Location: ../MyClassesCustomer.php?error=stmtFailed");
            exit();
        } else {
            header("Location: ../MyClassesCustomer.php?enroll=success");
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit();
        }
    }
} else {
    header("location: ../MyClassesCustomer.php");
    exit();
}
