<?php
/**
 * Plugin Name: REST API Extended Endpoints
 * Description: Extended endpoints via REST e.g.: Cache
 * Author: Dale Phurrough
 * Author URI: https://hidale.com/
 * Version: 0.1
 * Plugin URI: https://github.com/diablodale/rest-extended-endpoints
 */
 
add_action( 'rest_api_init', function () {
    register_rest_route( 'rest-extended-endpoints/v1', '/cache/flush/', array(
        'methods' => 'GET',
        'callback' => 'wp_cache_flush'
    ) );
} );
