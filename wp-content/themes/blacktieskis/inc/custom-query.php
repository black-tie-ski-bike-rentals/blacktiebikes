<?php
/**
 * get rating by post id
 *
 * @param int $post_id
 * @return array
 */		
function blacktieskis_get_rating_by($post_id) {
	
	global $wpdb;
	$table = 'btrating';
	
	$request  = "SELECT rating FROM " . $wpdb->prefix . $table . " ";
	$request .= "WHERE post_id =" . $post_id;	
	
	$results = $wpdb->get_results($request, ARRAY_A);
	
	return $results;		
}

/**
 * save rating
 *
 * @param int $post_id
 * @param int $rating
 * @return array
 */		
function blacktieskis_save_rating($post_id, $rating) {
	
	global $wpdb;
	$table = 'btrating';
	$user_ip = blacktieskis_get_ip();
	$user_id = blacktieskis_get_current_user_id($user_ip);

	$wpdb->insert(
				$wpdb->prefix . $table,
				array(
					'post_id'   => $post_id,
					'date_time' => current_time( 'mysql' ),
					'ip'        => $user_ip,
					'user_id'   => $user_id,
					'rating'    => $rating
				),
				array( '%d', '%s', '%s', '%s', '%s' )
			);
	
	return $results;		
}