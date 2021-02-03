<?php
/**
 * Plugin Name: Pantheon Environment - Admin Bar
 * Plugin URI:  https://smyl.es
 * Description: Simple plugin to show in admin bar, what current Pantheon environment you're on
 * Version:     1.0.0
 * Author:      Myles McNamara
 * Author URI:  https://smyl.es
 * License:     Proprietary
 * Text Domain: plugin-slug
 * Domain Path: /languages
 * Requires at least: 4.2
 * Tested up to: 5.6
 * Last Updated: @@timestamp
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! defined( 'PANTHEON_ENV_ADMIN_BAR_VERSION' ) ) {
	define( 'PANTHEON_ENV_ADMIN_BAR_VERSION', '1.0.0' );
}
if ( ! defined( 'PANTHEON_ENV_ADMIN_BAR_PLUGIN_DIR' ) ) {
	define( 'PANTHEON_ENV_ADMIN_BAR_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}
if ( ! defined( 'PANTHEON_ENV_ADMIN_BAR_PLUGIN_URL' ) ) {
	define( 'PANTHEON_ENV_ADMIN_BAR_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
}
if ( ! defined( 'PANTHEON_ENV_ADMIN_BAR_BASENAME' ) ) {
	define( 'PANTHEON_ENV_ADMIN_BAR_BASENAME', plugin_basename( __FILE__ ) );
}

require_once( 'autoload.php' );
use sMyles\Pantheon\ENV\Main as Main;

/**
 * Grab the PANTHEON_ENV_ADMIN_BAR object and return it.
 * Wrapper for PANTHEON_ENV_ADMIN_BAR::get_instance()
 *
 * @since  1.0.0
 * @return \sMyles\Pantheon\ENV\Main  Singleton instance of plugin class.
 */
function PANTHEON_ENV_ADMIN_BAR() {
	return Main::get_instance();
}

add_action( 'plugins_loaded', array( PANTHEON_ENV_ADMIN_BAR(), 'plugins_loaded' ) );
