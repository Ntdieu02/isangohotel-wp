<?php
	if ( ! function_exists( 'news25_above_header_layouts' ) ) {
	function news25_above_header_layouts() { ?>
		<div id="above-header" class="above-header">
			<div class="header-widget header-dark">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-lg-auto text-left">
							<div class="widget-left d-lg-inline-flex justify-content-between justify-lg-content-none align-items-center gap-lg-2">
								<?php news25_local_time(); ?>
							</div>
						</div>
						<div class="col-lg-auto text-right">
							<div class="widget-right d-lg-inline-flex align-items-center gap-lg-2">
							<?php news25_custom_html_text();	?>
							</div>					
						</div>					
				   </div> 
				</div>
			</div>
		</div>
	<?php } 
}
add_action( 'news25_above_header_layouts', 'news25_above_header_layouts' );
