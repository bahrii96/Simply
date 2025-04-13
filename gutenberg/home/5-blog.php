<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title		= get_field('title');
$subtitle  	= get_field('subtitle');
$blog      	= get_field('blog');
$link    	= get_field('link');
if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/home/preview/5.png">
<?php } else { ?>
	<section class="about-check b-blog-more main-blog">
		<div class="about-check__content container">
			<h2 class="h6">
				<div class="icon">
					<svg width="42" height="36" viewbox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.83081 13.7188H0V21.7206H5.83081V13.7188Z" fill="#EF404B"></path>
						<path d="M14.6616 5.99219H8.83081V29.4396H14.6616V5.99219Z" fill="#EF404B"></path>
						<path d="M23.4925 0.0078125H17.6616V35.427H23.4925V0.0078125Z" fill="#EF404B"></path>
						<path d="M32.3232 8.63281H26.4924V26.8076H32.3232V8.63281Z" fill="#EF404B"></path>
						<path d="M41.1541 11.8594H35.3232V23.5831H41.1541V11.8594Z" fill="#EF404B"></path>
					</svg>
				</div>
				<span><?php echo $title; ?></span>
			</h2>
			<div class="h3"><?php echo $subtitle; ?></div>
			<div class="blog-items">
				<?php if($blog) { ?>
					<?php foreach ($blog as $post) {										
						$categories = get_the_category($post); ?>
						<div class="item">
							<a href="<?php echo get_permalink($post); ?>">
								<div class="img">
									<img data-src="<?php echo get_the_post_thumbnail_url($post); ?>" data-retina="<?php echo get_the_post_thumbnail_url($post); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url($post)); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url($post)); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url($post) : $src; ?>" class="lazyWebp" alt="<?php echo get_the_title($post); ?>">
									<div class="text">
										<svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="70" height="70" rx="35" fill="white"></rect>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M35.622 25.622L44.9463 34.9463L35.622 44.2706L33.8627 42.5113L40.1837 36.1903L26.2977 36.1903L26.2977 33.7023L40.1837 33.7023L33.8627 27.3813L35.622 25.622Z" fill="black"></path>
										</svg>
									</div>                                
								</div>
								<div class="h5"><?php echo get_the_title($post); ?></div>
							</a>
							<div class="bot">
								<?php if (!empty( $categories)) { ?>
									<a href="<?php echo esc_url('?category='.$categories[0]->slug); ?>" class="tag">
										<span><?php echo esc_html($categories[0]->name); ?></span>
									</a>
								<?php } ?>
								<div class="data"><?php echo get_the_date('d M, Y', $post); ?></div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<?php if (isset($link['url'])) { ?>
				<a href="<?php echo $link['url']; ?>" class="about-see-all-btn red-btn">
					<span><?php echo $link['title']; ?></span>
				</a>
			<?php } ?>
		</div>
	</section>
<?php } ?>