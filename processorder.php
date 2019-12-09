<html>
<form>
Shipping Address: <input type="text" name="address">

</form>
<?php
	session_start();
$user = $_SESSION['username'];
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$conn= new mysqli($host,$userName,$Pass,$DB);
$address = $_POST['address'];
if($conn->connect_error){
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT b.* from Cart a, Products b where a.PID = b.PID and a.CID = '$user'";
$result = $conn->query($sql);
if (!empty($result)){
$total = 0;
while($row = mysqli_fetch_array($result))
{
    $string[] = $row['PID'];
    $total += $row['price'];
}
$items = implode(",", $string);

$add = "INSERT INTO Orders(CID, ship_address, price_sum, items) VALUES ('$user', '$address', '$total', '$items')";
            if($conn->query($add) != NULL){
                echo "got here";
                $clear = "DELETE FROM Cart where CID = '$user'";
                if($conn->query($clear) != NULL){
                echo "got here";
            }
                header("Location: http://172.31.145.13/orders.php?status=Ordered");
            }
        }
else {
    header("Location: http:172.31.145.13/cart.php?status=NothingToOrder");
}
?>
</html>