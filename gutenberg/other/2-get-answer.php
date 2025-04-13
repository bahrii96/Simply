<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$get        = get_field('get_fast_block', 'options'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/other/preview/2.png">
<?php } else { ?>

    <div class="b-main-cta">
        <img data-src="<?php echo $url; ?>/img/cta-circle.svg" src="<?php echo (is_admin()) ? $url.'/img/cta-circle.svg' : $src; ?>" class="lazy b-main-cta__circle" alt="Circle 1">
        <img data-src="<?php echo $url; ?>/img/cta-rect.svg" src="<?php echo (is_admin()) ? $url.'/img/cta-rect.svg' : $src; ?>" class="lazy b-main-cta__rect" alt="Circle 2">
        <div class="container">
            <div class="box">
                <div class="h2"><?php echo $get['title']??''; ?></div>
                <div class="box-button">
                    <a href="#popup-form" class="white-btn js-popup-btn">
                        <span><?php echo $get['bb_text']??''; ?></span>
                    </a>
                    <div class="marquee js-marquee">
                        <div class="marquee__inner">
                            <div class="marquee__body">
                                <span><?php echo $get['mark']??''; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

<?php } ?>