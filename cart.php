<html>
<body>
<Title>ToysRUs - Shopping</Title>
<H1>User's Cart</H1>
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
$sql = "SELECT PID FROM Cart WHERE (CID = '$user')";
$result = $conn->query($sql);
$results = implode(",", $result);
$sql2 = "SELECT * FROM Products where PID in ('$results')";
$productsincart = $conn->query($sql2);
//echo $productsincart;
if (!empty($productsincart)){

echo "<table border = '1'>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Remove</th>
    </tr>";
    

    while($row = conn_fetch_array($productsincart))
    {
        $PID = $rows['PID'];
        echo "<tr>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . "<form>" . "<form action='remove.php' method='post'>" . 
        "<input type='submit' name='item' value='Remove' align='Center'>" . "</form>";
        echo "</tr>";
        echo "<tr>";
        foreach ($row as $field => $value) {
            echo "<td>" . $value . "</td>";
        }
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