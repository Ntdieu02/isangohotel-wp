<?php  
	$checkin_title			= get_theme_mod('checkin_title','Find a Room'); 
	$checkin_desc			= get_theme_mod('checkin_desc','When you want to be our guest ?');
	$checkin_shortcode		= get_theme_mod('checkin_shortcode');
?>		
<div id="checkin-section" class="checkin wow fadeInUp home-checkin">
	<div class="container">
		<div class="checkin-wrapper">
			<div class="row">
				<div class="col-lg-3">
					<?php if(!empty($checkin_title) || !empty($checkin_desc)): ?>
						<div class="checkin-text">
							<h3><?php echo wp_kses_post($checkin_title); ?></h3>
							<p><?php echo wp_kses_post($checkin_desc); ?></p>
						</div>
					<?php endif; ?>	
				</div>
				<div class="col-lg-9 my-auto">
					<?php if(!empty($checkin_shortcode) ): echo do_shortcode($checkin_shortcode); else:?>
						<form class="checkin-form form-icons">
							<div class="form-row">
								<div class="form-group form-caret">
									<select id="inputState1" class="form-control">
										<option selected>Room Category</option>
										<option>...</option>
									</select>
								</div>
								<div class="form-group form-caret">
									<select id="inputState2" class="form-control">
										<option selected>Room Features</option>
										<option>...</option>
									</select>
								</div>
								<div class="form-group form-caret">
									<select id="inputState3" class="form-control">
										<option selected>Adult</option>
										<option>...</option>
									</select>
								</div>
								<div class="form-group form-btn">
									<button class="btn-shape btn-line-white">Book Now</button>
								</div>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>