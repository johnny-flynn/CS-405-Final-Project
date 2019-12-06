<html>
<body>

<?php
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
$inputID = $_POST["ID"];
$inputImage = "Image";
$inputReview = 0;
$Type = $_POST["type"];
$isStaff = "SELECT StaffID FROM Staff WHERE StaffID = '$inputID'";
$sResult = $conn->query($isStaff);
$isManager = "SELECT MID FROM Manager WHERE MID = '$inputID'";
$mResult = $conn->query($isManager);
if ($sResult->num_rows > 0){
    $sql = "INSERT INTO Products (PID, p_name, price, manufacturer, quantity, product_image, review_score) 
    VALUES ('$inputUsername', '$inputPassword', '$inputName', '$inputEmail' , '$inputQuantity', '$inputImage', $inputReview)";
    if($conn->query($sql) === TRUE){
        echo "YEET";
        header("Location: http://172.31.145.13/shopping_staff.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else if ($mResult->num_rows > 0){
    $sql = "INSERT INTO Products (PID, p_name, price, manufacturer, quantity, product_image, review_score) 
    VALUES ('$inputUsername', '$inputPassword', '$inputName', '$inputEmail' , '$inputQuantity', '$inputImage', $inputReview)";
    if($conn->query($sql) === TRUE){
        echo "YEET";
        header("Location: http://172.31.145.13/shopping_manager.php");
        die();
    }
    else {
        echo "Error: You didn't input something correctly. Maybe the Product ID is already in use?" . $sql . "<br>" . $conn->error;
    }
    }

else {
    echo "Error: Your ID was not found";
}
$conn->close();
?>

</body>
</html>
