<html>
<body>

<?php
session_start();
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
$conn->close();
?>

</body>
</html>
