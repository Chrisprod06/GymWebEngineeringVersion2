<?php
//action.php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
if ($received_data->action == 'insert') {
    $data = array(
        ':classID' => $received_data->classID
        
    );

    $query = "
 INSERT INTO enrolledClasses
 (first_name, last_name) 
 VALUES (:first_name, :last_name)
 ";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    $output = array(
        'message' => 'Data Inserted'
    );

    echo json_encode($output);
}

