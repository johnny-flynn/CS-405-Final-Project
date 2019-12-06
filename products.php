<?php
// Now, we will create a mysqli object and connect to database
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$mysqli = new mysqli($host, $userName,$Pass,$DB);

// Check for connection error
// If there is an error we will use $mysqli->connect_error
// to print the cause of the error
$result = mysqli_query($mysqli,"SELECT * FROM Products");

echo "<table border = '1'>
<tr>
<th>PID</th>
<th>p_name</th>
<th>price</th>
<th>review_score</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['PID'] . "</td>";
    echo "<td>" . $row['p_name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['review_score'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($mysqli);
?>