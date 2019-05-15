<?php
	$to_check = "info/chat.txt";
	$counter = 0;
	$space_counter;
	if(file_exists($to_check)){
			$file_handle = fopen("info/chat.txt", "r");
			while (!feof($file_handle)) {
				$line = fgets($file_handle);
				echo $line;
				$counter++;
			}
		fclose($file_handle);
		}
	else{
			echo " does not exist.";
		}
	function insertAtPosition($string, $insert, $position) {
		return implode($insert, str_split($string, $position));
	}
?>
