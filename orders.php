<html>
<body>
<Title>ToysRUs - Orders</Title>
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
echo $user . "'s Orders";
?>
<br>
<br>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping.php" method="post">
	<input type="submit" value="Continue Shopping"/>
</form>
<form action="cart.php" method="post">
	<input type="submit" value="View Cart"/>
</form>
<?php
$sql = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user' and SStatus = 0";
$result = $conn->query($sql);
$sql2 = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user' and SStatus = 1";
$result2 = $conn->query($sql2);
$sql3 = "SELECT a.* from Orders a, Customers b where a.CID = b.CID and a.CID = '$user' and SStatus = 2";
$result3 = $conn->query($sql3);
$total = 0;
if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0 && mysqli_num_rows($result3) == 0){
    echo "You have no order history.";
}
else{
if (mysqli_num_rows($result) != 0){
?><h2>Pending Orders</h2><?php

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Cost</th>
    <th>Items Ordered</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result))
    {
        $OrderID= $row['OrderID'];
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
        echo "<td>$" . $row['price_sum'] . "</td>";
        echo "<td>" . $row['items'] . "</td>";
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

if (mysqli_num_rows($result2) != 0){
?>
<h2>Orders waiting to ship</h2>
<?php

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Cost</th>
    <th>Items Ordered</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result2))
    {
        $OrderID= $row['OrderID'];
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
        echo "<td>$" . $row['price_sum'] . "</td>";
        echo "<td>" . $row['items'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";

    mysqli_close($mysqli);
}

if (mysqli_num_rows($result3) != 0){
    ?>
    <h2>Shipped Orders</h2>
    <?php

echo "<table border = '1'>
    <tr>
    <th>OrderID</th>
    <th>Shipping Address</th>
    <th>Order Date</th>
    <th>Cost</th>
    <th>Items Ordered</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result3))
    {
        $OrderID= $row['OrderID'];
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['ship_address'] . "</td>";
        echo "<td>" . $row['Odate'] . "</td>";
        echo "<td>$" . $row['price_sum'] . "</td>";
        echo "<td>" . $row['items'] . "</td>";
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