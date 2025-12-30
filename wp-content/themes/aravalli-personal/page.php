<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aravalli
 */

get_header();
$aravalli_default_pg_layout 		= get_theme_mod('aravalli_default_pg_layout', 'aravalli_rsb'); 
?>
<section class="blog-content bs-py-default">
	<div class="container">
		<div class="row g-5">
			<!-- Blog Posts -->
			<?php if($aravalli_default_pg_layout == 'aravalli_lsb'): 
					if ( class_exists( 'WooCommerce' ) ) {
						if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce');
						}
						else{ 
							get_sidebar();
						}
					}
					else{ 
						get_sidebar();
					}
			endif; ?>	
			<?php if($aravalli_default_pg_layout == 'aravalli_fullwidth'): ?>
				<div class="col-lg-12 col-12">
			<?php else: ?>	
				<div id="ms-primary-content" class="col-lg-8 col-12">
			<?php endif; ?>	
				<div class="row-cols-1 gy-4">
					<?php 		
						if( have_posts()) :  the_post();
						
						the_content(); 
						endif;
						
						if( $post->comment_status == 'open' ) { 
							 comments_template( '', true ); // show comments 
						}
					?>
				</div>                   
			</div>
			<?php if($aravalli_default_pg_layout == 'aravalli_rsb'):
				//get_sidebar();
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar('woocommerce');
					}
					else{ 
						get_sidebar();
					}
				}
				else{ 
					get_sidebar();
				}
				endif;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>