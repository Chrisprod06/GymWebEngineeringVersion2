<?php
include_once 'dbh.inc.php';
$sql = "SELECT * FROM  users NATURAL JOIN enrolledclasses NATURAL JOIN classes where role=2 or role=3 and userID in (Select trainerID From enrolledclasses) Or userID in (Select customerID from enrolledclasses); ";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['role'] == 1) {
            $role = 'Admin';
        } else if ($row['role'] == 2) {
            $role = 'Trainer';
        } else if ($row['role'] == 3) {
            $role = 'Customer';
        }

        echo "<tr>
         <td>" . $row["classID"] . "</td>
         <td>" . $row["className"] . "</td>
         <td>" . $row["day"] . "</td>
         <td>" . $row["startDate"] . "</td>
         <td>" . $row["endDate"] . "</td>
         <td>" . $row["startTime"] . "</td>
         <td>" . $row["endTime"] . "</td>
         <td>" . $role . "</td>
         <td>" . $row["firstname"] . "</td>
         <td>" . $row["lastname"] . "</td>
         <td>" . $row["telephone"] . "</td>
         <td>" . $row["email"] . "</td>   
         <td>
          
         <a href='classes.php?classID=";
        echo $row["classID"] . "&className=";
        echo $row['className'] . "&day=";;
        echo $row['day'] . "&startDate=";
        echo $row['startDate'] . "&endDate=";
        echo $row['endDate'] . "&startTime=";
        echo $row['startTime'] . "&endTime=";
        echo $row['endTime'] . "&trainerID=";
        echo $row['trainerID'];
        echo "&modal=editClass' class='edit'><i class='fas fa-edit' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
         <a href='classes.php?classID=";
        echo $row["classID"];
        echo "&modal=deleteClass'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
          </td>
        </tr> ";
    }
}
