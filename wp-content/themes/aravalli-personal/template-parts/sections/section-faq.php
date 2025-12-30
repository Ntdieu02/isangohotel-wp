<?php
$pg_about_why_ttl 			= get_theme_mod( 'pg_about_why_ttl','Why'); 
$pg_about_why_sub 			= get_theme_mod( 'pg_about_why_sub','Choose Us'); 
$pg_about_why_desc 			= get_theme_mod( 'pg_about_why_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem'); 
$pg_about_why_content 		= get_theme_mod( 'pg_about_why_content',aravalli_get_abt_faq_default());
if(!empty($pg_about_why_ttl) || !empty($pg_about_why_sub) || !empty($pg_about_why_desc)): ?>
	<div class="row">
		<div class="col-12">
			<div class="heading-default wow fadeInUp">
			
				<?php if(!empty($pg_about_why_ttl)): ?>
					<h6><?php echo wp_kses_post($pg_about_why_ttl); ?></h6>
				<?php endif; ?>	
				
				<?php if(!empty($pg_about_why_sub)): ?>
					<h3><?php echo wp_kses_post($pg_about_why_sub); ?><span class="line-circle"></span></h3>      
				<?php endif; ?>		
				
				<?php if(!empty($pg_about_why_desc)): ?>				
					<p> <?php echo esc_html($pg_about_why_desc); ?></p>
				<?php endif; ?>		
				
			</div>
		</div>
	</div>
<?php endif; ?>	
<div class="row">
	<div class="col-12">
		<div id="accordion" class="why-choose" role="tablist">
			<?php
				if ( ! empty( $pg_about_why_content ) ) {
				$pg_about_why_content = json_decode( $pg_about_why_content );
				foreach ( $pg_about_why_content as $i => $faq_item ) {
					$title = ! empty( $faq_item->title ) ? apply_filters( 'aravalli_translate_single_string', $faq_item->title, 'FAQ section' ) : '';
					$text = ! empty( $faq_item->text ) ? apply_filters( 'aravalli_translate_single_string', $faq_item->text, 'FAQ section' ) : '';
			?>
			<div class="card">
				<div class="card-header" role="tab" id="heading<?php echo esc_html( $i + 1 ); ?>">
					<a class="acc-head" data-toggle="collapse" href="#collapse<?php echo esc_html( $i + 1 ); ?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo esc_html( $i + 1 ); ?>">
						<?php echo esc_html($title); ?>
					</a>
				</div>

				<div id="collapse<?php echo esc_html( $i + 1 ); ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo esc_html( $i + 1 ); ?>" data-parent="#accordion">
					<div class="card-body">
						<p>
							<?php echo esc_html($text); ?>
						</p>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</div>