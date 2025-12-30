<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aravalli
 */

get_header();
$error_pg_ttl			= get_theme_mod('error_pg_ttl','4<span>0</span>4');
$error_pg_subttl		= get_theme_mod('error_pg_subttl','Something Went Wrong');
$error_pg_subttl2		= get_theme_mod('error_pg_subttl2','Oops! That page can’t be found.');
$error_pg_text			= get_theme_mod('error_pg_text',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummyever since the 1500s");
$error_pg_btn_lbl		= get_theme_mod('error_pg_btn_lbl','Go To Home');
$error_pg_btn_url		= get_theme_mod('error_pg_btn_url');
?>
<section id="page-404" class="page-404 sec-default">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-404">
					<?php if ( ! empty( $error_pg_ttl ) ) : ?> 
						<h1><?php echo wp_kses_post($error_pg_ttl); ?></h1>
					<?php endif; ?>
					
					<?php if ( ! empty( $error_pg_subttl ) ) : ?> 
						<h2><?php echo wp_kses_post($error_pg_subttl); ?></h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $error_pg_subttl2 ) ) : ?> 
						<h3><?php echo wp_kses_post($error_pg_subttl2); ?></h3>
					<?php endif; ?>
					
					<?php if ( ! empty( $error_pg_text ) ) : ?> 
						<p><?php echo wp_kses_post($error_pg_text); ?></p>
					<?php endif; ?>
					<div class="subscribe-form">
						<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="input-group">
								<input class="form-control" name="s" id="s" type="search" placeholder="Search Here">
								<button class="btn btn-subscribe search-submit" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</form>
					</div>
					<?php if ( ! empty( $error_pg_btn_lbl ) ) : ?> 
						<a href="<?php echo esc_url($error_pg_btn_url); ?>" class="btn-shape btn-line-primary"><?php echo esc_html($error_pg_btn_lbl); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>          
	</div>
</section>	
<?php get_footer(); ?>
