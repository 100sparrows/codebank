function stories_filter() {
    $tax = 'story_types';
    $terms = get_terms( $tax );
    $count = count( $terms );
    $queried_object = get_queried_object($tax);
    $term_id = $queried_object->term_id;


    if ( $count > 0 ): ?>
        <div class="story-types">
            <a href="<?php echo site_url(); ?>/stories/" class="tax-filter"><div class="btn filter
             <?php  if ( $term_id == '') {
                    echo 'active';
                }
            ?>
               ">All</div></a>
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $tax );
            echo '<a href="' . $term_link . '" class="tax-filter" title="' . $term->slug . '"><div class="btn filter ';
            if( $term_id == $term->term_id) {
                    echo 'active';
                }

            echo '">' . $term->name . '</div></a> ';
        }   ?>
        </div>
    <?php endif;
}
function events_filter() {
    $cat = 'categories';
    $terms = get_categories( );
    $count = count( $terms );
    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;


    if ( $count > 0 ): ?>
        <div class="event-types">

            <a href="<?php echo site_url(); ?>/category/event/" class="tax-filter"><div class="btn filter
             <?php  if ( $term_id == 39) {
                    echo 'active';
                }
            ?>
               ">All</div></a>
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_category_link( $term );

        	if (cat_is_ancestor_of( 39, $term )){
                // $archiveTitle = single_cat_title();


            	echo '<a href="' . $term_link . '" class="tax-filter" title="' . $term->slug . '"><div class="btn filter ';
                 if ( $term_id == $term->term_id) {
                    echo 'active';
                }
                echo '">' . $term->name . '</div></a> ';
            	}

        }   ?>
        </div>
    <?php endif;
}

// Not sure if this is relevant
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');

    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {

            foreach ($taxonomy->object_type as $object_type) {

                if ($object_type == $post_type->rewrite['slug']) {

                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));

                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');