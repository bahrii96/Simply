<?php $url          = get_bloginfo('template_directory');
$src                = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title              = get_field('title');
$count_posts        = get_field('count_posts');



$all_posts = new WP_Query(array(
	'post_type'      => 'webinars',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
));

if (get_field('is_example')) { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/gutenberg/webinars/preview/1.png">
<?php } else { ?>

	<div class="b-breadcrumbs on-blog">
		<div class="container">
			<div class="breadcrumbs2">
				<?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>
			</div>
		</div>
	</div>




	<?php if ($all_posts->have_posts()) { ?>
		<section class="webinars">
			<div class="container">
				<h1>On-Demand Webinars</h1>
				<div class="cards">
					<?php while ($all_posts->have_posts()) {
						$all_posts->the_post(); ?>

						<?php get_template_part('gutenberg/webinars_item'); ?>

					<?php }
					wp_reset_postdata(); ?>
				</div>
			</div>
			<?php $max_pages = $all_posts->max_num_pages;
			if ((int)$max_pages > 1) {
				$pag = custom_pagination($current_page, $max_pages, $page_url);
				echo $pag;
			} ?>
		</section>
	<?php } ?>



<?php } ?>

