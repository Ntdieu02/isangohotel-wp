<?php
/**
 * Aravalli Theme Customizer.
 *
 * @package Aravalli
 */

 if ( ! class_exists( 'Aravalli_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Aravalli_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'aravalli_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'aravalli_customizer_script' ) );
			add_action( 'customize_controls_enqueue_scripts',      array( $this, 'aravalli_controls_scripts' ) );
			add_action( 'customize_register',                      array( $this, 'aravalli_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'aravalli_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function aravalli_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'Aravalli_Control_Sortable' );
			$wp_customize->register_control_type( 'Aravalli_Customizer_Range_Control' );
			
			/**
			 * Helper files
			 */
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-controls.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		/**
		 * Customizer Controls
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function aravalli_controls_scripts() {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				
			// Customizer Core.
			wp_enqueue_script( 'aravalli-customizer-controls-toggle-js', ARAVALLI_PARENT_INC_URI . '/customizer/assets/js/customizer-toggle-control' . $js_prefix, array(), ARAVALLI_THEME_VERSION, true );

			// Customizer Controls.
			wp_enqueue_script( 'aravalli-customizer-controls-js', ARAVALLI_PARENT_INC_URI . '/customizer/assets/js/customizer-control' . $js_prefix, array( 'aravalli-customizer-controls-toggle-js' ), ARAVALLI_THEME_VERSION, true );
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function aravalli_customize_preview_js() {
			wp_enqueue_script( 'aravalli-customizer', ARAVALLI_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function aravalli_customizer_script() {
			 wp_enqueue_script( 'aravalli-customizer-section', ARAVALLI_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}
		
		// Include customizer customizer settings.
			
		function aravalli_customizer_settings() {
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-header.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-slider.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-checkin.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-features.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-room.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-gallery.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-testimonial.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-funfact.php';
		    require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-promotional.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-newsletter.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-blog.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-custom.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-footer.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-page-templates.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-general.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-sidebar.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-section_manager.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-style-configurator.php';
			require ARAVALLI_PARENT_INC_DIR . '/customizer/customizer-options/aravalli-typography.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Aravalli_Customizer::get_instance();