<?php $categories = get_the_category(); ?>
<div class="item">
    <a href="<?php echo get_permalink(); ?>">
        <div class="img">
            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url() : $src; ?>" class="lazyWebp" alt="<?php echo get_the_title(); ?>">
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

        <?php if (!empty( $categories )) { ?>
            <?php foreach ($categories as $cat_name) { ?>                   
                <a href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language().'/' : '/'; ?>blog/<?php echo $cat_name->slug; ?>/" class="tag">
                    <span><?php echo esc_html($cat_name->name); ?></span>
                </a>
            <?php } ?>                
        <?php } ?>  

        <div class="data"><?php echo get_the_date(); ?></div>
    </div>
</div>