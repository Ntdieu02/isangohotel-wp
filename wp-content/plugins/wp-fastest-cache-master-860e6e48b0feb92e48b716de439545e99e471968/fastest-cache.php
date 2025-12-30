<?php
/**
 * Plugin Name:       Fastest cache
 * Plugin URI:        https://www.lws.fr/
 * Description:       Cleans nginx's proxy cache whenever a post is edited/published.
 * Version:           1.0
 * Author:            LWS
 * Author URI:        https://www.lws.fr
 * Requires at least: 3.0
 * Tested up to:      5.8
 *
 * @link              https://www.lws.fr
 * @since             1.0
 * @package           fastest-cache
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Base URL of plugin
 */
if ( ! defined( 'FASTEST_CACHE_BASEURL' ) ) {
	define( 'FASTEST_CACHE_BASEURL', plugin_dir_url( __FILE__ ) );
}

/**
 * Base Name of plugin
 */
if ( ! defined( 'FASTEST_CACHE_BASENAME' ) ) {
	define( 'FASTEST_CACHE_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * Base PATH of plugin
 */
if ( ! defined( 'FASTEST_CACHE_BASEPATH' ) ) {
	define( 'FASTEST_CACHE_BASEPATH', plugin_dir_path( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fastest-cache-activator.php
 */
function activate_fastest_cache() {
	require_once FASTEST_CACHE_BASEPATH . 'includes/class-fastest-cache-activator.php';
	Fastest_Cache_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fastest-cache-deactivator.php
 */
function deactivate_fastest_cache() {
	require_once FASTEST_CACHE_BASEPATH . 'includes/class-fastest-cache-deactivator.php';
	Fastest_Cache_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fastest_cache' );
register_deactivation_hook( __FILE__, 'deactivate_fastest_cache' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require FASTEST_CACHE_BASEPATH . 'includes/class-fastest-cache.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
function run_fastest_cache() {

	global $fastest_cache;

	$fastest_cache = new Fastest_Cache();
	$fastest_cache->run();

	// Load WP-CLI command.
	if ( defined( 'WP_CLI' ) && WP_CLI ) {

		require_once FASTEST_CACHE_BASEPATH . 'class-fastest-cache-wp-cli-command.php';
		\WP_CLI::add_command( 'fastest-cache', 'Fastest_Cache_WP_CLI_Command' );

	}

}
run_fastest_cache();
