<?php
$corpex_profolio_hs_pricing = get_theme_mod('hs_pricing', '1');
$corpex_profolio_pricing_title = get_theme_mod('pricing_title', __('Our <span>Pricing</span>','clever-fox'));
$corpex_profolio_pricing_description = get_theme_mod('pricing_description', __('There are many variations of passages of Lorem Ipsum available.','clever-fox'));
$corpex_profolio_pricing_display_num = get_theme_mod('pricing_display_num', '10');
$corpex_profolio_pricing_image = get_theme_mod('pricing_image', esc_url(CLEVERFOX_PLUGIN_URL . 'inc/corpex/images/shapes/shape2.png'));
$corpex_profolio_post_type = 'corpex_pricing';
$corpex_profolio_tax = 'pricing_categories';
$corpex_profolio_tax_terms = get_terms($corpex_profolio_tax);

if($corpex_profolio_hs_pricing == '1') {
?>
<!-- Pricing -->
<section class="pricing-section pricing-home" <?php if (!empty($corpex_profolio_pricing_image)) { ?>
		style="background-image: url('<?php echo esc_url($corpex_profolio_pricing_image); ?>');" <?php } ?>>
	<div class="container">
		<?php if (!empty($corpex_profolio_pricing_title) || !empty($corpex_profolio_pricing_description)): ?>
			<div class="section-title">
				<?php if (!empty($corpex_profolio_pricing_title)): ?>
					<h2>
						<?php echo wp_kses_post($corpex_profolio_pricing_title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($corpex_profolio_pricing_description)): ?>
					<p>
						<?php echo wp_kses_post($corpex_profolio_pricing_description); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="row">
			<?php
			if (!$corpex_profolio_tax_terms) { ?>
				<div class="col-lg-4 col-md-6">
					<div class="pricing-item ">
						<div class="price-heading">
							<h2><?php echo esc_html__('Standard Pack','clever-fox'); ?></h2>
						</div>
						<div class="pricing-list">
							<ul>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Five Brand Monitors','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Full Social Profiles','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Basic Quota','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('PDF Report','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Custom Service','clever-fox'); ?></li>
							</ul>
						</div>
						<div class="pricing-rate">
							<span class="pricing"><sup>$</sup>149.00<small>/<?php echo esc_html__('Month','clever-fox'); ?></small></span>
						</div>
						<a href="#" class="main-btn"> <?php echo esc_html__('Buy Now','clever-fox'); ?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pricing-item ">
						<div class="price-heading">
							<h2><?php echo esc_html__('Business Pack','clever-fox'); ?></h2>
						</div>
						<div class="pricing-list">
							<ul>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Five Brand Monitors','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Full Social Profiles','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Basic Quota','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('PDF Report','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Custom Service','clever-fox'); ?></li>
							</ul>
						</div>
						<div class="pricing-rate">
							<span class="pricing"><sup>$</sup>99.00<small>/<?php echo esc_html__('Month','clever-fox'); ?></small></span>
						</div>
						<a href="#" class="main-btn"><?php echo esc_html__('Buy Now','clever-fox'); ?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pricing-item ">
						<div class="price-heading">
							<h2><?php echo esc_html__('Personal Pack','clever-fox'); ?></h2>
						</div>
						<div class="pricing-list">
							<ul>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Five Brand Monitors','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Full Social Profiles','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Basic Quota','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('PDF Report','clever-fox'); ?></li>
								<li><i class="fa fab fa-check" aria-hidden="true"></i><?php echo esc_html__('Custom Service','clever-fox'); ?></li>
							</ul>
						</div>
						<div class="pricing-rate">
							<span class="pricing"><sup>$</sup>49.00<small>/<?php echo esc_html__('Month','clever-fox'); ?></small></span>
						</div>
						<a href="#" class="main-btn"><?php echo esc_html__('Buy Now','clever-fox'); ?></a>
					</div>
				</div>
			</div>
		<?php } else {
				foreach ($corpex_profolio_tax_terms as $corpex_profolio_tax_term) {
					$corpex_profolio_args = array(
						'post_type' => 'corpex_pricing',
						'posts_per_page' => $corpex_profolio_pricing_display_num,
						// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
						'tax_query' => array(
							array(
								'taxonomy' => 'pricing_categories',
								'field' => 'slug',
								'terms' => $corpex_profolio_tax_term->slug
							)
						),
					);
					$corpex_profolio_plan = new WP_Query($corpex_profolio_args);
					if ($corpex_profolio_plan->have_posts()) {
						$corpex_profolio_count = 1;
						while ($corpex_profolio_plan->have_posts()) {
						$corpex_profolio_plan->the_post();
						$corpex_profolio_plans_currency = sanitize_text_field( get_post_meta( get_the_ID(),'plans_currency', true ));
						$corpex_profolio_plans_price    = sanitize_text_field( get_post_meta( get_the_ID(),'plans_price', true ));
						$corpex_profolio_price_content 	= get_post_meta(get_the_ID(), 'price_content', true);
						$corpex_profolio_plans_button_label = sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_label', true ));
						$corpex_profolio_plans_button_link 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link', true ));
						$corpex_profolio_plans_button_link_target = sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link_target', true ));
						$corpex_profolio_price_recomended 		= sanitize_text_field( get_post_meta( get_the_ID(),'price_recomended', true ));

							$corpex_profolio_terms = get_the_terms($corpex_profolio_plan->ID, 'pricing_categories');

							if ($corpex_profolio_terms && !is_wp_error($corpex_profolio_terms)):
								$corpex_profolio_links = array();

								foreach ($corpex_profolio_terms as $corpex_profolio_term) {
									$corpex_profolio_links[] = $corpex_profolio_term->slug;
								}

								$corpex_profolio_tax = join(' ', $corpex_profolio_links);
							else:
								$corpex_profolio_tax = '';
							endif;

							$corpex_profolio_recommended = ($corpex_profolio_price_recomended == 'recommend') ? 'recommend' : '';
							?>
						<div class="col-lg-4 col-md-6">
							<div class="pricing-item <?php echo esc_attr($corpex_profolio_recommended); ?>">
								<div class="price-heading">
									<h2>
										<?php the_title(); ?>
									</h2>
								</div>
								<div class="pricing-list">
									<?php
									if (isset($corpex_profolio_price_content) && is_array($corpex_profolio_price_content)) {
										echo '<ul>';
										foreach ($corpex_profolio_price_content as $corpex_profolio_price_content) {
											echo '<li><i class="fa fab fa-check"></i>' . wp_kses_post($corpex_profolio_price_content) . '</li>';
										}
										echo '</ul>';
									}
									?>
								</div>

								<?php if (!empty($corpex_profolio_plans_price)) { ?>
									<div class="pricing-rate">
										<span
											class="pricing"><sup><?php echo esc_html($corpex_profolio_plans_currency); ?></sup><?php echo esc_html($corpex_profolio_plans_price); ?>.00<small>/Month</small></span>
									</div>
								<?php } ?>

								<?php if (!empty($corpex_profolio_plans_button_label)) { ?>
									<a href="<?php echo esc_url($corpex_profolio_plans_button_link); ?>" class="main-btn" <?php if ($corpex_profolio_plans_button_link_target) {
										   echo "target='_blank'";
									   } ?>>
										<?php echo esc_html($corpex_profolio_plans_button_label); ?></a>
								<?php } ?>
							</div>
						</div>
						<?php $corpex_profolio_count++;
						}
					}
				}
			} ?>
	</div>
	</div>
</section>
<?php } ?>
<!-- Pricing end -->