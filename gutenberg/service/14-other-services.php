<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/14.png">
<?php } else { ?>

    <?php wp_reset_query();wp_reset_postdata(); ?>
    <?php if ($list) { ?>
        <div class="b-other-services with-line">
            <div class="container">
                <div class="h3"><?php echo $title; ?></div>
                <?php if ($list) { ?>
                    <div class="box">
                        <?php foreach ($list as $item) { ?>
                            <a href="<?php echo get_permalink($item); ?>" class="item">
                                <div class="tag"><?php pll_e('Service'); ?></div>
                                <div class="h4">
                                    <?php echo get_the_title($item); ?>
                                    <svg width="25" height="26" viewbox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56341 0.435547H25V23.8721H20.578V7.98437L3.12682 25.4355L0 22.3087L17.4512 4.85754H1.56341V0.435547Z" fill="white"></path>
                                    </svg>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="for-btn">
                    <a href="<?php echo get_field('page_services', 'options'); ?>" class="red-btn">
                        <span><?php pll_e('See all services'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>

<?php } ?>