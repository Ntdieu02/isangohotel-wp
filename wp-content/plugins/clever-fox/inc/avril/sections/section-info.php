<?php 
	if ( ! function_exists( 'avril_lite_info' ) ) :
		function avril_lite_info() {
	$avril_hs_info				= get_theme_mod('hs_info','1');		
	$avril_info_first_icon_setting= get_theme_mod('info_first_icon_setting','fa-clock-o'); 
	$avril_info_title				= get_theme_mod('info_title',__('Opening Hours','clever-fox'));
	$avril_info_description		= get_theme_mod('info_description',__('Monday-Friday: 09:00-22:00','clever-fox'));
	$avril_info_link				= get_theme_mod('info_link','#');
	
	$avril_info_second_icon_setting= get_theme_mod('info_second_icon_setting','fa-home'); 
	$avril_info_title2			= get_theme_mod('info_title2',__('Our Location','clever-fox'));
	$avril_info_description2		= get_theme_mod('info_description2',__('California Floor, USA 1208','clever-fox'));
	$avril_info_link2				= get_theme_mod('info_link2','#');
	
	$avril_info_third_icon_setting= get_theme_mod('info_third_icon_setting','fa-calendar');	
	$avril_info_title3			= get_theme_mod('info_title3',__('Booking Now','clever-fox'));
	$avril_info_description3		= get_theme_mod('info_description3',__('+00-245-152-5500','clever-fox')); 
	$avril_info_link3				= get_theme_mod('info_link3','#');	 
if($avril_hs_info == '1') {		
?> 
 <div id="info-section" class="info-section">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <ul class="info-wrapper wow fadeInUp">
                        <li class="info-first">
                            <aside class="widget widget-contact">
                                <div class="contact-area">
                                    <div class="contact-icon">
										<i class="fa <?php echo esc_attr( $avril_info_first_icon_setting ); ?>"></i>
                                    </div>
                                    <a href="<?php echo esc_url( $avril_info_link ); ?>" class="contact-info">
                                        <span class="text"><?php echo esc_html($avril_info_title); ?></span>
                                        <span class="title"><?php echo esc_html( $avril_info_description ); ?></span>
                                    </a>
                                </div>
                            </aside>
                        </li>
                        <li class="info-second">
                            <aside class="widget widget-contact">
                                <div class="contact-area">
                                    <div class="contact-icon">
										<i class="fa <?php echo esc_attr( $avril_info_second_icon_setting ); ?>"></i>
                                    </div>
                                    <a href="<?php echo esc_url( $avril_info_link2 ); ?>" class="contact-info">
										 <span class="text"><?php echo esc_html($avril_info_title2); ?></span>
										 <span class="title"><?php echo esc_html($avril_info_description2); ?></span>
                                    </a>
                                </div>
                            </aside>
                        </li>
                        <li class="info-third">
                            <aside class="widget widget-contact">
                                <div class="contact-area">
                                    <div class="contact-icon">
										<i class="fa <?php echo esc_attr( $avril_info_third_icon_setting ); ?>"></i>
                                    </div>
                                    <a href="<?php echo esc_url( $avril_info_link3 ); ?>" class="contact-info">
                                         <span class="text"><?php echo esc_html($avril_info_title3); ?></span>
                                        <span class="title"><?php echo esc_html($avril_info_description3); ?></span>
                                    </a>
                                </div>
                            </aside>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php	
		}} endif; 
	if ( function_exists( 'avril_lite_info' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 12, 'avril_lite_info' );
		add_action( 'avril_sections', 'avril_lite_info', absint( $cleverfox_section_priority ) );
	}