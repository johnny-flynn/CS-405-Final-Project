<html>
<body>

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

$inputUsername = $_POST["PID"];
$inputPassword = $_POST["p_name"];
$inputName = $_POST["price"];
$inputEmail = $_POST["manufacturer"];
$inputQuantity = $_POST["quantity"];
$inputPrice = $_POST["price"];
$inputImage = $_POST["Image"];
$inputReview = $_POST["review"];
$grabtype = "SELECT * FROM Manager where MID = '$user'";
$type = $conn->query($grabtype);
$grabtype1 = "SELECT * FROM Staff where StaffID = '$user'";
$type1 = $conn->query($grabtype1);
if (mysqli_num_rows($type) != 0){
    $sql = "UPDATE Products SET p_name='$inputPassword', price='$inputPrice', manufacturer='$inputEmail', quantity='$inputQuantity', review_score='$inputReview' where PID = '$inputUsername'";
    if($conn->query($sql) === TRUE){
        echo "YEET";
        header("Location: http://172.31.145.13/shopping_staff.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else if (mysqli_num_rows($type1) != 0){
    $sql = "UPDATE Products SET p_name='$inputPassword', manufacturer='$inputEmail', quantity='$inputQuantity', review_score='$inputReview' where PID = '$inputUsername'";
    if($conn->query($sql) === TRUE){
        echo "YEET";
        header("Location: http://172.31.145.13/shopping_staff.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    header("Location: http://172.31.145.13/sign_in.php");
}
$conn->close();
?>

</body>
</html>
