<html>
<body>
<Title>ToysRUs - Past Orders</Title>
<H1>ToysRUs</H1>
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
<form action="cart.php" method="post">
	<input type="submit" value="View Cart"/>
</form>
<?php
$sql = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user' and (SStatus = 0 or SStatus = 1)";
$result = $conn->query($sql);
$sql2 = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user' and SStatus = 2";
$result2 = $conn->query($sql2);
$total = 0;
if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0){
    echo "You have no order history.";
}
if (mysqli_num_rows($result) != 0 || mysqli_num_rows($result2) != 0){
if (mysqli_num_rows($result) != 0){
?><h2>Pending Orders</h2><?php

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Cost</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result))
    {
        $OrderID= $row['OrderID'];
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
        echo "<td>$" . $row['price_sum'] . "</td>";
        echo "<td>" ?><a href="cancelorder.php?OrderID=<?php echo $OrderID; ?>" class = "btn btn-primary" role="button">Cancel</a><?php "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";

    mysqli_close($mysqli);
}
else {
    echo "You have no pending orders.";
}
?>
<h2>Shipped Orders</h2>
<?php
if (mysqli_num_rows($result2) != 0){

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Cost</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result2))
    {
        $OrderID= $row['OrderID'];
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
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
    echo "You have no shipped orders.";
}
}

?>
</body>
</html>