<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$description       = get_field('Desc');
$form_title      = get_field('title_form');
$link      = get_field('link');
$shortcode_form      = get_field('shortcode_form', 'options');
$success_title      = get_field('success_title', 'options');
$success_desc      = get_field('success_desc', 'options');
$title_btn      = get_field('title_btn', 'options');

if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/webinar/preview/2.png">
<?php } else { ?>

	<section class="form-section">
		<div class="container">
			<div class="left">
				<?php if ($title): ?>
					<h2 class="h3"><?php echo $title; ?></h2>
				<?php endif; ?>
				<?php if ($description): ?>
					<?php echo $description ?>
				<?php endif; ?>
			</div>
			<div class="right">
				<!-- The .form needs class success to show success-block -->
				<div class="form join-our-team__form">
					<?php if ($form_title): ?>
						<h3><?php echo $form_title ?></h3>
					<?php endif; ?>
					<?php
					if ($shortcode_form) {
						echo do_shortcode($shortcode_form);
					}
					?>

					<div class="success-block">
						<div class="icon">
							<svg width="63" height="63" viewbox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="0.5" y="0.5" width="62" height="62" rx="31" fill="white" fill-opacity="0.7"></rect>
								<path d="M21 30.9727L28.9615 38.5L42.9615 24.5" stroke="#111F2D" stroke-width="4" stroke-linecap="round"></path>
							</svg>
						</div>
						<h3><?php echo $success_title ?></h3>
						<p><?php echo $success_desc ?></p>
						<a href="#popup-video" class="btn js-popup-btn" data-link="<?php echo $link ?>"><?php echo $title_btn ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<script>
	document.addEventListener('wpcf7mailsent', function(event) {
		const formWrapper = event.target.closest('.form.join-our-team__form');
		if (formWrapper) {
			formWrapper.classList.add('success');
		}
	}, false);
</script>