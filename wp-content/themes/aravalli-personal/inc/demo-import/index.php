<?php
function aravalli_import_files() {
    return array(
        array(
            'import_file_name'             => 'Aravalli',
            'categories'                   => array( 'Aravalli' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/aravalli-site.xml',
			
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/aravalli-widget.json',
			
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/aravalli-settings.dat',
			
			'import_preview_image_url'     => 'http://nayrathemes.com/demo/import/aravalli/aravalli.jpg',

            'import_notice'                => __( 'Demo Importing process will take some time. Kindly be patience.', 'aravalli-pro' ),
        ),
		 array(
            'import_file_name'             => 'Arbuda',
            'categories'                   => array( 'Arbuda' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/arbuda-site.xml',
			
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/arbuda-widget.json',
			
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-import/file/arbuda-settings.dat',
			
			'import_preview_image_url'     => 'http://nayrathemes.com/demo/import/aravalli/arbuda.jpg',

            'import_notice'                => __( 'Demo Importing process will take some time. Kindly be patience.', 'aravalli-pro' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'aravalli_import_files' );


function aravalli_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary_menu' => $main_menu->term_id,
        )
    );
	
	set_theme_mod( 'nav_menu_locations', array(
            'footer_menu' => $footer_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'aravalli_after_import_setup' );


function aravalli_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-text"><h4>Do you want to import Premade Demos? Just click on Import button<h4></div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'aravalli_plugin_intro_text' );


function aravalli_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'aravalli-pro' );
    $default_settings['menu_title']  = esc_html__( 'Premade Demos' , 'aravalli-pro' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'aravalli_plugin_page_setup' );