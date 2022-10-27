						<li id="categories">
<h2><?php _e( 'Categories:' ); ?></h2>
<form id="category-select" class="category-select" action="/format/news/" method="get">
<!-- $page_id is the current page id -->
    <?php wp_dropdown_categories( 'show_count=1&hierarchical=1&name=category_select' ); ?>
    <input type="submit" name="submit" value="view" />
</form>
</li>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cat = ( isset( $_GET['category_select'] ) ) ? $_GET['category_select'] : 1;
$args = array (
    'cat'            => $cat,
    'posts_per_page' => 10,
    'paged'          => $paged
);
echo $cat;
$query = new WP_Query( $args );
?>