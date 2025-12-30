<?php
	if ( ! function_exists( 'gradiant_shadiant_above_header' ) ) :
	function gradiant_shadiant_above_header() {?>
<!--===// Start: Header Above
				=================================-->
				<?php 
				$gradiant_shadiant_hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
				$gradiant_shadiant_hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
				$gradiant_shadiant_hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
				$gradiant_shadiant_hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1');
				if($gradiant_shadiant_hide_show_social_icon =='1' || $gradiant_shadiant_hide_show_cntct_details =='1' || $gradiant_shadiant_hide_show_email_details =='1' || $gradiant_shadiant_hide_show_mbl_details =='1'):
				?>
					<div id="above-header" class="header-above-info d-av-block d-none">
						<!--<div class="header-widget"> -->
							<div class="av-columns-area">
								<div class="av-column-8">
									<div class="widget-left text-av-left text-center">
									<?php do_action('gradiant_abv_hdr_contact_info'); ?>
									</div>
								</div>
								<div class="av-column-4">
									<div class="widget-right text-av-right text-center">                                
									
										<?php do_action('gradiant_abv_hdr_social'); ?>
									</div>
								</div>
							</div>
						<!--</div>-->
					</div>
					<?php endif; ?>
					<!--===// End: Header Top
					=================================-->
	<?php	} endif;
add_action('gradiant_shadiant_above_header', 'gradiant_shadiant_above_header');
        