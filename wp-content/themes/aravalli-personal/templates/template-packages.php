<?php 
/**
Template Name: Packages Page
*/

get_header();

// Packages
$hs_pg_packages 	= get_theme_mod( 'hs_pg_packages','1'); 
if($hs_pg_packages=='1'):
	get_template_part('template-parts/sections/section','packages');
endif;

// Special Offer
$hs_pg_packages_offer 	= get_theme_mod( 'hs_pg_packages_offer','1'); 
if($hs_pg_packages_offer=='1'):
	get_template_part('template-parts/sections/section','offer');
endif;

?>
<?php get_footer(); ?>