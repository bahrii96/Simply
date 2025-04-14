<?php

//This makes Gutenberg blocks 100% wide
add_theme_support('align-wide');

//Load scripts and styles for the editor. This allows you to see the blocks as they look on the site.
function load_custom_wp_admin_style()
{
	$file_slug = '';
	wp_enqueue_style('j-main', get_stylesheet_directory_uri() . '/dist/css/cssLibs' . $file_slug . '.css', array(), _S_VERSION);
	wp_enqueue_style('j-bundle', get_stylesheet_directory_uri() . '/dist/css/bundle' . $file_slug . '.css', array(), _S_VERSION);
	//wp_enqueue_script( 'j-libs', get_stylesheet_directory_uri().'/dist/js/libs'.$file_slug.'.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'j-script', get_stylesheet_directory_uri().'/dist/js/script'.$file_slug.'.js', array(), _S_VERSION, true );
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/dist/css/admin-style.css', array(), _S_VERSION);
	wp_enqueue_script('admin-custom', get_template_directory_uri() . '/dist/js/admin/custom.js', array(), _S_VERSION, true);
	wp_enqueue_script('admin-custom2', get_template_directory_uri() . '/dist/js/admin/lazy.js', array(), _S_VERSION, true);
	wp_enqueue_script('admin-custom3', get_template_directory_uri() . '/dist/js/admin/jquery.lazy.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('admin-custom4', get_template_directory_uri() . '/dist/js/admin/sliders.js', array(), _S_VERSION, true);
	wp_enqueue_script('admin-custom5', get_template_directory_uri() . '/dist/js/admin/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/admin-style.css', array(), _S_VERSION);
	wp_enqueue_script('admin-custom', get_template_directory_uri() . '/js/admin/custom.js', array(), _S_VERSION, true);
}
add_action('enqueue_block_editor_assets', 'load_custom_wp_admin_style', 10, 0);

//Register custom block category

function theme_block_category($categories, $post)
{
	return array_merge(
		$categories,
		array(
			array('slug' => 'home',     'title' => 'Головна сторінка'),
			array('slug' => 'contacts', 'title' => 'Контакти'),
			array('slug' => 'blog',     'title' => 'Блог'),
			array('slug' => 'other',    'title' => 'Загальне'),
			array('slug' => 'article',  'title' => 'Публікація'),
			array('slug' => 'cases',    'title' => 'Кейси'),
			array('slug' => 'case',     'title' => 'Кейс'),
			array('slug' => 'services', 'title' => 'Послуги'),
			array('slug' => 'service',  'title' => 'Послуга'),
			array('slug' => 'about',    'title' => 'Про нас'),
			array('slug' => 'approach', 'title' => 'Наш підхід'),
			array('slug' => 'career',   'title' => 'Карьєра'),
			array('slug' => 'vacancies', 'title' => 'Вакансії'),
			array('slug' => 'vacancy',  'title' => 'Вакансія'),
			array('slug' => 'request',  'title' => 'Запит квоти'),
			array('slug' => 'awards',   'title' => 'Нагороди'),
			// array('slug' => 'whitepapers',   'title' => 'Whitepapers'),
			// array('slug' => 'whitepaper',   'title' => 'Whitepaper'),
		)
	);
}
add_filter('block_categories', 'theme_block_category', 10, 2);

//Remove default block
function theme_allowed_block_types($allowed_blocks)
{
	return array(
		//core
		'core/paragraph',
		'core/list',
		'core/heading',
		'core/table',
		//'core/spacer',
		'core/image',
		'core/quote',
		//home
		'acf/home-1-main',
		'acf/home-2-list',
		'acf/home-4-services',
		'acf/home-5-blog',
		'acf/home-6-awards',
		//contacts
		'acf/contacts-1-main',
		'acf/contacts-2-numbers-and-emails',
		'acf/contacts-3-locations',
		//blog
		'acf/blog-1-blog',
		//other 
		'acf/other-1-subscribe',
		'acf/other-2-get-answer',
		'acf/other-3-join',
		'acf/other-4-divider',
		//article
		'acf/article-1-cta',
		'acf/article-2-video',
		'acf/article-3-new-cta',
		//cases
		'acf/cases-1-main',
		'acf/cases-2-cases',
		//case
		'acf/case-1-main',
		'acf/case-2-about',
		'acf/case-3-results',
		'acf/case-4-testimonials',
		'acf/case-5-other-cases',
		//services
		'acf/services-1-main',
		'acf/services-2-services',
		'acf/services-3-services-numbers',
		'acf/services-4-industries',
		'acf/services-5-how-we-operate',
		'acf/services-6-results',
		//service
		'acf/service-2-divider',
		'acf/service-3-include',
		'acf/service-4-list',
		'acf/service-5-fully-covered',
		'acf/service-6-trasted',
		'acf/service-7-cases',
		'acf/service-8-questions',
		'acf/service-10-more-messages',
		'acf/service-11-how-we-operate',
		'acf/service-12-blog',
		'acf/service-13-faq',
		'acf/service-14-other-services',
		'acf/service-15-simple',
		//about
		'acf/about-1-main',
		'acf/about-2-mission',
		'acf/about-4-locations',
		'acf/about-5-team',
		'acf/about-6-different',
		'acf/about-7-awards-certifications',
		'acf/about-8-testimonial',
		'acf/about-9-news',
		//approach
		'acf/approach-1-main',
		'acf/approach-2-mission',
		'acf/approach-3-workflow',
		'acf/approach-4-training',
		'acf/approach-5-improvement',
		'acf/approach-6-principles',
		'acf/approach-7-allowing',
		'acf/approach-8-approach',
		'acf/approach-9-quality',
		'acf/approach-11-we-make',
		//career
		'acf/career-1-main',
		'acf/career-2-what-todo',
		'acf/career-3-what-you-get',
		//vacancies
		'acf/vacancies-1-main',
		'acf/vacancies-2-vacancies',
		//vacancy
		'acf/vacancy-1-main',
		'acf/vacancy-2-details',
		'acf/vacancy-3-contacts',
		'acf/vacancy-5-similar',
		//request
		'acf/request-1-request',
		//awards
		'acf/awards-1-main',
		'acf/awards-2-certifications',
		'acf/awards-3-awards',
		'acf/awards-4-featured-media',
		'acf/awards-5-join-reviews',
			// whitepaper     
			'acf/whitepaper-1-main',
			'acf/whitepaper-2-about',
			// whitepaper  
			'acf/whitepapers-1-whitepapers',
			// webinar
			'acf/webinar-1-main',
			'acf/webinar-2-about',
			// webinars
			'acf/webinars-1-webinars',
	);
}
add_filter('allowed_block_types', 'theme_allowed_block_types');

// ACF register block for Gutenberg
function o_register_block()
{

	if (!function_exists('acf_register_block_type')) {
		return false;
	}

	//home
	acf_register_block_type([
		'name'              => 'home-1-main',
		'title'             => __('Головний блок'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/home/1-main.php',
		'category'          => 'home',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'home-2-list',
		'title'             => __('Блок з плавающим меню'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/home/2-list.php',
		'category'          => 'home',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'home-4-services',
		'title'             => __('Послуги'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/home/4-services.php',
		'category'          => 'home',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'home-5-blog',
		'title'             => __('Блог'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/home/5-blog.php',
		'category'          => 'home',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'home-6-awards',
		'title'             => __('Нагороди та сертифікати'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/home/6-awards.php',
		'category'          => 'home',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//contacts
	acf_register_block_type([
		'name'              => 'contacts-1-main',
		'title'             => __('Блок з формою'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/contacts/1-main.php',
		'category'          => 'contacts',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'contacts-2-numbers-and-emails',
		'title'             => __('Номери та пошти'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/contacts/2-numbers-and-emails.php',
		'category'          => 'contacts',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'contacts-3-locations',
		'title'             => __('Локації'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/contacts/3-locations.php',
		'category'          => 'contacts',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//blog
	acf_register_block_type([
		'name'              => 'blog-1-blog',
		'title'             => __('Каталог'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/blog/1-blog.php',
		'category'          => 'blog',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//other    
	acf_register_block_type([
		'name'              => 'other-1-subscribe',
		'title'             => __('Підписка'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/other/1-subscribe.php',
		'category'          => 'other',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'other-2-get-answer',
		'title'             => __('Отримати швидку відповідь'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/other/2-get-answer.php',
		'category'          => 'other',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'other-3-join',
		'title'             => __('Форма відгуку на вакансії'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/other/3-join.php',
		'category'          => 'other',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'other-4-divider',
		'title'             => __('Розділювач'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/other/4-divider.php',
		'category'          => 'other',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//article
	acf_register_block_type([
		'name'              => 'article-1-cta',
		'title'             => __('СТА'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/article/1-cta.php',
		'category'          => 'article',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'article-2-video',
		'title'             => __('Youtube відео'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/article/2-video.php',
		'category'          => 'article',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'article-3-new-cta',
		'title'             => __('Виділена плашка'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/article/3-new-cta.php',
		'category'          => 'article',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//cases
	acf_register_block_type([
		'name'              => 'cases-1-main',
		'title'             => __('Верхня частина'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/cases/1-main.php',
		'category'          => 'cases',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'cases-2-cases',
		'title'             => __('Кейси'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/cases/2-cases.php',
		'category'          => 'cases',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//case
	acf_register_block_type([
		'name'              => 'case-1-main',
		'title'             => __('Верхня частина'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/case/1-main.php',
		'category'          => 'case',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'case-2-about',
		'title'             => __('Про проект'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/case/2-about.php',
		'category'          => 'case',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'case-3-results',
		'title'             => __('Результати'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/case/3-results.php',
		'category'          => 'case',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'case-4-testimonials',
		'title'             => __('Відгук'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/case/4-testimonials.php',
		'category'          => 'case',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'case-5-other-cases',
		'title'             => __('Інші кейси'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/case/5-other-cases.php',
		'category'          => 'case',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//services 
	acf_register_block_type([
		'name'              => 'services-1-main',
		'title'             => __('Головний блок'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/1-main.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'services-2-services',
		'title'             => __('Каталог послуг'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/2-services.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'services-3-services-numbers',
		'title'             => __('Цифри'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/3-services-numbers.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'services-4-industries',
		'title'             => __('Індустрії'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/4-industries.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'services-5-how-we-operate',
		'title'             => __('Як ми працюємо'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/5-how-we-operate.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'services-6-results',
		'title'             => __('Результати'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/services/6-results.php',
		'category'          => 'services',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//services 
	acf_register_block_type([
		'name'              => 'service-2-divider',
		'title'             => __('Розділювач'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/2-divider.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-3-include',
		'title'             => __('Що включено'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/3-include.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-4-list',
		'title'             => __('Список з анімацією'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/4-list.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-5-fully-covered',
		'title'             => __('Забезпечення'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/5-fully-covered.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-6-trasted',
		'title'             => __('Нам довіряють'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/6-trasted.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-7-cases',
		'title'             => __('Список кейсів'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/7-cases.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-8-questions',
		'title'             => __('Якщо питання'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/8-questions.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-10-more-messages',
		'title'             => __('Блок умовних повідомлень'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/10-more-messages.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-11-how-we-operate',
		'title'             => __('Гарантії'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/11-how-we-operate.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-12-blog',
		'title'             => __('Блог'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/12-blog.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-13-faq',
		'title'             => __('Питання / відповіді'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/13-faq.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-14-other-services',
		'title'             => __('Інші послуги'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/14-other-services.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'service-15-simple',
		'title'             => __('Простий блок'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/service/15-simple.php',
		'category'          => 'service',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//about
	acf_register_block_type([
		'name'              => 'about-1-main',
		'title'             => __('Головний блок (про нас)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/1-main.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-2-mission',
		'title'             => __('Місія'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/2-mission.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-4-locations',
		'title'             => __('Локації (про нас)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/4-locations.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-5-team',
		'title'             => __('Команда'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/5-team.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-6-different',
		'title'             => __('Наші особливості'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/6-different.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-7-awards-certifications',
		'title'             => __('Нагороди та сертифікати'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/7-awards-certifications.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-8-testimonial',
		'title'             => __('Відгуки'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/8-testimonial.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'about-9-news',
		'title'             => __('Новини'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/about/9-news.php',
		'category'          => 'about',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//approach
	acf_register_block_type([
		'name'              => 'approach-1-main',
		'title'             => __('Головний блок (наш підхід)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/1-main.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-2-mission',
		'title'             => __('Місія (наш підхід)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/2-mission.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-3-workflow',
		'title'             => __('Робочий процес'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/3-workflow.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-4-training',
		'title'             => __('Тренування'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/4-training.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-5-improvement',
		'title'             => __('Покращення'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/5-improvement.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-6-principles',
		'title'             => __('Принципи'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/6-principles.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-7-allowing',
		'title'             => __('Контроль нашою аналітикою'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/7-allowing.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-8-approach',
		'title'             => __('Підхід до звітності'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/8-reporting.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-9-quality',
		'title'             => __('Наші якості'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/9-quality.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'approach-11-we-make',
		'title'             => __('Ми дбаємо'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/approach/11-we-make.php',
		'category'          => 'approach',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//career
	acf_register_block_type([
		'name'              => 'career-1-main',
		'title'             => __('Головний блок(карьєра)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/career/1-main.php',
		'category'          => 'career',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'career-2-what-todo',
		'title'             => __('Що робити'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/career/2-what-todo.php',
		'category'          => 'career',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'career-3-what-you-get',
		'title'             => __('Що ви отримаєте'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/career/3-what-you-get.php',
		'category'          => 'career',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//vacancies
	acf_register_block_type([
		'name'              => 'vacancies-1-main',
		'title'             => __('Головний блок(вакансії)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancies/1-main.php',
		'category'          => 'vacancies',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'vacancies-2-vacancies',
		'title'             => __('Каталог вакансій'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancies/2-vacancies.php',
		'category'          => 'vacancies',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//vacancy
	acf_register_block_type([
		'name'              => 'vacancy-1-main',
		'title'             => __('Головний блок(вакансія)'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancy/1-main.php',
		'category'          => 'vacancy',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'vacancy-2-details',
		'title'             => __('Деталі'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancy/2-details.php',
		'category'          => 'vacancy',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'vacancy-3-contacts',
		'title'             => __('Контакти'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancy/3-contacts.php',
		'category'          => 'vacancy',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'vacancy-5-similar',
		'title'             => __('Додаткові вакансії'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/vacancy/5-similar.php',
		'category'          => 'vacancy',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//request
	acf_register_block_type([
		'name'              => 'request-1-request',
		'title'             => __('Запит квоти'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/request/1-request.php',
		'category'          => 'request',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	//awards
	acf_register_block_type([
		'name'              => 'awards-1-main',
		'title'             => __('Головний блок'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/awards/1-main.php',
		'category'          => 'awards',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'awards-2-certifications',
		'title'             => __('Сертифікати'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/awards/2-certifications.php',
		'category'          => 'awards',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'awards-3-awards',
		'title'             => __('Нагороди'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/awards/3-awards.php',
		'category'          => 'awards',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'awards-4-featured-media',
		'title'             => __('Показано в ЗМІ'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/awards/4-featured-media.php',
		'category'          => 'awards',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'awards-5-join-reviews',
		'title'             => __('Відгуки + форма'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/awards/5-join-reviews.php',
		'category'          => 'awards',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	// whitepaper

	acf_register_block_type([
		'name'              => 'whitepaper-1-main',
		'title'             => __('Верхня частина whitepaper'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/whitepaper/1-main.php',
		'category'          => 'whitepaper',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	acf_register_block_type([
		'name'              => 'whitepaper-2-about',
		'title'             => __('Iнформація + форма whitepaper'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/whitepaper/2-about.php',
		'category'          => 'whitepaper',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
	// whitepapers
	acf_register_block_type([
		'name'              => 'whitepapers-1-whitepapers',
		'title'             => __('Каталог whitepaper'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/whitepapers/1-whitepapers.php',
		'category'          => 'whitepapers',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);



	// webinar
	acf_register_block_type([
		'name'              => 'webinar-1-main',
		'title'             => __('Верхня частина webinar'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/webinar/1-main.php',
		'category'          => 'webinar',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	acf_register_block_type([
		'name'              => 'webinar-2-about',
		'title'             => __('Iнформація + форма webinar'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/webinar/2-about.php',
		'category'          => 'webinar',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);

	// webinars
	acf_register_block_type([
		'name'              => 'webinars-1-webinars',
		'title'             => __('Каталог webinars'),
		'description'       => __('Custom block for Gutenberg'),
		'render_template'   => 'gutenberg/webinars/1-webinars.php',
		'category'          => 'webinars',
		//'icon'              => 'cover-image',
		'mode'              => 'auto',
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => ['is_example' => true],
			),
		)
	]);
}
add_action('acf/init', 'o_register_block');
