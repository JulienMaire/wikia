<?php
/**
 * @author: Sean Colombo
 *
 * This script will serve up CSS that has been created generated by SASS.
 * The script is responsible for verifying the cryptographic signature,
 * for preventing deadlock from similar requests, for piping colors from the
 * query-string into the .scss files, and for using memcache to speed up responses.
 */

$errorStr = "";

// TODO: Read the values from the query-string

// Get the path & file that the user is actually looking for.
$inputFile = "";
if(isset($_GET['file'])){
	$inputFile = $_GET['file'];
	unset($_GET['file']);
}

// Build a string of parameters to pass into sass.
// TODO: EXPERIMENT TO FIGURE OUT HOW SASS WILL EXPECT TO GET THESE.
$sassParams = "";
foreach($_GET as $key => $value){
	//$sassParams .= ($sassParams == ""?"": "
}




// TODO: Pass the values from the query-string into the sass script (collect result in backticks)
// $sassResult = `sass $inputFile --style compact --custom color1="#00ff00"`;
// TODO: CREATE THE SASS FUNCTION WHICH READS THE PARAMS
/*
module Sass::Script::Functions
	def my_func_name()
	
		Sass::Script::String.new(options[:custom][:myCommandLineParamName])
	end
end
*/



// TODO: Print the generated CSS (with correct headers)

// TODO: Do a successful run of the code for Oasis.

// TODO: Add memcache deadlock-prevention.

// TODO: Add security-hash checking.

// If there was an error, print it out into the resulting CSS.
if($errorStr != ""){
	print "\n/* sassServer error: $errorStr */\n";
}
