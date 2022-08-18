<?php
/**
 * Plugin Name: Users Registration Panel
 * Plugin URI: https://www.linkedin.com/in/anasuddinpk/
 * Description: Made for users registration via WordPress settings.
 * Version: 1.1.1.0
 * Author: Anas Uddin
 * Author URI: https://www.linkedin.com/in/anasuddinpk/
 * Text Domain: user-reg
 *
 * @package users-registration-panel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'URP_PLUGIN_DIR' ) ) {
	define( 'URP_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'URP_PLUGIN_DIR_URL' ) ) {
	define( 'URP_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'URP_ABSPATH' ) ) {
	define( 'URP_ABSPATH', dirname( __FILE__ ) );
}

require_once URP_ABSPATH . '/includes/class-urp-loader.php';
