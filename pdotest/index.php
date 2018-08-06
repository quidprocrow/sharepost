<?php
	$host = 'localhost';
	$user = 'root';
	$password = 'Courage2018';
	$dbname = 'pdotest';

	// Set DSN
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

	// Create a PDO instance
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);



	$status = 'admin';


	$sql = 'SELECT * FROM users WHERE status = :status';

  // Status is a named parameter.
  //
  // This prepares the statement.

	$stmt = $pdo->prepare($sql);

  // This defines what the neamed parameter :status is.

	$stmt->execute(['status' => $status]);

  // Fetch all is used when you want to get an array, more than one.

	$users = $stmt->fetchAll();

	foreach($users as $user){
		echo $user->name.'<br>';
	}

	// $name = 'Karen Williams';
	// $email = 'kwills@gmail.com';
	// $status = 'admin';
  //
	// $sql = 'INSERT INTO users(name, email, status) VALUES(:name, :email, :status)';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['name'=> $name, 'email' => $email, 'status' => $status]);
	// echo 'Added User';
