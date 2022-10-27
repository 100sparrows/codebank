 <?php 

					$location = get_field('address_map');

					if( !empty($location) ):
					?>
					<h3>Address</h3>
					<p><?php 	$address = explode( ', ', $location['address'] );
							
// Show all address items on a new line
						foreach($address as $i =>$key) {
						$i >0;
						    echo $key .'</br>';

						}

						?>
					</p>
					
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				<?php endif; ?>	

					