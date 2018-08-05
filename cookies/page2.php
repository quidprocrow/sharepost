
<?php
// Update the username cookie with a different timestamp and name.
	setcookie('username', 'Frank', time() + (86400 * 30));

	// Delete Cookie
	setcookie('username', 'Frank', time() - 3600);

	// If there's more than one cookie on the page, note them.
	if(count($_COOKIE) > 0){
		echo 'There are '.count($_COOKIE). ' cookies saved<br>';
	} else {
		echo 'There are no cookies saved<br>';
	}


	if(isset($_COOKIE['username'])){
		echo 'User '. $_COOKIE['username'] . ' is set<br>';
	} else {
		echo 'User is not set';
	}

	// Mystery: I don't know, given the 'frank business' above,
	// why I ever get a line that says something different than frank.
