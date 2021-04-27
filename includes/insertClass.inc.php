<?php
if (isset($_POST['submitAddClass'])) {

    $className = $_POST['className'];
    $day = $_POST['day'];
    $startDate= $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $trainerID = (int)$_POST['trainerID'];

    include_once 'functions.inc.php';
    include_once 'dbh.inc.php';


    //error handlers


    //Function to add class
    addClass($conn, $className, $day,$startDate,$endDate, $startTime, $endTime, $trainerID);
} else {
    header('Location: ../classes.php');
    exit();
}
