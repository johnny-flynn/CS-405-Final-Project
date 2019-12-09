<html>
<body>
<H1>ToysRUs</H1>
<H2>Sales Statistics</H2>

<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping_staff.php" method="post">
	<input type="submit" value="Go Back"/>
</form>
Statistics update every 12 hours.<br>
No sales statistics available.
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
?>
</body>
</html>
