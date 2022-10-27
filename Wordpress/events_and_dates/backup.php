function first_dates($post){
	if ( have_rows('dates_and_locations',$post->ID) ) : 

			$rows = get_field('dates_and_locations',$post->ID ); // get all the rows
			$first_row = $rows[0]; // get the first row
			

		
		// if ( have_rows('dates',$post->ID) ) : 
			
			$dates_row = $first_row['dates']; // get the sub field value
			$count = count($dates_row);

			$first_dates	= $dates_row[0];
			$first_date 	= $first_dates['date'];
			$archive 		= archive_dates($first_date);
			

			// $first_date = date( 'd-m-Y', strtotime( str_replace( '/', '-', $first_dates['date'] ) ) );

			if( $archive ){
				return 'old date' . $count;
				

			} else {
				return $dates_row[0]['date'];
			}

			

		// endif;

	endif;
	

}
function archive_dates($date){
	$today = date( 'd-m-Y' ); //today
	$CompareDate = date( 'd-m-Y', strtotime( str_replace( '/', '-', $date ) ) );

	if( strtotime( $CompareDate ) < strtotime( $today ) ){
		return 'true';
	}
}
?>