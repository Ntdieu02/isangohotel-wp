<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0
 *
 * @package    fastest-cache
 * @subpackage fastest-cache/includes
 *
 * @author     LWS
 */

/**
 * Class Fastest_Cache_Activator
 */
class Fastest_Cache_Activator {

	/**
	 * Create log directory. Add capability of fastest cache.
	 * Schedule event to check log file size daily.
	 *
	 * @since    2.0.0
	 *
	 * @global Fastest_Cache_Admin $fastest_cache_admin
	 */
	public static function activate() {

		global $fastest_cache_admin;

		$path = $fastest_cache_admin->functional_asset_path();

		if ( ! is_dir( $path ) ) {
			mkdir( $path );
		}

		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$role = get_role( 'administrator' );

		if ( empty( $role ) ) {

			update_site_option(
				'rt_wp_fastest_cache_init_check',
				__( 'Sorry, you need to be an administrator to use Fastest Cache', 'fastest-cache' )
			);

			return;

		}

		$role->add_cap( 'Fastest Cache | Config' );
		$role->add_cap( 'Fastest Cache | Purge cache' );

		wp_schedule_event( time(), 'daily', 'rt_wp_fastest_cache_check_log_file_size_daily' );

	}

}
