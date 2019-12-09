<html>
<body>
<Title>ToysRUs - Add Item</Title>

<H1>Add new item to inventory</H1>
<form action="shopping_staff.php">
	<input type="submit" value="Cancel" />
</form>
<br/>
<form action="updateitem.php" method="post">
	<b>Please fill out all fields</b><br>
Product ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="PID"><br/>
Product Name: &nbsp; <input type="text" name="p_name"><br/>
Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price"><br/>
Manufacturer: &nbsp;&nbsp;&nbsp;<input type="text" name="manufacturer"><br/>
Quantity: &nbsp;&nbsp;&nbsp;&nbsp; <input type = "text" name="quantity"><br/>
Review Score: &nbsp; <input type="text" name="review"><br/>
<input type = "submit" value="Update Item">




</form>

</body>
</html>
