<html>
<body>
<Title>ToysRUs - Add Item</Title>
<H1>ToysRUs</H1>

<H1>Add new item to inventory</H1>
<form align="right" action="sign_in.php">
	<input type="submit" value="Logout" />
</form>
<form action="shopping_staff.php">
	<input type="submit" value="Cancel" />
</form>
<br/>
<form action="additem.php" method="post">
Product ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="PID"><br/>
Product Name: &nbsp; <input type="text" name="p_name"><br/>
Category: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="cat" list="cats"><datalist id="cats"><option value="Electronics"><option value="Games"><option value="Sports"><option value="Toys"></datalist><br>
Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price"><br/>
Manufacturer: &nbsp;&nbsp;&nbsp;<input type="text" name="manufacturer"><br/>
Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type = "number" id="quantity" min="0" max="100" name="quantity"><br/>
<input type = "submit" value="Add Item">




</form>

</body>
</html>

