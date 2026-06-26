<!doctype html>
<html>
<head>
<meta charset="utf-8" id="htmlid">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<?php blacktieskis_favicon(); ?>	
	<link rel="apple-touch-icon" href="<?php echo blacktieskis_apple_touch_icon(); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="google-site-verification" content="0h1DQhlIGnXRlyd5wCRSu520nOBEs1GeEZmniKnA02o" />
    <meta name="format-detection" content="telephone=no">    
	<link href='//fonts.googleapis.com' rel='dns-prefetch' crossorigin/>
	<link href='//cdnjs.cloudflare.com' rel='dns-prefetch' crossorigin/>
	<link href='//fonts.googleapis.com' rel='preconnect' crossorigin/>
	<link href='//cdnjs.cloudflare.com' rel='preconnect' crossorigin/>   
	<?php wp_head(); ?>
	<?php blacktieskis_tracking_code(); ?>
	<style type="text/css">
		.error404 .btn-primary:hover{
		    color: #fff!important;
		}
		.error404 ul.navbar-nav a{
			display: none;
		}
		
		
		
		
	</style>

</head>
<?php
	if($_GET['id']==1){
		header("location:https://btsr.flywheelsites.com/telluride/#products");
		exit;
	}
	
if ( is_front_page() ) {
	$class = 'page-home';
} else {
	$class = 'page-internal';
}
?>
	
	<script>
	function onloadfun(){
<?php echo "<style> .mod-popup .popup-content {display:none !important;}</style>"; ?>
		
		}
	</script>
<body onload="onloadfun();" <?php body_class( $class ); ?>>
<div id="wrapper">
<?php echo get_template_part( 'template-parts/includes/menu-header' ); ?>