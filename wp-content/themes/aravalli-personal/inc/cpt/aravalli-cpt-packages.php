<?php
// code for custom post type  Package
function aravalli_packages() {
	$packages_slug = get_theme_mod('packages_slug','packages'); 
	register_post_type( 'aravalli_packages',
		array(
			'labels' => array(
				'name' => __('Package', 'aravalli-pro'),
				'singular_name' => __('Package', 'aravalli-pro'),
				'add_new' => __('Add New', 'aravalli-pro'),
				'add_new_item' => __('Add New Package','aravalli-pro'),
				'edit_item' => __('Edit Package','aravalli-pro'),
				'new_item' => __('New Facebook link ','aravalli-pro'),
				'all_items' => __('All Package','aravalli-pro'),
				'view_item' => __('View Link','aravalli-pro'),
				'search_items' => __('Search Links','aravalli-pro'),
				'not_found' =>  __('No Links found','aravalli-pro'),
				'not_found_in_trash' => __('No Links found in Trash','aravalli-pro'), 
				
			),
				'supports' => array('title','thumbnail','comments'),
				'show_in_nav_menus' => false,
				'public' => true,
				'menu_position' => 20,
				'rewrite' => array('slug' => $packages_slug),
				'menu_icon' => 'dashicons-schedule',
			
		)
	);
}
add_action( 'init', 'aravalli_packages' );


// Package Meta Box

function aravalli_packages_init()
{
					
	add_meta_box('packages_all_meta', 'Package Details', 'aravalli_meta_packages','aravalli_packages', 'normal', 'high');
	
	add_action('save_post','aravalli_meta_packages_save');
}


add_action('admin_init','aravalli_packages_init');		
				

				
function aravalli_meta_packages()
{
	global $post;
	
	$popular_badge 					= sanitize_text_field( get_post_meta( get_the_ID(),'popular_badge', true ));
	$packages_ribbon_text 			= sanitize_text_field( get_post_meta( get_the_ID(),'packages_ribbon_text', true ));
	$packages_price_badge 			= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price_badge', true ));
	$packages_price					= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price', true ));
	$packages_button_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link', true ));
	$packages_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link_target', true ));
	$packages_star					= sanitize_text_field( get_post_meta( get_the_ID(),'packages_star', true ));
?>		
	<div class="inside">
	
		<label><?php _e('Popular Badge','aravalli-pro');?></label>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="popular_badge" placeholder="<?php _e('Popular','aravalli-pro');?>" type="text" value="<?php if (!empty($popular_badge)) echo esc_attr($popular_badge);?>">&nbsp;</input></p>
		
		<label><?php _e('Ribbon Text','aravalli-pro');?></label>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="packages_ribbon_text" placeholder="<?php _e('SAVE 30%','aravalli-pro');?>" type="text" value="<?php if (!empty($packages_ribbon_text)) echo esc_attr($packages_ribbon_text);?>">&nbsp;</input></p>
		
		<p><label><?php _e('Price Badge','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="packages_price_badge" placeholder="<?php _e(' 4 days 3 night','aravalli-pro');?>" type="text" value="<?php if (!empty($packages_price_badge)) echo esc_attr($packages_price_badge);?>">&nbsp;</input></p>
		
	</div>
	
	<div class="inside">
		<p><label><?php _e('Package Star','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="packages_star" placeholder="<?php _e('5','aravalli-pro');?>" type="number" value="<?php if (!empty($packages_star)) echo esc_attr($packages_star);?>" min="1" max="5">&nbsp;</input></p>
		
		<p><label><?php _e('Price','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="packages_price" placeholder="<?php _e('Price','aravalli-pro');?>" type="text" value="<?php if (!empty($packages_price)) echo esc_attr($packages_price);?>">&nbsp;</input></p>
		
		<p><label><?php _e('Package URL','aravalli-pro');?></label></p>
		<p><input style="width:100%; height:40px; padding: 10px;"  name="packages_button_link" placeholder="<?php _e('Package URL','aravalli-pro');?>" type="text" value="<?php if (!empty($packages_button_link)) echo esc_attr($packages_button_link);?>">&nbsp;</input></p>
		<p> <input name="packages_button_link_target" type="checkbox" <?php if(!empty($packages_button_link_target)) echo "checked"; ?> > </input>
		<label><?php _e('Open link in a new tab','aravalli-pro'); ?> </label> </p>
	</div>				
	
<?php 	
}


function aravalli_meta_packages_save($post_id) 
{
if(isset( $_POST['post_ID']))
{ 	
	$post_ID = $_POST['post_ID'];				
	$post_type=get_post_type($post_ID);
	if($post_type=='aravalli_packages')
	{	
	update_post_meta($post_ID, 'popular_badge', sanitize_text_field($_POST['popular_badge']));
	update_post_meta($post_ID, 'packages_ribbon_text', sanitize_text_field($_POST['packages_ribbon_text']));
	update_post_meta($post_ID, 'packages_price_badge', sanitize_text_field($_POST['packages_price_badge']));
	update_post_meta($post_ID, 'packages_price', sanitize_text_field($_POST['packages_price']));
	update_post_meta($post_ID, 'packages_button_link', sanitize_text_field($_POST['packages_button_link']));
	update_post_meta($post_ID, 'packages_button_link_target', sanitize_text_field($_POST['packages_button_link_target']));
	update_post_meta($post_ID, 'packages_star', sanitize_text_field($_POST['packages_star']));
	}
}
}
		
// Package Category Texonomy

function aravalli_packages_taxonomy() {

$texo_packages_slug = get_theme_mod('texo_packages_slug','packages_category'); 
register_taxonomy('packages_categories', 'aravalli_packages',
	array(
		'hierarchical' => true,
		'label' => 'Package Categories',
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => array('slug' => $texo_packages_slug )
	)
);


//Default category id		
$defualt_tex_id = get_option('custom_texo_packages_id');
//quick update category
if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
	wp_update_term($_POST['tax_ID'], 'packages_categories', array(
	  'name' => $_POST['name'],
	  'slug' => $_POST['slug']
	));	
	update_option('custom_texo_packages_id', $defualt_tex_id);
}
else 
{ 	//insert default category 
	if(!$defualt_tex_id){
		wp_insert_term('ALL','packages_categories', array('description'=> 'Default Category','slug' => 'All'));
		$Current_text_id = term_exists('ALL', 'packages_categories');
		update_option('custom_texo_packages_id', $Current_text_id['term_id']);
	}
}
//update category
if(isset($_POST['submit']) && isset($_POST['action']) )
{	wp_update_term(isset($_POST['tag_ID']), 'packages_categories', array(
	  'name' => isset($_POST['name']),
	  'slug' => isset($_POST['slug']),
	  'description' => isset($_POST['description'])
	));
}
// Delete default category
if(isset($_POST['action']) && isset($_POST['tag_ID']) )
{	if(($_POST['tag_ID'] == $defualt_tex_id) && $_POST['action']	 =="delete-tag")
	{	
		delete_option('custom_texo_packages_id'); 
	} 
}
}
add_action( 'init', 'aravalli_packages_taxonomy' );
