<?php  
	$cta_ttl 		= get_theme_mod( 'cta_ttl','Make a reservation by phone: <a href="tel:(+233) 123 457789">(+233) 123 457789</a>'); 
	$cta_email 		= get_theme_mod( 'cta_email','<a href="mailto:email@companyname.com">email@companyname.com</a>'); 
	$cta_btn_lbl 	= get_theme_mod( 'cta_btn_lbl','Reservation'); 
	$cta_btn_url 	= get_theme_mod( 'cta_btn_url'); 
?>		
<div id="call_action" class="call_action sec-default">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="call-bg">
					<ul class="d-flex flex-wrap align-items-center">
					
						<?php if(!empty($cta_ttl)): ?>
						<li class="call-item ttl"><?php echo wp_kses_post($cta_ttl); ?></li>
						<?php endif; ?>
						
						<?php if(!empty($cta_email)): ?>
						<li class="call-item text"><?php echo wp_kses_post($cta_email); ?></li>
						<?php endif; ?>
						
						<?php if(!empty($cta_btn_lbl)): ?>
						<li class="call-item button"><a href="<?php echo esc_url($cta_btn_url); ?>" class="btn-shape btn-black" data-text="View Price"><?php echo esc_html($cta_btn_lbl); ?></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>