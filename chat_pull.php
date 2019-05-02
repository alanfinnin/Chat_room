<?php
	/*simple check for logged in and username(potentially not needed*** look over)*/
	session_start();
	if($_SESSION['status'] != "Active") { 
		header("Location: index.html");
	}
	$username = $_SESSION['username'];
	if(is_null($username)){
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/");
		ob_end_flush();
		die();	
	}
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
		<title>Chat Page</title>
	</head>
	<body>
		<h1 class = "main_text"><?php echo($username); ?></h1>
		
		<?php 
			include "passive_pull.php";
		?>
		<form class = "secondary_text" action="chat_logger.php" method="post">
				<input id = "chat_input_id" type="text" name="chat_input" value="">
				<input id = "chat_sender_id" type="hidden" name="chat_sender" value= <?php echo($username); ?>>
			<br><br>
		<input class = "submit_button" type="submit" value="Send"><br>
		</form>
		
		<form class = "secondary_text" action="chat_pull.php" method="post">
			<input type="hidden" name="username" value = <?php echo $username;?>>
			<input class = "submit_button" type="submit" value="Refresh">
		</form>	
		
		<form class = "secondary_text" action="index.html" method="post">
			<input class = "submit_button" type="submit" value="Logout">
		</form>
	</body>
</html>