<?php
session_start();
// This is a basic script showing how to connect to a local MySQL database
// and execute a query

// First, let's get our variables from the previous page
// remember, we stored them in a "post" variable called "professor"
$Prof_Name = $_POST["username"];
$inputUsername = $_POST["username"];
$inputPassword = $_POST["password"];
$inputGuest = $_POST["guest"];
$code = $_POST["123"];
$_SESSION["username"] = $_POST["username"];
//hello


// Now, we will create a mysqli object and connect to database
$host = 'localhost';//enter hostname
$userName = 'root';//enter user name of DB
$Pass = 'pwd'; //enter password
$DB = 'Econ'; //Enter database name
$mysqli = new mysqli($host, $userName,$Pass,$DB);

// Check for connection error
// If there is an error we will use $mysqli->connect_error
// to print the cause of the error
if ($mysqli->connect_errno) {
	echo "Could not connect to database \n";
	echo "Error: ". $mysqli->connect_error . "\n";
	exit;
} 
else {
	$sql = "SELECT Cname, CID, Cpassword FROM Customers WHERE (CID = '$inputUsername' AND Cpassword = '$inputPassword')";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			echo "Welcome " . $row["Cname"]. "<br>";
			echo "Code is: " . $code;
			/*?><a href="shopping.php?user=<?php echo $inputUsername;*/
			header("Location: http://172.31.145.13/shopping.php");
			die();
		}
		exit;
	}

	$Msql = "SELECT Mname, MID, Mpassword FROM Manager WHERE (MID = '$inputUsername' AND Mpassword = '$inputPassword')";
	$Mresult = $mysqli->query($Msql);
	if ($Mresult->num_rows > 0){
		while($row = $Mresult->fetch_assoc()) {
			echo "Welcome " . $row["Mname"]. "<br>";
			header("Location: http://172.31.145.13/shopping_staff.php");
			die();
		}
		exit;
	}

	$Ssql = "SELECT Sname, StaffID, Spassword FROM Staff WHERE (StaffID = '$inputUsername' AND Spassword = '$inputPassword')";
	$Sresult = $mysqli->query($Ssql);
	if ($Sresult->num_rows > 0){
		while($row = $Sresult->fetch_assoc()) {
			echo "Welcome " . $row["Sname"]. "<br>";
			header("Location: http://172.31.145.13/shopping_staff.php");
			die();
		}
		exit;
	}

	
	else {
		/*
		// We will store the results of our query in an array
		// where the indices are the fields of our table for the
		// query result. Notice in our query that we only return
		// the name of the student (SELECT name). Therefore, 
		// after calling $result->fetch_assoc(), we will have
		// one index, namely $result["name"].
		echo "Here are the students taking a class from ". $Prof_Name. "<br \>";
		while ($s_names = $q_result->fetch_assoc()) {
			echo $s_names["name"]. "<br \>";
		} */
		echo "failed ". $inputUsername;
	}
}
?> 
