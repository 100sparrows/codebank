 * Source: http://tareq.wedevs.com/2013/01/sticky-posts-in-custom-post-type-archives/
 <?php function wedevs_cpt_sticky_at_top( $posts ) {
												
    // apply the magic on post archive only
     if ( is_main_query() ) {
	 //if ( is_main_query($Related_query->is_post_page)  ) {
	//if( get_post_type() == 'projects' ) {

    		


        global $wp_query;

													
        $sticky_posts = get_the_tags('sticky');
        $num_posts = count( $posts );
        $sticky_offset = 0;

        // loop through the post array and find the sticky post
        for ($i = 0; $i < $num_posts; $i++) {

            // Put sticky posts at the top of the posts array
            if ( in_array( $posts[$i]->ID, $sticky_posts ) ) {
                $sticky_post = $posts[$i];

                // Remove sticky from current position
                array_splice( $posts, $i, 1 );

                // Move to front, after other stickies
                array_splice( $posts, $sticky_offset, 0, array($sticky_post) );
                $sticky_offset++;

                // Remove post from sticky posts array
                $offset = array_search($sticky_post->ID, $sticky_posts);
                unset( $sticky_posts[$offset] );
            }
        }

        // Fetch sticky posts that weren't in the query results
        if ( !empty( $sticky_posts) ) {

            $stickies = get_posts( array(
                'post__in' => $sticky_posts,
                'post_type' => $wp_query->query_vars['post_type'],
                'post_status' => 'publish',
                'nopaging' => true
            ) );

            foreach ( $stickies as $sticky_post ) {
                array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
                $sticky_offset++;
            }
        }

    }

    return $posts;
}

add_filter( 'the_posts', 'wedevs_cpt_sticky_at_top' );