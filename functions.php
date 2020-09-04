<?php
/**
 * nourseofcourse functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nourseofcourse
 */

define( 'THEME_NAME', 'NOC Headless' );
define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_WEB_ROOT', get_template_directory_uri() );
define( 'THEME_ROOT', get_template_directory() );
define( 'FRAMEWORK_ROOT', THEME_ROOT . '/framework/' );

$files = [
	'theme-setup.php',
	'theme-menus.php',
	'class-noc-extend-api'
];

foreach( $files as $file ) {
	if( file_exists( FRAMEWORK_ROOT . $file) ) {
		require_once( FRAMEWORK_ROOT . $file );
	}
}


add_filter( 'rest_prepare_user', function( $response, $user, $request ) {

	$response->data[ 'first_name' ] = get_user_meta( $user->ID, 'first_name', true );
	$response->data[ 'last_name' ] = get_user_meta( $user->ID, 'last_name', true );
	$user_meta=get_userdata($user->ID);
	$response->data['role'] = $user_meta->roles;;

	return $response;

}, 10, 3 );