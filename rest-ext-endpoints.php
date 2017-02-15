<?php
/**
 * Plugin Name: REST API Extended Endpoints
 * Description: Extended endpoints e.g. cache
 * Author: Dale Phurrough
 * Author URI: https://hidale.com/
 * Version: 0.1
 * Plugin URI: https://github.com/diablodale/rest-ext-endpoints
 */

function rest_ext_endpoints_cache_flush() {
	$retval = wp_cache_flush();
	if ( false === $retval ) {
		$retval = new WP_Error( 'rest_ext_endpoints_cache_flush_fail', 'Cache flush failed', array( 'status' => 500 ) );
	}
	return rest_ensure_response( $retval );
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'rest-ext-endpoints/v1', '/cache/flush/', array(
		'methods' => 'GET',
		'callback' => 'rest_ext_endpoints_cache_flush',
		'permission_callback' => function () {
			return current_user_can( 'install_plugins' );
	}
	) );
} );
