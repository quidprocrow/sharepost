<?php
/*
	// Check for posted data
  // input = name of the method, second argument equals name of the input field
	if(filter_has_var(INPUT_POST, 'data')){
		echo 'Data Found';
	} else {
		echo 'No Data';
	}
  // check to see that a given input has a certain variable
	if(filter_has_var(INPUT_POST, 'data')){
		$email = $_POST['data'];

		// Remove illegal chars
    // filter_var takes a variable and a certain type of filtering
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		echo $email.'<br>';

		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo 'Email is valid';
		} else {
			echo 'Email is NOT valid';
		}
	}

		#FILTER_VALIDATE_BOOLEAN
		#FILTER_VALIDATE_EMAIL
		#FILTER_VALIDATE_FLOAT
		#FILTER_VALIDATE_INT
		#FILTER_VALIDATE_IP
		#FILTER_VALIDATE_REGEXP
		#FILTER_VALIDATE_URL

		#FILTER_SANITIZE_EMAIL
		#FILTER_SANITIZE_ENCODED
		#FILTER_SANITIZE_NUMBER_FLOAT
		#FILTER_SANITIZE_NUMBER_INT
		#FILTER_SANITIZE_SPECIAL_CHARS
		#FILTER_SANITIZE_STRING
		#FILTER_SANITIZE_URL


		$var = 'kdkejdked';

		if(filter_var($var, FILTER_VALIDATE_INT)){
			echo $var. ' is a number';
		} else {
			echo $var. ' is NOT a number';
		}

		$var = '<script>alert(1)</script>';
		//echo $var;
		echo filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
		//var_dump(filter_var($var, FILTER_SANITIZE_NUMBER_INT));


	$filters = array(
		"data" => FILTER_VALIDATE_EMAIL,
		"data2" => array(
			"filter" => FILTER_VALIDATE_INT,
			"options" => array(
				"min_range" => 1,
				"max_range" => 100
			)
		)
	);
  // filter input array takes a given input, then applies the filtering array to it
  // not sure how this jives with print_r; I guess because it has to evaluate before it can print?
	print_r(filter_input_array(INPUT_POST, $filters));

	*/

	$arr = array(
		"name" => "brad traversy",
		"age" => "133",
		"email" => "brad@gmail..com"
	);

	$filters = array(
		"name" => array(
			"filter" => FILTER_CALLBACK,
			"options" => "ucwords"
		),
		"age" => array(
			"filter" => FILTER_VALIDATE_INT,
			"options" => array(
				"min_range" => 1,
				"max_range" => 120
			)
		),
		"email" => FILTER_VALIDATE_EMAIL
	);

	print_r(filter_var_array($arr, $filters));

?>

// Note: the action here just redirects to the current page

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="data">
	<input type="text" name="data2">
	<button type="submit">Submit</button>
</form>
