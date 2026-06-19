<?php

/**
 * Global option page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Global Settings',
		'menu_title' => 'Global Settings',
		'menu_slug'  => 'global-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'icon_url'   => 'dashicons-admin-customizer',
	) );
}

/**
 * Remove edit of page
 */
add_action( 'init', 'blacktieskis_remove_page_type_editor', 10 );
if ( ! function_exists( 'blacktieskis_remove_page_type_editor' ) ) :
 	function blacktieskis_remove_page_type_editor() {
 		remove_post_type_support( 'page', 'editor' );
 	}
endif;

if ( ! function_exists( 'blacktieskis_setup' ) ) :
function blacktieskis_setup() {
	/**
	 * Add theme support
	 */
	add_theme_support( 'menus' );
	add_theme_support( 'widgets' );
	add_theme_support( 'sidebars' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( array(
		'main_menu'    => __( 'Main Menu', 'blacktieskis' ),
		'footer_menu'  => __( 'Footer Menu', 'blacktieskis' ),
		'global-nav'   => __( 'Global Nav', 'blacktieskis' ),
		'location-nav' => __( 'Location Nav', 'blacktieskis' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'blacktieskis_setup' );

function blacktieskis_acf_init()
{
	$google_api_key = get_field('bt_google_api_key', 'option');
	acf_update_setting('google_api_key', $google_api_key);
}
add_action('acf/init', 'blacktieskis_acf_init');

function blacktieskis_get_menu_item($menu_name)
{
    $menu_items = array();
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }

    return $menu_items;
}

/**
 * Blacktieskis favicon
 *
 * @return output html
 */
function blacktieskis_favicon() {
	
	$_favicon = get_field( 'bt_favicon', 'option' );

	if ( ! empty( $_favicon ) ) {
		?>		
        <link rel="icon" href="<?php echo $_favicon; ?>" type="image/x-icon"><?php
	} else {
		?>       
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/images/favicon.ico'; ?>" type="image/x-icon"><?php
	}
}

/*
 * Specifying a Webpage Icon for Web Clip
 */
function blacktieskis_apple_touch_icon() {	
	
	$apple_touch_icon = get_field( 'bt_apple_touch_icon', 'option' );
	if ( ! empty( $apple_touch_icon ) && isset( $apple_touch_icon['url'] ) ) {
		
		return $apple_touch_icon['url'];
	}
	
	return '';
}

/*
 * Blacktieskis tracking code
 */
function blacktieskis_tracking_code() {
	$_get_tracking_code = get_field( 'bt_tracking_code', 'option' );
	if ( ! empty( $_get_tracking_code ) ) {
		echo  $_get_tracking_code;
	}
}

/*
 * Blacktieskis header logo
 */
function blacktieskis_header_logo() {
	$_logo = get_field( 'bt_header_logo', 'option' );

	if ( ! empty( $_logo ) && isset( $_logo['alt'] ) ) {
		$_logo_alt = $_logo['alt'];
	} else {
		$_logo_alt = get_bloginfo( 'name' );
	}
	if(empty($_logo_alt)) {
		$_logo_alt = 'Black Tie Ski';
	}
	if ( ! empty( $_logo ) && isset( $_logo['url'] ) ) {
		?><img src="<?php echo $_logo['url']; ?>" alt="<?php echo $_logo_alt; ?>"><?php
	} else {
		?><img src="<?php echo get_stylesheet_directory_uri() . '/images/BTS-logo.png'; ?>" alt="<?php echo $_logo_alt; ?>"><?php
	}
}

//Get page content
function the_blacktieskis_content()
{
    $_id = get_the_ID();
    if (is_single()) {
        $_post = get_post($_id);
    } else {
        $_post = get_page($_id);
    }

    $_content = $_post->post_content;
    $_content = apply_filters('the_content', $_content);    
    $_content = blacktieskis_remove_empty_p($_content);

    echo $_content;
}

function blacktieskis_get_field($sub_field, $postID = null)
{

    if ($postID)
        $_content = get_field($sub_field, $postID);
    else
        $_content = get_field($sub_field);    

    $_content = blacktieskis_remove_empty_p($_content);

    return $_content;
}

function blacktieskis_sub_field($sub_field, $output = false)
{

    $_content = get_sub_field($sub_field);   

    if ($output) {
        return $_content;
    } else {
        echo $_content;
    }
}

//Remove empty p tag in content
function blacktieskis_remove_empty_p($content)
{
    // clean up p tags around block elements
    $content = preg_replace(array(
        '#<p>\s*<(div|aside|section|article|header|footer)#',
        '#</(div|aside|section|article|header|footer)>\s*</p>#',
        '#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
        '#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
        '#<p>\s*</(div|aside|section|article|header|footer)#',
    ), array(
        '<$1',
        '</$1>',
        '</$1>',
        '<$1$2>',
        '</$1',
    ), $content);

    return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#i', '', $content);
}

function blacktieskis_get_category_meta_str($term_id, $field_name, $taxonomy = 'category')
{
    $queried_object = get_queried_object();
    // load for this taxonomy term (term string)
    $str = get_field($field_name, $taxonomy . '_' . $term_id);

    return $str;
}

function blacktieskis_get_attachment($attachment_id)
{
    $_attachment = get_post($attachment_id);
    $results = array(
        'alt' => get_post_meta($_attachment->ID, '_wp_attachment_image_alt', true),
        //'caption' => $_attachment->post_excerpt,
        'description' => $_attachment->post_content,
        //'href' => get_permalink($_attachment->ID),
        'src' => $_attachment->guid,
        'title' => $_attachment->post_title
    );

    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
        $results['src'] = str_replace('http://', 'https://', $results['src']);

    return $results;
}

/*
 * add attr parsley to input field
 */
function blacktieskis_wpcf7_form_elements( $content ) 
{   
	$content = preg_replace(
		array(
			'#<input (.*?) class="(.*?) wpcf7-validates-as-required(.*?)" (.*?)>#si',			
			'#<textarea (.*?) class="(.*?) wpcf7-validates-as-required(.*?)" (.*?)>#si',			
		),
		array(
			'<input $1 class="$2 $3 require" data-parsley-errors-messages-disabled="" required="" $4 placeholder="">',			
			'<textarea $1 class="$2 $3 require" data-parsley-errors-messages-disabled="" required="" $4>',			
		), $content );
    return $content;
}
add_filter('wpcf7_form_elements', 'blacktieskis_wpcf7_form_elements');

/**
 * Get social media
 *
 * @return output html
 *   The social media of footer.
 */
function blacktieskis_get_social_media() 
{
	if ( have_rows( 'bt_social_media', 'option' ) ) {
		?>
        <div class="footer-social social col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end">
        	<div class="logo-footer">
	         <a href="https://protectourwinters.org/" target="_blank" rel="noopener"><img src="<?php echo TEMPLATE_URL?>/images/POW.svg" alt="POW"></a>
	         </div>
			<ul>
				<?php
				while ( have_rows( 'bt_social_media', 'option' ) ): the_row();

					$sm_icon = get_sub_field( 'icon' );
					$sm_link = get_sub_field( 'link' );

					if ( ! empty( $sm_icon ) ) {

						if ( empty( $sm_link ) ) {
							$sm_link = 'javascript:void(0);';
						}
						$sm_icon_type = '';
						
						if ( $sm_icon == 'Facebook' ) {					
							$sm_icon_type = '<i class="icomoon icon-facebook" aria-hidden="true"></i>';
						} elseif ( $sm_icon == 'Twitter' ) {
							// X (formerly Twitter) — exact glyph from the icomoon set, used inline as SVG
							// so it doesn't require regenerating the icon font. Font units (1024 em, Y-up),
							// flipped to the SVG coordinate space via the transform.
							$sm_icon_type = '<svg class="social-x-icon" viewBox="0 0 1024 1024" aria-hidden="true" focusable="false"><path transform="translate(0,960) scale(1,-1)" d="M778.411 864h141.141l-308.352-352.427 362.752-479.573h-284.032l-222.464 290.859-254.549-290.859h-141.227l329.813 376.96-347.989 455.040h291.243l201.088-265.856zM728.875 116.48h78.208l-504.832 667.477h-83.925z"/></svg>';
						} elseif ( $sm_icon == 'Instagram' ) {						
							$sm_icon_type = '<i class="icomoon icon-instagram" aria-hidden="true"></i>';
						} elseif ( $sm_icon == 'Youtube' ) {						
							$sm_icon_type = '<i class="icomoon icon-youtube" aria-hidden="true"></i>';
						}
						?>
						<li>
							<a rel="noopener" href="<?php echo $sm_link; ?>" target="_blank"><?php echo $sm_icon_type; ?></a>
						</li>
					<?php }
					?>
				<?php endwhile;
				?>
			</ul>
		</div>
		<?php
	}
}

/**
 * Declare global ajax url
 *
 * @return script
 */
function blacktieskis_set_javascript_url()
{
  echo "\n <script type='text/javascript'>\n /* <![CDATA[ */  \n";
  echo "var blacktieskis_ajaxurl = '".admin_url( 'admin-ajax.php' )."';\n";
  echo "/* ]]> */ \n";
  echo "</script>\n \n ";
}
add_action('wp_footer', 'blacktieskis_set_javascript_url');

/**
 * Get IP
 *
 * @return str
 */
function blacktieskis_get_ip() 
{	
	if (getenv('HTTP_CLIENT_IP'))	
		$ip = getenv('HTTP_CLIENT_IP');
	elseif (getenv('HTTP_X_FORWARDED_FOR'))		
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	elseif (getenv('HTTP_X_FORWARDED'))		
		$ip = getenv('HTTP_X_FORWARDED');
	elseif (getenv('HTTP_FORWARDED_FOR'))		
		$ip = getenv('HTTP_FORWARDED_FOR');
	elseif (getenv('HTTP_FORWARDED'))		
		$ip = getenv('HTTP_FORWARDED');
	else	
		$ip = $_SERVER['REMOTE_ADDR'];
	
	return $ip;
}

/**
 * Return user ID
 *
 * @return str
 */
function blacktieskis_get_current_user_id($user_ip)
{
	if( ! ( $user_id = get_current_user_id() ) ){
		
		return blacktieskis_generate_user_id( $user_ip );
	} else {
		
		return $user_id;
	}
}

/**
 * Convert IP to a integer value
 *
 * @return str
 */
function blacktieskis_generate_user_id( $user_ip ) 
{
	if( filter_var( $user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
	    
		return ip2long( $user_ip );
	} else {
		
	    $binary_val = '';
	    foreach ( unpack( 'C*', inet_pton( $user_ip ) ) as $byte ) {
	        $binary_val .= decbin( $byte );
	    }
	    return base_convert( ltrim( $binary_val, '0' ), 2, 10 );
	}
}

// Send to mail addition before call wpcf7
add_action( 'wpcf7_before_send_mail', 'wpcf7_change_mail_recipient' );
function verify_captcha_contact_form(){
	if ( ! empty( $_POST )  && isset($_POST['g-recaptcha-response'])) {
		$captcha=$_POST['g-recaptcha-response'];
		$secretKey = get_field( 'bt_recaptcha_secret_key', 'option' );
		$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $secretKey ."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
		if($response['success'] == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
function wpcf7_change_mail_recipient($wpcf7){
	$submission = WPCF7_Submission::get_instance();
	$currentformInstance  = WPCF7_ContactForm::get_current();
	// if(verify_captcha_contact_form()){
		$posted_data = $submission->get_posted_data();
		$location = $posted_data['location'];


		$list_mail_location = get_field( 'list_mail_location', 'option' );
		// print_r($list_mail_location);die;
		
		if($location && $currentformInstance){
			$mail = $currentformInstance->prop( 'mail' );
			for($i = 0; $i < count($list_mail_location); $i++){
				$locationSlug = strtolower($list_mail_location[$i]['name']);
				$locationSlug = preg_replace('/[^a-z0-9-]/', '-', $locationSlug);
				$locationSlug = preg_replace('/-+/', "-", $locationSlug);
				if($location == $locationSlug){
					$bcc_email = $list_mail_location[$i]['mail_bcc'];
					if($bcc_email){
						$mail['additional_headers'] .= "\nBcc: $bcc_email";
					}
					$locationName = ucwords($list_mail_location[$i]['name']);
					$mailTemp = $list_mail_location[$i]['mail'];
					$mail['recipient'] = $mailTemp;
					$mail['body'] = str_replace('[location]', $locationName , $mail['body'] );
				
					// print_r($mail);die;
				}
			}
			$currentformInstance->set_properties(array('mail'=>$mail));
			return $currentformInstance;
		}
	// }else{
		echo json_encode(array("status"=>0,"message"=>"invalid recaptcha"));die;
		// $currentformInstance->skip_mail = true;
		// return $currentformInstance;
	// }
}
//End  Send to mail addition before call wpcf7

/**
 * Render a "Getting Your Gear" bullet, auto-linking it to Google Maps when the
 * text looks like a street address. Keeps the admin clean — editors just type a
 * normal bullet, no per-bullet URL field required.
 *
 * Detection is deliberately strict to avoid false positives (e.g. "2 day
 * minimum"): the text must start with a street number AND contain either a
 * common street-type suffix or a 5-digit ZIP.
 *
 * @param string $text Raw bullet text.
 * @return string Escaped bullet HTML (an anchor when an address is detected).
 */
function blacktieskis_gear_bullet_html( $text ) {
	$text = trim( (string) $text );

	if ( '' === $text ) {
		return '';
	}

	$looks_like_address = false;

	// Must start with a street number ("123 Main St ...").
	if ( preg_match( '/^\d{1,6}\s+\S/', $text ) ) {
		$suffixes = 'st|street|ave|avenue|rd|road|blvd|boulevard|dr|drive|ln|lane|way|ct|court|hwy|highway|pkwy|parkway|pl|place|ter|terrace|cir|circle|trl|trail|sq|square|loop|row|run|pass|pt|point|spur';

		if (
			preg_match( '/\b(?:' . $suffixes . ')\b\.?/i', $text )   // a street-type word, or
			|| preg_match( '/\b\d{5}(?:-\d{4})?\b/', $text )         // a US ZIP code
		) {
			$looks_like_address = true;
		}
	}

	if ( $looks_like_address ) {
		$url = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $text );

		return sprintf(
			'<a class="gear-card__address" href="%s" target="_blank" rel="noopener">%s</a>',
			esc_url( $url ),
			esc_html( $text )
		);
	}

	return esc_html( $text );
}

// disable user json
add_filter( 'rest_endpoints', function( $endpoints ){
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
			unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
});
