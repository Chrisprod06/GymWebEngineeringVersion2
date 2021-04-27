<?php


include_once 'dbh.inc.php';

$getusers = "SELECT customerID FROM enrolledclasses WHERE trainerID='$trainerid' ";
$result = mysqli_query($conn, $getusers);
while ($row = mysqli_fetch_assoc($result)) {
    $getuserinfo = 'SELECT userID,firstname,lastname,telephone,address,email FROM users WHERE userID= "' . $row['customerID'] . '" ';
    $result2 = mysqli_query($conn, $getuserinfo);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo "<tr><td>" . $row2["userID"] . "</td><td>" . $row2["firstname"] . "</td><td>"
            . $row2["lastname"] . "</td><td>" . $row2['telephone'] . "</td><td>" . $row2['address'] . "</td><td>" . $row2['email'];
    }
}
echo "</table>";
