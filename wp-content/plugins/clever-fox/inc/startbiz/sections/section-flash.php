<?php
if ( ! function_exists( 'startkit_info_plu' ) ) :

	function startkit_info_plu() {
	$startkit_startbiz_hide_show_info			= get_theme_mod('hide_show_info','1');
	$startkit_startbiz_info_icons				= get_theme_mod('info_icons','fa-envelope');
	$startkit_startbiz_info_image				= get_theme_mod('info_image',CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-01.jpg');
	$startkit_startbiz_info_title				= get_theme_mod('info_title',__('Design For Business','clever-fox'));
	$startkit_startbiz_info_description		= get_theme_mod('info_description',__('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox'));
	$startkit_startbiz_info_icons2			= get_theme_mod('info_icons2','fa-cart-plus');
	$startkit_startbiz_info_image2			= get_theme_mod('info_image2',CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-02.jpg');
	$startkit_startbiz_info_title2			= get_theme_mod('info_title2',__('Develop For Work','clever-fox'));
	$startkit_startbiz_info_description2		= get_theme_mod('info_description2',__('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox'));  
	$startkit_startbiz_info_icons3			= get_theme_mod('info_icons3','fa-life-saver'); 
	$startkit_startbiz_info_image3			= get_theme_mod('info_image3',CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-03.jpg');
	$startkit_startbiz_info_title3			= get_theme_mod('info_title3',__('Maketing For Blast','clever-fox'));
	$startkit_startbiz_info_description3		= get_theme_mod('info_description3',__('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox')); 
?>
<!-- Start: Features List
    ============================= -->
<?php if($startkit_startbiz_hide_show_info == '1') { ?>
    <section id="features-list">
        <div class="container">
            <div class="row text-lg-left text-md-center">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-4">
                    <div class="featured-item-inner first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="features-item-over">
                            <div class="item--featured">
								<?php if(!empty($startkit_startbiz_info_image)){ ?>
									<img src="<?php echo esc_url($startkit_startbiz_info_image); ?>" width="600" height="352" alt="update-service-01" title="update-info">
								<?php } ?>	
                                <div class="item--holder">
                                    <div class="item--holder-inner">
                                        <div class="item--icon">
                                            <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons ); ?>"></i>
                                        </div>
                                        <div class="item--primary">
                                            <h3 class="item--title"><?php echo esc_html( $startkit_startbiz_info_title ); ?></h3>
                                            <div class="item--content"><?php echo wp_kses_post( $startkit_startbiz_info_description ); ?></div>
                                            <!--div class="item-readmore">
                                                <a href="#" tabindex="0"><span>Read More</span></a>
                                            </div-->
                                        </div>
                                    </div>
                                    <div class="item-overlay"><span></span></div>
                                </div>
                            </div>
                            <div class="item--meta">
                                <div class="item--icon">
                                    <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons ); ?>"></i>
                                </div>
                                <h3 class="item--title">
                                    <a href="javaScript:void(0)" tabindex="0"><?php echo esc_html( $startkit_startbiz_info_title ); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-4">
                    <div class="featured-item-inner second wow fadeInUp" data-wow-delay="0.1s">
                        <div class="features-item-over">
                            <div class="item--featured">
                                <?php if(!empty($startkit_startbiz_info_image2)){ ?>
									<img src="<?php echo esc_url($startkit_startbiz_info_image2); ?>" width="600" height="352" alt="update-service-01" title="update-info">
								<?php } ?>	
                                <div class="item--holder">
                                    <div class="item--holder-inner">
                                        <div class="item--icon">
                                            <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons2 ); ?>"></i>
                                        </div>
                                        <div class="item--primary">
                                            <h3 class="item--title"><?php echo esc_html( $startkit_startbiz_info_title2 ); ?></h3>
                                            <div class="item--content"><?php echo wp_kses_post( $startkit_startbiz_info_description2 ); ?></div>
                                            <!--div class="item-readmore">
                                                <a href="#" tabindex="0"><span>Read More</span></a>
                                            </div-->
                                        </div>
                                    </div>
                                    <div class="item-overlay"><span></span></div>
                                </div>
                            </div>
                            <div class="item--meta">
                                <div class="item--icon">
                                    <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons2 ); ?>"></i>
                                </div>
                                <h3 class="item--title">
                                    <a href="javaScript:void(0)" tabindex="0"><?php echo esc_html( $startkit_startbiz_info_title2 ); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-4">
                    <div class="featured-item-inner third wow fadeInUp" data-wow-delay="0.1s">
                        <div class="features-item-over">
                            <div class="item--featured">
                                <?php if(!empty($startkit_startbiz_info_image3)){ ?>
									<img src="<?php echo esc_url($startkit_startbiz_info_image3); ?>" width="600" height="352" alt="update-service-01" title="update-info">
								<?php } ?>	
                                <div class="item--holder">
                                    <div class="item--holder-inner">
                                        <div class="item--icon">
                                            <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons3 ); ?>"></i>
                                        </div>
                                        <div class="item--primary">
                                            <h3 class="item--title"><?php echo esc_html( $startkit_startbiz_info_title3 ); ?></h3>
                                            <div class="item--content"><?php echo wp_kses_post( $startkit_startbiz_info_description3 ); ?></div>
                                           <!--div class="item-readmore">
                                                <a href="#" tabindex="0"><span>Read More</span></a>
                                            </div-->
                                        </div>
                                    </div>
                                    <div class="item-overlay"><span></span></div>
                                </div>
                            </div>
                            <div class="item--meta">
                                <div class="item--icon">
                                    <i class="fa <?php echo esc_attr( $startkit_startbiz_info_icons3 ); ?>"></i>
                                </div>
                                <h3 class="item--title">
                                    <a href="javaScript:void(0)" tabindex="0"><?php echo esc_html( $startkit_startbiz_info_title3 ); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } 
 }

endif;
    
	
if ( function_exists( 'startkit_info_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 12, 'startkit_info_plu' );
add_action( 'startkit_sections', 'startkit_info_plu', absint( $cleverfox_section_priority ) );

}
?>