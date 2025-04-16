<?php
if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Whitepapers Settings',
		'menu_title' => 'Whitepapers Settings',
		'menu_slug' => 'whitepapers-settings',
		'parent_slug' => 'edit.php?post_type=whitepapers',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}
if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Webinars Settings',
		'menu_title' => 'Webinars Settings',
		'menu_slug' => 'webinars-settings',
		'parent_slug' => 'edit.php?post_type=webinars', 
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

add_action('wp_ajax_data_fetch_whitepapers', 'data_fetch_whitepapers');
add_action('wp_ajax_nopriv_data_fetch_whitepapers', 'data_fetch_whitepapers');

function data_fetch_whitepapers()
{
	$search_word = esc_attr($_POST['keyword'] ?? '');

	$args = array(
		'post_type'      => 'whitepapers',
		'posts_per_page' => 5,
		's'              => $search_word,
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php echo preg_replace("~($search_word)~iu", "<b>$1</b>", get_the_title()); ?>
				</a>
			</li>
		<?php endwhile;
	}

	wp_reset_postdata();
	exit();
}

// ===========

if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Webinars Users',
		'menu_title' => 'Webinars Users',
		'menu_slug' => 'webinars-users',
		'parent_slug' => 'edit.php?post_type=webinars', 
		'capability' => 'edit_posts',
		'redirect' => false
	));
}


if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'page_title' => 'Whitepapers Users',
		'menu_title' => 'Whitepapers Users',
		'menu_slug' => 'whitepapers-users',
		'parent_slug' => 'edit.php?post_type=whitepapers',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}



function add_whitepaper_link_script()
{
	if (is_singular('whitepapers')) { 
		?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const linkField = document.querySelector('input[name="your-link"]');

				if (linkField) {
					const pageTitle = document.title;
					linkField.value = pageTitle;
				}
			});
		</script>
	<?php
	}
}
add_action('wp_footer', 'add_whitepaper_link_script');



add_action('wpcf7_mail_sent', 'save_whitepaper_form_data');

function save_whitepaper_form_data($contact_form)
{
	$form_id = $contact_form->id();


	if ($form_id != 29464) { 
		return;
	}

	$submission = WPCF7_Submission::get_instance();
	if ($submission) {
		$posted_data = $submission->get_posted_data();

		$name = isset($posted_data['your-name']) ? $posted_data['your-name'] : '';
		$title = isset($posted_data['your-title']) ? $posted_data['your-title'] : '';
		$company = isset($posted_data['your-company']) ? $posted_data['your-company'] : '';
		$email = isset($posted_data['your-email']) ? $posted_data['your-email'] : '';
		$whitepaper_id = isset($posted_data['whitepaper_id']) ? $posted_data['whitepaper_id'] : '';
		$page_title = isset($posted_data['your-link']) ? $posted_data['your-link'] : '';

		$user_data = "Name: $name\n";
		$user_data .= "Title: $title\n";
		$user_data .= "Company: $company\n";
		$user_data .= "Email: $email\n";

		$user_data .= "Downloaded Book: $page_title\n";

		if ($whitepaper_id) {
			$whitepaper_title = get_the_title($whitepaper_id);
			$user_data .= "Whitepaper: $whitepaper_title\n";
		}

		$user_data .= "Date: " . date('Y-m-d H:i:s');

		$rows = get_field('whitepapers_users_list', 'option');

		if (!$rows) {
			$rows = array();
		}

		$rows[] = array(
			'whitepapers_users_data' => $user_data
		);

		update_field('whitepapers_users_list', $rows, 'option');
	}
}




function add_webinars_link_script()
{
	if (is_singular('webinars')) { 
	?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const linkField = document.querySelector('input[name="your-link"]');

				if (linkField) {
					const pageTitle = document.title;
					linkField.value = pageTitle;
				}
			});
		</script>
<?php
	}
}
add_action('wp_footer', 'add_webinars_link_script');




add_action('wpcf7_mail_sent', 'save_webinars_form_data');

function save_webinars_form_data($contact_form)
{
	$form_id = $contact_form->id();


	if ($form_id != 29555) {
		return;
	}

	$submission = WPCF7_Submission::get_instance();
	if ($submission) {
		$posted_data = $submission->get_posted_data();

		$name = isset($posted_data['your-name']) ? $posted_data['your-name'] : '';
		$title = isset($posted_data['your-title']) ? $posted_data['your-title'] : '';
		$company = isset($posted_data['your-company']) ? $posted_data['your-company'] : '';
		$email = isset($posted_data['your-email']) ? $posted_data['your-email'] : '';
		$whitepaper_id = isset($posted_data['whitepaper_id']) ? $posted_data['whitepaper_id'] : '';
		$page_title = isset($posted_data['your-link']) ? $posted_data['your-link'] : '';

		$user_data = "Name: $name\n";
		$user_data .= "Title: $title\n";
		$user_data .= "Company: $company\n";
		$user_data .= "Email: $email\n";

		$user_data .= "Webinars: $page_title\n";

		if ($whitepaper_id) {
			$whitepaper_title = get_the_title($whitepaper_id);
			$user_data .= "Whitepaper: $whitepaper_title\n";
		}

		$user_data .= "Date: " . date('Y-m-d H:i:s');

		$rows = get_field('webinars_users_list', 'option');


		if (!$rows) {
			$rows = array();
		}

		$rows[] = array(
			'webinars_users_data' => $user_data
		);

		update_field('webinars_users_list', $rows, 'option');
	}
}

function output_json_ld()
{
	if (is_singular(['webinars', 'whitepapers'])) {
		$setting_fag_page = get_field('micromarking_setting');

		if ($setting_fag_page) {
			echo $setting_fag_page;
		}
	}
}
add_action('wp_head', 'output_json_ld');
