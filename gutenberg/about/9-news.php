<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$cat        = get_field('kategorya_publkacj_dlya_vdobrazhennya');
$all_posts  = at_get_all_posts(3, 1, $cat->slug); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/9.png">
<?php } else { ?>

    <section class="about-check b-blog-more">
        <div class="about-check__content container">
            <h2 class="h3">Check out our news</h2>
            <div class="blog-items">
                <?php if ($all_posts->have_posts()) { ?>
                    <?php while ($all_posts->have_posts()) {
                        $all_posts->the_post(); 
                        $categories = get_the_category(); ?>
                        <div class="item">
                            <a href="<?php echo get_permalink(); ?>">
                                <div class="img">
                                    <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url() : $src; ?>" class="lazyWebp" alt="Image item">
                                    <div class="text">
                                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="70" height="70" rx="35" fill="white"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M35.622 25.622L44.9463 34.9463L35.622 44.2706L33.8627 42.5113L40.1837 36.1903L26.2977 36.1903L26.2977 33.7023L40.1837 33.7023L33.8627 27.3813L35.622 25.622Z" fill="black"></path>
                                        </svg>
                                    </div>                                
                                </div>
                                <div class="h5"><?php echo get_the_title(); ?></div>
                            </a>
                            <div class="bot">
                                <?php if (!empty( $categories)) { ?>
                                    <a href="<?php echo esc_url('?category='.$categories[0]->slug); ?>" class="tag">
                                        <span><?php echo esc_html($categories[0]->name); ?></span>
                                    </a>
                                <?php } ?>
                                <div class="data"><?php echo get_the_date(); ?></div>
                            </div>
                        </div>
                    <?php } wp_reset_postdata(); ?>              
                <?php } ?>
            </div>
            <a href="<?php echo get_field('page_blog', 'options'); ?>" class="about-see-all-btn red-btn">
                <span><?php pll_e('See all articles'); ?></span>
            </a>
        </div>
    </section>

<?php } ?>