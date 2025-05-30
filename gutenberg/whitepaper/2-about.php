<?php
$url  = get_bloginfo('template_directory');
$src = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title = get_field('zagolovok');
$description = get_field('opis');
$form_title = get_field('zagolovok_formi');
$link = get_field('link');
$shortkod_formi = get_field('shortkod_formi', 'options');
$success_zagolovok = get_field('success_zagolovok', 'options');
$success_opis = get_field('success_opis', 'options');
$tekst_knopki = get_field('tekst_knopki', 'options');

if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/whitepaper/preview/2.png">
<?php } else { ?>

	<section class="form-section" id="form-whitepaper">
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
				<div class="form join-our-team__form" id="whitepaper-form">
					<?php if ($form_title): ?>
						<h3><?php echo $form_title ?></h3>
					<?php endif; ?>
					<?php
					if ($shortkod_formi) {
						echo do_shortcode($shortkod_formi);
					}
					?>

					<div class="success-block">
						<div class="icon">
							<svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="0.5" y="0.5" width="62" height="62" rx="31" fill="white" fill-opacity="0.7" />
								<path d="M21 30.9727L28.9615 38.5L42.9615 24.5" stroke="#111F2D" stroke-width="4" stroke-linecap="round" />
							</svg>
						</div>
						<h3><?php echo $success_zagolovok ?></h3>
						<p><?php echo $success_opis ?></p>
						<a href="<?php echo $link ?>" class="btn" target="_blank"><?php echo $tekst_knopki ?></a>
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
