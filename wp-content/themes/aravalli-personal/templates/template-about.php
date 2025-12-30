<?php 
/**
Template Name: About Page
*/

get_header();

// About
$hs_pg_about 	= get_theme_mod( 'hs_pg_about','1'); 
if($hs_pg_about=='1'):
	get_template_part('template-parts/sections/section','about');
endif;



// Testimonial
$hs_pg_about_testimonial 	= get_theme_mod( 'hs_pg_about_testimonial','1'); 
$hs_pg_about_why 			= get_theme_mod( 'hs_pg_about_why','1');  
?>
 <section id="testimonial-why" class="testimonial-why sec-default">
	<div class="container">
		<div class="row">
			<?php if($hs_pg_about_why !='1'): ?>
			<div class="col-lg-12 home-testimonial">
				<?php else: ?>
			<div class="col-lg-6 home-testimonial">
			<?php endif;?>
				<?php 
					if($hs_pg_about_testimonial=='1'):
						get_template_part('template-parts/sections/section','testimonial-content'); 
					endif;
				?>
			</div>
			<?php if($hs_pg_about_testimonial !='1'): ?>
				<div class="col-lg-12 about-faq">
			<?php else: ?>
				<div class="col-lg-6 about-faq">
			<?php endif;?>
				<?php 
					if($hs_pg_about_why=='1'):
						get_template_part('template-parts/sections/section','faq'); 
					endif;	
				?>
			</div>
		</div>
	</div>
</section>


<?php
// Amenities
$hs_pg_about_amenities 	= get_theme_mod( 'hs_pg_about_amenities','1'); 
if($hs_pg_about_amenities=='1'):
	get_template_part('template-parts/sections/section','amenities');
endif;


// Team
$hs_pg_about_team 	= get_theme_mod( 'hs_pg_about_team','1'); 
if($hs_pg_about_team=='1'):
	get_template_part('template-parts/sections/section','team');
endif;


// Certificates
$hs_pg_about_certificates 	= get_theme_mod( 'hs_pg_about_certificates','1'); 
if($hs_pg_about_certificates=='1'):
	get_template_part('template-parts/sections/section','certificates');
endif;



// Funfact
$hs_pg_about_funfact 	= get_theme_mod( 'hs_pg_about_funfact','1'); 
if($hs_pg_about_funfact=='1'):
	get_template_part('template-parts/sections/section','funfact');
endif;

// CTA
$hs_pg_about_cta 	= get_theme_mod( 'hs_pg_about_cta','1'); 
if($hs_pg_about_cta=='1'):
	get_template_part('template-parts/sections/section','cta');
endif;
?>
<?php get_footer(); ?>