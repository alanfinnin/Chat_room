<?php
	$to_check = "info/chat.txt";
	$counter = 0;
	$space_counter;
	if(file_exists($to_check)){
			$file_handle = fopen("info/chat.txt", "r");
			while (!feof($file_handle)) {
				$line = fgets($file_handle);
				if($counter % 2 == 0){
					echo '<div class = "my_red"> ' . $line . "</div>";
				}
				else{
					echo '<div class = "my_blue"> ' . $line . "</div>";
				}
				echo "<br>";
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
	/*
		Worm thingy:	
		<iframe src="http://www.staggeringbeauty.com/" style="border: 1px inset #ddd" width="498" height="598"></iframe>
	*/
?>