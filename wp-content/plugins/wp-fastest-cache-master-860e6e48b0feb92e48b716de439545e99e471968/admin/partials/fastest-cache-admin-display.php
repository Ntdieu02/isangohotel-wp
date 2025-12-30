<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.lws.fr
 * @since      1.0
 *
 * @package    fastest-cache
 * @subpackage fastest-cache/admin/partials
 */

global $pagenow;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap rt-nginx-wrapper">
	<h2 class="rt_option_title">
		<?php esc_html_e( 'Fastest cache settings', 'fastest-cache' ); ?>
	</h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder">
		<?php
			include plugin_dir_path( __FILE__ ) . 'fastest-cache-general-options.php';
		?>
		</div>
	</div>
</div>
