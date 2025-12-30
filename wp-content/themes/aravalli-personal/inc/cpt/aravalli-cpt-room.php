<?php
// code for custom post type  portfolio
function aravalli_room() {
	$room_slug = get_theme_mod('room_slug','room'); 
	register_post_type( 'aravalli_room',
		array(
			'labels' => array(
				'name' => __('Room', 'aravalli-pro'),
				'singular_name' => __('Room', 'aravalli-pro'),
				'add_new' => __('Add New', 'aravalli-pro'),
				'add_new_item' => __('Add New Room','aravalli-pro'),
				'edit_item' => __('Edit Room','aravalli-pro'),
				'new_item' => __('New Facebook link ','aravalli-pro'),
				'all_items' => __('All Room','aravalli-pro'),
				'view_item' => __('View Link','aravalli-pro'),
				'search_items' => __('Search Links','aravalli-pro'),
				'not_found' =>  __('No Links found','aravalli-pro'),
				'not_found_in_trash' => __('No Links found in Trash','aravalli-pro'), 
				
			),
				'supports' => array('title','thumbnail','comments','editor'),
				'show_in_nav_menus' => false,
				'public' => true,
				'menu_position' => 20,
				'rewrite' => array('slug' => $room_slug),
				'menu_icon' => 'dashicons-schedule',
			
		)
	);
}
add_action( 'init', 'aravalli_room' );


// Room Meta Box

function aravalli_room_init()
{
					
	add_meta_box('room_all_meta', 'Room Details', 'aravalli_meta_room','aravalli_room', 'normal', 'high');
	
	add_action('save_post','aravalli_meta_room_save');
}


add_action('admin_init','aravalli_room_init');		
				

				
function aravalli_meta_room()
{
	global $post;
	
	$room_ribbon_text 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_ribbon_text', true ));
	$room_price_badge 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_price_badge', true ));
	$room_description 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_description', true ));
	$room_btn_lbl				= sanitize_text_field( get_post_meta( get_the_ID(),'room_btn_lbl', true ));
	$room_button_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link', true ));
	$room_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link_target', true ));
	$room_star					= sanitize_text_field( get_post_meta( get_the_ID(),'room_star', true ));
?>		
	<div class="inside">
	
		<label><?php _e('Ribbon Text','aravalli-pro');?></label>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="room_ribbon_text" placeholder="<?php _e('10% OFF','aravalli-pro');?>" type="text" value="<?php if (!empty($room_ribbon_text)) echo esc_attr($room_ribbon_text);?>">&nbsp;</input></p>
		
		<p><label><?php _e('Price Badge','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="room_price_badge" placeholder="<?php _e(' $1200/ Night','aravalli-pro');?>" type="text" value="<?php if (!empty($room_price_badge)) echo esc_attr($room_price_badge);?>">&nbsp;</input></p>
		
		<label><?php _e('Description','aravalli-pro');?></label>
		<p><textarea style="width:100%; height:100px; padding: 10px;" placeholder="<?php _e('Description','aravalli-pro');?>" name="room_description" rows="5" cols="10" ><?php if (!empty($room_description)) echo esc_attr($room_description);?></textarea></p>
	</div>
	
	<div class="inside">
		<p><label><?php _e('Button Label','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="room_btn_lbl" placeholder="<?php _e('Button Label','aravalli-pro');?>" type="text" value="<?php if (!empty($room_btn_lbl)) echo esc_attr($room_btn_lbl);?>">&nbsp;</input></p>
		
		<p><label><?php _e('Button URL','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="room_button_link" placeholder="<?php _e('Button URL','aravalli-pro');?>" type="text" value="<?php if (!empty($room_button_link)) echo esc_attr($room_button_link);?>">&nbsp;</input></p>
		<p> <input name="room_button_link_target" type="checkbox" <?php if(!empty($room_button_link_target)) echo "checked"; ?> > </input>
		<label><?php _e('Open link in a new tab','aravalli-pro'); ?> </label> </p>
		
		<p><label><?php _e('Room Star','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="room_star" placeholder="<?php _e('5','aravalli-pro');?>" type="number" value="<?php if (!empty($room_star)) echo esc_attr($room_star);?>" min="1" max="5">&nbsp;</input></p>
	</div>				
	
<?php 	
}


function aravalli_meta_room_save($post_id) 
{
if(isset( $_POST['post_ID']))
{ 	
	$post_ID = $_POST['post_ID'];				
	$post_type=get_post_type($post_ID);
	if($post_type=='aravalli_room')
	{	
	update_post_meta($post_ID, 'room_ribbon_text', sanitize_text_field($_POST['room_ribbon_text']));
	update_post_meta($post_ID, 'room_price_badge', sanitize_text_field($_POST['room_price_badge']));
	update_post_meta($post_ID, 'room_description', sanitize_text_field($_POST['room_description']));
	update_post_meta($post_ID, 'room_btn_lbl', sanitize_text_field($_POST['room_btn_lbl']));
	update_post_meta($post_ID, 'room_button_link', sanitize_text_field($_POST['room_button_link']));
	update_post_meta($post_ID, 'room_button_link_target', sanitize_text_field($_POST['room_button_link_target']));
	update_post_meta($post_ID, 'room_star', sanitize_text_field($_POST['room_star']));
	}
}
}
		
// Room Category Texonomy

function aravalli_room_taxonomy() {

$texo_room_slug = get_theme_mod('texo_room_slug','room_category'); 
register_taxonomy('room_categories', 'aravalli_room',
	array(
		'hierarchical' => true,
		'label' => 'Room Categories',
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => array('slug' => $texo_room_slug )
	)
);


//Default category id		
$defualt_tex_id = get_option('custom_texo_room_id');
//quick update category
if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
	wp_update_term($_POST['tax_ID'], 'room_categories', array(
	  'name' => $_POST['name'],
	  'slug' => $_POST['slug']
	));	
	update_option('custom_texo_room_id', $defualt_tex_id);
}
else 
{ 	//insert default category 
	if(!$defualt_tex_id){
		wp_insert_term('ALL','room_categories', array('description'=> 'Default Category','slug' => 'All'));
		$Current_text_id = term_exists('ALL', 'room_categories');
		update_option('custom_texo_room_id', $Current_text_id['term_id']);
	}
}
//update category
if(isset($_POST['submit']) && isset($_POST['action']) )
{	wp_update_term(isset($_POST['tag_ID']), 'room_categories', array(
	  'name' => isset($_POST['name']),
	  'slug' => isset($_POST['slug']),
	  'description' => isset($_POST['description'])
	));
}
// Delete default category
if(isset($_POST['action']) && isset($_POST['tag_ID']) )
{	if(($_POST['tag_ID'] == $defualt_tex_id) && $_POST['action']	 =="delete-tag")
	{	
		delete_option('custom_texo_room_id'); 
	} 
}
}
add_action( 'init', 'aravalli_room_taxonomy' );
