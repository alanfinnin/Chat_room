<?php 	
include "info_grabber.php";
	session_start();
	$username = $_SESSION['username'];
	/*checks if the user is logged in*/
	if($_SESSION['status'] != "Active") { 
		header("Location: index.html");
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
	
	<head>
		<title>Chat Page</title>
	</head>
	<body>
		<h1 class = "main_text">Welcome <?php echo($username); ?></h1>
		<!--pulling messages-->
		<?php 
			include "passive_pull.php";
		?>
			<!--sending a message-->
			<form class = "secondary_text" action="chat_logger.php" method="post">
					<input id = "chat_input_id" type="text" name="chat_input" value="">
					<input id = "chat_sender_id" type="hidden" name="chat_sender" value= <?php echo($username); ?>>
				<br><br>
				<input class = "submit_button" type="submit" value="Send">
			</form>
			
			<!--refreshing the page-->
			<form class = "secondary_text" action="chat_pull.php" method="post">
				<input class = "submit_button" type="submit" value="Refresh">
			</form>
			
			<!--logout the user-->
			<form class = "secondary_text" action="logout.php" method="post">
				<input class = "submit_button" type="submit" value="Logout">
			</form>
				
	</body>
</html>
