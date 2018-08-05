<?php
	# substr()
	# Returns a portion of a string

	//$output = substr('Hello', 1, 3);
	//$output = substr('Hello', -2);
	//echo $output;

	# strlen()
	# Returns the length of a string

	//$output = strlen('Hello World');
	//echo $output;

	# strpos()
	# Finds the position of the first occurence of a sub string

	//$output = strpos('Hello World', 'o');
	//echo $output;

	# strrpos()
	# Finds the position of the last occurence of a sub string

	//$output = strrpos('Hello World', 'o');
	//echo $output;

	# trim()
	# Strips whitespace

	/*
		$text = 'Hello World              ';
		//var_dump($text);

		$trimmed = trim($text);
		var_dump($trimmed);
	*/

	# strtoupper
	# Makes everything uppercase

	//$output = strtoupper('Hello World');
	//echo $output;

	# strtolower
	# Makes everything lowercase

	//$output = strtolower('Hello World');
	//echo $output;

	# ucwords()
	# Capitalize every word

	//$output = ucwords('hello world');
	//echo $output;

	# str_replace()
	# Replace all occurences of a search string with a replacement

	//$text = 'Hello World';
	//$output = str_replace('World', 'Everyone', $text);
	//echo $output;

	# is_string()
	# Check if string
	//$val = '22';
	//$output = is_string($val);
	//echo $output;

	/*
	$values = array(true, false, null, 'abc', 33, '33', 22.4, '22.4','',' ', 0, '0');

	foreach($values as $value){
		if(is_string($value)){
			echo "{$value} is a string<br>";
		}
	}
	*/

	# gzcompress()
	# Compress a string

	$string =
	"Lorem ipsum dolor sit amet, consectetur
	adipiscing elit. Nunc ut elit id mi ultricies
	adipiscing. Nulla facilisi. Praesent pulvinar,
	sapien vel feugiat vestibulum, nulla dui pretium orci,
	non ultricies elit lacus quis ante. Lorem ipsum dolor
	sit amet, consectetur adipiscing elit. Aliquam
	pretium ullamcorper urna quis iaculis. Etiam ac massa
	sed turpis tempor luctus. Curabitur sed nibh eu elit
	mollis congue. Praesent ipsum diam, consectetur vitae
	ornare a, aliquam a nunc. In id magna pellentesque
	tellus posuere adipiscing. Sed non mi metus, at lacinia
	augue. Sed magna nisi, ornare in mollis in, mollis
	sed nunc. Etiam at justo in leo congue mollis.
	Nullam in neque eget metus hendrerit scelerisque
	eu non enim. Ut malesuada lacus eu nulla bibendum
	id euismod urna sodales. ";

	$compressed = gzcompress($string);
	//echo $compressed;
	$original = gzuncompress($compressed);
	echo $original;
