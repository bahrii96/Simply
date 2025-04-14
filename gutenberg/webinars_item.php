<?php
$time = get_field('time', get_the_ID());
?>

<div class="webinar-card">
	<div class="photo">
		<img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url() : $src; ?>" class="lazyWebp" alt="<?php echo get_the_title(); ?>">
	</div>
	<?php if ($time): ?>
		<span class="tag"><?php echo $time ?></span>
	<?php endif; ?>
	<div class="h3"><?php echo get_the_title(); ?></div>

	<a href="<?php echo get_permalink(); ?>" class="btn-border">
		<span><?php pll_e('Watch Now'); ?></span>
	</a>
</div>