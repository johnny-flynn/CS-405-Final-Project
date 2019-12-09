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
?>
<H2>All Orders</H2>
<br>
<br>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping_staff.php" method="post">
	<input type="submit" value="Continue Shopping"/>
</form>
<?php
$sql = "SELECT * from Orders where SStatus = 1";
$result = $conn->query($sql);
$sql2 = "SELECT * from Orders where SStatus = 2";
$result2 = $conn->query($sql2);
$total = 0;
if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0){
    echo "There are no orders.";
}
else{
if (mysqli_num_rows($result) != 0){
?><h2>Waiting to ship</h2><?php

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
        echo "<td>" ?><a href="shiporder.php?OrderID=<?php echo $OrderID; ?>" class = "btn btn-primary" role="button">Ship</a><?php "</td>";
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
else {
    echo "You have no shipped orders.";
}
}

?>
</body>
</html>