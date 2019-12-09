<?php
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
$grabtype = "SELECT * FROM Manager where MID = '$user'";
$type = $conn->query($grabtype);
if (mysqli_num_rows($type) != 0){
    header("Location: http://172.31.145.13/stats.php");
}
else {
    header("Location: http://172.31.145.13/shopping_staff.php");
}