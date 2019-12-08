<html>
<body>
<Title>ToysRUs - Shopping</Title>
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
//$sql = "SELECT PID FROM Cart WHERE (CID = '$user')";
$sql = "SELECT a.CartID, b.p_name, b.price from Cart a, Products b where a.PID = b.PID and a.CID = '$user'";
$result = $conn->query($sql);
//$string = implode(",", $result);
//$productsincart= msqli_query("SELECT * FROM Products where PID in ('$string')");
//echo "got here";
//$productsincart = $conn->query($sql2);
//echo $productsincart;
if (!empty($result)){

echo "<table border = '1'>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Remove</th>
    </tr>";
    

    while($row = mysqli_fetch_array($result))
    {
        $CartID = $row['CartID'];
        echo "<tr>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" ?><a href="removefromcart.php?CartID=<?php echo $CartID; ?>" class = "btn btn-primary" role="button">Remove</a><?php "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($mysqli);
}
else {
    echo "Your shopping cart is empty.";
}
?>
</body>
</html>