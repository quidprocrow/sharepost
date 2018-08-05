<?php
// People Array @TODO - Get from DB
// the blank bracket adds each person to the array in the order given
$people[] = "Sophia";
$people[] = "Steve";
$people[] = "John";
$people[] = "Kathy";
$people[] = "Evan";
$people[] = "Anthony";
$people[] = "Tom";
$people[] = "Rhonda";
$people[] = "Hal";
$people[] = "Ernie";
$people[] = "Johanna";
$people[] = "Farrah";
$people[] = "Linda";
$people[] = "Shawn";
$people[] = "Olivia";
$people[] = "Derek";
$people[] = "Amanda";
$people[] = "Rachel";
$people[] = "Katie";
$people[] = "Jillian";
$people[] = "Jose";
$people[] = "Malcom";
$people[] = "Greg";
$people[] = "Mary";
$people[] = "Brad";
$people[] = "Mike";

// Get Query String
// using the request superglobal
$q = $_REQUEST['g'];

$suggestion = "";

// Get Suggestions
if($q !== ""){
	$q = strtolower($q);
	$len = strlen($q);
	foreach($people as $person){
		// stistr finds the first occurance of a substring match
		if(stristr($q, substr($person, 0, $len))){
			if($suggestion === ""){
				// if no one has been found, make them a suggestion
				$suggestion = $person;
			} else {
				// otherwise, append a new suggested person
				$suggestion .= ", $person";
			}
		}
	}
}

// if suggestion is equal to nothing, then show no suggestion;
// otherwise, show them all the suggestions
echo $suggestion === "" ? "No Suggestion" : $suggestion;
