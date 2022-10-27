<?php 

function showDates(){
	    if( have_rows('dates_and_locations') ):
	    		echo '<div class="dates_list">';
	    		echo '<h3>Dates and locations</h3>';
	    
			 	// loop through the rows of data
			    while ( have_rows('dates_and_locations') ) : the_row();
			    $location      = get_sub_field('location');
			    $location_link = get_sub_field('location_link');
			   
			     
				
			     if ($location_link){ 
			     	echo '<h5><a href="' . $location_link . '">' . $location->name . '</a></h5>';
			     } else {

			     	echo '<h5>' . $location->name . '</h5>';
			     }

				     if( have_rows('dates') ):
				     			echo '<ul>';

			 			while ( have_rows('dates') ) : the_row();


			 				$theStartDate	=	'';
			 				$theStartTime	= '';
			 				$theEndDate	=	'';
			 				$theEndTime	=	'';

			 				if (get_sub_field('date', false, false)){
				 				$startdate    = get_sub_field('date', false, false);
					    		$startdate 	 = new DateTime($startdate);
					    		$theStartDate = $startdate->format('l, jS F');
					    	}
				    		if (get_sub_field('start_time', false, false)){
					    		$time    = get_sub_field('start_time', false, false);
					    		$time 	 = new DateTime($time);
					    		$theStartTime = $time->format('g:ia');
					    	}

				    		if (get_sub_field('end_date', false, false)){
				 				$enddate    = get_sub_field('end_date', false, false);
					    		$enddate 	 = new DateTime($enddate);
					    		$theEndDate = $enddate->format('l, jS F');
					    	}

				    		if (get_sub_field('end_time', false, false)){
					    		$endTime    = get_sub_field('end_time', false, false);
					    		$endTime 	 = new DateTime($endTime);
					    		$theEndTime = $endTime->format('g:ia');
					    	}

			 				$darray = array($theStartDate,$theStartTime, $theEndDate, $theEndTime);

			 				$printDates = '';
			 				$printTimes = '';

			 				// Dates
			 				if ((isset($darray[0]) && !empty($darray[0]) ) && (isset($darray[2]) && !empty($darray[2]) )){
			 					if ( $darray[0] == $darray[2] )  {
			 						$printDates = $theStartDate;
			 					} else{
			 						$printDates = $theStartDate . ' - ' . $theEndDate;
			 					}
			 					
							 } else { 
							 	$printDates = isset($darray[0]) 
							 				  ? $theStartDate 
							 				  : $theEndDate;
			 				}


							// Times
			 				if ( (isset($darray[1]) && !empty($darray[1]) ) && (isset($darray[3]) && !empty($darray[3]) )){
			 					if ( $darray[1] == $darray[3] ) {
			 						$printTimes = ' @' . $theStartTime;
			 					} else {
			 						$printTimes = ', ' . $theStartTime . ' - ' . $theEndTime;
			 					}
			 					
							} elseif ( isset($darray[1]) && !empty($darray[1]) ){
								$printTimes = ' @' . $theStartTime;
							} 


							if ($printDates || $printTimes){ 
								echo '<li><p>';
								if ($printDates){
									echo $printDates;
								}
								if ($printTimes){
									echo $printTimes;
								}
								echo '</p></li>';
							}

			 				
				     	endwhile;
				     	 echo '</ul>';
				     endif;
			    

			    endwhile;
			   
			    echo '</div>';
			else :

			    // no rows found
			 

			endif;

		}	

// Loops through the dates fields to find the next valid date. Valid dates are in the future. Invalid dates are in the past. 

function first_dates($post){
	if ( have_rows('dates_and_locations',$post->ID) ) : 

			$rows = get_field('dates_and_locations',$post->ID ); // get all the rows
			$count = count($rows);

			if ($count > 0):
				
				foreach ($rows as $row) {

						$dates_row 	= $row['dates'];
						foreach ($dates_row as $date_row){
							$start_date = $date_row['date'];
							$archive 		= archive_dates($start_date);
								if ($archive){
									continue;
									
								} else{
									return $start_date;
									break;
								}
							
							}
							
					} 
	 
			endif;


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