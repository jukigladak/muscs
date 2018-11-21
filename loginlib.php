<?php
/**
Package		: MUSCS
Lib.Info	: Login processor and input validation
		: Password encryption using SHA-1
Link		: http://www.wisebearproject.com
Author		: Juki Gladak <jukigladak@gmail.com>
Copyright	: Copyright (c) 2018 Juki Gladak <jukigladak@gmail.com>
license		: GNU General Public License 3
*/

//For simulation purpose
$username = "jukkdjflkejlsjak<b>\";,''and OR = 1 ";
$password = "inihanyacoba";

# Input Sanitation Function
function checkinput($input)
{
	//Validate for empty input
	if (!isset($input))
	{
		$error = "Empty input detected";
		//Redirect to login page
		header('Location: login.php?error=$error'); 
	}
	
	//Sanitize input from HTML and PHP tags
	$input = strip_tags(trim($input));
	
	//Sanitize input from forbidden chars
	//Please add or remove harmful characters
	$forbidchars = array(";",":",",","\"","'",")","(","{","}","/","="," ");
	$length = count($forbidchars);
	for($i=0; $i<$length; $i++)
	{
		$input = str_replace($forbidchars[$i],"",$input);
	}
	
	//Get input length according to maximum length
	//Please change desired length for valid input
	$maxlength = 25;
	if (strlen($input)> $maxlength)
	{
		//Redirect to login page
		$error = "Input length violation";
		//Redirect to login page
		header('Location: login.php?error=$error');
	}
	
	return $input;
}

# Send Input Sanitation Function
$username = checkinput($username);
echo $username."<br>";

$password = checkinput($password);
echo $password."<br>";

//Encrypt password using SHA-1
$shapassword = sha1($password);
echo $shapassword."<br>";
?>
