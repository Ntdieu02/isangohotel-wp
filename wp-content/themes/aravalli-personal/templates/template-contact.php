<?php 
/**
Template Name: Contact Page
*/

get_header();

// Contact
$contact_pg_ct_hs 	= get_theme_mod( 'contact_pg_ct_hs','1'); 
if($contact_pg_ct_hs=='1'):
	get_template_part('template-parts/sections/section','contact');
endif;

// Map
$contact_pg_map_hs 	= get_theme_mod( 'contact_pg_map_hs','1'); 
if($contact_pg_map_hs=='1'):
	get_template_part('template-parts/sections/section','map');
endif;

// Contact Form
$contact_pg_form_hs 	= get_theme_mod( 'contact_pg_form_hs','1'); 
if($contact_pg_form_hs=='1'):
	get_template_part('template-parts/sections/section','contact-form');
endif;
?>
<?php get_footer(); ?>