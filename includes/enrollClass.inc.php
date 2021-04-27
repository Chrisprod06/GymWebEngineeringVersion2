<?php
//action.php

$connect = new PDO("mysql:host=localhost;dbname=gym", "root", "");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
$trainerID=1;
if($received_data->action == 'fetchall')
{
 $query = "
 SELECT * FROM enrolledclasses
 ORDER BY classID DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}
if ($received_data->action == 'insert') {
    $data = array(
        ':classID' => $received_data->classID,
        ':customerID' => $received_data->customerID
    );

    $query = "
 INSERT INTO enrolledclasses
 (customerID,,trainerID,classID) 
 VALUES (:customerID,:trainerID, :classID)
 ";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    $output = array(
        'message' => 'Data Inserted'
    );

    echo json_encode($output);
}

