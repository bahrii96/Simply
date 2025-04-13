<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$text       = get_field('text');
$phone_1    = get_field('phone_1');
$name_1     = get_field('name_1');
$phone_2    = get_field('phone_2');
$name_2     = get_field('name_2');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancy/preview/3.png">
<?php } else { ?>

    <section class="our-contacts">
        <div class="container our-contacts__content">
            <h3 class="our-contacts__title"><?php echo $title; ?></h3>
            <div class="our-contacts__row">
                <p class="our-contacts__text"><?php echo $text; ?></p>
                <div class="our-contacts__block our-contacts-block">
                    <?php if ($phone_1) { ?>
                        <div class="our-contacts-block__item">                       
                            <img data-src="<?php echo $url; ?>/img/vacancy/contacts-icon-1.svg" data-retina="<?php echo $url; ?>/img/vacancy/contacts-icon-1.svg" src="<?php echo (is_admin()) ? $url.'/img/vacancy/contacts-icon-1.svg' : $src; ?>" class="lazyWebp" alt="Phone">
                            <a href="tel:+<?php echo clear_phone($phone_1); ?>" class="our-contacts-block__tel"><?php echo $phone_1; ?></a>
                            <span class="our-contacts-block__name"><?php echo $name_1; ?></span>
                        </div>
                    <?php } ?>
                    <?php if ($phone_2) { ?>
                        <div class="our-contacts-block__item">
                            <img data-src="<?php echo $url; ?>/img/vacancy/contacts-icon-2.svg" data-retina="<?php echo $url; ?>/img/vacancy/contacts-icon-2.svg" src="<?php echo (is_admin()) ? $url.'/img/vacancy/contacts-icon-2.svg' : $src; ?>" class="lazyWebp" alt="Phone 2">
                            <a href="tel:+<?php echo clear_phone($phone_2); ?>" class="our-contacts-block__tel"><?php echo $phone_2; ?></a>
                            <span class="our-contacts-block__name"><?php echo $name_2; ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

<?php } ?>