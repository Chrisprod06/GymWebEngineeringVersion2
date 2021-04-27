<?php

include 'dbh.inc.php';

$sql = "SELECT * FROM users WHERE role = 3 ORDER BY userID ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
                 <td>" . $row["userID"] . "</td>
                 <td>" . $row["firstname"] . "</td>
                 <td>" . $row["lastname"] . "</td>
                 <td>" . $row["telephone"] . "</td>
                 <td>" . $row["address"] . "</td>
                 <td>" . $row["email"] . "</td>
                 
                 <td>
                  
                 <a href='customers.php?userID=";
        echo $row["userID"];
        echo "&modal=deleteCustomer'  class='delete'><i class='far fa-trash-alt' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>   
                  </td>
                </tr> ";
    }
}
