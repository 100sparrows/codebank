<!-- 
Template name:Delivery Options
-->

<?php
$brand_theme_template = epc_theme_check_for_brand_template('templates/tmpl-about.php');
if ( $brand_theme_template != false  ) {
	require $brand_theme_template;
	return;
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<!-- <div class="row"> -->

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
				}
				?>

				<?php
				echo '<div id="accordion" class="delivery-options-list row">';

				$delivery_zones = WC_Shipping_Zones::get_zones();

				foreach ((array) $delivery_zones as $key => $the_zone ) {

					echo '<div class="col-sm-12">';
					$shipping_zone = $the_zone['zone_name'];
					$shipping_zone_id = $the_zone['zone_id'];
					// echo $shipping_zone . '</br>';
					echo '</div>';

					echo '<span class="anchor" id="anchor' . $shipping_zone_id . '"></span>';
			     echo '<div class="card single_option w-100">
			        <div class="card-header" id="heading' . $shipping_zone_id . '">
			          <h3>';
			             echo '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse' . $shipping_zone_id . '" aria-expanded="" aria-controls="collapse' . $shipping_zone_id . '">';
			              echo $shipping_zone;
						echo '</button>';
			          echo '</h3>';
					echo '</div>';	

			          echo '<div id="collapse' . $shipping_zone_id . '" class="collapse" aria-labelledby="heading' . $shipping_zone_id . '" data-parent="#accordion">';
			          echo '<div class="card-body">';
			          echo '<table class="table">
								<thead>
									<tr>
										<th scope="col">Delivery type</th>
											<th scope="col">Rate</th>
										</tr>
							    </thead>
									    <tbody>';


   					$default_zone = new WC_Shipping_Zone($the_zone['zone_id']);
				  	$default_zone_shipping_methods = $default_zone->get_shipping_methods();
						foreach ($default_zone_shipping_methods  as $key => $value) {

							$shipping_id 			= $value->id;
							$shipping_enabled 		= $value->enabled;

							if ($shipping_enabled != 'no'){

								// Do something different for table rates
								if ($shipping_id === 'betrs_shipping'){

				                  global $wpdb;
				                  $settings = $value->instance_settings;
				                  $query = "SELECT * FROM " .  $wpdb->prefix . "options WHERE option_name = 'betrs_shipping_options-" . $value->instance_id . "'";
				                  $result = $wpdb->get_results($query);
				                  $option = unserialize($result[0]->option_value);

				                  foreach ($option as $key => $option_value) {
				                    if(is_array($option_value)){

				                        foreach ($option_value as $key => $o_value) {
				                        	if($o_value['disable_op'] != 'on' && $o_value['hide_ops'] != 'on'){
					                        	$rows = $o_value['rows'];
					                        	foreach ($rows as $key => $row_value) {

					                        		$description = $row_value['description'] ? '<br/><em>(' . $row_value['description'] . ')</em>' : '';
					                        		$costs 	= $row_value['costs'];
					                        		$costs_int = (count($costs));
					                        		$min 	= ($costs_int > 1) ? 'min' : '';
					                        		$cost_value = array();
					                        		$costs_list = array();

													echo '<tr>';
					                        		echo '<td>' . $o_value['title'] . $description . '</td><td>';

					                        		foreach ($costs as $key => $value) {
					                        			if($value['cost_type'] == '%'){
					                        				$costs_list[] .= $value['cost_value'] . '%';
					                        			} elseif($value['cost_type'] == 'x'){
					                        				$costs_list[] .= $value['cost_value'] . ' x ' . $value['cost_op_extra'];
					                        			} else {
					                        				$cost_value[] = $value['cost_value'];
					                        			}
					                        		}

					                        		$total_costs_list = array();
					                        		if (count($cost_value) > 1){
					                        			$costs_list[] = 'min £' . min($cost_value);
					                        		} else {
					                        			$costs_list[] = '£' . $cost_value[0];
					                        		}
					                        		foreach ($costs_list as $key => $value) {
					                        			echo $value . '</br>';
					                        		}

													echo '</td></tr>';
					                        		unset($cost_value);
					                        		unset($costs_list);
					                        		unset($min_value);
					                        	}
						                      }
						                  }
					                    }

					                  }
									
									// Display conditions for free shipping
	                				} elseif ($shipping_id === 'free_shipping'){

	                					if ( is_array($value->instance_settings) ){
	                						$options = $value->requires;
				                  			$requirement		= $value->instance_settings['requires'];
				                  			$requires_text 		= $value->instance_form_fields['requires']['options'][$options];
				                  			$shipping_label 	= $value->title;
				                  			$cost				= $value->min_amount;
// echo '<pre>';
// var_dump($value->instance_settings);
// echo '</pre>';
				                  			if($requirement == 'min_amount'){
				                  				// $cost				= $value->min_amount;
				                  				$shipping_cost		= $requires_text . ' of £' . $cost;
				                  			} elseif ($requirement == 'both' || $requirement == 'either' && $value->min_amount > 0) {
				                  				// $cost				= $value->min_amount;
				                  				$shipping_cost		= $requires_text . '</br><em>Minimum order amount is £' . $cost . '</em></br>';
				                  			} elseif (!$requirement)  {
				                  				$shipping_cost 		= 'Free';
				                  			} else {
	                							$shipping_cost		= $requires_text;
				                  			}
	                					}
	                						echo '  <tr>
									        <td>' . $shipping_label . '</td>
									        <td>' . $shipping_cost . '</td>
									    </tr>';	
					              } else {

					              		$shipping_label 	= $value->title;
										$shipping_cost 		= array_key_exists("cost", $value) ? $value->cost : '0';
							              	if ($shipping_cost === '0') {
												$shipping_cost = 'Free';
											} else {
												$shipping_cost = '£' . $shipping_cost;
											}
									echo '  <tr>
									        <td>' . $shipping_label . '</td>
									        <td>' . $shipping_cost . '</td>
									    </tr>';
					              }

						}
					}
						echo '</tbody>
						</table>';
					echo '</div>';	
			        echo '</div>';
					echo '</div>';

				}

				?>


			</main><!-- #main -->


		<!--</div> .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();