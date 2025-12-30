<?php 
/**
Template Name: Homepage
*/

get_header();

$section_reorder 		= get_theme_mod( 'section_reorder', array( 'slider','checkin','room','features','gallery','testimonial','funfact','promotional','newsletter','blog')); 

foreach ( $section_reorder as $data_order ) : 

	if ( 'slider' === $data_order ) :
	
		get_template_part('template-parts/sections/section','slider');
		
	 elseif ( 'checkin' === $data_order ) : 
		
		get_template_part('template-parts/sections/section','checkin'); 
		
	elseif ( 'room' === $data_order ) : 	
		
		get_template_part('template-parts/sections/section','room'); 
		
	elseif ( 'features' === $data_order ) :			
		
		get_template_part('template-parts/sections/section','features');	
	
	elseif ( 'gallery' === $data_order ) : 			
		
		get_template_part('template-parts/sections/section','gallery');
	
	elseif ( 'testimonial' === $data_order ) :	
		
		get_template_part('template-parts/sections/section','testimonial');	

	elseif ( 'funfact' === $data_order ) :	
		
		get_template_part('template-parts/sections/section','funfact');	
	
	elseif ( 'promotional' === $data_order ) :	
		
		get_template_part('template-parts/sections/section','promotional');
	
	elseif ( 'newsletter' === $data_order ) :		
		
		get_template_part('template-parts/sections/section','newsletter');
		
	elseif ( 'blog' === $data_order ) :		
		
		get_template_part('template-parts/sections/section','blog');	
	
	elseif ( 'amenities' === $data_order ) :			
		
		get_template_part('template-parts/sections/section','amenities');	
	
	elseif ( 'team' === $data_order ) :		
			
		get_template_part('template-parts/sections/section','team'); 
	
	elseif ( 'certificates' === $data_order ) : 		
		
		get_template_part('template-parts/sections/section','certificates');
		
	elseif ( 'cta' === $data_order ) : 		
		
		get_template_part('template-parts/sections/section','cta');
		
	elseif ( 'contact' === $data_order ) : 		
		
		get_template_part('template-parts/sections/section','contact');	
		
	elseif ( 'map' === $data_order ) : 		
		
		get_template_part('template-parts/sections/section','map');	

	elseif ( 'form' === $data_order ) : 		
		
		get_template_part('template-parts/sections/section','contact-form');		
		
	elseif ( 'custom' === $data_order ) :		
	
		get_template_part('template-parts/sections/section','custom');
		
   endif; endforeach;	
	
 get_footer(); ?>