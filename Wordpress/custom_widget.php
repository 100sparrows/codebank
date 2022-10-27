<?php add_action( 'widgets_init', 'my_widget_init' );
 
function my_widget_init() {
    register_widget( 'SOH_widget' );
}
 
class soh_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'Contact details',
            'description' => 'Add contact details'
        );
 
        parent::__construct( 'SOH_widget', 'Contact Widget', $widget_details );
 
    }
 
    public function form( $instance ) {
    $title = '';
    if( !empty( $instance['title'] ) ) {
        $address = $instance['title'];
    }
    $address = '';
    if( !empty( $instance['address'] ) ) {
        $address = $instance['address'];
    }
    $telephone = '';
    if( !empty( $instance['telephone'] ) ) {
        $telephone = $instance['telephone'];
    }
    $fax = '';
    if( !empty( $instance['fax'] ) ) {
        $fax = $instance['fax'];
    }
    $email = '';
    if( !empty( $instance['email'] ) ) {
        $email = $instance['email'];
    }
 
    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_name( 'address' ); ?>"><?php _e( 'address:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" ><?php echo esc_attr( $address ); ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'telephone' ); ?>"><?php _e( 'Telephone:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'telephone' ); ?>" name="<?php echo $this->get_field_name( 'telephone' ); ?>" type="text" value="<?php echo esc_attr( $telephone ); ?>" />
    </p>
 
    <p>
        <label for="<?php echo $this->get_field_name( 'fax' ); ?>"><?php _e( 'Fax:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
    </p>
     <p>
        <label for="<?php echo $this->get_field_name( 'email' ); ?>"><?php _e( 'Email:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
    </p>
    <div class='mfc-text'>
         
    </div>
 
    <?php
 
    echo $args['after_widget'];
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {

        ?>
        <div class="small-12 medium-3 columns">
         
                <?php if( !empty( $instance['title'] ) ) {  ?>
                    <h5><?php echo $instance['title']; ?></h5>
                 <?php } ?>
              <?php if( !empty( $instance['address'] ) ) {  ?>
                      <p><?php echo $instance['address']; ?></p>
                 <?php } ?>
           
        </div>
        <div class="small-12 medium-3 columns">
            <ul class="contact">
    <?php if( !empty( $instance['telephone'] ) ) {  ?>
                <li class="telephone"><strong>Telephone</strong>: <?php echo $instance['telephone']; ?></li>
    <?php } ?>
    <?php if( !empty( $instance['fax'] ) ) {  ?>
                <li class="fax"><strong>Fax</strong>: <?php echo $instance['fax']; ?></li>
    <?php } ?>
    <?php if( !empty( $instance['email'] ) ) {  ?>
                <li class="email"><strong>Email</strong>: <?php echo $instance['email']; ?></li>
    <?php } ?>             
            </ul>
        </div>
        <?php 
        // Frontend display HTML
    }



 
}

