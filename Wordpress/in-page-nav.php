<?php 	
        /* Get an array of Ancestors and Parents if they exist */
	$parents = get_post_ancestors( $post->ID );
        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	/* Get the parent and set the $class with the page slug (post_name) */
     $parent = get_post( $id );
	// $class = $parent->post_name;

// $currentMenu = get_the_title( $post->post_parent );

$subMenu = get_the_title( $post->post_parent );
$memberSubMenu =  $post->post_parent;
// $topParent = get_the_title( $currentMenu->post_parent );
			//if ($currentMenu !== 'Members area'){ 
?>
	<div class="sectionNav medium-3 float-right show-for-medium">
	<h3><a id="show-more">In this section  &nbsp;<i class="fa fa-caret-down" aria-hidden="true" ></i></a><a id="show-less">In this section &nbsp;<i class="fa fa-caret-up" aria-hidden="true"></i></a></h3>
	<div class="sectionNvContainer">

	<?php
						// echo 'parent' . $parent->ID;
						// echo 'subMenu' . $subMenu->ID;
		
					// if (the_field('members_only')){
					if ($parent->ID == '296'){
						if ( $post->post_parent == '296' ){
							// echo $subMenu;
							$menu = 'Members area';
							$args = array(
							    'menu'    		=> 'Members area',
							    // 'submenu' 		=> $subMenu,						    
							    'menu_class' 	=> 'inpage_nav',
							    'walker'		=> new SOH_Member_Nav_Walker(),
							    'items_wrap'    => '<ul class="inpage_nav">%3$s</ul>',
							);

							wp_nav_menu( $args );
						} else {
							//echo $post->post_parent ;
							echo '<ul class="inpage_nav">';
							wp_list_pages( array( 'child_of' =>  $memberSubMenu, 'title_li' => '', 'depth' => '1' ) ); 
							echo '</ul>';
							//echo '<a id="show-less" class="button">Show less</a><a id="show-more" class="button">Show all</a>';
						}


						
					}else{
						$menu = 'Main navigation';
						$args = array(
						    'menu'    		=> $menu,
						    'submenu' 		=> $subMenu,						    
						    'menu_class' 	=> 'inpage_nav',
						    'walker'		=> new SOH_Member_Nav_Walker(),
						    'items_wrap'    => '<ul class="inpage_nav">%3$s</ul>',
						);

						wp_nav_menu( $args );
					
					}

					// $args = array(
					//     // 'menu'    => 'Menu Name',
					//     // 'submenu' => $currentMenu,
					//     'menu'    => $menu,
					//     'submenu' => $currentMenu,						    
					//     'menu_class' => 'inpage_nav',
					//     'items_wrap'     => '<ul class="inpage_nav">%3$s</ul><a id="show-less" class="button">Show less</a><a id="show-more" class="button">Show all</a>'


					// );
					
		

					
		
			 ?>

	</div>
</div>
	<?php //} ?>