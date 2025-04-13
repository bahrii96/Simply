<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$dop_posts  = get_field('dop_posts'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/12.png">
<?php } else { ?>

    <div class="b-blog-more with-line">
        <div class="container">
            <div class="h3"><?php echo $title; ?></div>       
            <?php if ($dop_posts) { ?>
                <div class="blog-items">
                    <?php foreach ($dop_posts as $item) {                   
                        $categories = get_the_category($item->ID); ?>
                        <div class="item">
                            <a href="<?php echo get_permalink($item->ID); ?>">
                                <div class="img">
                                    <img data-src="<?php echo get_the_post_thumbnail_url($item->ID); ?>" data-retina="<?php echo get_the_post_thumbnail_url($item->ID); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url($item->ID)); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url($item->ID)); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url($item->ID) : $src; ?>" class="lazyWebp" alt="<?php echo get_the_title($item->ID); ?>">
                                    <div class="text">
                                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="70" height="70" rx="35" fill="white"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M35.622 25.622L44.9463 34.9463L35.622 44.2706L33.8627 42.5113L40.1837 36.1903L26.2977 36.1903L26.2977 33.7023L40.1837 33.7023L33.8627 27.3813L35.622 25.622Z" fill="black"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="h5"><?php echo get_the_title($item->ID); ?></div>
                            </a>
                            <div class="bot">
                                <?php if (!empty( $categories)) { ?>
                                    <a href="<?php echo esc_url('?category='.$categories[0]->slug); ?>" class="tag">
                                        <span><?php echo esc_html($categories[0]->name); ?></span>
                                    </a>
                                <?php } ?>
                                <div class="data"><?php echo get_the_time('Y-m-d', $item->ID); ?></div>
                            </div>
                        </div>
                    <?php } wp_reset_postdata(); ?>           
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>