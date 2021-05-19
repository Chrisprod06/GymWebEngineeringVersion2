<?php
include_once 'dbh.inc.php';
$customerid=(int)$_SESSION['userID'];
$today=date("Y-m-d");
$now=date("H:i:s");
$sql = "SELECT classID FROM enrolledclasses WHERE customerID=$customerid ";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
    $classid=$row['classID'];
    $classinfo="SELECT classID,className,day,startDate,endDate,startTime,endTime FROM classes WHERE classID=".$classid." AND startDate >=".$today."  LIMIT 7";
    $result2=mysqli_query($conn,$classinfo);
    while ($row2=mysqli_fetch_assoc($result2)){
        echo "<tr>
         <td>" . $row2["classID"] . "</td>
         <td>" . $row2["className"] . "</td>
         <td>" . $row2["day"] . "</td>
         <td>" . $row2["startDate"] . "</td>
         <td>" . $row2["endDate"] . "</td>
         <td>" . $row2["startTime"] . "</td>
         <td>" . $row2["endTime"] . "</td>
         
         <td>
                  
         <a href='MyClassesCustomer.php?classID=";
echo $row["classID"];
echo "&modal=unEnrollClass'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
          </td>
        </tr> ";
    }
}

?>