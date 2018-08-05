<?php
// Check to see if a form with a post method submits,
// in which case the input with the name 'username' becomes the
// variable username.
// Set a cookie, with the name 'username', the value of the variable username,
// which will expire in one hour.
	if(isset($_POST['submit'])){
		$username = htmlentities($_POST['username']);

		setcookie('username', $username, time()+3600); // 1 Hour
		// Afterwards, take the user to page two.
		header('Location: page2.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Cookies</title>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="username" placeholder="Enter Username">
		<br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
