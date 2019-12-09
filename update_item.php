<html>
<body>
<Title>ToysRUs - Update Item</Title>
<H1>ToysRUs</H1>
<H1>Update item in inventory</H1>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping_staff.php">
	<input type="submit" value="Cancel" />
</form>
<br/>
<form action="updateitem.php" method="post">
	<b>Please fill out all fields</b><br>
Product ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="PID"><br/>
Product Name: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="p_name"><br/>
Price (Mgrs only):&nbsp;<input type="text" name="price"><br/>
Manufacturer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="manufacturer"><br/>
Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type = "number" id="quantity" min="0" max="100" name="quantity"><br/>
Review Score: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="review"><br/>
<input type = "submit" value="Update Item">




</form>

</body>
</html>
