<html>
<body>
<Title>ToysRUs - Cart</Title>
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
echo $user . "'s Cart";
?>
<br>
<br>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping.php" method="post">
	<input type="submit" value="Continue Shopping"/>
</form>
<form action="orders.php" method="post">
	<input type="submit" value="View your Orders"/>
</form>
<?php
//$sql = "SELECT PID FROM Cart WHERE (CID = '$user')";
$sql = "SELECT a.CartID, b.p_name, b.price from Cart a, Products b where a.PID = b.PID and a.CID = '$user'";
$result = $conn->query($sql);
$total = 0;
if (mysqli_num_rows($result) == 0){
    echo "Your cart is empty";
}
//$string = implode(",", $result);
//$productsincart= msqli_query("SELECT * FROM Products where PID in ('$string')");
//echo "got here";
//$productsincart = $conn->query($sql2);
//echo $productsincart;
else{
    ?><form action="processorder.php" method="post">
    Shipping Address: <input type="text" name="address">
	<input type="submit" value="Order Now"/>
</form>
<br><?php
if (!empty($result)){

echo "<table border = '1'>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th></th>
    </tr>";
    

    while($row = mysqli_fetch_array($result))
    {
        $CartID = $row['CartID'];
        $total += $row['price'];
        echo "<tr>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td><div align=right>$" . $row['price'] . "</div></td>";
        echo "<td>" ?><a href="removefromcart.php?CartID=<?php echo $CartID; ?>" class = "btn btn-primary" role="button">Remove</a><?php "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "Total price: $$total";

    mysqli_close($mysqli);
}
}
?>
</body>
</html>