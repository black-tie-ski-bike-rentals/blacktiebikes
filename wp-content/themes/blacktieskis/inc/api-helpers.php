<?php


$page = filter_input( INPUT_GET, 'page-api', FILTER_SANITIZE_STRING );
switch ( $page ) {
	case 'home':
		get_template_part( 'inc/api/api', 'home' );
		break;
	default:
		break;
}