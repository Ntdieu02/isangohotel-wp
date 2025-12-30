<?php
/**
 * Template part for displaying author Meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aravalli
 */

?>

<div class="author-profile mb-5">
	<div class="media">
		<?php
			$aravalli_author_description = get_the_author_meta( 'description' );
			$aravalli_author_id          = get_the_author_meta( 'ID' );
			$aravalli_current_user_id    = is_user_logged_in() ? wp_get_current_user()->ID : false;
		?>
		<?php echo get_avatar( get_the_author_meta('ID'), 200); ?>
		<div class="author-body media-body">
			<h3><?php the_author_link(); ?></h3>
			<?php
				if ( '' === $aravalli_author_description ) {
					if ( $aravalli_current_user_id && $aravalli_author_id === $aravalli_current_user_id ) {

						// Translators: %1$s: <a> tag. %2$s: </a>.
						printf( wp_kses_post( __( 'You haven&rsquo;t entered your Biographical Information yet. %1$sEdit your Profile%2$s now.', 'aravalli-pro' ) ), '<br/><a href="' . esc_url( get_edit_user_link( $aravalli_current_user_id ) ) . '">', '</a>' );
					}
				} else {
				?>
				<p><?php echo wp_kses_post( $aravalli_author_description ); ?></p>
				<?php	
				}
			?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php esc_html_e('View All Post','aravalli-pro'); ?></a>
		</div>
	</div>
</div>
