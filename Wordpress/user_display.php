	<?php
					function filter_users_have_posted( $user_query ) {
					   $user_query->query_from = str_replace( 'LEFT OUTER', 'INNER', $user_query->query_from );
					   remove_action( current_filter(), __FUNCTION__ );
					}
					add_action( 'pre_user_query', 'filter_users_have_posted' );

					$bloposters = get_users( 'orderby=post_count&order=desc' );


							foreach ( $bloposters as $user ) { ?>

							<li>
								<a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>"><?php echo get_avatar( $user->ID ); ?></a><div class="author_name screen-reader-text">Author name<a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>"><?php echo $user->display_name ?></a></div>
							</li>
							<?php } ?>