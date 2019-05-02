<?php 
	/*simple check for logged in*/
	include "info_grabber.php";
	
	session_start();
	$message = $_POST["chat_input"];
	$sender = $_SESSION['username'];
	
	if($_SESSION['status'] != "Active") { 
		header("Location: index.html");
	}
	$username = $sender;
	if(is_null($sender)){
		ob_start();
		header("Location: http://www.skynet.ie/~alanfinnin/login/");
		ob_end_flush();
		die();	
	}
	/*if the message is "clear", the chat and file is cleared (should probably take out soon)*/
	else if(strcmp($message, "clear") == 0){
		file_put_contents("info/chat.txt", "");

		$fp = fopen('info/chat.txt', 'a');
		
		$to_save = "<b>(" . $_SESSION['username'] . " cleared the chat)</b>";
		fwrite($fp, "\n" . $to_save);
		fclose($fp);
	}
	/*if everything is okay, the message is stringed up and sent out to the file*/
	else if(strlen($message) !== 0){
		$cTime = date("d-m h:i");
		$to_save = "(" . $cTime . ") " . "<b>" . $_SESSION['username'] . "</b>: " . $message;
		
		$length = strlen($to_save);
		while($length > 70)
		{
			while($to_save[$length] !== " "){
				$length--;
			}
			$to_save = substr_replace($to_save, "<br>", $length, 0);
			$length -= 70;
		}
		$fp = fopen('info/chat.txt', 'a');
		fwrite($fp, "\n" . $to_save);
		fclose($fp);
	}
	$message = "";
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
		<h1 class = "main_text"><?php echo($username) ?></h1>
		<?php 
			include "passive_pull.php";
		?>
			<form class = "secondary_text" action="chat_logger.php" method="post">
					<input id = "chat_input_id" type="text" name="chat_input" value="">
					<input id = "chat_sender_id" type="hidden" name="chat_sender" value= <?php echo($username) ?>>
				<br><br>
			<input class = "submit_button" type="submit" value="Send">
			</form>
			<form class = "secondary_text" action="chat_pull.php" method="post">
				<input type="hidden" name="username" value = <?php echo $username; ?>>
				<input class = "submit_button" type="submit" value="Refresh">
			</form>
			<form class = "secondary_text" action="logout.php" method="post">
				<input class = "submit_button" type="submit" value="Logout">
			</form>
		</form>
	</body>
</html>