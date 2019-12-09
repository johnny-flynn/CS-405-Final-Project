<html>
<body>
<Title>ToysRUs - Past Orders</Title>
<?php
//include "shopping.php";
//include "search_query";
session_start();
$user = $_SESSION['username'];
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$conn= new mysqli($host,$userName,$Pass,$DB);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo $user . "'s Past Orders";
?>
<br>
<br>
<form action="shopping.php" method="post">
	<input type="submit" value="Continue Shopping"/>
</form>
<br>
<?php
$sql = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user'";
$result = $conn->query($sql);
$total = 0;
if (!empty($result)){

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Cost</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
        echo "<td>" . $row['SStatus'] . "</td>";
        echo "<td>$" . $row['price_sum'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";

    mysqli_close($mysqli);
}
else {
    echo "You have no order history.";
}
?>
</body>
</html>