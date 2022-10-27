 function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		// Each array child is a format with it's own settings

		// array(  
		// 	'title' => 'Callout',  
		// 	'block' => 'div',  
		// 	'classes' => 'callout',
		// 	'wrapper' => false,
		// ),
		array(  
			'title' => 'Story right block',  
			'block' => 'p',  
			'classes' => 'rightBlock',
			'wrapper' => false,
		),
		array(  
			'title' => 'Story left block',  
			'block' => 'p',  
			'classes' => 'leftBlock',
			'wrapper' => false,
		),
			array(  
			'title' => 'Story scrolling from left',  
			'block' => 'p',  
			'classes' => 'scroll',
			'wrapper' => false,
			
		),  
		array(  
			'title' => 'Story scrolling from right',  
			'block' => 'p',  
			'classes' => 'scroll rightBlock',
			'wrapper' => false,
		),
		array(  
			'title' => 'Story middle block',  
			'block' => 'p',  
			'classes' => 'middleBlock',
			'wrapper' => false,
		),
		// 		array(  
		// 	'title' => 'Story pale content',  
		// 	'block' => 'div',  
		// 	'classes' => 'pale',
		// 	'wrapper' => false,
		// ),




	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 