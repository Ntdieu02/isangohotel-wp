<?php
/* Shortcode for frontpage section
Slider section:			[Aravalli_Slider]
Checkin section:		[Aravalli_Checkin]
Room section:			[Aravalli_Room]
Features section:		[Aravalli_Features]
Gallery section:		[Aravalli_Gallery]
Testimonial section:	[Aravalli_Testimonial]
Funfact section:		[Aravalli_Funfact]
Promotional section:	[Aravalli_Promotional]
Newsletter section:		[Aravalli_Newsletter]
Blog section:			[Aravalli_Blog]
Custom section:			[Aravalli_Custom]
Amenities section:		[Aravalli_Amenities]
Team section:			[Aravalli_Team]
Certificates section:	[Aravalli_Certificates]
CTA section:			[Aravalli_CTA]
Contact section:		[Aravalli_Contact]
Map section:			[Aravalli_Map]
Contact Form section:	[Aravalli_Contact_Form]
*/

/* Shortcode for Slider Section */
function aravalli_slider_shortcode() {
	get_template_part('template-parts/sections/section','slider');
}
add_shortcode('Aravalli_Slider', 'aravalli_slider_shortcode');


/* Shortcode for Checkin Section */
function aravalli_checkin_shortcode() {
	get_template_part('template-parts/sections/section','checkin');
}
add_shortcode('Aravalli_Checkin', 'aravalli_checkin_shortcode');


/* Shortcode for Room Section */
function aravalli_room_shortcode() {
	get_template_part('template-parts/sections/section','room');
}
add_shortcode('Aravalli_Room', 'aravalli_room_shortcode');


/* Shortcode for Features Section */
function aravalli_features_shortcode() {
	get_template_part('template-parts/sections/section','features');
}
add_shortcode('Aravalli_Features', 'aravalli_features_shortcode');


/* Shortcode for Gallery Section */
function aravalli_gallery_shortcode() {
	get_template_part('template-parts/sections/section','gallery');
}
add_shortcode('Aravalli_Gallery', 'aravalli_gallery_shortcode');


/* Shortcode for Testimonial Section */
function aravalli_testimonial_shortcode() {
	get_template_part('template-parts/sections/section','testimonial');
}
add_shortcode('Aravalli_Testimonial', 'aravalli_testimonial_shortcode');



/* Shortcode for Funfact Section */
function aravalli_funtfact_shortcode() {
	get_template_part('template-parts/sections/section','funfact');
}
add_shortcode('Aravalli_Funfact', 'aravalli_funtfact_shortcode');


/* Shortcode for Promotional Section */
function aravalli_promotional_shortcode() {
	get_template_part('template-parts/sections/section','promotional');
}
add_shortcode('Aravalli_Promotional', 'aravalli_promotional_shortcode');



/* Shortcode for Newsletter Section */
function aravalli_newsletter_shortcode() {
	get_template_part('template-parts/sections/section','newsletter');
}
add_shortcode('Aravalli_Newsletter', 'aravalli_newsletter_shortcode');


/* Shortcode for Blog Section */
function aravalli_blog_shortcode() {
	get_template_part('template-parts/sections/section','blog');
}
add_shortcode('Aravalli_Blog', 'aravalli_blog_shortcode');


/* Shortcode for Custom Section */
function aravalli_custom_shortcode() {
	get_template_part('template-parts/sections/section','custom');
}
add_shortcode('Aravalli_Custom', 'aravalli_custom_shortcode');



/* Shortcode for Amenities Section */
function aravalli_amenities_shortcode() {
	get_template_part('template-parts/sections/section','amenities');
}
add_shortcode('Aravalli_Amenities', 'aravalli_amenities_shortcode');


/* Shortcode for Team Section */
function aravalli_team_shortcode() {
	get_template_part('template-parts/sections/section','team');
}
add_shortcode('Aravalli_Team', 'aravalli_team_shortcode');


/* Shortcode for Certificates Section */
function aravalli_certificates_shortcode() {
	get_template_part('template-parts/sections/section','certificates');
}
add_shortcode('Aravalli_Certificates', 'aravalli_certificates_shortcode');



/* Shortcode for CTA Section */
function aravalli_cta_shortcode() {
	get_template_part('template-parts/sections/section','cta');
}
add_shortcode('Aravalli_CTA', 'aravalli_cta_shortcode');


/* Shortcode for Contact Section */
function aravalli_contact_shortcode() {
	get_template_part('template-parts/sections/section','contact');
}
add_shortcode('Aravalli_Contact', 'aravalli_contact_shortcode');


/* Shortcode for Map Section */
function aravalli_map_shortcode() {
	get_template_part('template-parts/sections/section','map');
}
add_shortcode('Aravalli_Map', 'aravalli_map_shortcode');

/* Shortcode for Contact Form Section */
function aravalli_contact_form_shortcode() {
	get_template_part('template-parts/sections/section','contact-form');
}
add_shortcode('Aravalli_Contact_Form', 'aravalli_contact_form_shortcode');