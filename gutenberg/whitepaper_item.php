<?php
$short_desc = get_field('short_desc', get_the_ID());
$terms = get_the_terms(get_the_ID(), 'whitepapers_teg');
?>


<div class="book-card">
	<div class="left">
		<div class="photo">
			<img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url() : $src; ?>" class="lazyWebp" alt="<?php echo get_the_title(); ?>">
		</div>
	</div>
	<div class="right">
		<?php if ($terms && !is_wp_error($terms)): ?>
			<span class="tag">
				<?php
				$term_names = array();
				foreach ($terms as $term) {
					$term_names[] = $term->name;
				}

				echo implode(', ', $term_names);
				?>
			</span>
		<?php endif; ?>
		<h3><?php echo get_the_title(); ?></h3>
		<?php if ($short_desc): ?>
			<p><?php echo $short_desc; ?></p>
		<?php endif; ?>
		<a href="<?php echo get_permalink(); ?>" class="btn-border">
			<span><?php pll_e('Download'); ?></span>
		</a>
	</div>
</div>