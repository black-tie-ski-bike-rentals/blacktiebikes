<?php 
/**
 * Ajax Function
 */
if (!function_exists('blacktieskis_user_rating')) {
    /*
     * rating posts
     * @ajax function
	 * @param _POST int $currentRate
	 * @param _POST int $currentPostID
     * @return json
     */
    function blacktieskis_user_rating() {

        /*
         * get data request
         */
        $current_rate = $_POST['currentRate'];
        $current_post_id = $_POST['currentPostID'];

        echo blacktieskis_rating_process($current_rate, $current_post_id);
        die(); // stop executing script
    }

    add_action('wp_ajax_blacktieskis_user_rating', 'blacktieskis_user_rating', 0); // ajax for logged in users
    add_action('wp_ajax_nopriv_blacktieskis_user_rating', 'blacktieskis_user_rating', 0); // ajax for not logged in users
}

/*
 * rating process 
 * @param int $current_rate
 * @return json
 */
function blacktieskis_rating_process($current_rate, $current_post_id) {

    $datas = array(
        'status' => 0,
        'rating' => ''
    );
	$rating_cookie = 'btrating-'.$current_post_id;
    
	$ratings = blacktieskis_get_rating_by($current_post_id);

	if( count($ratings) ) {
		
		$total = count($ratings);
		$total_rating = 0;
		for ($i = 0; $i < count($ratings); $i++) {
			
			$total_rating += $ratings[$i]['rating'];
		}
		
		if( $total_rating > 0 ){
			
			$total += 1;
			$total_rating += $current_rate;
			$datas['rating'] = round($total_rating/$total);
		}
		$datas['status'] = 1;
	}
	else{
		
		$datas['rating'] = $current_rate;
		$datas['status'] = 1;
	}	
	
	//save current user rating
	blacktieskis_save_rating($current_post_id, $current_rate);	
	
	//save cookie
	setcookie($rating_cookie, 1, time() + 3600*365*10, '/', $_SERVER['SERVER_NAME']); //10 year

    return json_encode($datas);
}	
