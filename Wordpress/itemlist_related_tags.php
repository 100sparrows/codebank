<?php 			 
												$tags = wp_get_post_tags($post->ID);

												if ($tags) {
												$tag_ids = array();

												foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
												$args=array(
												'tag__in' => $tag_ids,
												'post__not_in' => array($post->ID),
												'posts_per_page'=>4, // Number of related posts that will be shown.
												
												);
										}
														?>
													<?php if (isset($tags) && ! empty($tags)){ ?>

														<div  class="rpwwt-widget new">
															<h2>Related items of interest tags</h2>
																<ul>
															
																		<?php 


																		$the_query = new WP_Query($args); ?>

																	
																		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

																		<li>
																			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( array(150,150) ); ?><span><?php the_title(); ?></span></a>
																			<div style="display:none;"><?php echo '<pre>'; print_r($tag_ids); echo '</pre>'; ?></div>
																		
																		</li>
																		

																		<?php 
																		endwhile;
																		wp_reset_postdata();
																		?>
																</ul>
											
														</div>
										<?php } else { ?>

											<div  class="rpwwt-widget new">
															<h2>Recent Posts</h2>
																<ul>
															
																		<?php 
																	

																		$args = array(
																		    'posts_per_page' => 4,
																		    'order' => 'DESC',
																		    'orderby' => 'post_date',
																		  
																			'post__not_in' => array($post->ID),
																		);

																		$the_query = new WP_Query($args); ?>

																	
																		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

																		<li>
																			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( array(150,150) ); ?><span><?php the_title(); ?></span></a>
																		
																		</li>
																		

																		<?php 
																		endwhile;
																		wp_reset_postdata();
																		?>
																</ul>
											
														</div>
										<?php } ?>