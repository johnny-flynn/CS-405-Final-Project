<html>
<?php
	session_start();
	if(isset($_GET['OrderID']) & !empty($_GET['OrderID'])){
            $OrderID = $_GET['OrderID'];
            $user = $_SESSION['username'];
            $host = 'localhost';//enter hostname
            $userName = 'root';//enter user name of DB
            $Pass = 'pwd'; //enter password
            $DB = 'Econ'; //Enter database name
            $conn= new mysqli($host,$userName,$Pass,$DB);
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            $add = "UPDATE Orders SET SStatus = 2 WHERE OrderID = '$OrderID'";
            if($conn->query($add) != NULL){
                echo "got here";
            }
			header('location: allorders.php?status=shipped');
	}else{
        header('location: allorders.php?status=failed');
	}
?>
</html>