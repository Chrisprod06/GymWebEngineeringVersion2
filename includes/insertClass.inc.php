<?php
if (isset($_POST['submitAddClass'])) {

    $className = $_POST['className'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $trainerID = (int)$_POST['trainerID'];

    include_once 'functions.inc.php';
    include_once 'dbh.inc.php';


    //error handlers


    //Function to add class
    addClass($conn, $className, $day, $startTime, $endTime, $trainerID);
} else {
    header('Location: ../classes.php');
    exit();
}
