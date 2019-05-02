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
	if($check == 0){
		session_unset(); 
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/");
		ob_end_flush();
		die();
	}
	$_SESSION['status'] = "Active";
	$_SESSION['username'] = $username;
?>
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
	
	<head>
		<title>Login</title>
	</head>
	<body>
		<h1 class = "main_text">Welcome <?php echo($username) ?></h1>
		<h3 class = "secondary_text">You have successfully logged in<br>Click here to carry on to the home page</h3>
		<form class = "secondary_text" action="login.php" method="post">
				<input class = "submit_button" type="submit" value="Carry on">
		</form>
		
	</body>
</html>