<?php
// code for custom post type  Project
		function nexcraft_project() {
	
			$project_slug = get_theme_mod('project_slug','project'); 
			register_post_type( 'nexcraft_project',
				array(
					'labels' => array(
						'name' => __('Project', 'clever-fox'),
						'singular_name' => __('Project', 'clever-fox'),
						'add_new' => __('Add New', 'clever-fox'),
						'add_new_item' => __('Add New Project','clever-fox'),
						'edit_item' => __('Edit Project','clever-fox'),
						'new_item' => __('New Facebook link ','clever-fox'),
						'all_items' => __('All Project','clever-fox'),
						'view_item' => __('View Link','clever-fox'),
						'search_items' => __('Search Links','clever-fox'),
						'not_found' =>  __('No Links found','clever-fox'),
						'not_found_in_trash' => __('No Links found in Trash','clever-fox'), 
						
					),
						'supports' => array('title','thumbnail','comments'),
						'show_in_nav_menus' => false,
						'public' => true,
						'menu_position' => 20,
						'rewrite' => array('slug' => $project_slug),
						'menu_icon' => 'dashicons-schedule',
					
				)
			);
		}
		add_action( 'init', 'nexcraft_project' );


		// Project Meta Box

		function nexcraft_project_init()
		{
							
			add_meta_box('project_all_meta', 'Project Description', 'nexcraft_meta_project','nexcraft_project', 'normal', 'high');
			
			add_action('save_post','nexcraft_meta_project_save');
		}


		add_action('admin_init','nexcraft_project_init');		
						

						
		function nexcraft_meta_project()
		{
			global $post;
			
			wp_nonce_field('nexproj_nonce_action', 'nexproj_client_nonce'); //Add NONCE FIELD	
			wp_nonce_field('update_project_category', '_wpnonce');
			
			$project_button_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'project_button_link', true ));
			$project_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'project_button_link_target', true ));
		?>	
			
			<h3><i><?php esc_html_e('Project Single View Detail','clever-fox'); ?></i></h3>

			
			<div class="inside">				
				<p><label><?php echo esc_html__('Project URL','clever-fox'); ?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;"  name="project_button_link" placeholder="<?php echo esc_html__('Project URL','clever-fox'); ?>" type="text" value="<?php if (!empty($project_button_link)) echo esc_attr($project_button_link);?>">&nbsp;</input></p>
				<p> <input name="project_button_link_target" type="checkbox" <?php if(!empty($project_button_link_target)) echo "checked"; ?> > </input>
				<label><?php echo esc_html__('Open link in a new tab','clever-fox'); ?> </label> </p>
			</div>				
			
		<?php 	
		}


		function nexcraft_meta_project_save($post_id) {
				
			if (!isset($_POST['nexproj_client_nonce'])) {
				return;
			}
			if (!wp_verify_nonce(sanitize_key($nexnonce), 'nexproj_nonce_action')) {
				return;
			}
			if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit'])) {
				return;
			}
			if (!current_user_can('edit_post', $post_id)) {
				return;
			}
			if(isset( $_POST['post_ID']))
			{ 	
				$post_ID = intval($_POST['post_ID']);				
				$post_type=get_post_type($post_ID);
				if($post_type=='nexcraft_project')
				{
					if (isset($_POST['project_button_link'])) {
						$button_link_sani_unslash = esc_url_raw(wp_unslash($_POST['project_button_link']));
						update_post_meta($post_id, 'project_button_link', $button_link_sani_unslash);
						
						$project_button_link_target = isset($_POST['project_button_link_target']) ? '1' : '0';
						update_post_meta($post_id, 'project_button_link_target', $button_link_target_sani_unslash);
					}		
				}
			}
		}

		
	// Project Category Texonomy		
	
	function nexcraft_project_taxonomy() {
    // Get theme mod or fallback to 'project_category'
    $texo_project_slug = get_theme_mod('texo_project_slug', 'project_category'); 
    
    // Register the taxonomy
    register_taxonomy('project_categories', 'nexcraft_project',
        array(
            'hierarchical' => true,
            'label' => 'Project Categories',
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => array('slug' => $texo_project_slug)
        )
    );
    
    // Default category id
    $defualt_tex_id = get_option('custom_texo_project_id');
    
    // Check if nonce is set and valid (form submission)
    if (isset($_POST['action'], $_POST['taxonomy'], $_POST['_wpnonce'])) {
        // Unsanitize the nonce before verification
        $nonce = sanitize_key($_POST['_wpnonce']); 
        
        // Verify the nonce (the second parameter is the action name)
        if (wp_verify_nonce($nonce, 'update_project_category')) {
            // Sanitize inputs
            $tax_ID = isset($_POST['tax_ID']) ? intval($_POST['tax_ID']) : 0;
            $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
            $slug = isset($_POST['slug']) ? sanitize_title(wp_unslash($_POST['slug'])) : '';
            
            if ($tax_ID && !empty($name)) {
                wp_update_term($tax_ID, 'project_categories', array(
                    'name' => $name,
                    'slug' => $slug
                ));
                
                update_option('custom_texo_project_id', $defualt_tex_id);
            }
        } else {
            wp_die('Invalid nonce.');
        }
    }
    
    // Insert default category if not exists
    if (!$defualt_tex_id) {
        wp_insert_term('All', 'project_categories', array(
            'description' => 'Default Category',
            'slug' => 'All'
        ));
        
        $Current_text_id = term_exists('All', 'project_categories');
        if ($Current_text_id && isset($Current_text_id['term_id'])) {
            update_option('custom_texo_project_id', $Current_text_id['term_id']);
        }
    }
    
    // Update category via POST
    if (isset($_POST['submit'], $_POST['action'], $_POST['_wpnonce'])) {
        // Unsanitize the nonce before verification
        $nonce = sanitize_key($_POST['_wpnonce']); 
        
        // Verify the nonce (the second parameter is the action name)
        if (wp_verify_nonce($nonce, 'update_project_category')) {
            
            // Sanitize inputs
            $tag_ID = isset($_POST['tag_ID']) ? intval($_POST['tag_ID']) : 0;
            $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
            $slug = isset($_POST['slug']) ? sanitize_title(wp_unslash($_POST['slug'])) : '';
            $description = isset($_POST['description']) ? sanitize_textarea_field(wp_unslash($_POST['description'])) : '';
            
            if ($tag_ID && !empty($name)) {
                wp_update_term($tag_ID, 'project_categories', array(
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description
                ));
            }
        } else {
            wp_die('Invalid nonce.');
        }
    }
    
    // Delete category if it matches default
    if (isset($_POST['action'], $_POST['tag_ID'], $_POST['_wpnonce'])) {
        // Unsanitize the nonce before verification
        $nonce = sanitize_key($_POST['_wpnonce']); 
        
        // Verify the nonce (the second parameter is the action name)
        if (wp_verify_nonce($nonce, 'delete_project_category')) {
            $tag_ID = intval($_POST['tag_ID']);
            
            if ($tag_ID === $defualt_tex_id && $_POST['action'] === 'delete-tag') {
                delete_option('custom_texo_project_id');
            }
        } else {
            wp_die('Invalid nonce.');
        }
    }
}
add_action('init', 'nexcraft_project_taxonomy');




?>