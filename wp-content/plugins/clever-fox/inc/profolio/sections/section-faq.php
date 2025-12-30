<?php
$corpex_profolio_hs_faq = get_theme_mod('hs_faq', '1');
$corpex_profolio_faq_title = get_theme_mod('faq_title', "Our <span>FAQ'S</span>");
$corpex_profolio_faq_desc = get_theme_mod('faq_desc', 'There are many variations of passages of Lorem Ipsum available.');
$corpex_profolio_faq_display_num = get_theme_mod('faq_display_num', '10');
$corpex_profolio_post_type = 'corpex_faq';
$corpex_profolio_tax = 'faq_categories';
$corpex_profolio_tax_terms = get_terms($corpex_profolio_tax);
$corpex_faq_answer_body = __('<strong>This is the third item’s accordion body.</strong>&nbsp;It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the&nbsp;<code>.accordion-body</code>, though the transition does limit overflow','clever-fox');

if($corpex_profolio_hs_faq == '1') {
?>
<section class="faq-section pricing-faq">
	<div class="container">
		<?php if (!empty($corpex_profolio_faq_title) || !empty($corpex_profolio_faq_desc)): ?>
			<div class="section-title">
				<?php if (!empty($corpex_profolio_faq_title)): ?>
					<h2>
						<?php echo wp_kses_post($corpex_profolio_faq_title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($corpex_profolio_faq_desc)): ?>
					<p>
						<?php echo esc_html($corpex_profolio_faq_desc); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="row">
			<?php
			if (!$corpex_profolio_tax_terms) { ?>

				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne1">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1"><?php echo esc_html__('How Can i Make A Change To My Application?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne2">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2"><?php echo esc_html__('How To Send Creative Portfolio Friends?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne3">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3"><?php echo esc_html__('What is The Minimum And Maximum Design?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne3" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne4">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4"><?php echo esc_html__('How Create Your Web Design Portfolio in PSD?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne4" class="accordion-collapse collapse" aria-labelledby="headingOne4" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne5">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="false" aria-controls="collapseOne5"><?php echo esc_html__('How Create Your Web Design Portfolio in PSD?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne5" class="accordion-collapse collapse" aria-labelledby="headingOne5" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne6">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne6" aria-expanded="false" aria-controls="collapseOne6"><?php echo esc_html__('How Can i Make A Change To My Application?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne6" class="accordion-collapse collapse" aria-labelledby="headingOne6" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne7">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne7" aria-expanded="false" aria-controls="collapseOne7"><?php echo esc_html__('Which One Need For Satisfying Growing Energy?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne7" class="accordion-collapse collapse" aria-labelledby="headingOne7" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne8">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne8" aria-expanded="false" aria-controls="collapseOne8"><?php echo esc_html__('When I Receive The Invoice For My Order?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne8" class="accordion-collapse collapse" aria-labelledby="headingOne8" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne9">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne9" aria-expanded="false" aria-controls="collapseOne9"><?php echo esc_html__('What Will Happen If I Pick Wrong Plan?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne9" class="accordion-collapse collapse" aria-labelledby="headingOne9" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne10">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne10" aria-expanded="false" aria-controls="collapseOne10"><?php echo esc_html__('What is The Minimum And Maximum Design?','clever-fox'); ?></button>
							</h2>
							<div id="collapseOne10" class="accordion-collapse collapse" aria-labelledby="headingOne10" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><?php echo wp_kses_post($corpex_faq_answer_body); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } else { ?>
				<?php
				$corpex_profolio_args = array('post_type' => 'corpex_faq', 'posts_per_page' => $corpex_profolio_faq_display_num);

				$corpex_profolio_faq = new WP_Query($corpex_profolio_args);
				if ($corpex_profolio_faq->have_posts()) {
					$corpex_profolio_count = 1;
					while ($corpex_profolio_faq->have_posts()):
						$corpex_profolio_faq->the_post();

						$corpex_profolio_terms = get_the_terms($corpex_profolio_faq->ID, 'faq_categories');

						if ($corpex_profolio_terms && !is_wp_error($corpex_profolio_terms)):
							$corpex_profolio_links = array();

							foreach ($corpex_profolio_terms as $corpex_profolio_term) {

								$corpex_profolio_term_id = $corpex_profolio_term->term_id;
								$corpex_profolio_links[] = $corpex_profolio_term->slug;
							}

							$corpex_profolio_tax = join(' ', $corpex_profolio_links);
						else:
							$corpex_profolio_tax = '';
						endif;
						?>
						<div class="col-lg-6">
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne<?php echo esc_attr($corpex_profolio_count); ?>">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseOne<?php echo esc_attr($corpex_profolio_count); ?>" aria-expanded="false"
											aria-controls="collapseOne<?php echo esc_attr($corpex_profolio_count); ?>">
											<?php the_title(); ?>
										</button>
									</h2>
									<div id="collapseOne<?php echo esc_attr($corpex_profolio_count); ?>" class="accordion-collapse collapse"
										aria-labelledby="headingOne<?php echo esc_attr($corpex_profolio_count); ?>"
										data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						++$corpex_profolio_count;
					endwhile;
				}
			}
			?>
		</div>
	</div>
</section>
<?php } ?>