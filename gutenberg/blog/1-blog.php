<?php $url          = get_bloginfo('template_directory');
$src                = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title              = get_field('title'); 
$count_posts        = get_field('count_posts'); 
$read_more          = get_field('read_more'); 
$pl_search_field    = get_field('pl_search_field'); 
$title_search       = get_field('title_search'); 
$nothing_text_1     = get_field('nothing_text_1'); 
$nothing_text_2     = get_field('nothing_text_2'); 
$image              = get_field('image'); 
$search_str         = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : false; 

$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

if (preg_match("#/page/(\d+)/#", $path, $matches)) {
    $current_page = $matches[1];    
} else {
    $current_page = 1;
}

$path = preg_replace("#/page/\d+/?#", '', $path);
$path = str_replace(array('/ua', '/pl'), '', $path);
$category_str = str_replace('/blog/', '', $path);
$category_str = str_replace('/', '', sanitize_text_field($category_str));

if (($category_str == 'blog') or ($category_str == 'ua') or ($category_str == 'pl')) $category_str = '';

$categories         = get_all_categories();
$count_items        = $count_posts;
$all_posts          = at_get_all_posts($count_items, $current_page, $category_str); 
$page_url           = $_SERVER['REQUEST_URI'];
if ($search_str) {
    $all_posts = get_search_posts($search_str);
}

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/blog/preview/1.png">
<?php } else { ?>
    
    <div class="b-breadcrumbs on-blog">
        <div class="container">
            <div class="breadcrumbs2">
                <?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>     
            </div>
        </div>
    </div>
    <div class="b-blog-head">
        <div class="container">
            <div class="title">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="blog-tags-search">
                <?php if ($categories) { ?>                  
                    <div class="blog-tags">
                        <a <?php if ($cat->slug == $category_str) echo 'class="active" style="pointer-events: none;"'; ?>
                            href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language() : ''; ?>/blog/">
                            <span><?php pll_e('All'); ?></span>
                        </a>
                        <?php foreach ($categories as $cat) { ?>                            
                            <a <?php if ($cat->slug == $category_str) echo 'class="active"'; ?> href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language() : '/'; ?>blog/<?php echo $cat->slug; ?>/">
                                <span><?php echo $cat->name; ?></span>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="blog-search">
                    <form class="search-form" novalidate>
                        <label class="with_line">
                            <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" fill="#111F2D"></path>
                            </svg>
                            <input type="text" name="blog_search" placeholder="<?php echo $pl_search_field; ?>">
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
            <?php if ($search_str) { ?>
               <?php if ($all_posts->have_posts()) { ?>
                <div class="search-results-text">
                    <?php echo $title_search; ?>
                    <span><?php echo $search_str; ?></span>
                </div>
            <?php } else { ?>
                <div class="search-results-text text-center">
                    <?php echo $title_search; ?>
                    <span><?php echo $search_str; ?></span>
                </div>
                <div class="search-no-results-text text-center">
                    <?php echo $nothing_text_1; ?>
                    <b>"<?php echo $search_str; ?>"</b>
                    <?php echo $nothing_text_2; ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php if ($all_posts->have_posts()) { ?>
    <div class="b-blog">
        <div class="container">
            <div class="blog-items">                 
                <?php while ($all_posts->have_posts()) {
                    $all_posts->the_post(); ?>

                    <?php get_template_part('gutenberg/post_item'); ?>                

                <?php } wp_reset_postdata(); ?>                
            </div>
        </div>
        <?php $max_pages = $all_posts->max_num_pages;
        if ((int)$max_pages > 1) { 
            $pag = custom_pagination($current_page, $max_pages, $page_url);            
            echo $pag;
        } ?>    
    </div>
<?php } else { ?>
    <div class="b-blog">
        <div class="container">
            <div class="search-no-results">
                <img data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="No result">
            </div>
        </div>
    </div>
<?php } ?>

<?php } ?>

<script type="text/javascript">var element = document.querySelector('.wrapper'); element.classList.add('blogPage');</script>