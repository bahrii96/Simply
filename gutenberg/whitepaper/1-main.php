<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title          = get_field('zagolovok');
$text           = get_field('tekst_pd_zagolovkom');
$knopka           = get_field('knopka');
$terms = get_the_terms(get_the_ID(), 'whitepapers_teg');


if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/whitepaper/preview/1.png">
<?php } else { ?>

	<section class="whitePaperFS">
		<div class="left">
			<?php if ($terms && !is_wp_error($terms)): ?>
				<div class="tag">
					<?php
					$term_names = array();
					foreach ($terms as $term) {
						$term_names[] = $term->name;
					}

					echo implode(', ', $term_names);
					?>
				</div>
			<?php endif; ?>
			<?php if ($title) { ?>
				<h1 class="h3"><?php echo $title; ?></h1>
			<?php } ?>
			<?php if ($text): ?>
				<p><?php echo $text ?>.</p>
			<?php endif; ?>
			<?php if ($knopka) :
				$link_url = $knopka['url'];
				$link_title = $knopka['title'];
				$link_target = $knopka['target'] ? $knopka['target'] : '_self';
			?>
				<a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
			<?php endif;
			?>
		</div>
		<div class="right">
			<div class="photo">
				<img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url() : $src; ?>" class="lazyWebp mission__photo" alt="<?php echo get_the_title(); ?>">
				<div class="mission__circle"></div>
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
					<?php if (is_singular('whitepapers')) : ?>
						<li>
							<a href="<?php echo esc_url(home_url('/whitepapers')); ?>">
								<?php echo pll__('eBooks and Whitepapers'); ?>
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