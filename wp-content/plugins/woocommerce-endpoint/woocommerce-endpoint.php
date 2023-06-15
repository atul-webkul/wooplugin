<?php
/**
*   Plugin Name: WooCommerce Custom Endpoint
*   Description: To add custom endpoint to My Account Page.
*   Author: Atul
*   Author URI:
*   Plugin URI: 
*   Text Domain: 
*/

/**
 * Defined namspace
 */
defined( 'WKMP_FILE' ) || define( 'WKMP_FILE', __FILE__ );
defined( 'WKMP_PLUGIN_FILE' ) || define( 'WKMP_PLUGIN_FILE', plugin_dir_path( __FILE__ ) ); 
defined( 'WKMP_PLUGIN_URL' ) || define( 'WKMP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Includes autoload files
 */
include WKMP_PLUGIN_FILE .'/inc/autoload.php';
 new Wk_Main_handler();

?>