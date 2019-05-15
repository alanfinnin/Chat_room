<?php 
include "info_grabber.php";
	$username = trim($_POST["username"]);
	$colour = trim($_POST["colour"]);
	//$password = $_POST["password"];
	$password = trim(password_hash($_POST["password"], PASSWORD_DEFAULT));
	
	$pos = strpos($username, ",");
    if ($pos == true) {
        ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/create_account.html");
		ob_end_flush();
		die();	
    }
	if(strlen(strip_tags($username)) !== strlen($username)){
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/create_account.html");
		ob_end_flush();
		die();	
	}
	/*loops through the accounts looking for a match,
	when one is found, $check is set to 1*/
	foreach($usernames as $value){
			if(strcmp(trim($username),trim($value)) == 0){
				$check = 1;
				break;
			}
		}
	/*ends the session if username not found*/
	if($check == 1){
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/create_account.html");
		ob_end_flush();
		die();	
	}
	else if(is_null($username)){
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/create_account.html");
		ob_end_flush();
		die();	
	}
	/*checks if empty*/
	else if (strpos(trim($username), ' ') !== false) {
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/create_account.html");
		ob_end_flush();
		die();	
	}
	/*final checks and then saves*/
	else if(strlen($username) !== 0 || strlen($password) !== 0){
		$to_save = $username . "," . $password . "," . $colour;
		
		
		$fp = fopen('info/users.txt', 'a');
		fwrite($fp, "\n" . $to_save);
		fclose($fp);
	}
?>
<!DOCTYPE html>
<html>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
	
	<link href="addons/font-awesome/css/fontawesome-5.2.0/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<link href="css/@media.css" rel="stylesheet" type="text/css">
	<link rel="icon" 
	  type="image/jpg" 
	  href="images/icon.jpg" />
	<head>
		<title>Login</title>
	</head>
	
	<body>
		<div class = "secondary_text">
			<p>Your account has been successfully created<br>Return to the login page to sign in</p>
			<form class = "secondary_text" action="index.html" method="post">
				<input class = "submit_button" type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
