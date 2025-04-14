<?php

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.2');
}

/*
 * require files
 */
require get_template_directory() . '/gutenberg/init.php';
//require get_template_directory() . '/gutenberg/db_forms.php';

// hide plugins and menu items
// add_action('admin_menu', 'remove_admin_menu');
// function remove_admin_menu()
// {
// 	remove_menu_page('edit-comments.php');
// 	remove_menu_page('edit.php?post_type=acf-field-group');
// 	remove_menu_page('edit.php?post_type=udb_widgets');
// 	remove_menu_page('wpshapere-options');
// 	remove_menu_page('cptui_main_menu');
// 	remove_menu_page('quick-featured-images-overview');
// }

remove_theme_support('core-block-patterns');

if (!is_admin()) {
	add_filter('script_loader_tag', function ($tag, $handle) {
		return str_replace(' src', ' defer="defer" src', $tag);
	}, 10, 2);
}

// Add custom styles in Gutenberg
function dev_scripts_gutenberg()
{
	wp_enqueue_style('css-admin3', get_template_directory_uri() . '/dist/css/admin_styles.css');
}
add_action('admin_head', 'dev_scripts_gutenberg', 10, 0);

/*
 * Enqueue scripts and styles.
 */
function journee_scripts()
{
	$file_slug = '';

	wp_enqueue_style('j-main', get_stylesheet_directory_uri() . '/dist/css/cssLibs' . $file_slug . '.css', array(), _S_VERSION);
	wp_enqueue_style('j-bundle', get_stylesheet_directory_uri() . '/dist/css/bundle' . $file_slug . '.css', array(), _S_VERSION);
	wp_style_add_data('j-style', 'rtl', 'replace');
	wp_enqueue_style('j-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_deregister_script('jquery');
	//wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), _S_VERSION, false );
	//wp_enqueue_script( 'j-cdnjs1', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'j-cdnjs2', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array(), _S_VERSION, true );

	wp_enqueue_script('j-libs', get_stylesheet_directory_uri() . '/dist/js/libs' . $file_slug . '.js', array(), _S_VERSION, true);

	if (is_front_page()) {
		wp_enqueue_script('j-home', get_stylesheet_directory_uri() . '/dist/js/home.js', array(), _S_VERSION, true);
	} else {
		wp_enqueue_script('j-others', get_stylesheet_directory_uri() . '/dist/js/others.js', array(), _S_VERSION, true);
	}

	wp_enqueue_script('j-script', get_stylesheet_directory_uri() . '/dist/js/script' . $file_slug . '.js', array(), _S_VERSION, true);
	wp_enqueue_script('j-custom', get_stylesheet_directory_uri() . '/dist/js/dev.js', array(), _S_VERSION, true);

	wp_localize_script(
		'j-custom',
		'ajaxurl',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'journee_scripts');



// webp
function get_webp($image_url)
{
	if (!wp_http_validate_url($image_url)) {
		return false;
	}
	if (strpos($image_url, '.webp') == true) {
		return $image_url;
	}
	$image_url = str_replace(array('.jpg', '.jpeg', '.png'), array('.jpg.webp', '.jpeg.webp', '.png.webp'), $image_url);
	return $image_url;
}


//valid fields

function handler_errors($value, $type = '')
{
	$errors = true;
	if ($type == 'name') { //name
		if ((strlen($value) < 3) or (strlen($value) > 25)) {
			$errors = false;
		}
	}
	if ($type == 'email') { //email simple
		if ((strlen($value) < 3) or !filter_var($value, FILTER_VALIDATE_EMAIL)) {
			$errors = false;
		}
	}
	if ($type == 'message') { //message
		if ((strlen($value) < 3) or (strlen($value) > 1000)) {
			$errors = false;
		}
	}
	return $errors;
}

// breadcrumb
function nav_breadcrumb()
{

	if (is_admin()) return '';

	$delimiter = '';
	$home = (string)pll_translate_string('Main page', pll_current_language());
	$before = '<li>';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {

		echo '<ul class="breadcrumbs">';

		global $post;
		$homeLink = pll_home_url();
		echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;
		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {



			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;



				if ($slug['slug'] == 'services') {
					echo '<li><a href="' . get_field('page_services', 'options') . '">' . pll__('Services') . '</a></li> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				} elseif ($slug['slug'] == 'cases') {
					echo '<li><a href="' . get_field('page_cases', 'options') . '">' . pll__('Cases') . '</a></li> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				} elseif ($slug['slug'] == 'vacancies') {
					echo '<li><a href="' . get_field('page_vacancies', 'options') . '">' . pll__('Vacancies') . '</a></li> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				} else {
					echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				}
			} else {
				$cat = get_the_category();
				$cat = $cat[0];



				echo '<li><a href="' . get_field('page_blog', 'options') . '?category=' . $cat->slug . '">' . $cat->name . '</a></li> ' . $delimiter . ' ';

				//$html .= $before . get_category_parents($cat, TRUE, ' ' . $delimiter . ' '). $after;;
				echo $before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif (is_page() && !$post->post_parent) {
			echo $before . get_the_title() . $after;
		} elseif (is_page() && $post->post_parent) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif (is_search()) {
			echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
		} elseif (is_tag()) {
			echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;
		} elseif (is_404()) {
			echo $before . '404' . $after;
		}

		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
			echo ': ' . __('Seite') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
		}

		echo '</ul>';
	}
}

function get_nav_breadcrumb()
{


	if (is_admin()) return '';

	$delimiter = '';
	$home = (string)pll_translate_string('Main page', pll_current_language());
	$before = '<li>';
	$after = '</li>';
	$html = '';



	if (!is_home() && !is_front_page() || is_paged()) {
		$html .= '<ul class="breadcrumbs">';
		global $post;
		$homeLink = pll_home_url();
		$html .= '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';
		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) $html .= (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			$html .= $before . single_cat_title('', false) . $after;
		} elseif (is_day()) {
			$html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			$html .= '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			$html .= $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			$html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			$html .= $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			$html .= $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {

			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;

				if ($slug['slug'] == 'services') {
					$html .= '<li><a href="' . get_field('page_services', 'options') . '">' . pll__('Services') . '</a></li> ' . $delimiter . ' ';

					$parents = [];
					$current_post_id = get_the_ID();
					$current_post = get_post($current_post_id);
					if ($current_post->post_parent) {
						$parent_post = get_post($current_post->post_parent);
						$parents[] = $current_post->post_parent;
						//$html .= '<li><a href="' . get_permalink($parent_post) . '">' . get_the_title($parent_post) . '</a></li> ' . $delimiter . ' ';
						if ($parent_post->post_parent) {
							$parent_parent_post = get_post($parent_post->post_parent);
							//$html .= '<li><a href="' . get_permalink($parent_parent_post) . '">' . get_the_title($parent_parent_post) . '</a></li> ' . $delimiter . ' ';
							$parents[] = $parent_post->post_parent;
							if ($parent_parent_post->post_parent) {
								$parent_parent_parent_post = get_post($parent_parent_post->post_parent);
								//$html .= '<li><a href="' . get_permalink($parent_parent_parent_post) . '">' . get_the_title($parent_parent_parent_post) . '</a></li> ' . $delimiter . ' ';
								$parents[] = $parent_parent_post->post_parent;
							}
						}
					}

					foreach (array_reverse($parents) as $value) {
						if (get_post_status($value) == 'publish') {
							$html .= '<li><a href="' . get_permalink($value) . '">' . get_the_title($value) . '</a></li> ' . $delimiter . ' ';
						} else {
							$html .= '<li>' . get_the_title($value) . '</li> ' . $delimiter . ' ';
						}
					}

					$html .= $before . get_the_title() . $after;
				} elseif ($slug['slug'] == 'cases') {
					$html .= '<li><a href="' . get_field('page_cases', 'options') . '">' . pll__('Cases') . '</a></li> ' . $delimiter . ' ';
					$html .= $before . get_the_title() . $after;
				} elseif ($slug['slug'] == 'vacancies') {

					$html .= '<li><a href="' . get_field('page_vacancies', 'options') . '">' . pll__('Vacancies') . '</a></li> ' . $delimiter . ' ';
					$html .= $before . get_the_title() . $after;
				} else {
					$html .= '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
					$html .= $before . get_the_title() . $after;
				}
			} else {
				$cat = get_the_category();
				$cat = $cat[0];
				$html .= '<li><a href="' . get_field('page_blog', 'options') . '">' . pll__('Blog') . '</a></li> ' . $delimiter . ' ';
				$html .= '<li><a href="' . get_field('page_blog', 'options') . $cat->slug . '">' . $cat->name . '</a></li> ' . $delimiter . ' ';
				$html .= $before . get_the_title() . $after;
			}
		} elseif (!is_author() && !is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			$html .= $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			$html .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			$html .= '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			$html .= $before . get_the_title() . $after;
		} elseif (is_page() && !$post->post_parent) {

			$request_uri = $_SERVER['REQUEST_URI'];
			$path = parse_url($request_uri, PHP_URL_PATH);
			$path = preg_replace("#/page/\d+/?#", '', $path);
			$path = str_replace(array('/ua', '/pl'), '', $path);
			$category_str = str_replace('/blog/', '', $path);
			$category_str = str_replace('/', '', sanitize_text_field($category_str));
			if (($category_str == 'blog') or ($category_str == 'ua') or ($category_str == 'pl')) $category_str = '';

			$flag_cat = false;
			$categories = get_all_categories();
			foreach ($categories as $cat) {
				if ($cat->slug == $category_str) {
					$flag_cat = true;
					$html_cat_name = $cat->name;
				}
			}

			if ($flag_cat) {
				$html .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li> ' . $delimiter . ' ';
				$html .= $before . $html_cat_name . $after;
			} else {
				$html .= $before . get_the_title() . $after;
			}
		} elseif (is_page() && $post->post_parent) {

			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) $html .= $crumb . ' ' . $delimiter . ' ';
			$html .= $before . get_the_title() . $after;
		} elseif (is_search()) {
			$html .= $before . 'Results for your search for "' . get_search_query() . '"' . $after;
		} elseif (is_tag()) {
			$html .= $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
		} elseif (is_404()) {
			$html .= $before . '404' . $after;
		} elseif (is_author()) {
			$author = get_queried_object();
			$author_name = $author->display_name;
			$html .= '<li><a href="' . get_field("page_blog", "options") . '">Blog</a></li>';
			$html .= $before . $author_name . $after;
		}

		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) $html .= ' (';
			$html .= ': ' . __('Page') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) $html .= ')';
		}

		$html .= '</ul>';
	}

	return $html;
}


function at_get_all_posts($count_items, $paged, $category = '')
{
	$all_posts = new WP_Query(
		array(
			"post_type"         => 'post',
			"posts_per_page"    => $count_items,
			"paged"             => $paged,
			"orderby"           => 'date',
			"order"             => 'DESC',
			'post_status'       => 'publish',
			'category_name'     => $category
		)
	);
	return $all_posts;
}
function get_search_posts($str, $mini = false)
{
	$all_posts = new WP_Query(
		array(
			"post_type"         => 'post',
			"posts_per_page"    => ($mini) ? 5 : -1,
			"s"                 => $str,
			"orderby"           => 'date',
			"order"             => 'DESC',
			'post_status'       => 'publish'
		)
	);
	return $all_posts;
}
function get_all_categories()
{
	$categories = get_categories([
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
	]);
	return $categories;
}

function clear_phone($phone)
{
	return preg_replace('/\D+/', '', $phone);
}

//Registering the page of the main settings of the template using the ACF

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Налаштування теми',
		'menu_title' => 'Налаштування теми',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
	/*
    acf_add_options_sub_page(array(
        'page_title'    => 'Editing text strings',
        'menu_title'    => 'Editing text strings',
        'parent_slug'   => 'theme-general-settings',
    ));
    */
}


/* menus */

add_theme_support('menus');
add_action('after_setup_theme', function () {
	register_nav_menus(array(
		'first_menu' => __('Верхне меню', 'crea'),
		'second_menu' => __('Нижне меню', 'crea'),
		'third_menu' => __('Меню з документами', 'crea'),
	));
});



function custom_pagination($current_page, $max_pages, $page_url)
{
	$page_url_expl = explode('/', $page_url);
	$page_url_last = $page_url_expl[end(array_keys($page_url_expl))];
	$page_url = str_replace($page_url_last, '', $page_url);
	$page_url = preg_replace('/\/page\/\d+\//', '', $page_url);

	$svg_start = '<svg width="11" height="20" viewbox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.25 1.5L1.75 10L10.25 18.5" stroke="#8092A3" stroke-width="2"></path></svg>';
	$svg_finish = '<svg width="11" height="20" viewbox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 18.5L9.25 10L0.750001 1.5" stroke="#8092A3" stroke-width="2"></path></svg>';
	$pagination = '<div class="b-pagination"><div class="container"><ul>';

	// Previous button
	$pagination .= ($current_page == 1) ? '<li class="prev"><a style="pointer-events: none;"' : '<li class="prev"><a ';
	$pagination .= ' href="' . '/' . $page_url . '/page/' . ((int)$current_page - 1) . '/' . $page_url_last . '">' . $svg_start . '</a></li>';

	// Pagination logic
	for ($i = 1; $i <= $max_pages; $i++) {
		// Always show first, last, current page, and neighbors
		if (
			$i == 1 ||
			$i == $max_pages ||
			$i == $current_page ||
			$i == $current_page - 1 ||
			$i == $current_page + 1
		) {
			$pagination .= ($current_page == $i) ? '<li class="active"><a style="pointer-events: none;" ' : '<li><a ';
			$pagination .= ' href="' . '/' . $page_url . '/page/' . $i . '/' . $page_url_last . '"><span>' . $i . '</span></a></li>';
		}
		// Add ellipsis for skipped ranges
		else if (($i == 2 && $current_page > 3) || ($i == $max_pages - 1 && $current_page < $max_pages - 2)) {
			$pagination .= '<li><a><span>...</span></a></li>';
		}
	}

	// Next button
	$pagination .= ($current_page == $max_pages) ? '<li class="next"><a style="pointer-events: none;"' : '<li class="next"><a ';
	$pagination .= ' href="' . '/' . $page_url . '/page/' . ((int)$current_page + 1) . '/' . $page_url_last . '">' . $svg_finish . '</a></li>';

	$pagination .= '</ul></div></div>';

	// Replace redundant slashes and fix URLs
	$pagination = str_replace('//', '/', $pagination);
	$pagination = str_replace('/blog/page/1/', '/blog/', $pagination);
	$pagination = str_replace('/blog/page/0/', '/blog/', $pagination);
	$pagination = str_replace('//', '/', $pagination);
	$pagination = str_replace('page/0/', '', $pagination);
	$pagination = str_replace('page/1/', '', $pagination);

	return $pagination;
}


function custom_pagination_author($current_page, $max_pages, $page_url)
{

	$page_url_expl = explode('/', $page_url);
	$page_url_last = $page_url_expl[end(array_keys($page_url_expl))];
	$page_url_last = preg_replace('/\?page=\d+/', '', $page_url_last);
	$page_url = str_replace($page_url_last, '', $page_url);
	$page_url = preg_replace('/\?page=\d+/', '', $page_url);

	$svg_start = '<svg width="11" height="20" viewbox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.25 1.5L1.75 10L10.25 18.5" stroke="#8092A3" stroke-width="2"></path></svg>';
	$svg_finish = '<svg width="11" height="20" viewbox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 18.5L9.25 10L0.750001 1.5" stroke="#8092A3" stroke-width="2"></path></svg>';
	$pagination = '<div class="b-pagination"><div class="container"><ul>';
	$pagination .=  ($current_page == 1) ? '<li class="prev"><a style="pointer-events: none;"' : '<li class="prev"><a ';
	$pagination .= ' href="' . '/' . $page_url . '/?page=' . ((int)$current_page - 1) . '' . $page_url_last . '">' . $svg_start . '</a></li>';
	$flag = false;
	$flag_back = false;
	for ($i = 1; $i <= $max_pages; $i++) {
		if ($i > 3 and $i < $max_pages and ($current_page !== ($i - 1)) and ($current_page !== ($i + 1)) and ($current_page !== $i)) {
			if (!$flag) {
				$pagination .=  '<li><a><span>...</span></a></li>';
				$flag = true;
			}
		} else if ($current_page > 3 and $i < 3 and $i !== 1) {
			if (!$flag_back) {
				$pagination .=  '<li><a><span>...</span></a></li>';
				$flag_back = true;
			}
		} else {
			$pagination .= ($current_page == $i) ? '<li class="active"><a style="pointer-events: none;" ' : '<li><a ';
			$pagination .= ' href="' . '/' . $page_url . '/?page=' . $i . '' . $page_url_last . '"><span>' . $i . '</span></a></li>';
		}
	}
	$pagination .= ($current_page == $max_pages) ? '<li class="next"><a style="pointer-events: none;"' : '<li class="next"><a ';
	$pagination .= ' href="' . '/' . $page_url . '/?page=' . ((int)$current_page + 1) . '' . $page_url_last . '">' . $svg_finish . '</a></li>';
	$pagination .= '</ul></div></div>';

	$pagination = str_replace('//', '/', $pagination);
	$pagination = str_replace('/blog/page/1', '/blog/', $pagination);
	$pagination = str_replace('/blog/page/0', '/blog/', $pagination);
	$pagination = str_replace('//', '/', $pagination);
	$pagination = str_replace('page/0/', '', $pagination);
	$pagination = str_replace('page/1/', '', $pagination);

	return replace_question_marks_in_href($pagination);
}

function replace_question_marks_in_href($html)
{
	return preg_replace_callback('/href="([^"]+\?[^"]+)"/', function ($matches) {
		$url = $matches[1];

		list($base, $query) = explode('?', $url, 2);

		$query = str_replace('?', '&', $query);

		return 'href="' . $base . '?' . $query . '"';
	}, $html);
}



// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');

function data_fetch()
{
	$search_word = esc_attr($_POST['keyword']);
	if (!$search_word) {
		if ($_GET['s'] && !empty($_GET['s'])) {
			$search_word = $_GET['s'];
		}
	}
	$args = array(

		'post_type' => 'post',
		'posts_per_page' => 5,
		's' => $search_word,
		'exact' => false,
		'sentence' => false,
	);
	if ($search_word) {
		$args['s'] = $search_word;
	}
	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) {
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<li>
				<a href="<?php echo get_permalink($post->ID); ?>">
					<?php echo preg_replace("~($search_word)~iu", "<b>$1</b>", get_the_title($post->ID)); ?>
				</a>
			</li>
		<?php endwhile;
	}
	wp_reset_postdata();
	exit();
}



pll_register_string('article', 'All articles');
pll_register_string('article', 'Was this article helpful for you? Share it with your friends.');
pll_register_string('article', 'Have questions?');
pll_register_string('article', 'Drop us a line to get expert consultation.');
pll_register_string('article', 'Contact Us');
pll_register_string('article', 'Read also');
pll_register_string('article', 'Read article');

pll_register_string('case', 'Other cases');
pll_register_string('case', 'Previous case');
pll_register_string('case', 'Next case');
pll_register_string('case', 'See all cases');

pll_register_string('services', 'Read the full story');
pll_register_string('services', 'Full story');
pll_register_string('services', 'See all cases');

pll_register_string('service', 'Service');
pll_register_string('service', 'See all services');

pll_register_string('forms', 'Get fast answers to any remaining questions');

pll_register_string('trusted', 'Trusted by');
pll_register_string('home_str', 'Cases');
pll_register_string('home_str', 'Let’s do it');
pll_register_string('home_str', 'Simply<br>Contact');
pll_register_string('home_str', 'Company');
pll_register_string('home_str', 'Services');
pll_register_string('home_str', '© 2013 - 2021 Simply contact Inc.');
pll_register_string('home_str', 'Website made by');
pll_register_string('home_str', 'Thank you.');
pll_register_string('home_str', 'Your request has been sent successfully.');
pll_register_string('home_str', 'Main page');

pll_register_string('about', 'See all articles');

pll_register_string('form', 'Name');
pll_register_string('form', 'Field is required');
pll_register_string('form', 'Phone');
pll_register_string('form', 'Email');
pll_register_string('form', 'Select a city');
pll_register_string('form', 'Cover letter');
pll_register_string('form', 'Upload your CV');
pll_register_string('form', 'By pressing this button you agree to our');
pll_register_string('form', 'Privacy Policy');
pll_register_string('form', 'Get in touch');
pll_register_string('form', 'Email is incorrect');
pll_register_string('form', 'Please upload a doc, docx, pdf or pages file');
pll_register_string('form', 'Fill in all required fields (*)');

pll_register_string('vacancy', 'Similar vacancies');
pll_register_string('vacancy', 'View more vacancies');
pll_register_string('vacancy', 'Vacancies');

pll_register_string('cases', 'Filter by Industry');
pll_register_string('cases', 'Filter by Service');
pll_register_string('cases', 'clear all');

pll_register_string('jobs', 'All locations');
pll_register_string('jobs', 'Remote');
pll_register_string('jobs', 'View details');

pll_register_string('chart', 'Define');
pll_register_string('chart', 'challenges');
pll_register_string('chart', 'Determine');
pll_register_string('chart', 'causes');
pll_register_string('chart', 'Develop');
pll_register_string('chart', 'solutions');
pll_register_string('chart', 'Evaluate');
pll_register_string('chart', 'performance');
pll_register_string('chart', 'costs');
pll_register_string('chart', 'quality');

function get_categories_hierarchical($args = array())
{
	if (!isset($args['parent'])) $args['parent'] = 0;
	$args['taxonomy'] = 'cases_services';
	$categories = get_categories($args);
	foreach ($categories as $key => $category):
		$args['parent'] = $category->term_id;
		$categories[$key]->child_categories = get_categories_hierarchical($args);
	endforeach;
	return $categories;
}


// unset auto update plugins
function filter_plugin_updates($value)
{
	if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
		unset($value->response['advanced-custom-fields-pro/acf.php']);
	}
	return $value;
}
//add_filter('site_transient_update_plugins', 'filter_plugin_updates');

function check_active_menu($menu_item)
{
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ($actual_link == $menu_item->url) {
		return 'current-menu-item';
	}
	return '';
}

/* custom widgets */

add_action('wp_dashboard_setup', 'add_dashboard_widgets');
function add_dashboard_widgets()
{
	add_meta_box('my_dashboard_widget0', 'Metabox', 'my_dashboard_widget_function0', 'dashboard', 'side', 'high');
	add_meta_box('my_dashboard_widget1', 'Metabox', 'my_dashboard_widget_function1', 'dashboard', 'side', 'high');
	add_meta_box('my_dashboard_widget2', 'Metabox', 'my_dashboard_widget_function2', 'dashboard', 'side', 'high');
	add_meta_box('my_dashboard_widget3', 'Metabox', 'my_dashboard_widget_function3', 'dashboard', 'side', 'high');
	add_meta_box('my_dashboard_widget4', 'Metabox', 'my_dashboard_widget_function4', 'dashboard', 'side', 'high');
	add_meta_box('my_dashboard_widget5', 'Metabox', 'my_dashboard_widget_function5', 'dashboard', 'side', 'high');
}
function my_dashboard_widget_function0($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для редагування сторінок натискайте на кнопки нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/1.png">

    <a href="/wp-admin/edit.php?post_type=page">Сторінки</a>
    <a href="/wp-admin/post-new.php?post_type=page">Додати нову</a>

    </div>

    <style>
    .cst_st a {
        display: inline-block;
        text-align: center;
        color: white;
        font-size: 20px;
        background: #111f2d;
        text-decoration: none;
        border-radius: 5px;
        width: 49.5%;
        margin-left: auto;
        margin-right: auto;
    }
    </style>


    ';
}
function my_dashboard_widget_function1($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для налаштування сайту натискайте на кнопку нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/2.png"">

    <a style="width: 100%;" href="/wp-admin/admin.php?page=theme-general-settings" >Налаштування</a>

    </div>';
}
function my_dashboard_widget_function2($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для редагування Головної сторінки натискайте на кнопку нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/3.png">

    <a style="width: 100%;" href="/wp-admin/post.php?post=' . pll_get_post(get_option('page_on_front'), pll_default_language()) . '&action=edit">Головнa</a>

    </div>';
}
function my_dashboard_widget_function3($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для редагування Кейсів натискайте на кнопки нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/4.png">

    <a href="/wp-admin/edit.php?post_type=cases">Кейси</a>
    <a href="/wp-admin/post-new.php?post_type=cases">Додати новий</a>

    </div>';
}
function my_dashboard_widget_function4($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для редагування Послуг натискайте на кнопки нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/5.png">

    <a href="/wp-admin/edit.php?post_type=services">Послуги</a>
    <a href="/wp-admin/post-new.php?post_type=services">Додати нову</a>

    </div>';
}
function my_dashboard_widget_function5($post, $callback_args)
{
	echo '<p style="text-align: center;height: 30px;"><b>Для перегляду даних з Форм натискайте на кнопку нижче.</b></p>';
	echo '<div class="cst_st"><img style="width:150px;display: block;margin-left: auto;margin-right: auto;" src="/wp-content/themes/Simply/img/dashboard/6.png">

    <a style="width:100%;" href="/wp-admin/admin.php?page=wp-cf7db">Форми</a>
    </div>';
}




// handler for jobs form
add_action('wp_ajax_handler_join_form', 'handler_join_form');
add_action('wp_ajax_nopriv_handler_join_form', 'handler_join_form');

function handler_join_form()
{

	$params = array();
	parse_str($_POST['data'], $params);
	$files  = $_FILES;
	$attachments = array();

	foreach ($files as $key => $value) {
		if (isset($value['tmp_name'])) {
			$temp = explode(".", $value["name"]);
			$extension = end($temp);
			$newname = $value["tmp_name"] . "." . $extension;
			rename($value["tmp_name"], $newname);
			$attachments[] = $newname;
			$image_url = $newname;
			$upload_dir = wp_upload_dir();
			$image_data = file_get_contents($image_url);
			$filename = basename($image_url);
			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}
			file_put_contents($file, $image_data);
			$wp_filetype = wp_check_filetype($filename, null);
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment($attachment, $file);
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata($attach_id, $file);
			wp_update_attachment_metadata($attach_id, $attach_data);
		}
	}

	$name       = (isset($params['name'])) ? esc_sql(sanitize_text_field($params['name'])) : '';
	$code       = (isset($params['dialCode'])) ? esc_sql(sanitize_text_field($params['dialCode'])) : '';
	$phone      = (isset($params['phone'])) ? $code . esc_sql(sanitize_text_field($params['phone'])) : '';
	$email      = (isset($params['email'])) ? esc_sql(sanitize_text_field($params['email'])) : false;
	$city       = (isset($params['city'])) ? esc_sql(sanitize_text_field($params['city'])) : '';
	$message    = (isset($params['message'])) ? esc_sql(sanitize_text_field($params['message'])) : '';
	$page_id    = (isset($params['page_id'])) ? esc_sql(sanitize_text_field($params['page_id'])) : '';
	$date_added = date('Y-m-d H:i:s');

	//create_plugin_tables();

	if ($phone and $name) {
		global $wpdb;
		$wpdb->insert("wp_jobs", array('name' => $name, 'phone' => $phone, 'email' => $email, 'city' => $city, 'message' => $message, 'page_id' => $page_id, 'attach_id' => $attach_id, 'date_added' => $date_added));

		//mail
		$body_text = '';
		$subject = 'Відгук на приєднання до команди | ' . home_url();
		$recipient_email = get_field('poshta_otrimuvacha_dlya_formi_vakansj', 'options') ? get_field('poshta_otrimuvacha_dlya_formi_vakansj', 'options') : get_option('admin_email');
		if ($name) {
			$body_text .= '<p>Ім\'я: ' . $name . '</p><br>';
		}
		if ($phone) {
			$body_text .= '<p>Телефон: ' . $phone . '</p><br>';
		}
		if ($email) {
			$body_text .= '<p>Пошта: ' . $email . '</p><br>';
		}
		if ($city) {
			$body_text .= '<p>Місто: ' . $city . '</p><br>';
		}
		if ($message) {
			$body_text .= '<p>Повідомлення: ' . $message . '</p><br>';
		}
		if ($attach_id) {
			$body_text .= '<p>Прікріплений файл: <a href="' . wp_get_attachment_url($attach_id) . '">Файл</a></p><br>';
		}
		if ($page_id) {
			$body_text .= '<p>Сторінка, з якої був зроблений запит: <a href="' . get_permalink($page_id) . '">' . get_the_title($page_id) . '</a></p><br>';
		}
		if ($date_added) {
			$body_text .= '<p>Дата заявки: ' . $date_added . '</p>';
		}
		$mail_info = 'noreply@' . str_replace(array('http://', 'https://'), '', home_url());
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= 'From: Simply <' . $mail_info . '>' . "\r\n";
		mail($recipient_email, $subject, $body_text, $headers);

		echo json_encode(array('success' => true));
	} else {
		echo json_encode(array('success' => false));
	}
	exit();
}

function create_plugin_tables()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'jobs';
	$sql = "CREATE TABLE $table_name (
       id int(11) NOT NULL AUTO_INCREMENT,

       name varchar(255) DEFAULT NULL,
       phone varchar(255) DEFAULT NULL,
       email varchar(255) DEFAULT NULL,
       city varchar(255) DEFAULT NULL,
       message varchar(255) DEFAULT NULL,
       page_id varchar(255) DEFAULT NULL,
       attach_id varchar(255) DEFAULT NULL,
       date_added varchar(255) DEFAULT NULL,

       UNIQUE KEY id (id)
   );";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}



// handler for jobs form
add_action('wp_ajax_handler_request_form', 'handler_request_form');
add_action('wp_ajax_nopriv_handler_request_form', 'handler_request_form');

function handler_request_form()
{

	$params = array();
	parse_str($_POST['data'], $params);

	$position       = (isset($params['position'])) ? esc_sql(sanitize_text_field($params['position'])) : '';

	$service = '';
	$service .= (isset($params['service0'])) ? esc_sql(sanitize_text_field($params['service0'])) . ' ' : '';
	$service .= (isset($params['service1'])) ? esc_sql(sanitize_text_field($params['service1'])) . ' ' : '';
	$service .= (isset($params['service2'])) ? esc_sql(sanitize_text_field($params['service2'])) . ' ' : '';
	$service .= (isset($params['service3'])) ? esc_sql(sanitize_text_field($params['service3'])) . ' ' : '';
	$service .= (isset($params['service4'])) ? esc_sql(sanitize_text_field($params['service4'])) . ' ' : '';
	$service .= (isset($params['service5'])) ? esc_sql(sanitize_text_field($params['service5'])) . ' ' : '';
	$service .= (isset($params['service6'])) ? esc_sql(sanitize_text_field($params['service6'])) . ' ' : '';
	$service .= (isset($params['service7'])) ? esc_sql(sanitize_text_field($params['service7'])) . ' ' : '';
	$service .= (isset($params['service8'])) ? esc_sql(sanitize_text_field($params['service8'])) . ' ' : '';
	$service =  rtrim(str_replace(' ', ', ', $service), ", ");

	$details        = (isset($params['details'])) ? esc_sql(sanitize_text_field($params['details'])) : '';

	$name           = (isset($params['name'])) ? esc_sql(sanitize_text_field($params['name'])) : '';
	$company_name   = (isset($params['company_name'])) ? esc_sql(sanitize_text_field($params['company_name'])) : '';
	$code           = (isset($params['dialCode'])) ? esc_sql(sanitize_text_field($params['dialCode'])) : '';
	$phone          = (isset($params['phone'])) ? $code . esc_sql(sanitize_text_field($params['phone'])) : '';
	$email          = (isset($params['email'])) ? esc_sql(sanitize_text_field($params['email'])) : '';
	$referer        = (isset($params['referer'])) ? esc_sql(sanitize_text_field($params['referer'])) : '';
	$date_added     = date('Y-m-d H:i:s');

	//create_plugin_tables2();

	if ($phone and $name) {
		global $wpdb;
		$wpdb->insert("wp_requests", array('position' => $position, 'service' => $service, 'details' => $details, 'name' => $name, 'company_name' => $company_name, 'phone' => $phone, 'email' => $email, 'date_added' => $date_added));

		//mail
		$recipient_email = get_field('poshta_otrimuvacha_dlya_formi_zapitv', 'options') ? get_field('poshta_otrimuvacha_dlya_formi_zapitv', 'options') : get_option('admin_email');
		$subject = 'Новий запит | ' . home_url();
		$body_text = '';
		if ($name) {
			$body_text .= '<p>Ім\'я: ' . $name . '</p><br>';
		}
		if ($phone) {
			$body_text .= '<p>Телефон: ' . $phone . '</p><br>';
		}
		if ($email) {
			$body_text .= '<p>Пошта: ' . $email . '</p><br>';
		}
		if ($company_name) {
			$body_text .= '<p>Назва копманії: ' . $company_name . '</p><br>';
		}
		if ($position) {
			$body_text .= '<p>Посада: ' . $position . '</p><br>';
		}
		if ($service) {
			$body_text .= '<p>Потрібні послуги: ' . $service . '</p><br>';
		}
		if ($details) {
			$body_text .= '<p>Деталі: ' . $details . '</p><br>';
		}
		if ($referer) {
			$body_text .= '<p>Referer page: ' . $referer . '</p><br>';
		}
		if ($date_added) {
			$body_text .= '<p>Дата заявки: ' . $date_added . '</p>';
		}
		$mail_info = 'noreply@' . str_replace(array('http://', 'https://'), '', home_url());
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= 'From: Simply <' . $mail_info . '>' . "\r\n";
		mail($recipient_email, $subject, $body_text, $headers);

		echo json_encode(array('success' => true));
	} else {
		echo json_encode(array('success' => false));
	}
	exit();
}


function create_plugin_tables2()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'requests';
	$sql = "CREATE TABLE $table_name (
       id int(11) NOT NULL AUTO_INCREMENT,

       position varchar(255) DEFAULT NULL,
       service varchar(255) DEFAULT NULL,
       details varchar(255) DEFAULT NULL,
       name varchar(255) DEFAULT NULL,
       company_name varchar(255) DEFAULT NULL,
       phone varchar(255) DEFAULT NULL,
       email varchar(255) DEFAULT NULL,
       date_added varchar(255) DEFAULT NULL,

       UNIQUE KEY id (id)
   );";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}







//forms

function menu_panel_uusers()
{
	add_menu_page('Карьєра', 'Карьєра', 'manage_options', 'forms_page', 'page_callback_forms', 'dashicons-admin-users', 2);
	add_menu_page('Запити', 'Запити', 'manage_options', 'page_callback_request', 'page_callback_request', 'dashicons-testimonial', 3);


	//add_menu_page('Отзывы', 'Отзывы', 'manage_options', 'testimonials_page', 'testimonials_page', 'dashicons-testimonial', 3);
	// add_submenu_page( 'forms_page', 'Волонтерство', 'Волонтерство', 'manage_options', 'forms_volunteer', 'page_callback_forms_volunteer');
	// add_submenu_page( 'forms_page', 'Партнерство', 'Партнерство', 'manage_options', 'forms_partner', 'page_callback_forms_partner');
	// add_submenu_page( 'forms_page', 'Підписки', 'Підписки', 'manage_options', 'forms_page_sub', 'page_callback_forms_page_sub');
	// add_submenu_page( 'forms_page', 'Контактна форма', 'Контактна форма', 'manage_options', 'forms_contacts', 'page_callback_forms_contacts');
	// add_submenu_page( 'forms_page', 'Допомога нам', 'Допомога нам', 'manage_options', 'forms_page_pay', 'page_callback_forms_page_pay');   
	//add_submenu_page( 'forms_page', 'Форма вакансий', 'Форма вакансий', 'manage_options', 'forms_vacancy', 'page_callback_forms_vacancy');
	//add_submenu_page( 'forms_page', 'Форма деактивации', 'Форма деактивации', 'manage_options', 'forms_deact', 'page_callback_forms_deact');



	function page_callback_forms()
	{
		require_once(get_home_path() . '/wp-admin/admin.php');

		if (! current_user_can('list_users')) {
			wp_die(
				'<h1>' . __('Cheatin&#8217; uh?') . '</h1>' .
					'<p>' . __('Sorry, you are not allowed to list users.') . '</p>',
				403
			);
		}

		require_once(get_home_path() . '/wp-config.php');
		global $wpdb;
		$wp_list_table = _get_list_table('WP_Users_List_Table');
		$pagenum = $wp_list_table->get_pagenum();
		$title = __('Users');
		$parent_file = 'uusers';
		if (isset($_GET['uid_del'])) {
			$uid_del = $_GET['uid_del'];
			$uid_del = explode(' ', $uid_del);
			foreach ($uid_del as $key => $value) {
				$mail_query = $wpdb->query("DELETE FROM `wp_jobs` WHERE id='" . $value . "'");
			}
			echo '<p>Записи з ID ' . implode(',', $uid_del) . ' успішно видалено!<p>';
		}
		$page = (isset($_GET['number_page'])) ? esc_sql(sanitize_text_field($_GET['number_page'])) : 1;
		$limit = 10;
		$start = ($page * $limit) - $limit;
		$total = $wpdb->get_results("SELECT * FROM `wp_jobs`");
		$total = count($total);
		$pages = (int)ceil($total / $limit);
		$results = $wpdb->get_results("SELECT * FROM `wp_jobs` ORDER BY id DESC LIMIT " . $limit . " OFFSET " . $start); ?>


		<?php if (isset($results) and $results) { ?>
			<div class="wrap">
				<h1 class="wp-heading-inline">Карьєра</h1>
				<table class="wp-list-table widefat striped" style="width: 100%;table-layout: fixed;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Ім'я</th>
							<th>Телефон</th>
							<th>Пошта</th>
							<th>Місто</th>
							<th>Повідомлення</th>
							<th>Сторінка</th>
							<th>Прикріплення</th>
							<th>Дата</th>
							<th>Видалити</th>
						</tr>
					</thead>
					<tbody id="the-list">
						<?php foreach ($results as $item) { ?>
							<tr>
								<td class="row_id"><?php if ($item->id) {
																			echo $item->id;
																		} else {
																			echo "<span style=\"color:#c9c9c9;\">---</span>";
																		} ?></td>
								<td><?php if ($item->name) {
											echo $item->name;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->phone) {
											echo $item->phone;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->email) {
											echo $item->email;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>

								<td><?php if ($item->city) {
											echo $item->city;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->message) {
											echo $item->message;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->page_id) {
											echo get_permalink($item->page_id);
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->attach_id) {
											echo wp_get_attachment_url($item->attach_id);
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>

								<td><?php if ($item->date_added) {
											echo $item->date_added;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td class="submitbox"><a class="custom_st_button deletion" href="?page=forms_page&uid_del=<?php echo $item->id; ?>">❌</a></td>
							</tr>
						<?php } ?>
					</tbody>

					<tfoot>
						<tr>
							<td colspan="10">
								<?php if ($pages > 1) { ?>
									<div class="pages">
										<ul style="display: flex;">
											<?php for ($i = 1; $i <= $pages; $i++) { ?>
												<?php if ($page == $i) { ?>
													<li style="padding-right: 10px;"><span class="active"><?php echo $i; ?></span></li>
												<?php } else { ?>
													<li style="padding-right: 10px;"><button onclick="window.location='<?php echo esc_url(add_query_arg(array('number_page' => $i))); ?>';"><?php echo $i; ?></button></li>
												<?php } ?>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		<?php } ?>


		<script type="text/javascript">
			function excel_gen() {
				jQuery.ajax({
					url: '<?php echo get_template_directory_uri() ?>/excel_gen.php?token=<?php echo sha1(md5('spooner')) ?>',
					type: 'post',
					data: {
						'table': 'volunteer'
					},
					dataType: 'json',
					success: function(data) {
						if (data.success != '') {
							window.location.href = data.link;
						}
					}
				});
			}

			// modals
			jQuery(document).ready(function() {

				// Get the modal
				var modal = document.getElementById("myModal");

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on the button, open the modal
				btn.onclick = function() {
					modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
					modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}

			});

			function delete_data() {
				var arr = [];
				jQuery('table.datatable tbody tr').each(function(index, val) {
					if (jQuery(jQuery(val).find('input[type="checkbox"]')).is(':checked')) {
						arr.push(jQuery(val).find('.row_id').text());
					}
				});
				if (document.location.href.includes('?')) {
					var url = document.location.href + "&uid_del=" + arr.join(' ');
				} else {
					var url = document.location.href + "?uid_del=" + arr.join(' ');
				}
				document.location = url;
			}
		</script>





	<?php }

	function page_callback_request()
	{
		require_once(get_home_path() . '/wp-admin/admin.php');

		if (! current_user_can('list_users')) {
			wp_die(
				'<h1>' . __('Cheatin&#8217; uh?') . '</h1>' .
					'<p>' . __('Sorry, you are not allowed to list users.') . '</p>',
				403
			);
		}

		require_once(get_home_path() . '/wp-config.php');
		global $wpdb;

		$wp_list_table = _get_list_table('WP_Users_List_Table');
		$pagenum = $wp_list_table->get_pagenum();
		$title = __('Users');
		$parent_file = 'uusers';
		if (isset($_GET['uid_del'])) {
			$uid_del = $_GET['uid_del'];
			$uid_del = explode(' ', $uid_del);
			foreach ($uid_del as $key => $value) {
				$mail_query = $wpdb->query("DELETE FROM `wp_requests` WHERE id='" . $value . "'");
			}
			echo '<p>Записи з ID ' . implode(',', $uid_del) . ' успішно видалено!<p>';
		}
		$page = (isset($_GET['number_page'])) ? esc_sql(sanitize_text_field($_GET['number_page'])) : 1;
		$limit = 10;
		$start = ($page * $limit) - $limit;
		$total = $wpdb->get_results("SELECT * FROM `wp_requests` ");
		$total = count($total);
		$pages = (int)ceil($total / $limit);
		$results = $wpdb->get_results("SELECT * FROM `wp_requests` ORDER BY id DESC LIMIT " . $limit . " OFFSET " . $start); ?>




		<?php if (isset($results) and $results) { ?>
			<div class="wrap">
				<h1 class="wp-heading-inline">Карьєра</h1>
				<table class="wp-list-table widefat striped" style="width: 100%;table-layout: fixed;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Позиція</th>
							<th>Сервіс</th>
							<th>Деталі</th>
							<th>Ім'я</th>
							<th>Компанія</th>
							<th>Телефон</th>
							<th>Пошта</th>
							<th>Дата</th>
							<th>Видалити</th>
						</tr>
					</thead>
					<tbody id="the-list">
						<?php foreach ($results as $item) { ?>
							<tr>
								<td class="row_id"><?php if ($item->id) {
																			echo $item->id;
																		} else {
																			echo "<span style=\"color:#c9c9c9;\">---</span>";
																		} ?></td>

								<td><?php if ($item->position) {
											echo $item->position;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->service) {
											echo $item->service;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->details) {
											echo $item->details;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->name) {
											echo $item->name;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->company_name) {
											echo $item->company_name;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->phone) {
											echo $item->phone;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td><?php if ($item->email) {
											echo $item->email;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>

								<td><?php if ($item->date_added) {
											echo $item->date_added;
										} else {
											echo "<span style=\"color:#c9c9c9;\">---</span>";
										} ?></td>
								<td class="submitbox"><a class="custom_st_button deletion" href="?page=page_callback_request&uid_del=<?php echo $item->id; ?>">❌</a></td>
							</tr>
						<?php } ?>
					</tbody>

					<tfoot>
						<tr>
							<td colspan="10">
								<?php if ($pages > 1) { ?>
									<div class="pages">
										<ul style="display: flex;">
											<?php for ($i = 1; $i <= $pages; $i++) { ?>
												<?php if ($page == $i) { ?>
													<li style="padding-right: 10px;"><span class="active"><?php echo $i; ?></span></li>
												<?php } else { ?>
													<li style="padding-right: 10px;"><button onclick="window.location='<?php echo esc_url(add_query_arg(array('number_page' => $i))); ?>';"><?php echo $i; ?></button></li>
												<?php } ?>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		<?php } ?>









		<script type="text/javascript">
			function excel_gen() {
				jQuery.ajax({
					url: '<?php echo get_template_directory_uri() ?>/excel_gen.php?token=<?php echo sha1(md5('spooner')) ?>',
					type: 'post',
					data: {
						'table': 'partner'
					},
					dataType: 'json',
					success: function(data) {
						if (data.success != '') {
							window.location.href = data.link;
						}
					}
				});
			}

			function delete_data() {
				var arr = [];
				jQuery('table.datatable tbody tr').each(function(index, val) {
					if (jQuery(jQuery(val).find('input[type="checkbox"]')).is(':checked')) {
						arr.push(jQuery(val).find('.row_id').text());
					}
				});
				if (document.location.href.includes('?')) {
					var url = document.location.href + "&uid_del=" + arr.join(' ');
				} else {
					var url = document.location.href + "?uid_del=" + arr.join(' ');
				}
				document.location = url;
			}
		</script>
	<?php }
}

add_action('admin_menu', 'menu_panel_uusers');

//end forms

add_filter('wpcf7_spam', '__return_false');
add_filter('wpcf7_skip_spam_check', '__return_true');

add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page()
{
	global $wp_query;
	/*
    if ( is_author() ) {
        global $wp_query;
        $wp_query->set_404();
    }
    */
	if (is_category()) {
		global $wp_query;
		$wp_query->set_404();
	}
}

add_action('init', 'process_post');
function process_post()
{
	require get_template_directory() . '/libs/iso_code.php';
}

// Добавляем или редактируем атрибут 'alt' для изображений в кастомных блоках Gutenberg
function add_edit_image_alt_custom_blocks($block_content, $block)
{
	$page_title = get_the_title();
	$block_content = add_edit_image_alt_2($block_content, $page_title);
	return $block_content;
}
add_filter('render_block', 'add_edit_image_alt_custom_blocks', 10, 2);

function add_edit_image_alt_2($content, $page_title)
{
	// Ищем все изображения в содержимом
	preg_match_all('/<img[^>]+>/i', $content, $matches);

	if (!empty($matches[0])) {
		static $photo_number = 1;
		foreach ($matches[0] as $image) {
			// Получаем атрибуты изображения
			preg_match('/alt=["\'](.*?)["\']/', $image, $alt_match);
			preg_match('/title=["\'](.*?)["\']/', $image, $title_match);

			// Создаем новые значения для 'alt' и 'title'
			$new_alt = $page_title . ': №' . $photo_number;
			$new_title = $page_title . ': №' . $photo_number . ' | Simply Contact';
			// Если 'alt' не задан, добавляем его
			if (empty($alt_match)) {
				$new_image = str_replace('<img', '<img alt="' . $new_alt . '"', $image);
			} else {
				// Иначе редактируем 'alt'
				$new_image = str_replace('alt="' . $alt_match[1] . '"', 'alt="' . $new_alt . '"', $image);
			}
			// Если 'title' не задан, добавляем его
			if (empty($title_match)) {
				$new_image = str_replace('<img', '<img title="' . $new_title . '"', $new_image);
			} else {
				// Иначе редактируем 'title'
				$new_image = str_replace('title="' . $title_match[1] . '"', 'title="' . $new_title . '"', $new_image);
			}
			// Заменяем оригинальное изображение на новое
			$content = str_replace($image, $new_image, $content);

			$photo_number++;
		}
	}
	return $content;
}

/*
* disable Yoast SEO Schema JSON-LD 
*/
//add_filter( 'wpseo_json_ld_output', '__return_empty_array' );

function generate_breadcrumbs_ld_json()
{
	$breadcrumbs = array();

	//$current_url = esc_url(home_url(add_query_arg(array(), $wp->request)));
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$url_parts = explode('/', $current_url);

	$url_parts = array_filter($url_parts);

	$position = 1;
	$url = home_url('/');

	$breadcrumbs[] = array(
		'@type' => 'ListItem',
		'position' => $position,
		'name' => 'Simply Contact',
		'item' => $url
	);

	array_shift($url_parts);
	array_shift($url_parts);

	foreach ($url_parts as $part) {
		$url .= $part . '/';

		$url = str_replace('/ua/ua/', '/ua/', $url);
		$url = str_replace('/pl/pl/', '/pl/', $url);

		$position++;
		$name = ucwords(str_replace(array('-', '_'), ' ', $part)); // Преобразуем дефисы и подчеркивания в пробелы

		if ($part == end($url_parts)) {
			$breadcrumbs[] = array(
				'@type' => 'ListItem',
				'position' => $position,
				'name' => $name,
				//'item' => $url
			);
		} else {
			$breadcrumbs[] = array(
				'@type' => 'ListItem',
				'position' => $position,
				'name' => $name,
				'item' => $url
			);
		}
	}
	$json_ld = array(
		'@context' => 'https://schema.org',
		'@type' => 'BreadcrumbList',
		'itemListElement' => $breadcrumbs
	);
	echo '<script type="application/ld+json">' . json_encode($json_ld) . '</script>';
}

// Добавляем хлебные крошки на страницу
add_action('wp_head', 'generate_breadcrumbs_ld_json');

//seo title for pagination

add_filter('wpseo_title', 'custom_title');
function custom_title($title)
{
	global $paged, $page;
	if ($paged >= 2 || $page >= 2) {
		$title .= ' 》 ' . sprintf('Page %s', max($paged, $page));
	}
	return $title;
}
add_filter('wpseo_metadesc', 'custom_meta');
function custom_meta($desc)
{
	global $paged, $page;
	if ($paged >= 2 || $page >= 2) {
		$desc .= ' 》 ' . sprintf('Page %s', max($paged, $page));
	}
	return $desc;
}
add_action('wp_head', 'add_canonical_tag');
function add_canonical_tag()
{
	$canonical_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	global $paged, $page;
	if ($paged >= 2 || $page >= 2) {
		echo '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . PHP_EOL;
	}
}
add_filter('wpseo_canonical', 'prefix_filter_canonical_example');
function prefix_filter_canonical_example($canonical)
{
	global $paged, $page;
	if ($paged >= 2 || $page >= 2) {
		return false;
	}
	return $canonical;
}
add_filter('pre_get_shortlink', function ($shortlink) {
	return '';
});



function get_image_dimensions_by_url($image_url)
{
	$image_dimensions = array('width' => 0, 'height' => 0);

	// Check if the URL is valid and points to an image.
	if (filter_var($image_url, FILTER_VALIDATE_URL) && getimagesize($image_url)) {
		list($width, $height) = getimagesize($image_url);
		$image_dimensions['width'] = $width;
		$image_dimensions['height'] = $height;
	}

	return $image_dimensions;
}

// Добавляем или редактируем атрибут высоты и ширины для изображений в кастомных блоках Gutenberg
function add_edit_image_width_custom_blocks($block_content, $block)
{
	$page_title = get_the_title();
	$block_content = add_edit_image_alt_3($block_content, $page_title);
	return $block_content;
}
add_filter('render_block', 'add_edit_image_width_custom_blocks', 10, 2);


function add_edit_image_alt_3($content, $page_title)
{
	preg_match_all('/<img[^>]+>/i', $content, $matches);
	if (!empty($matches[0])) {
		foreach ($matches[0] as $image) {

			$new_image = $image;

			preg_match('/height=["\'](.*?)["\']/', $image, $height_match);
			preg_match('/width=["\'](.*?)["\']/', $image, $width_match);
			preg_match('/src=["\'](.*?)["\']/', $image, $src_match);

			$image_url = isset($src_match[1]) ? str_replace(site_url(), '', $src_match[1]) : false;
			$theme_path = str_replace('/wp-content/themes/Simply', '', get_template_directory());
			$image_path = $image_url ? $theme_path . $image_url : false;

			$getimagesize_data = $image_path ? getimagesize($image_path) : false;

			$extension = pathinfo(parse_url($image_url, PHP_URL_PATH), PATHINFO_EXTENSION);

			if ($extension == 'svg') {
				preg_match("#viewbox=[\"']\d* \d* (\d*+(\.?+\d*)) (\d*+(\.?+\d*))#i", file_get_contents($src_match[1]), $d);
				$relWidth = (float) $d[1];
				$relHeight = (float) $d[3];

				$new_width = $relWidth;
				$new_height = $relHeight;
			} else {
				$new_width = isset($getimagesize_data[0]) ? $getimagesize_data[0] : '';
				$new_height = isset($getimagesize_data[1]) ? $getimagesize_data[1] : '';
			}

			if (empty($width_match) or empty($height_match)) {
				$new_image = str_replace('<img', '<img width="' . $new_width . '" height="' . $new_height . '"', $new_image);

				$content = str_replace($image, $new_image, $content);
			} else {
				$new_image = str_replace('width="' . $width_match[1] . '"', 'width="' . $new_width . '"', $new_image);
				$content = str_replace($image, $new_image, $content);
			}
		}
	}
	return $content;
}



/*
function getRefererPage( $form_tag ) {
    if (isset($_COOKIE['referer']) && $form_tag['name'] == 'referer-page' ) {
        $data = isset($_COOKIE['referer']) ? $_COOKIE['referer'] : $_SERVER['HTTP_REFERER'];
        $form_tag['values'][] = htmlspecialchars($data);
    }
    return $form_tag;
}

if ( !is_admin() ) {
    add_filter( 'wpcf7_form_tag', 'getRefererPage' );
}
*/

//--------------- Referer code for contact form 7
function getIP()
{
	$sProxy = '';
	if (getenv('HTTP_CLIENT_IP')) {
		$sProxy = $_SERVER['REMOTE_ADDR'];
		$sIP    = getenv('HTTP_CLIENT_IP');
	} elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) {
		$sProxy = $_SERVER['REMOTE_ADDR'];
		$sIP    = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$sIP    = $_SERVER['REMOTE_ADDR'];
	}
	if (! empty($sProxy)) {
		$sIP = $sIP . 'via-proxy:' . $sProxy;
	}
	return $sIP;
}
function setRefererTransient($uniqueID)
{
	if (false === ($void = get_transient($uniqueID))) {
		// set a transient for 2 hours
		set_transient($uniqueID, $_SERVER['HTTP_REFERER'], 60 * 60 * 2);
	}
}
function getRefererPage($form_tag)
{
	if ($form_tag['name'] == 'referer-page') {
		$uniqueID = getIP();
		setRefererTransient($uniqueID);
		$form_tag['values'][] =  get_transient($uniqueID);
	}
	return $form_tag;
}
if (!is_admin()) {
	add_filter('wpcf7_form_tag', 'getRefererPage');
}

/*
add_action( 'init', 'referer_coockie' );
function referer_coockie() {      
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $yourSiteDomain = 'simplycontact.com';
    if ($referer && strpos($referer, $yourSiteDomain) === false) {
        setcookie('referer', $referer, time() + 3600, '/');
    } 
}
*/

add_filter('wpcf7_autop_or_not', '__return_false');


/*
* utm to cookie
*/
function save_utm_to_cookie()
{
	$cookie_expiration = time() + 60 * 60 * 24 * 30;

	$current_url = $_SERVER['REQUEST_URI'];
	$referrer = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) : '';

	$utm_params = [
		'utm_source'   => '',
		'utm_medium'   => '',
		'utm_campaign' => '',
		'utm_term'     => '',
		'utm_content'  => ''
	];

	$has_new_utm = false;

	foreach ($utm_params as $key => $value) {
		if (isset($_GET[$key])) {
			$utm_params[$key] = sanitize_text_field($_GET[$key]);
			$has_new_utm = true;
		}
	}

	if (isset($_GET['gclid'])) {
		$utm_params['utm_source'] = 'google';
		$utm_params['utm_medium'] = 'cpc';

		if (isset($_COOKIE['_ga'])) {
			$ga_cookie = explode('.', $_COOKIE['_ga']);
			if (isset($ga_cookie[2]) && isset($ga_cookie[3])) {
				$client_id = $ga_cookie[2] . '.' . $ga_cookie[3];
				$utm_params['utm_term'] = $client_id;
			}
		} else {
			$utm_params['utm_term']   = 'cid';
		}
	}

	$social_networks = ['linkedin', 'facebook', 'instagram', 'telegram', 'viber', 'x'];

	if (!$has_new_utm && !empty($referrer)) {
		foreach ($social_networks as $network) {
			if (stripos($referrer, $network) !== false) {
				$utm_params['utm_source'] = $network;
				$utm_params['utm_medium'] = 'cpc';
				$has_new_utm = true;
				break;
			}
		}
	}

	if ($has_new_utm) {
		foreach ($utm_params as $key => $value) {
			if (!empty($value)) {
				setcookie($key, $value, $cookie_expiration, COOKIEPATH, COOKIE_DOMAIN);
				$_COOKIE[$key] = $value;
			}
		}
	} else {

		if (empty($utm_params['utm_source']) and empty($_COOKIE['utm_source']) and empty($_COOKIE['utm_medium'])) {
			if (preg_match('/(google|bing|yahoo|yandex)/i', $referrer, $matches)) {
				$utm_params['utm_source'] = $matches[1];
				$utm_params['utm_medium'] = 'organic';
			} elseif (!empty($referrer)) {
				$utm_params['utm_source'] = $referrer;
				$utm_params['utm_medium'] = 'referral';
			} else {
				$utm_params['utm_source'] = '(direct)';
				$utm_params['utm_medium'] = '(none)';
			}
		}

		foreach ($utm_params as $key => $value) {
			if (!empty($value)) {
				if (!isset($_COOKIE[$key]) || $_COOKIE[$key] !== $value) {
					setcookie($key, $value, $cookie_expiration, COOKIEPATH, COOKIE_DOMAIN);
					$_COOKIE[$key] = $value;
				}
			}
		}
	}
}
add_action('init', 'save_utm_to_cookie');

function custom_category_rewrite_rule_def()
{
	add_rewrite_rule(
		'^blog/([^/]*)/?',
		'index.php?pagename=blog&category=$matches[1]',
		'top'
	);
}
add_action('init', 'custom_category_rewrite_rule_def');

function custom_category_rewrite_rule()
{
	add_rewrite_rule(
		'^([a-z]{2})/blog/([^/]*)/?',
		'index.php?pagename=blog&lang=$matches[1]&category=$matches[2]',
		'top'
	);
}
add_action('init', 'custom_category_rewrite_rule');

// Cache-Control
function add_cache_control_headers()
{
	if (is_page() || is_single()) {
		// Для сторінок та постів сайту: max-age=86400 (1 день)
		header("Cache-Control: max-age=86400, must-revalidate");
	} else {
		// Для статичних ресурсів (CSS, JS, шрифти, зображення): max-age=604800 (7 днів)
		header("Cache-Control: max-age=604800, must-revalidate");
	}
}
add_action('send_headers', 'add_cache_control_headers');

// Last-Modified
function add_last_modified_header()
{
	if (is_singular()) {
		$last_modified_time = get_the_modified_time('D, d M Y H:i:s') . ' GMT';
		header("Last-Modified: $last_modified_time");

		// Перевірка If-Modified-Since
		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= strtotime($last_modified_time)) {
			// Якщо контент не змінювався, повертаємо 304 і завершуємо виконання
			header("HTTP/1.1 304 Not Modified");
			exit;
		}
	}
}
add_action('send_headers', 'add_last_modified_header');

// ETag
function add_etag_header()
{
	if (is_singular()) {
		$etag = '"' . md5(get_the_modified_time('U')) . '"';
		header("ETag: $etag");

		// Перевірка If-None-Match
		if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) {
			// Якщо ETag збігається, повертаємо 304 і завершуємо виконання
			header("HTTP/1.1 304 Not Modified");
			exit;
		}
	}
}
add_action('send_headers', 'add_etag_header');

/*
* service rating schema
*/
function add_service_rating_schema()
{
	if (is_singular('services')) {
		// Get the current post data
		global $post;

		// Define variables for the schema data
		$service_name = get_the_title($post->ID);
		$service_description = get_the_excerpt($post->ID);
		$page_url = get_permalink($post->ID);
		$average_score = get_field('average_score', $post->ID);
		$number_of_ratings = get_field('number_of_ratings', $post->ID);

		// Set default values if not available
		$average_score = $average_score ? $average_score : '0';
		$number_of_ratings = $number_of_ratings ? $number_of_ratings : '0';

		// JSON-LD Schema for AggregateRating
		$schema = [
			"@context" => "https://schema.org/",
			"@type" => "Product",
			"name" => $service_name,
			"url" => $page_url,
			"description" => $service_description,
			"brand" => "Simply Contact",
			"aggregateRating" => [
				"@type" => "AggregateRating",
				"ratingValue" => $average_score,
				"ratingCount" => $number_of_ratings,
			],
		];

		// Output the schema as JSON-LD script tag
		echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
	}
}
add_action('wp_head', 'add_service_rating_schema');

/*
* Function to set post views
*/
function set_post_views($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '1');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

/*
* Function to get post views
*/
function get_post_views($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 Views";
	}
	return $count . ' Views';
}

/*
* Hook to increment post views
*/
function track_post_views($postID)
{
	if (!is_single()) return;
	if (empty($postID)) $postID = get_the_ID();
	set_post_views($postID);
}
add_action('wp_head', 'track_post_views');

/*
* author meta tag
*/
function add_author_meta_tag()
{
	if (is_author()) {
		$author = get_queried_object();
		$author_id = $author->ID;
		echo '<link rel="author" href="' . get_author_posts_url($author_id) . '" />';
	}
}
add_action('wp_head', 'add_author_meta_tag');

/*
* author url rule
*/
function custom_author_rewrite_rule()
{
	add_rewrite_rule(
		'^blog/author/([^/]+)/?$',
		'index.php?author_name=$matches[1]',
		'top'
	);
}
add_action('init', 'custom_author_rewrite_rule');

/*
* author json ld
*/
function add_author_json_ld()
{
	if (is_author()) {
		$author_data = get_queried_object();
		$author_id = $author_data->ID;
		$author = get_userdata($author_id);
		$author_name = esc_html($author->display_name);
		$author_url = esc_url(get_author_posts_url($author_id));
		$author_image = esc_url(get_avatar_url($author_id));
		$author_position = get_field("pozicya_avtora", "user_{$author_id}");

		if (pll_current_language() == 'ua') {
			$addressRegion = 'UA';
		} else if (pll_current_language() == 'pl') {
			$addressRegion = 'PL';
		} else {
			$addressRegion = 'GB';
		}

		$json_ld = [
			'@context' => 'https://schema.org',
			'@type' => 'Person',
			'name' => $author_name,
			'url' => $author_url,
			'image' => $author_image,
			'jobTitle' => $author_position,
			'worksFor' => [
				'@type' => 'Organization',
				'name' => 'Customer Support Outsourcing Company Simply Contact',
			],
			'address' => [
				'@type' => 'PostalAddress',
				'addressRegion' => $addressRegion,
			],
		];

		echo '<script type="application/ld+json">' . json_encode($json_ld) . '</script>';
	}
}
add_action('wp_head', 'add_author_json_ld');

/*
* last modified for posts
*/
function add_custom_last_modified_meta_box()
{
	add_meta_box(
		'last_modified_meta_box',         // ID мета-бокса
		'Время последнего изменения',     // Заголовок мета-бокса
		'display_last_modified_meta_box', // Функция отображения
		'post',                           // Тип записи (например, 'post')
		'side',                           // Позиция ('side' — боковая панель)
		'high'                            // Приоритет
	);
}
add_action('add_meta_boxes', 'add_custom_last_modified_meta_box');

// Функция отображения мета-бокса
function display_last_modified_meta_box($post)
{
	// Получаем текущее значение поля
	$last_modified = get_post_meta($post->ID, '_last_modified', true);

	// Отображаем поле для ввода даты и времени
	echo '<label for="last_modified_field">Укажите время последнего изменения (формат: YYYY-MM-DD HH:MM):</label>';
	echo '<input type="datetime-local" id="last_modified_field" name="last_modified_field" value="' . esc_attr($last_modified) . '" />';
}

// Сохранение значения мета-поля
function save_last_modified_meta_box($post_id)
{
	// Проверяем, есть ли данные и сохранены ли они
	if (isset($_POST['last_modified_field'])) {
		update_post_meta($post_id, '_last_modified', sanitize_text_field($_POST['last_modified_field']));
	}
}
add_action('save_post', 'save_last_modified_meta_box');

/*
* new strings
*/
pll_register_string('author', 'Ask a question');
pll_register_string('author', 'List of %s\'s articles');
pll_register_string('author', 'Last published');
pll_register_string('author', 'Most popular');
pll_register_string('author', 'No posts found for this author.');

pll_register_string('article', 'Updated:');
pll_register_string('article', 'Written by');
pll_register_string('article', 'table of content');

/*
* edit wpseo json ld
*/
add_filter('wpseo_schema_webpage', function ($data, $context) {
	if (is_singular()) {
		$id = get_the_ID();
		$custom_date_modified = get_post_meta($id, '_last_modified', true);
		if (!empty($custom_date_modified)) {
			$date_iso = date('c', strtotime($custom_date_modified));
			$data['dateModified'] = $date_iso;
		}
	}
	return $data;
}, 10, 2);


/*
function add_new_anonical_tag() {
    if (is_singular()) {
        $canonical_url = get_permalink();
    } elseif (is_home() || is_front_page()) {
        $canonical_url = home_url();
    } elseif (is_category() || is_tag() || is_archive()) {
        $canonical_url = get_term_link(get_queried_object());
    } else {
        return;
    }
    if (!is_author()) {
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }
}
add_action('wp_head', 'add_new_anonical_tag');
*/

/*
* new robots
*/
function remove_existing_robots_meta()
{
	if (is_admin()) {
		return;
	}
	$url = $_SERVER['REQUEST_URI'];
	if ((strpos($url, 'blog_search=') !== false) or (strpos($url, '?sort=') !== false) or (preg_match('~\/page\/\d+\/?$~', $url))) {
		ob_start(function ($buffer) {
			return preg_replace('/<meta\s+name=[\'"]robots[\'"]\s+content=[\'"][^\'"]*[\'"]\s*\/?>/i', '', $buffer, 1);
		});
	}
}
add_action('template_redirect', 'remove_existing_robots_meta', 0);

function add_noindex_meta()
{
	if (is_admin()) {
		return;
	}

	$url = $_SERVER['REQUEST_URI'];
	if ((strpos($url, 'blog_search=') !== false) or (strpos($url, '?sort=') !== false) || (preg_match('~\/page\/\d+\/?$~', $url))) {
		echo '<meta name="robots" content="noindex">' . "\n";
	}
}
add_action('wp_head', 'add_noindex_meta', 1);

/*
* wpseo_schema_breadcrumb
*/
add_filter('wpseo_schema_breadcrumb', '__return_false');

/*
* phone
*/
add_filter('wpcf7_posted_data', function ($posted_data) {
	if (isset($posted_data['phone'])) {
		$posted_data['your-phone'] = $posted_data['phone'];
	}
	return $posted_data;
});

pll_register_string('author', 'List of %s\'s articles');
pll_register_string('author', 'Last published');
pll_register_string('author', 'Most popular');
pll_register_string('author', 'Ask a question');
pll_register_string('author', 'Search');

pll_register_string('blog', 'All');

/*
* remove breadcrumb in WebPage
*/
add_filter('wpseo_schema_webpage', function ($data) {
	if (isset($data['breadcrumb'])) {
		unset($data['breadcrumb']);
	}
	return $data;
}, 10, 1);

/*
* redirect categories urls
*/
function redirect_old_to_new_blog_urls_with_languages()
{
	$current_url = $_SERVER['REQUEST_URI'];
	if (isset($_GET['category'])) {
		$category = sanitize_text_field($_GET['category']);
		preg_match('#^/([a-z]{2})/blog/#', $current_url, $matches);
		$language_prefix = isset($matches[1]) ? $matches[1] : '';
		$new_url = home_url('/' . ($language_prefix ? $language_prefix . '/' : '') . 'blog/' . $category . '/');
		wp_redirect($new_url, 301);
		exit;
	}
}
add_action('template_redirect', 'redirect_old_to_new_blog_urls_with_languages');

/*
* edit hreflang
*/
add_filter('pll_rel_hreflang_attributes', function ($hreflangs) {
	if (strpos($_SERVER['REQUEST_URI'], 'remote=true') !== false) {
		foreach ($hreflangs as $lang => $url) {
			$hreflangs[$lang] = trailingslashit($url) . '?remote=true';
		}
		return $hreflangs;
	}
	$category = '';
	$request_uri = trim($_SERVER['REQUEST_URI'], '/');
	if (preg_match('#^blog/([^/]+)/?#', $request_uri, $matches)) {
		$category = $matches[1] . '/';
	} elseif (preg_match('#^([a-z]{2})/blog/([^/]+)/?#', $request_uri, $matches)) {
		$category = $matches[2] . '/';
	}

	if (preg_match('/page\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
		$paged = $matches[1];
		foreach ($hreflangs as $lang => $url) {
			$hreflangs[$lang] = trailingslashit($url) . $category . 'page/' . $paged;
		}
	} else {
		foreach ($hreflangs as $lang => $url) {
			$hreflangs[$lang] = trailingslashit($url) . $category . $paged;
		}
	}
	return $hreflangs;
});

/*
* fix 500 errors
*/
function sanitize_page_query()
{
	if (is_author() && isset($_GET['page'])) {
		$page = filter_var($_GET['page'], FILTER_VALIDATE_INT);

		// If the page number is invalid (negative or not a number), reset to 1
		if ($page === false || $page < 1) {
			wp_redirect(remove_query_arg('page'));
			exit;
		}
	}
}
add_action('template_redirect', 'sanitize_page_query');

function fix_duplicate_query_params()
{
	if (is_author()) {
		$url = $_SERVER['REQUEST_URI'];

		// Remove duplicate `?` occurrences
		$clean_url = preg_replace('/\?+/', '?', $url);

		// Redirect only if the URL was modified
		if ($clean_url !== $url) {
			wp_redirect($clean_url, 301);
			exit;
		}
	}
}
add_action('template_redirect', 'fix_duplicate_query_params');

/*
* remove breadcrumb in WebPage
*/
function bybe_remove_yoast_json($data)
{
	if (is_single() && 'post' == get_post_type()) {
		$data = array();
		return $data;
	}
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);


function generate_article_schema()
{
	if (is_single() && 'post' == get_post_type()) {

		global $post;

		$author_id = $post->post_author;
		$author_name = get_the_author_meta('display_name', $author_id);
		$author_url = get_author_posts_url($author_id);

		$publisher_name = get_bloginfo('name');
		$publisher_url = home_url();
		$publisher_logo_url = 'https://simplycontact.com/wp-content/uploads/2022/07/Logo-Simply-Contact.png';

		$main_image = get_the_post_thumbnail_url($post->ID, 'full');
		$main_image_data = wp_get_attachment_metadata(get_post_thumbnail_id($post->ID));

		$schema_data = [
			"@context" => "https://schema.org",
			"@type" => "Article",
			"headline" => get_the_title(),
			"mainEntityOfPage" => [
				"@type" => "WebPage",
				"@id" => get_permalink()
			],
			"datePublished" => get_the_date(DATE_W3C),
			"dateModified" => get_the_modified_date(DATE_W3C),
			"author" => [
				"@type" => "Person",
				"name" => $author_name,
				"url" => $author_url
			],
			"publisher" => [
				"@type" => "Organization",
				"name" => $publisher_name,
				"url" => $publisher_url,
				"logo" => [
					"@type" => "ImageObject",
					"url" => $publisher_logo_url,
					"width" => 200,
					"height" => 60
				]
			],
			"image" => [
				"@type" => "ImageObject",
				"url" => $main_image,
				"width" => $main_image_data['width'] ?? 800,
				"height" => $main_image_data['height'] ?? 600
			],
			"description" => get_the_excerpt(),
			"inLanguage" => get_locale(),
			"wordCount" => str_word_count(strip_tags(get_the_content())),
			"articleBody" => wp_strip_all_tags(get_the_content())
		];

		echo '<script type="application/ld+json">' . json_encode($schema_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
	}
}

add_action('wp_head', 'generate_article_schema');

/*
* exclude authors from sitemap
*/
function sitemap_exclude_authors($users)
{
	return array_filter($users, function ($user) {
		if ($user->ID === 5) {
			return false;
		}

		return true;
	});
}

add_filter('wpseo_sitemap_exclude_author', 'sitemap_exclude_authors');


add_action('wp_head', function () {
	?>
	<script src="<?php echo get_template_directory_uri(); ?>/dist/js/libs.js" defer></script>
	<script src="https://simply-back.redlab.site/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9" id="regenerator-runtime-js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/dist/js/home.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/dist/js/script.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/dist/js/dev.js" defer></script>
<?php
});

if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Whitepapers Settings',
		'menu_title' => 'Whitepapers Settings',
		'menu_slug' => 'whitepapers-settings',
		'parent_slug' => 'edit.php?post_type=whitepapers', // головне тут!
		'capability' => 'edit_posts',
		'redirect' => false
	));
}
if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Webinars Settings',
		'menu_title' => 'Webinars Settings',
		'menu_slug' => 'webinars-settings',
		'parent_slug' => 'edit.php?post_type=webinars', // головне тут!
		'capability' => 'edit_posts',
		'redirect' => false
	));
}


add_action('wp_ajax_whitepapers_ajax_filter', 'whitepapers_ajax_filter');
add_action('wp_ajax_nopriv_whitepapers_ajax_filter', 'whitepapers_ajax_filter');


function whitepapers_ajax_filter()
{
	$search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
	$term   = isset($_POST['term']) ? sanitize_text_field($_POST['term']) : '';
	$count_posts = get_field('count_posts', get_option('page_on_front'));

	// Отримуємо ID останнього поста
	$latest_post = get_posts(array(
		'post_type' => 'whitepapers',
		'posts_per_page' => 1,
		'orderby' => 'date',
		'order' => 'DESC',
		'fields' => 'ids',
	));
	$exclude_id = !empty($latest_post) ? $latest_post[0] : 0;

	$args = array(
		'post_type' => 'whitepapers',
		'posts_per_page' => $count_posts ? $count_posts : 6,
		's' => $search,
		'post__not_in' => array($exclude_id),
	);

	if (!empty($term)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'whitepapers_teg',
				'field' => 'slug',
				'terms' => $term
			)
		);
	}

	$query = new WP_Query($args);
	$total_posts = $query->found_posts;

	ob_start();

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('gutenberg/whitepaper_item');
		}
	} else {
		echo '<div class="search-no-results text-center">' . pll__('Nothing was found.') . '</div>';
	}

	wp_reset_postdata();

	$data = ob_get_clean();

	wp_send_json_success(array(
		'content' => $data,
		'total_posts' => $total_posts
	));
}
