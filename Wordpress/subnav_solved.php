http://helperclass.blogspot.co.uk/2011/11/creating-separate-sub-menu-in-wordpress.html
<?php 
 
 class SplitMenu_Walker_Nav_Menu extends Walker_Nav_Menu {
 var $startMenu = false;
  

 function start_lvl(&$output, $depth = 0, $args = Array() ) {
   
 }
 
 function end_lvl(&$output, $depth = 0, $args = Array()) {
  $this->startMenu = false;
 }
  
 function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
  if(($args->has_children && $item->current) || $item->current_item_parent)
   $this->startMenu = true;
   
  if($this->startMenu && $depth > 0)
    parent::start_el($output, $item, $depth, $args);
 }
 
 function end_el(&$output, $item, $depth = 0, $args = Array()) {
  if( $this->startMenu )
    parent::end_el($output, $item, $depth);
 }
  
 function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}