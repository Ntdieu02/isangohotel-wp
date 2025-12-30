<?php
$corpex_profolio_hs_project_tab = get_theme_mod('hs_project_tab', '1');
$corpex_profolio_hs_portfolio = get_theme_mod('hs_portfolio', '1');
$corpex_profolio_project_title = get_theme_mod('project_title', 'Our <span>Portfolio</span>');
$corpex_profolio_project_desc = get_theme_mod('project_desc', 'There are many variations of passages of Lorem Ipsum available.');
$corpex_profolio_project_display_num = get_theme_mod('project_display_num', '10');
$corpex_profolio_post_type = 'corpex_project';
$corpex_profolio_tax = 'project_categories';
$corpex_profolio_tax_terms = get_terms($corpex_profolio_tax);

if($corpex_profolio_hs_portfolio =='1'){
?>
<!-- Portfolio -->
<section class="portfolio-home portfolio-section">
	<div class="container">
		<?php if (!empty($corpex_profolio_project_title) || !empty($corpex_profolio_project_desc)): ?>
			<div class="section-title">
				<?php if (!empty($corpex_profolio_project_title)): ?>
					<h2>
						<?php echo wp_kses_post($corpex_profolio_project_title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($corpex_profolio_project_desc)): ?>
					<p>
						<?php echo wp_kses_post($corpex_profolio_project_desc); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php
		if (!$corpex_profolio_tax_terms) { ?>
			<div class="st-filter-wrapper">
				<div class="st-tab-filter text-center">
					<a href="#" data-filter="*" class="active"><?php echo esc_html__('All', 'clever-fox'); ?></a>
					<a href="#" data-filter=".design" class=""><?php echo esc_html__('Design', 'clever-fox'); ?></a>
					<a href="#" data-filter=".development" class=""><?php echo esc_html__('Development', 'clever-fox'); ?></a>
					<a href="#" data-filter=".marketing"><?php echo esc_html__('Marketing', 'clever-fox'); ?></a>
					<a href="#" data-filter=".support"><?php echo esc_html__('Support', 'clever-fox'); ?></a>
				</div>
				<div id="st-filter-init" class="row st-filter-init" style="position: relative; height: 1039.38px;">
					<div class="col-lg-4 col-md-6 st-filter-item all development support"
						style="position: absolute; left: 0%; top: 0px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#" class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Development', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('A Dynamic Portfolio Showcase', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-4 col-md-6 st-filter-item all design support"
						style="position: absolute; left: 33.3333%; top: 0px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#"	class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p2.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Digital Marketing', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('A Portfolio of Business Brilliance', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-4 col-md-6 st-filter-item all marketing"
						style="position: absolute; left: 66.6667%; top: 0px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#" class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p3.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Development', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('Power of Strategic Initiatives', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-4 col-md-6 st-filter-item all development marketing"
						style="position: absolute; left: 0%; top: 519px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#" class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p4.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Development Strategy', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('Winning Work', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-4 col-md-6 st-filter-item all design development"
						style="position: absolute; left: 33.3333%; top: 519px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#" class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p5.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Development Strategy', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('Winning Work', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-4 col-md-6 st-filter-item all design"
						style="position: absolute; left: 66.6667%; top: 519px;">
						<figure class="projects-item">
							<div class="image">
								<a href="#" class="projects-link-icon">
									<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL. 'inc/profolio/images/project/p6.jpg'); ?>" class="card-img-top" alt="<?php echo esc_attr__('Project Image','clever-fox'); ?>">
								</a>
								<div class="projects-link">
									<a href="#" class="projects-link-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
							<figcaption class="projects-caption">
								<div class="projects-heading">
									<p><?php echo esc_html__('Free Consulting', 'clever-fox'); ?></p>
									<h4><?php echo esc_html__('Business Consulting', 'clever-fox'); ?> </h4>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>

		<?php } else { ?>
			<div class="st-filter-wrapper">
				<?php if ($corpex_profolio_hs_project_tab == '1') { ?>
					<div class="st-tab-filter text-center">
						<?php
						foreach ($corpex_profolio_tax_terms as $corpex_profolio_tax_term) {
							$corpex_profolio_terms = get_the_terms($corpex_profolio_tax_term->term_id, 'project_categories');
							$corpex_profolio_cat_post_count = $corpex_profolio_tax_term->count;
							if ($corpex_profolio_tax_term->slug == 'all') {
								?>
								<a href="#" data-filter="*" class="active"><?php echo esc_html__('All', 'clever-fox'); ?></a>
							<?php } else { ?>
								<a href="#"
									data-filter=".<?php echo esc_attr($corpex_profolio_tax_term->slug); ?>"><?php echo esc_html($corpex_profolio_tax_term->name); ?></a>
							<?php }
						} ?>
					</div>
				<?php } ?>

				<div id="st-filter-init" class="row st-filter-init">
					<?php
					$corpex_profolio_project_link = sanitize_text_field(get_post_meta(get_the_ID(), 'project_button_link', true));
					$corpex_profolio_project_button_link_target = sanitize_text_field(get_post_meta(get_the_ID(), 'project_button_link_target', true));

					if ($corpex_profolio_project_link) {
						$corpex_profolio_project_link;
					} else {
						$corpex_profolio_project_link = get_post_permalink();
					}
					$corpex_profolio_args = array('post_type' => 'corpex_project', 'posts_per_page' => $corpex_profolio_project_display_num);
					$corpex_profolio_project = new WP_Query($corpex_profolio_args);
					if ($corpex_profolio_project->have_posts()) {
						while ($corpex_profolio_project->have_posts()):
							$corpex_profolio_project->the_post();

							$corpex_profolio_terms = get_the_terms($corpex_profolio_project->ID, 'project_categories');

							if ($corpex_profolio_terms && !is_wp_error($corpex_profolio_terms)):
								$corpex_profolio_links = array();

								foreach ($corpex_profolio_terms as $corpex_profolio_term) {
									$corpex_profolio_links[] = $corpex_profolio_term->slug;
								}

								$corpex_profolio_tax = join(' ', $corpex_profolio_links);
							else:
								$corpex_profolio_tax = '';
							endif;
							$corpex_profolio_tax = strtolower($corpex_profolio_tax);
							?>
							<div class="col-lg-4 col-md-6 st-filter-item <?php echo esc_attr($corpex_profolio_tax); ?>">
								<figure class="projects-item">
									<div class="image">
										<a href="<?php echo esc_url($corpex_profolio_project_link); ?>" class="projects-link-icon" <?php if ($corpex_profolio_project_button_link_target) {
											   echo "target='_blank'";
										   } ?>>
											<?php if (has_post_thumbnail()) { ?>
												<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="card-img-top"
													alt="<?php echo esc_attr__('Project Image', 'clever-fox'); ?>">
											<?php } ?>
										</a>
										<div class="projects-link">
											<a href="<?php echo esc_url($corpex_profolio_project_link); ?>" class="projects-link-icon" <?php if ($corpex_profolio_project_button_link_target) {
												   echo "target='_blank'";
											   } ?>><i
													class="fa fa-angle-double-right"></i>
											</a>
										</div>
									</div>
									<figcaption class="projects-caption">
										<div class="projects-heading">
											<p><?php echo esc_html(get_the_excerpt()); ?></p>
											<h4>
												<?php the_title(); ?>
											</h4>
										</div>
									</figcaption>
								</figure>
							</div>
						<?php
						endwhile;
					}
					?>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<!-- Portfolio end -->