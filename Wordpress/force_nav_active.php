/* 
 * Customize Menu Item Classes
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 *
 * @param array $classes, current menu classes
 * @param object $item, current menu item
 * @param object $args, menu arguments
 * @return array $classes
 */
function be_menu_item_classes( $classes, $item, $args ) {

    // if( 'header' !== $args->theme_location )
    //     return $classes;

    if( ( is_singular( 'post' ) || is_category() || is_tag() ) && 'to read' == $item->title )
        $classes[] = 'current-menu-item';
        
    if( ( is_singular( 'code' ) || is_tax( 'code-tag' ) ) && 'Code' == $item->title )
        $classes[] = 'current-menu-item';
        
    if( is_singular( 'projects' ) && 'Case Studies' == $item->title )
        $classes[] = 'current-menu-item';
        
    return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'be_menu_item_classes', 10, 3 );