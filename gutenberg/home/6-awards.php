<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title		= get_field('title');
$list_1  	= get_field('list_1');
$list_2		= get_field('list_2');
$link    	= get_field('link');
if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/home/preview/6.png">
<?php } else { ?>
	<section class="certifications">
		<div class="container">
			<h2 class="certifications__title h3"><?php echo $title; ?></h2>
			<?php if ($list_1) { ?>
				<div class="certifications__cards">
					<?php foreach ($list_1 as $item) { ?>
						<div class="col">
							<div class="certItem">
								<div class="certItem__icon">
									<img style="height: auto;" data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
								</div>
								<h3 class="h5"><?php echo $item['title']; ?></h3>
								<?php echo $item['text']; ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if ($list_2) { ?>
				<ul class="certList">
					<?php foreach ($list_2 as $item) { ?>
						<li>
							<div class="icon">
								<img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
							</div>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
			<?php if (isset($link['url'])) { ?>
				<a href="<?php echo $link['url']; ?>" class="red-btn see-all">
					<span><?php echo $link['title']; ?></span>
				</a>
			<?php } ?>			
		</div>
	</section>
<?php } ?>