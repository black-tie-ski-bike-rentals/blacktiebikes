<?php

/**
 * Get Front Page ID
 */
$home_id = (int) get_option( 'page_on_front' );
$all_content                  = array();
$out = json_encode( $all_content );
print_r($out);die;