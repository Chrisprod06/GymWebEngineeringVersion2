<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'dbh.inc.php';
    $userID = (int)$_SESSION['userID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $repeatNewPassword = $_POST['repeatNewPassword'];
    $newsletter = $_POST['newsletter'];


    //Error handlers
    if ($_POST['currentPassword'] != '') {
        //check if current passoword matches the one in the database


        $sql = "SELECT password FROM users WHERE userID = ?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../editProfile.php?error=stmtFailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            if (password_verify($currentPassword, $row['password']) == false) {
                header('location: ../editProfile.php?error=currentPasswordWrong');
                exit();
            }
        } else {
            header('location: ../editProfile.php?error=somethingWrong');
        }



        //check if new password and repeat new password are the same
        if ($newPassword != $repeatNewPassword) {
            header('location: ../editProfile.php?error=passwordsDontMatch ');
            exit();
        } else {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password=? WHERE userID=?;";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('location: ../editProfile.php?error=stmtFailed');
                exit();
            }
            mysqli_stmt_bind_param($stmt,"si",$hashedNewPassword,$userID);
            mysqli_stmt_execute($stmt);


        }
        mysqli_stmt_close($stmt);
        
    }


    //Update field in database
    $sql = "UPDATE users SET firstname = ? ,lastname = ?, phoneNo = ?, email = ? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../editProfile.php?error=stmtFailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssissi", $firstname, $lastname, $telephone, $email, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location: ../editProfile.php?stmtFailed');
        exit();
    } else {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['telephone'] = $telephone;
        $_SESSION['email'] = $email;
        header('Location: ../editProfile.php?update=successful');
        exit();
    }
}
