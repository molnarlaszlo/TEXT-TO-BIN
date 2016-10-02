<?php

$chars = array();
$_chars = file_get_contents("charCoding");
$_chars = explode("\n", $_chars);

foreach($_chars as $char)
	$chars[ sizeof($chars) ] = explode(" ", $char);
	
function compile($input) {
	$input = str_split($input, 1);
	$output = "";
	foreach($input as $char)
		$output .= findBin($char);
	
	if(strlen($output) == (sizeof($input)*6))
		return $output;
	else
		return null;
}
function revCompile($input) {
	$input = str_split($input, 6);
	$output = "";
	foreach($input as $char)
		$output .= findChar($char);
	
	if(strlen($output) == (sizeof($input)))
		return $output;
	else
		return null;
}
function findBin($char) {
	global $chars;
	
	for($x = 0; $x < sizeof($chars); $x++)
		if($chars[$x][1] == $char)
			return $chars[$x][0];
	
	return "111111";
}
function findChar($char) {
	global $chars;
	
	for($x = 0; $x < sizeof($chars); $x++)
		if($chars[$x][0] == $char)
			return $chars[$x][1];
	
	return "?";
}

?>