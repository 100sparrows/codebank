<?php
	add_action('init', 'all_custom_post_types');
	
	function all_custom_post_types() {
 
		$types = array(

			// Location
 			array(  'the_type' => 'news',
				    'single'   => 'Events',
					'plural'   => 'What\'s On',
				    'icon'     => 'dashicons-calendar',
 					'taxonomies' => '',),

			// Landscapes
 			array(  'the_type' => 'landscapes',
				    'single'   => 'Landscape',
					'plural'   => 'Landscapes',
				    'icon'     => 'dashicons-location-alt',
 					'taxonomies' => '',)
 			// 'taxonomies' => 'category', 'post_tag',	 			

 
		);

foreach ($types as $type) {
 
  		  $the_type 	= $type['the_type'];
		  $single   	= $type['single'];
		  $plural   	= $type['plural'];
		  $taxonomies   = $type['taxonomies'];
		  // $archive  = $type['has_archive'];
		  $icon     = $type['icon'];
 
  		$labels = array(
		    'name' => _x($plural, 'post type general name'),
		    'singular_name' => _x($single, 'post type singular name'),
	    	'all_items' => _x($plural, 'post type singular name'),		    
		    'add_new' => _x('Add New', $single),
		    'add_new_item' => __('Add New '. $single),
		    'edit_item' => __('Edit '.$single),
		    'new_item' => __('New '.$single),
		    'view_item' => __('View '.$single),
		    'search_items' => __('Search '.$plural),
		    'not_found' =>  __('No '.$plural.' found'),
		    'not_found_in_trash' => __('No '.$plural.' found in Trash'),
		    'parent_item_colon' => ''
		  );
 
		  $args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
			'exclude_from_search' => false,		    
		    'show_ui' => true,
		    'query_var' => true,
		    'rewrite' => true,    
		    'capability_type' => 'post',
		    'hierarchical' => false,
		    'menu_position' => 5,
		    'has_archive' => true,
		    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'sticky'),
		     'taxonomies' => array($taxonomies)
		  );

		  // if(isset($archive)) $args['has_archive'] = $archive;
		  if(isset($archive)) $args['menu_icon'] = $icon;		  
 
		  register_post_type($the_type, $args);
 
  	 }
 
}




add_action('init', 'all_custom_cat_types');

// Custom Categories	

function all_custom_cat_types() {
 
		$types = array(

			// Typr of news
 			array(  'the_post_type'	=> 'news',
 					'the_cat' => 'news_cat',
				    'single'   => 'Event type',
					'plural'   => 'Event types',
				    'icon'     => 'dashicons-calendar'),
			// Location
 			array(  'the_post_type'	=> 'news',
 					'the_cat' => 'location',
				    'single'   => 'Location',
					'plural'   => 'Locations',
				    'icon'     => 'dashicons-calendar'), 					

 
		);

foreach ($types as $type) {
 		  $post_type = $type['the_post_type'];
  		  $taxonomy = $type['the_cat'];
		  $single   = $type['single'];
		  $plural   = $type['plural'];
		  // $archive  = $type['has_archive'];
		  $icon     = $type['icon'];
 

  			$labels = array(
    			'name' => __( $plural, 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( $single, 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search ' . $plural, 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All ' . $plural, 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent' . $single, 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent ' . $single . ':', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit ' . $single, 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update ' . $single, 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New '  . $single, 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New ' . $single .' Name', 'jointswp' ) /* name title for taxonomy */
    		);



		  $args = array(
		    'labels' => $labels,
		    'hierarchical' => true,
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		//'rewrite' => array( 'slug' => 'custom-slug' ),
		  );

		  // if(isset($archive)) $args['has_archive'] = $archive;
		  if(isset($archive)) $args['menu_icon'] = $icon;		  
 
		  register_taxonomy($taxonomy, $post_type, $args);
 
  	 }
 
}

// Tags	
add_action('init', 'all_custom_tag_types');

function all_custom_tag_types() {
 
		$types = array(

			// Typr of news
 			array(  'the_post_type'	=> 'news',
 					'the_cat' => 'news_tags',
				    'single'   => 'Event tags',
					'plural'   => 'Event tags',
				    'icon'     => 'dashicons-calendar'),
			

 
		);

foreach ($types as $type) {
 		  $post_type = $type['the_post_type'];
  		  $taxonomy = $type['the_cat'];
		  $single   = $type['single'];
		  $plural   = $type['plural'];
		  // $archive  = $type['has_archive'];
		  $icon     = $type['icon'];
 

  			$labels = array(
    			'name' => __( $plural, 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( $single, 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search ' . $plural, 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All ' . $plural, 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent' . $single, 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent ' . $single . ':', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit ' . $single, 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update ' . $single, 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New '  . $single, 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New ' . $single .' Name', 'jointswp' ) /* name title for taxonomy */
    		);



		  $args = array(
		    'labels' => $labels,
 			'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
		  );

		  // if(isset($archive)) $args['has_archive'] = $archive;
		  if(isset($archive)) $args['menu_icon'] = $icon;		  
 
		  register_taxonomy($taxonomy, $post_type, $args);
 
  	 }
 
}