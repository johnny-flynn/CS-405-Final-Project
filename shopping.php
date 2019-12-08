<html>
<body>
<Title>ToysRUs - Shopping</Title>
<H1>Welcome to ToysRUs</H1>

<?php
session_start();
// Now, we will create a mysqli object and connect to database
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$mysqli = new mysqli($host, $userName,$Pass,$DB);

// Check for connection error
// If there is an error we will use $mysqli->connect_error
// to print the cause of the error
$result = mysqli_query($mysqli,"SELECT * FROM Products ORDER BY PID ASC");
if (!empty($result)){


    echo "<table border = '1'>
    <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Price</th>
    <th>In Stock</th>
    <th>Rating</th>
    <th>Add to Cart</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        $PID = $row['PID'];
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['review_score'] . "</td>";
        echo "<td>" ?><a href="addtocart.php?item=<?php echo $PID; ?>" class = "btn btn-primary" role="button">Add</a><?php "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($mysqli);
}
?>
<form action="cart.php">
	<input type="submit" value="View Cart" />
</form>
</body>
</html>
