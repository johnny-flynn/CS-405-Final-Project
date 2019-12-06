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

$inputUsername = $_POST["username"];
$inputPassword = $_POST["password"];
$inputName = $_POST["name"];
$inputEmail = $_POST["email"];
$sql = "INSERT INTO Customers (CID, Cpassword, Cname, Cemail) 
VALUES ('$inputUsername', '$inputPassword', '$inputName', '$inputEmail')";
if($conn->query($sql) === TRUE){
    echo "YEET";
    header("Location: http://172.31.145.13/sign_in.php");
    die();
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

</body>
</html>
