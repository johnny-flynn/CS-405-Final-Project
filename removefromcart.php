<html>
<?php
	session_start();
	if(isset($_GET['CartID']) & !empty($_GET['CartID'])){
            $Cart = $_GET['CartID'];
            $user = $_SESSION['username'];
            $host = 'localhost';//enter hostname
            $userName = 'root';//enter user name of DB
            $Pass = 'pwd'; //enter password
            $DB = 'Econ'; //Enter database name
            $mysqli= new mysqli($host,$userName,$Pass,$DB);
            if($mysqli->connect_error){
                die("Connection failed: " . $mysqli->connect_error);
            }
            $add = "DELETE FROM Cart WHERE CartID = $Cart";
            $sql = "SELECT PID FROM Cart Where CartID= $Cart";
            $result = $mysqli->query($sql);
            $row = mysqli_fetch_array($result);
            $item = $row['PID'];
            $increase = "UPDATE Products SET quantity = quantity + 1 where PID = '$item'";
            if($mysqli->query($add) != NULL){
                echo "got here";
            }
            if($mysqli->query($increase) != NULL){
                echo "got here";
            }
			header('location: cart.php?status=removed');
	}else{
        header('location: shopping.php?status=failed');
        echo $items;
	}
?>
</html>