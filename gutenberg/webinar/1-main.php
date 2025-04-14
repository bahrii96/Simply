<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title          = get_field('zagolovok');
$time           = get_field('time');
$title_speakers           = get_field('title_speakers');
$terms = get_the_terms(get_the_ID(), 'speakers');


if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/webinar/preview/1.png">
<?php } else { ?>

	<section class="webinarFS">
		<div class="container">
			<div class="tags">
				<div class="tag"> <?php pll_e('Webinar'); ?></div>
				<?php if ($time): ?>
					<div class="tag filled"><?php echo $time ?></div>
				<?php endif; ?>
			</div>
			<?php if ($title) { ?>
				<h1 class="h3"><?php echo $title; ?></h1>
			<?php } ?>
			<div class="speakers">
				<?php if ($title_speakers): ?>
					<div class="text"><?php echo $title_speakers ?></div>
				<?php endif; ?>
				<?php if ($terms && !is_wp_error($terms)): ?>
					<ul class="list">
						<?php foreach ($terms as $term):
							$avatar = get_field('speaker_avatar', 'term_' . $term->term_id);
							$description = $term->description;
						?>
							<li>
								<a href="<?php echo get_term_link($term); ?>" class="item">
									<div class="photo">
										<?php if ($avatar): ?>

											<img
												data-src="<?php echo esc_url($avatar); ?>"
												data-retina="<?php echo esc_url($avatar); ?>"
												data-webp="<?php echo esc_url($avatar); ?>"
												data-webp-retina="<?php echo esc_url($avatar); ?>"
												src="<?php echo esc_url($avatar); ?>"
												class="lazyWebp"
												alt="<?php echo esc_attr($term->name); ?>">
										<?php endif; ?>
									</div>
									<div class="name h6">
										<?php echo esc_html($term->name); ?>
										<span class="icon">
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M0.875511 0H14V13.1245H11.5237V4.22734L1.75102 14L0 12.249L9.77266 2.47632H0.875511V0Z" fill="#111F2D"></path>
											</svg>
										</span>
									</div>
									<?php if ($description): ?>
										<div class="pos"><?php echo esc_html($description); ?></div>
									<?php endif; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<div class="b-breadcrumbs">
		<div class="container">
			<div class="breadcrumbs2">
				<ul>
					<li>
						<a href="<?php echo home_url(); ?>"><?php pll_e('Main page'); ?></a>
					</li>
					<?php if (is_singular('webinars')) : ?>
						<li>
							<a href="<?php echo esc_url(home_url('/webinars')); ?>">
								<?php echo pll__('On-Demand Webinars'); ?>
							</a>
						</li>
						<li>
							<?php the_title(); ?>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
<?php } ?>