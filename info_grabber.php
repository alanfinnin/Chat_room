<?php 
$to_check = "info/users.txt";

$count = 0;
if(file_exists($to_check)){
		$file_handle = fopen($to_check, "r");
		while (!feof($file_handle)) {
			$line = fgets($file_handle);
			$count++;
		}
		$usernames = array_fill(0, $count, null);
		$passwords = array_fill(0, $count, null);
		$colours = array_fill(0, $count, null);
		fclose($file_handle);
		
		$file_handle = fopen($to_check, "r");
		$count = 0;
		while (!feof($file_handle)) {
			$line = fgets($file_handle);
			
			$array = explode(",", $line);
			$user_info_array = array_values($array);

			$username = $user_info_array[0];
			$password = $user_info_array[1];
			$colour = $user_info_array[2];


			$usernames[$count] = $username;
			$passwords[$count] = $password;
			$colours[$count] = $colour;

			$count++;
		}
		
	fclose($file_handle);
	}
else{
	echo " does not exist.";
}
?>
