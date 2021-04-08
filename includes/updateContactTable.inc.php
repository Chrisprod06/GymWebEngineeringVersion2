<?php

include 'dbh.inc.php';

$sql = "SELECT * FROM users natural join contactqueries WHERE role = 3 or role=2 ORDER BY userID ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
                 <td>" . $row["contactID"] . "</td>
                 <td>" . $row["firstname"] . "</td>
                 <td>" . $row["lastname"] . "</td>
                 <td>" . $row["telephone"] . "</td>
                 <td>" . $row["email"] . "</td>
                 <td>" . $row["subject"] . "</td>
                 <td>" . $row["message"] . "</td>
                </tr> ";
    }
}
