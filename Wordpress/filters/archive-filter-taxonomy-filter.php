<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bankes
 */

get_header(); ?>

<section id="stories">
    

    <?php
    if ( have_posts() ) : ?>
        <div class="row">
			<header class="page-header">
                <div class="container stories">
				    <h1 class="page-title">Stories</h1>
                        <div id="pagin">
                            <ul class="results">
                                <li>Showing </li>
                                    <?php  
                                    echo '<li>' . (1+get_query_var('posts_per_page')*(get_query_var('paged')?get_query_var('paged')-1:0)) . '</li>-<li>' . ($wp_query->post_count+get_query_var('posts_per_page')*(get_query_var('paged')?get_query_var('paged')-1:0)) . '</li> of <li>'. $wp_query->found_posts . '</li>';
 ?>
                                <li>for</li>
                                <li>&ldquo;<?php single_cat_title (); ?>&rdquo;</li>
				<li>&nbsp;&nbsp;&nbsp;</li>
				<li><?php stories_filter(); ?></li>
                            </ul>
			
                        </div>
                    
                </div>
			</header><!-- .page-header -->
        </div>
    <div class="container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'stories' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

    </div>
</section>

<?php
get_footer();