<?php
include_once 'dbh.inc.php';
$trainerid=(int)$_SESSION['userID'];
$sql = "SELECT classID,className,day,startTime,endTime FROM classes WHERE trainerID = 22";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {


        echo "<tr>
         <td>" . $row["classID"] . "</td>
         <td>" . $row["className"] . "</td>
         <td>" . $row["day"] . "</td>
         <td>" . $row["startTime"] . "</td>
         <td>" . $row["endTime"] . "</td>
         
          </td>
        </tr> ";
    }
}
?>