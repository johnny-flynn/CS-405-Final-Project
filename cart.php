<html>
<body>
<Title>ToysRUs - Shopping</Title>
<H1>User's Cart</H1>
<?php
//include "shopping.php";
include "search_query";
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$conn= new mysqli($host,$userName,$Pass,$DB);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT CartID FROM Shopping_Cart WHERE (CID = '$inputUsername')";
$result = $conn->query($sql);
$productsincart = conn_query($conn,"SELECT PID FROM Shopping_Cart where (CartID = '$result') ORDER BY PID ASC");

if (!empty($productsincart)){

echo "<table border = '1'>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Remove</th>
    </tr>";


    while($rows = conn_fetch_array($productsincart))
    {
        //$PID = $rows['PID'];
        echo "<tr>";
        echo "<td>" . $rows['p_name'] . "</td>";
        echo "<td>" . $rows['price'] . "</td>";
        echo "<td>" . "<form>" . "<form action='remove.php' method='post'>" . 
        "<input type='submit' name='item' value='Remove' align='Center'>" . "</form>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($mysqli);
}
?>
</body>
</html>