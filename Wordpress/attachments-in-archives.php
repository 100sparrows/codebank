  <?php   // Enable attachments to be treated as post-types on archive pages

    function attachment_tax_query() {

        global $wp_query;

        if ( is_tax('resources_cat') ) {
            
            $wp_query->query_vars['post_type'] =  array( 'attachment' );
            $wp_query->query_vars['post_status'] =  array( null );

            return $wp_query;
        }

    }
    
    add_action('parse_query', 'attachment_tax_query');