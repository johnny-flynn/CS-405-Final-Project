<html>
<body>
<Title>ToyzRUs - Sign-in</Title>

<b>Welcome to ToyzRus webpage!</b>
<br/>

Please enter your username and password to sign in.
<br/> <br/>
If you are new please create an account in order to purchase items. 
<br/>
If you are just looking, please use the "Guest Access" button to continue. Note, you will be unable to purchase items as a guest.
<br/> <br/>

<form action="search_query.php" method="post">
	<!-- change name to dependent on search_query.php -->
	Username: <input type="text" name="username">
	<br/>
	Password: <input type="password" name="password">
	<br/>
	<input type="submit">
	<br/>
</form>

<br/>
<!--Redirect to Create Account page -->
<form action="create_account.php" method="post">
	<input type="submit" value="Create Account"/>
</form>

<form action="shopping_guest.php">
	<input type="submit" value="Continue as Guest" />
</form>
Note: As a guest, you won't be able to purchase or add any items to cart.

</body>
</html>

