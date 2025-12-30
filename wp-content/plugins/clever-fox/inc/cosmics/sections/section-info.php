<?php
	if ( ! function_exists( 'hantus_lite_info' ) ) :
	function hantus_lite_info() {
		$hantus_hide_show_info			= get_theme_mod('hide_show_info','1');
		$hantus_info_first_img_setting	= get_theme_mod('info_first_img_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon01.jpg'));
		$hantus_info_title				= get_theme_mod('info_title',__('Pedicure','clever-fox'));
		$hantus_info_description		= get_theme_mod('info_description',__('$hantus_49','clever-fox'));
		$hantus_info_btn				= get_theme_mod('info_btn','<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
		$hantus_info_link				= get_theme_mod('info_link','#');
		
		$hantus_info_second_img_setting= get_theme_mod('info_second_img_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon02.jpg'));
		$hantus_info_title2			= get_theme_mod('info_title2',__('Body Wraps','clever-fox'));
		$hantus_info_description2		= get_theme_mod('info_description2',__('$hantus_29','clever-fox'));
		$hantus_info_btn2				= get_theme_mod('info_btn2','<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
		$hantus_info_link2				= get_theme_mod('info_link2','#');
		
		$hantus_info_third_img_setting	= get_theme_mod('info_third_img_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon03.jpg'));		
		$hantus_info_title3			= get_theme_mod('info_title3',__('Menicures','clever-fox'));
		$hantus_info_description3		= get_theme_mod('info_description3',__('$hantus_79','clever-fox')); 
		$hantus_info_btn3				= get_theme_mod('info_btn3','<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
		$hantus_info_link3				= get_theme_mod('info_link3','#');	

		$hantus_info_four_img_setting	= get_theme_mod('info_four_img_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon02.jpg'));		
		$hantus_info_title4			= get_theme_mod('info_title4',__('Facials','clever-fox'));
		$hantus_info_description4		= get_theme_mod('info_description4',__('$hantus_29','clever-fox')); 
		$hantus_info_btn4				= get_theme_mod('info_btn4','<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
		$hantus_info_link4				= get_theme_mod('info_link4','#');	

		$hantus_info_five_img_setting	= get_theme_mod('info_five_img_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon01.jpg'));		
		$hantus_info_title5			= get_theme_mod('info_title5',__('Waxing','clever-fox'));
		$hantus_info_description5		= get_theme_mod('info_description5',__('$hantus_69','clever-fox')); 
		$hantus_info_btn5				= get_theme_mod('info_btn5','<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
		$hantus_info_link5				= get_theme_mod('info_link5','#');			
?>
	<?php if($hantus_hide_show_info == '1') { ?>
	<section id="contact2" class="info-cosmics">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
	            	<ul class="info-wrapper">
	                    <li class="info-first">
	                        <aside class="single-info-cosmics">
	                        	<?php if ( ! empty( $hantus_info_first_img_setting ) ) { ?>
	                            <img src="<?php echo esc_url( $hantus_info_first_img_setting ); ?>" <?php if ( ! empty( $hantus_info_title ) ) : ?> alt="<?php echo esc_attr( $hantus_info_title ); ?>" title="<?php echo esc_attr( $hantus_info_title ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
										<h4><?php echo esc_html( $hantus_info_title ); ?></h4>
										<p><?php echo esc_html( $hantus_info_description ); ?></p>
									</div>
	                                <a href="<?php echo esc_url($hantus_info_link); ?>" class="btn-info"><?php echo wp_kses_post($hantus_info_btn); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                    <li class="info-second">
	                        <aside class="single-info-cosmics">
	                        	<?php if ( ! empty( $hantus_info_second_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $hantus_info_second_img_setting ); ?>" <?php if ( ! empty( $hantus_info_title2 ) ) : ?> alt="<?php echo esc_attr( $hantus_info_title2 ); ?>" title="<?php echo esc_attr( $hantus_info_title2 ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
										<h4><?php echo esc_html( $hantus_info_title2 ); ?></h4>
										<p><?php echo esc_html( $hantus_info_description2 ); ?></p>
									</div>
	                                <a href="<?php echo esc_url($hantus_info_link2); ?>" class="btn-info"><?php echo wp_kses_post($hantus_info_btn2); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                    <li class="info-third">
	                        <aside class="single-info-cosmics">
	                        	<?php if ( ! empty( $hantus_info_third_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $hantus_info_third_img_setting ); ?>" <?php if ( ! empty( $hantus_info_title3 ) ) : ?> alt="<?php echo esc_attr( $hantus_info_title3 ); ?>" title="<?php echo esc_attr( $hantus_info_title3 ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
										<h4><?php echo esc_html( $hantus_info_title3 ); ?></h4>
										<p><?php echo esc_html( $hantus_info_description3 ); ?></p>
									</div>
	                                <a href="<?php echo esc_url($hantus_info_link3); ?>" class="btn-info"><?php echo wp_kses_post($hantus_info_btn3); ?></a>
	                            </div>
	                        </aside>
	                    </li>
						<li class="info-four">
	                        <aside class="single-info-cosmics">
	                        	<?php if ( ! empty( $hantus_info_four_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $hantus_info_four_img_setting ); ?>" <?php if ( ! empty( $hantus_info_title4 ) ) : ?> alt="<?php echo esc_attr( $hantus_info_title4 ); ?>" title="<?php echo esc_attr( $hantus_info_title4 ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
										<h4><?php echo esc_html( $hantus_info_title4 ); ?></h4>
										<p><?php echo esc_html( $hantus_info_description4 ); ?></p>
									</div>
	                                <a href="<?php echo esc_url($hantus_info_link4); ?>" class="btn-info"><?php echo wp_kses_post($hantus_info_btn4); ?></a>
	                            </div>
	                        </aside>
	                    </li>
						<li class="info-five">
	                        <aside class="single-info-cosmics">
	                        	<?php if ( ! empty( $hantus_info_five_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $hantus_info_five_img_setting ); ?>" <?php if ( ! empty( $hantus_info_title5 ) ) : ?> alt="<?php echo esc_attr( $hantus_info_title5 ); ?>" title="<?php echo esc_attr( $hantus_info_title5 ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
										<h4><?php echo esc_html( $hantus_info_title5 ); ?></h4>
										<p><?php echo esc_html( $hantus_info_description5 ); ?></p>
									</div>
	                                <a href="<?php echo esc_url($hantus_info_link5); ?>" class="btn-info"><?php echo wp_kses_post($hantus_info_btn5); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                </ul>
	            </div>
            </div>
        </div>
    </section>
	<?php }} endif; ?>
	<?php
	if ( function_exists( 'hantus_lite_info' ) ) {
		$cleverfox_section_priority = apply_filters( 'hantus_section_priority', 12, 'hantus_lite_info' );
		add_action( 'hantus_sections', 'hantus_lite_info', absint( $cleverfox_section_priority ) );
	}