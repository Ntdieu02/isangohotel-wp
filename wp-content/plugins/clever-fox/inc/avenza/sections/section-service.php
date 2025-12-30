<?php 
if ( ! function_exists( 'avril_lite_service' ) ) :
	function avril_lite_service() {
	$avril_avenza_hs_service					= get_theme_mod('hs_service','1');			
	$avril_avenza_service_title				= get_theme_mod('service_title','Technology from tomorrow');
	$avril_avenza_service_subtitle			= get_theme_mod('service_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>');
	$avril_avenza_service_description		= get_theme_mod('service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$avril_avenza_service_contents			= get_theme_mod('service_contents',avril_get_service_default());
if($avril_avenza_hs_service == '1') {		
?>
    <section id="service-section" class="service-section service-section-hover av-py-default service-home">
    	<div class="av-container">
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default wow fadeInUp">
						<?php if ( ! empty( $avril_avenza_service_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($avril_avenza_service_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $avril_avenza_service_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($avril_avenza_service_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $avril_avenza_service_description ) ) : ?>		
							<p><?php echo wp_kses_post($avril_avenza_service_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
            <div class="av-columns-area wow fadeInUp service-row">
				<?php
					if ( ! empty( $avril_avenza_service_contents ) ) {
					$avril_avenza_service_contents = json_decode( $avril_avenza_service_contents );
					foreach ( $avril_avenza_service_contents as $avril_avenza_service_item ) {
						$avril_avenza_repeater_title = ! empty( $avril_avenza_service_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_service_item->title, 'service section' ) : '';
						$avril_avenza_repeater_text = ! empty( $avril_avenza_service_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_service_item->text, 'service section' ) : '';
						$avril_avenza_repeater_icon = ! empty( $avril_avenza_service_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_avenza_service_item->icon_value,'service section' ) : '';
						$avril_avenza_repeater_link = ! empty( $avril_avenza_service_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_service_item->link, 'service section' ) : '';
				?>
				<div class="av-column-4 av-md-column-6">
					<div class="service-item">
						<div class="inactive-service-box">
						<div class="service-icon">
							<?php if ( ! empty( $avril_avenza_repeater_icon ) ) {?>
								<i class="fa <?php echo esc_attr( $avril_avenza_repeater_icon ); ?> txt-pink"></i>
							<?php } ?>
						</div>
						<div class="service-content">
							<?php if ( ! empty( $avril_avenza_repeater_title ) ) : ?>
								<h5 class="service-title"><a href="<?php echo esc_url( $avril_avenza_repeater_link ); ?>"><?php echo esc_html( $avril_avenza_repeater_title ); ?></a></h5>
							<?php endif; ?>
							<?php if ( ! empty( $avril_avenza_repeater_text ) ) : ?>
								<p><?php echo esc_html( $avril_avenza_repeater_text ); ?></p>
							<?php endif; ?>
							<div class="read-more">
							<a href="<?php echo esc_url( $avril_avenza_repeater_link ); ?>"><i class="fa fa-long-arrow-right"></i><span><?php echo esc_html('Read More','clever-fox'); ?></span></a>
						</div>
							<div class="transparent-bg">
							<div class="bg-icon">
                                        <i class="fa <?php echo esc_attr( $avril_avenza_repeater_icon ); ?>"></i>
                                    </div>

							</div>
						</div>
						</div>
					</div>
				</div>
				<?php }}?>
            </div>
    	</div>
    </section>
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_service' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 13, 'avril_lite_service' );
		add_action( 'avril_sections', 'avril_lite_service', absint( $cleverfox_section_priority ) );
	}