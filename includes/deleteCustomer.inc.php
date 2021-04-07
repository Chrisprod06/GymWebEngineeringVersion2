<?php
if (isset($_POST['userID'])  && !empty($_POST['userID'])) {

    require_once 'dbh.inc.php';
    $param_id = $_POST['userID'];

    $sql = "DELETE FROM users where userID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../customers.php?deletion=success');
            exit();
        } else {
            header('Location: ../customers.php?deletion=error');
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    if (empty($_POST['userID'])) {
        header('Location: ../customers.php?deletion=empty');
        exit();
    }
}
