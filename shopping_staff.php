<html>
<body>
<Title>ToysRUs - Shopping</Title>
<H1>Welcome to ToysRUs</H1>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="allorders.php" method="post">
	<input type="submit" value="View All Orders"/>
</form>
<form action="add_item.php">
	<input type="submit" value="Add item" />
</form>

<form action="update_item.php">
	<input type="submit" value="Update item" />
</form>

<form action="checkmanager.php">
	<input type="submit" value="View Stats (Managers)" />
</form>

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
$user = $_GET['user'];
echo $user;
?>
<form action = "" method="post">
    Filter by searching for the Product ID or the Name: <br>
    To see all products, hit the submit button<br>
    Search: <input type = "text" name = "search">
    <input type = "submit">
</form>
<?php
$inputSearchText = $_POST["search"];
$result = mysqli_query($mysqli,"SELECT * FROM Products WHERE (cat LIKE '%$inputSearchText%' OR PID LIKE '%$inputSearchText%' OR p_name LIKE '%$inputSearchText%')ORDER BY PID ASC");
if (!empty($result)){


    echo "<table border = '1'>
    <tr>
    <th>ID</th>
    <th>Category</th>
    <th>Product</th>
    <th>Price</th>
    <th>In Stock</th>
    <th>Rating/5</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        $PID = $row['PID'];
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['cat'] . "</td>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>$" . $row['price'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['review_score'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($mysqli);
}
?>
</body>
</html>
