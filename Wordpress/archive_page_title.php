<?php add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = '<span class="cat">Workstream:</span>' . single_cat_title( '', false ) ;

        } elseif ( is_tax() ) {

            $title = single_term_title( '', false );

        } elseif ( is_tag() ) {

            $title = '<span class="tag">Tag:</span>' . single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

// Archive page check for query variable

        <?php $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
              $formatName = $term->name;
              $formatSlug = $term->slug;
        
              ?>