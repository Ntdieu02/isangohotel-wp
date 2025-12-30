<?php
	//post status and options
	$post = array(
		  'comment_status' => 'closed',
		  'ping_status' =>  'closed' ,
		  'post_author' => 1,
		  'post_date' => gmdate('Y-m-d H:i:s'),
		  'post_name' => 'Home',
		  'post_status' => 'publish' ,
		  'post_title' => 'Home',
		  'post_type' => 'page',
	);  
	//insert page and save the id
	$cleverfox_newvalue = wp_insert_post( $post, false );
	if ( $cleverfox_newvalue && ! is_wp_error( $cleverfox_newvalue ) ){
		update_post_meta( $cleverfox_newvalue, '_wp_page_template', 'templates/template-homepage.php' );
		
		// Use a static front page
		$cleverfox_array_of_objects = get_posts([
			'title' => 'Home',
			'post_type' => 'any',
		]);
		$cleverfox_page = $cleverfox_array_of_objects[0];//Be sure you have an array with single post or page
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $cleverfox_page->ID );
		
	}

set_theme_mod('footer_logo',CLEVERFOX_PLUGIN_URL .'inc/websy/images/footer-logo.png' );
set_theme_mod('tlh_email_title',__('Email Us','clever-fox') );
set_theme_mod('tlh_email_link',__('email@company.com','clever-fox') );
set_theme_mod('tlh_mobile_title',__('Call Us','clever-fox') );
set_theme_mod('tlh_mobile_link',__('70 975 975 70','clever-fox') );
set_theme_mod('nav_btn2_lbl',__('Consult Now','clever-fox') );

$cleverfox_theme = wp_get_theme() -> get('Name');
$cleverfox_theme_name = strtolower(str_replace(' ','-',$cleverfox_theme)); 
set_theme_mod('footer_logo',CLEVERFOX_PLUGIN_URL .'inc/'.esc_html($cleverfox_theme_name).'/images/footer-logo.png' );