<?php $url          = get_bloginfo('template_directory');
$src                = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title              = get_field('title');
$image_1            = get_field('image_1');
$text               = get_field('text');
$stroka_pd_tekstom  = get_field('stroka_pd_tekstom');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/2.png">
<?php } else { ?>

    <section class="mission">
        <h3 class="mission__title"><?php echo $title; ?></h3>
        <div class="mission__content">
            <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp mission__photo" alt="<?php echo $title; ?>">
            <div class="mission__circle"></div>
            <div class="mission__wrap">
                <div class="mission__info mission-info">
                    <div class="mission-info__column">
                        <p class="mission-info__text"><?php echo $text; ?></p>
                        <span class="mission-info__label"><?php echo $stroka_pd_tekstom; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>