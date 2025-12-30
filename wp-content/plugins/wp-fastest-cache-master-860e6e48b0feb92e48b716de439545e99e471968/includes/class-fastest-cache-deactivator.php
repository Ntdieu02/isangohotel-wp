<?php
/**
 * Contains Fastest_Cache_Deactivator class.
 *
 * @package    fastest-cache
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0
 *
 * @package    fastest-cache
 * @subpackage fastest-cache/includes
 *
 * @author     LWS
 */
class Fastest_Cache_Deactivator {

	/**
	 * Schedule event to check log file size daily. Remove fastest cache capability.
	 *
	 * @since    2.0.0
	 */
	public static function deactivate() {

		wp_clear_scheduled_hook( 'rt_wp_fastest_cache_check_log_file_size_daily' );

		$role = get_role( 'administrator' );
		$role->remove_cap( 'Fastest Cache | Config' );
		$role->remove_cap( 'Fastest Cache | Purge cache' );

	}

}
