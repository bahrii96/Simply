<?php 

$author = get_queried_object();
$author_id = $author->ID;

//$author_name = $author->display_name;
$lang = pll_current_language();
if ($lang == 'ua') {
	$author_name = get_field("mya_ua", "user_{$author->ID}").' '.get_field("przvishe_ua", "user_{$author->ID}");
	$pozicya_avtora = get_field("pozicya_avtora_ua", "user_{$author->ID}");
} else if ($lang == 'pl') {
	$author_name = get_field("mya_pl", "user_{$author->ID}").' '.get_field("przvishe_pl", "user_{$author->ID}");
	$pozicya_avtora = get_field("pozicya_avtora_pl", "user_{$author->ID}");
} else {
	$author_name = get_field("mya_en", "user_{$author->ID}").' '.get_field("przvishe_en", "user_{$author->ID}");
	$pozicya_avtora = get_field("pozicya_avtora_en", "user_{$author->ID}");
}

$author_first_name = explode(' ', $author_name)[0] ?? $author_name;
$author_description = get_the_author_meta('description', $author->ID);
$author_photo = get_avatar_url($author->ID, ['size' => '500']);
$page_url = $_SERVER['REQUEST_URI'].'#author_posts';
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
if (isset($_GET['page'])) { 
	$current_page = $_GET['page']; 
} else { 
	$current_page = 1; 
}
$sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'latest';     

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'paged'          => $current_page,
    'post_status'    => 'publish',
    'meta_query'     => array(
        'relation' => 'OR',
        array(
            'key'     => 'post_autors', 
            'value'   => '"' . $author_id . '"',
            'compare' => 'LIKE', 
        ),       
    ),
);

if ($sort_option == 'popular') {
	$args['meta_key'] = 'post_views_count'; 
	$args['orderby']  = 'meta_value_num';
	$args['order']    = 'DESC';
} else {
	$args['orderby'] = 'date';
	$args['order']   = 'DESC';
}
$author_posts = new WP_Query($args);

$page_blog_id = url_to_postid( get_field('page_blog','options') );
$page_object = get_page($page_blog_id);
$blocks = parse_blocks($page_object->post_content); 

if (!$author_posts->have_posts())  {
	global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part(404); 
    die();
}

get_header(); 

?>
	<section class="authorMain">
		<div class="container">
			<div class="photo">
				<img data-src="<?php echo esc_url($author_photo); ?>" 
				data-retina="<?php echo esc_url($author_photo); ?>" 
				data-webp="<?php echo esc_url($author_photo); ?>" 
				data-webp-retina="<?php echo esc_url($author_photo); ?>" 
				src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
				class="lazyWebp" 
				alt="<?php echo esc_attr($author_name); ?>">
			</div>
			<div class="cont">
				<h1 class="name h3"><?php echo esc_html($author_name); ?></h1>
				<div class="pos"><?php echo esc_html($pozicya_avtora); ?></div>
				<div class="text">
					<p><?php echo esc_html($author_description); ?></p>
				</div>
				<div class="btns">					
					<a href="#popup-form" target="_blank" class="white-btn js-popup-btn"><?php pll_e('Ask a question'); ?></a>					
					<?php if (get_the_author_meta( 'linkedin' )) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" class="link btn-border">
							<svg width="22" height="23" viewbox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0.164062 7.4375H5.00927V22.3333H0.164062V7.4375ZM18.207 7.61219C18.1555 7.59594 18.1068 7.57833 18.0526 7.56344C17.9876 7.54872 17.9221 7.53607 17.8563 7.52552C17.5702 7.46703 17.2789 7.43754 16.9869 7.4375C14.1621 7.4375 12.3705 9.49177 11.7801 10.2853V7.4375H6.9349V22.3333H11.7801V14.2083C11.7801 14.2083 15.4418 9.10854 16.9869 12.8542V22.3333H21.8307V12.2814C21.8287 11.2117 21.4718 10.173 20.8161 9.32806C20.1603 8.48308 19.2426 7.87959 18.207 7.61219Z" fill="white"></path>
								<path d="M2.53385 5.41302C3.84265 5.41302 4.90365 4.35203 4.90365 3.04323C4.90365 1.73443 3.84265 0.673437 2.53385 0.673437C1.22505 0.673437 0.164062 1.73443 0.164062 3.04323C0.164062 4.35203 1.22505 5.41302 2.53385 5.41302Z" fill="white"></path>
							</svg>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<div class="b-breadcrumbs">
		<div class="container">
			<div class="breadcrumbs2">
				<?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>
			</div>
		</div>
	</div>
	<div class="b-blog-head onAuthorPage" id="author_posts">
		<div class="container">
			<div class="title">				
				<h2><?php echo sprintf(pll__('List of %s\'s articles'), $author_first_name); ?></h2>
			</div>
			<div class="blog-tags-search">
				<div class="blog-tags"></div>
				<div class="blog-search">
					<form class="search-form" novalidate>
						<label class="with_line">
							<svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" fill="#111F2D"></path>
							</svg>
							<input type="text" name="blog_search" placeholder="<?php pll_e('Search'); ?>">
							<div class="del">
								<svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M26.5912 28.3594L12.449 14.2173L14.2168 12.4495L28.3589 26.5916L26.5912 28.3594Z" fill="#111F2D"></path>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M12.4749 26.5916L26.617 12.4495L28.3848 14.2173L14.2426 28.3594L12.4749 26.5916Z" fill="#111F2D"></path>
								</svg>
							</div>
						</label>
						<div class="searching-list">
							<ul></ul>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="b-blog onAuthorPage">
		<div class="container">
			<div class="blog-items">
				<?php
				if ($author_posts->have_posts()) :
					while ($author_posts->have_posts()) : $author_posts->the_post(); ?>
						<?php get_template_part('gutenberg/post_item'); ?>
					<?php endwhile;
				else : ?>
					<p><?php pll_e('No posts found for this author.'); ?></p>
				<?php endif;
				wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="b-pagination">
			<div class="container">
				<?php 
				$max_pages = $author_posts->max_num_pages;
				if ((int)$max_pages > 1) {
					$pag = custom_pagination_author($current_page, $max_pages, $page_url);
					echo $pag;
				} ?>

			</div>
		</div>
	</div>
	<?php 	
	if (isset($blocks)) {    
	    foreach ($blocks as $block) { 
	    	if ($block["blockName"] == 'acf/other-1-subscribe') {
		     	echo render_block($block); 
		    }
	    } 
 	}
 	?>

<?php get_footer(); ?>