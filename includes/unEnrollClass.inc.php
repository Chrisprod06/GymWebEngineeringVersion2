<?php
if (isset($_POST['classID'])  && !empty($_POST['classID'])) {

    require_once 'dbh.inc.php';
    $param_id = $_POST['classID'];

    $sql = "DELETE FROM enrolledclasses where classID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);


        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../MyClassesCustomer.php?deletion=success');
            exit();
        } else {
            header('Location: ../MyClassesCustomer.php?deletion=error');
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    if (empty($_POST['classID'])) {
        header('Location: ../MyClassesCustomer.php?deletion=empty');
        exit();
    }
}
