<?php
/**
 * Display general options of the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      2.0.0
 *
 * @package    fastest-cache
 * @subpackage fastest-cache/admin/partials
 */

global $fastest_cache_admin;

$error_log_filesize = false;

$args = array(
	'enable_purge'                     => FILTER_SANITIZE_STRING,
	'enable_stamp'                     => FILTER_SANITIZE_STRING,
	'purge_method'                     => FILTER_SANITIZE_STRING,
	'is_submit'                        => FILTER_SANITIZE_STRING,
	'redis_hostname'                   => FILTER_SANITIZE_STRING,
	'redis_port'                       => FILTER_SANITIZE_STRING,
	'redis_prefix'                     => FILTER_SANITIZE_STRING,
	'purge_homepage_on_edit'           => FILTER_SANITIZE_STRING,
	'purge_homepage_on_del'            => FILTER_SANITIZE_STRING,
	'purge_url'                        => FILTER_SANITIZE_STRING,
	'log_level'                        => FILTER_SANITIZE_STRING,
	'log_filesize'                     => FILTER_SANITIZE_STRING,
	'smart_http_expire_save'           => FILTER_SANITIZE_STRING,
	'cache_method'                     => FILTER_SANITIZE_STRING,
	'enable_map'                       => FILTER_SANITIZE_STRING,
	'enable_log'                       => FILTER_SANITIZE_STRING,
	'purge_archive_on_edit'            => FILTER_SANITIZE_STRING,
	'purge_archive_on_del'             => FILTER_SANITIZE_STRING,
	'purge_archive_on_new_comment'     => FILTER_SANITIZE_STRING,
	'purge_archive_on_deleted_comment' => FILTER_SANITIZE_STRING,
	'purge_page_on_mod'                => FILTER_SANITIZE_STRING,
	'purge_page_on_new_comment'        => FILTER_SANITIZE_STRING,
	'purge_page_on_deleted_comment'    => FILTER_SANITIZE_STRING,
	'smart_http_expire_form_nonce'     => FILTER_SANITIZE_STRING,
);

$all_inputs = filter_input_array( INPUT_POST, $args );

if ( isset( $all_inputs['smart_http_expire_save'] ) && wp_verify_nonce( $all_inputs['smart_http_expire_form_nonce'], 'smart-http-expire-form-nonce' ) ) {
	unset( $all_inputs['smart_http_expire_save'] );
	unset( $all_inputs['is_submit'] );

	$nginx_settings = wp_parse_args(
		$all_inputs,
		$fastest_cache_admin->fastest_cache_default_settings()
	);

	if ( ( ! is_numeric( $nginx_settings['log_filesize'] ) ) || ( empty( $nginx_settings['log_filesize'] ) ) ) {
		$error_log_filesize = __( 'Log file size must be a number.', 'fastest-cache' );
		unset( $nginx_settings['log_filesize'] );
	}

	if ( $nginx_settings['enable_map'] ) {
		$fastest_cache_admin->update_map();
	}

	update_site_option( 'rt_wp_fastest_cache_options', $nginx_settings );

	echo '<div class="updated"><p>' . esc_html__( 'Settings saved.', 'fastest-cache' ) . '</p></div>';

}

$fastest_cache_settings = $fastest_cache_admin->fastest_cache_settings();
$log_path               = $fastest_cache_admin->functional_asset_path();
$log_url                = $fastest_cache_admin->functional_asset_url();

/**
 * Get setting url for single multiple with subdomain OR multiple with subdirectory site.
 */
$nginx_setting_link = '#';
if ( is_multisite() ) {
	if ( SUBDOMAIN_INSTALL === false ) {
		$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/multisite/subdirectories/fastcgi-cache-with-purging/';
	} else {
		$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/multisite/subdomains/fastcgi-cache-with-purging/';
	}
} else {
	$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/single-site/fastcgi-cache-with-purging/';
}
?>

<!-- Forms containing fastest cache settings options. -->
<form id="post_form" method="post" action="#" name="smart_http_expire_form" class="clearfix">
	<div class="postbox">
		<h3 class="hndle">
			<span><?php esc_html_e( 'Purging Options', 'fastest-cache' ); ?></span>
		</h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<td>
						<input type="checkbox" value="1" id="enable_purge" name="enable_purge" <?php checked( $fastest_cache_settings['enable_purge'], 1 ); ?> />
						<label for="enable_purge"><?php esc_html_e( 'Enable Purge', 'fastest-cache' ); ?></label>
					</td>
				</tr>
			</table>
		</div> <!-- End of .inside -->
	</div>

	<?php if ( ! ( ! is_network_admin() && is_multisite() ) ) { ?>
		<div class="postbox enable_purge"<?php echo ( empty( $fastest_cache_settings['enable_purge'] ) ) ? ' style="display: none;"' : ''; ?>>
			<h3 class="hndle">
				<span><?php esc_html_e( 'Purging Conditions', 'fastest-cache' ); ?></span>
			</h3>
			<div class="inside">
				<table class="form-table rtnginx-table">
					<tr valign="top">
						<th scope="row"><h4><?php esc_html_e( 'Purge Homepage:', 'fastest-cache' ); ?></h4></th>
						<td>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when a post/page/custom post is modified or added.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_homepage_on_edit">
									<input type="checkbox" value="1" id="purge_homepage_on_edit" name="purge_homepage_on_edit" <?php checked( $fastest_cache_settings['purge_homepage_on_edit'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>post</strong> (or page/custom post) is <strong>modified</strong> or <strong>added</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when an existing post/page/custom post is modified.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_homepage_on_del">
									<input type="checkbox" value="1" id="purge_homepage_on_del" name="purge_homepage_on_del" <?php checked( $fastest_cache_settings['purge_homepage_on_del'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>published post</strong> (or page/custom post) is <strong>trashed</strong>', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
						</td>
					</tr>
				</table>
				<table class="form-table rtnginx-table">
					<tr valign="top">
						<th scope="row">
							<h4>
								<?php esc_html_e( 'Purge Post/Page/Custom Post Type:', 'fastest-cache' ); ?>
							</h4>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text">
									<span>&nbsp;
										<?php
											esc_html_e( 'when a post/page/custom post is published.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_page_on_mod">
									<input type="checkbox" value="1" id="purge_page_on_mod" name="purge_page_on_mod" <?php checked( $fastest_cache_settings['purge_page_on_mod'], 1 ); ?>>
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>post</strong> is <strong>published</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when a comment is approved/published.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_page_on_new_comment">
									<input type="checkbox" value="1" id="purge_page_on_new_comment" name="purge_page_on_new_comment" <?php checked( $fastest_cache_settings['purge_page_on_new_comment'], 1 ); ?>>
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>comment</strong> is <strong>approved/published</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when a comment is unapproved/deleted.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_page_on_deleted_comment">
									<input type="checkbox" value="1" id="purge_page_on_deleted_comment" name="purge_page_on_deleted_comment" <?php checked( $fastest_cache_settings['purge_page_on_deleted_comment'], 1 ); ?>>
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>comment</strong> is <strong>unapproved/deleted</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
						</td>
					</tr>
				</table>
				<table class="form-table rtnginx-table">
					<tr valign="top">
						<th scope="row">
							<h4>
								<?php esc_html_e( 'Purge Archives:', 'fastest-cache' ); ?>
							</h4>
							<small><?php esc_html_e( '(date, category, tag, author, custom taxonomies)', 'fastest-cache' ); ?></small>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when an post/page/custom post is modified or added', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_archive_on_edit">
									<input type="checkbox" value="1" id="purge_archive_on_edit" name="purge_archive_on_edit" <?php checked( $fastest_cache_settings['purge_archive_on_edit'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>post</strong> (or page/custom post) is <strong>modified</strong> or <strong>added</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when an existing post/page/custom post is trashed.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_archive_on_del">
									<input type="checkbox" value="1" id="purge_archive_on_del" name="purge_archive_on_del"<?php checked( $fastest_cache_settings['purge_archive_on_del'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>published post</strong> (or page/custom post) is <strong>trashed</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<br />
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when a comment is approved/published.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_archive_on_new_comment">
									<input type="checkbox" value="1" id="purge_archive_on_new_comment" name="purge_archive_on_new_comment" <?php checked( $fastest_cache_settings['purge_archive_on_new_comment'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>comment</strong> is <strong>approved/published</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
							<fieldset>
								<legend class="screen-reader-text">
									<span>
										&nbsp;
										<?php
											esc_html_e( 'when a comment is unapproved/deleted.', 'fastest-cache' );
										?>
									</span>
								</legend>
								<label for="purge_archive_on_deleted_comment">
									<input type="checkbox" value="1" id="purge_archive_on_deleted_comment" name="purge_archive_on_deleted_comment" <?php checked( $fastest_cache_settings['purge_archive_on_deleted_comment'], 1 ); ?> />
									&nbsp;
									<?php
										echo wp_kses(
											__( 'when a <strong>comment</strong> is <strong>unapproved/deleted</strong>.', 'fastest-cache' ),
											array( 'strong' => array() )
										);
									?>
								</label>
								<br />
							</fieldset>
						</td>
					</tr>
				</table>

			</div> <!-- End of .inside -->
		</div>

		<!-- TODO voir pour faire ce log via nginx -->
		<input type="hidden" value="1" id="enable_log" name="enable_log" />
		<?php
	} // End of if.

	?>

    <input type="hidden" name="smart_http_expire_form_nonce" value="<?php echo wp_create_nonce('smart-http-expire-form-nonce'); ?>"/>

	<div style="float: left;">
		<?php
			submit_button( __( 'Save All Changes', 'fastest-cache' ), 'primary large', 'smart_http_expire_save', true );
		?>
	</div>
	
<?php
$purge_url  = add_query_arg(
	array(
		'fastest_cache_action' => 'purge',
		'fastest_cache_urls'   => 'all',
	)
);
$nonced_url = wp_nonce_url( $purge_url, 'fastest_cache-purge_all' );
?>

	<div style="float: right;">
		<p class="submit">
			<a href="<?php echo esc_url( $nonced_url ); ?>" class="button-primary" style="background: red; border-color: red;"><?php esc_html_e( 'Purge Entire Cache', 'fastest-cache' ); ?></a>
		</p>
	</div>
	<br style="clear: both;" />
</form><!-- End of #post_form -->


