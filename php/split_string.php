<!-- Takes a string with spaces and splits it into 2 at the most central space found.-->
<?php 
split_word_string_in_half();
?>
<?php
function split_word_string_in_half(){
	// counts all characters and finds a rounded down middle number then finds the last occurrence of a space in the first half of the string. 
	$string1 = '';
	$string2 = '';
	$text = get_the_title();
	$length = floor(strlen($text));

	// If the text is short just find the first space as it will not work if the second word is not long enough.
	if ($length <= 15){
		$middle = stripos($text, ' ') + 1;
	} else {
		$middle = strripos(substr($text, 0, floor(strlen($text) / 2)), ' ') + 1;	
	}
	if ($middle >= 2){
		$string1 = substr($text, 0, $middle); 
		$string2 = substr($text, $middle); 
	} else {
		$string1 = $text; 
	}

	echo '<div class="panel_header">';
		echo '<span>' . $string1 . '</span>';
		echo $string2 ? '<span>' . $string2 . '</span>' : '';
	echo '</div>';
	}
?>