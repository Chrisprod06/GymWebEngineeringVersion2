<?php
include_once 'dbh.inc.php';
$trainerid=(int)$_SESSION['userID'];
$sql = "SELECT classID,className,day,startDate,endDate,startTime,endTime FROM classes WHERE trainerID=$trainerid ";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {


        echo "<tr>
         <td>" . $row["classID"] . "</td>
         <td>" . $row["className"] . "</td>
         <td>" . $row["day"] . "</td>
         <td>" . $row["startDate"] . "</td>
         <td>" . $row["endDate"] . "</td>
         <td>" . $row["startTime"] . "</td>
         <td>" . $row["endTime"] . "</td>
         
          </td>
        </tr> ";
    }
}
?>