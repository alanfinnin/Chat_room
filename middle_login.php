<?php 
	/*acts as a boundry or check before logging in, takes the username 
	and password, checks it. Then creates a session with the username 
	and status tag(to know if the user is logged in)*/	
	include "info_grabber.php";
	
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$counter = 0;
	foreach($usernames as $value){
			$password_to_check = $passwords[$counter];
			if(strcmp(($username),($value)) == 0){
				$check = 1;
				if(password_verify(trim($password), trim($password_to_check)) == false) {
							$check = 0;
							}
				break;
			}
			$counter++;
	}
	$colour = $colours[$counter];
	if($check == 0){
		session_unset(); 
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/");
		ob_end_flush();
		die();
	}
	$_SESSION['status'] = "Active";
	$_SESSION['username'] = $username;
	$_SESSION['colour'] = $colour;
	header("Location: http://www.skynet.ie/~alanfinnin/login/login.php");
?>
