<?php $title    = get_field('title');
$location       = get_field('location');
$text_1         = get_field('text_1');
$text_2         = get_field('text_2');
$url            = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/4.png">
<?php } else { ?>

    <section class="about-location with-line">
        <div class="container about-location__content">
            <?php if ($title) { ?><h2 class="about-location__title h3"><?php echo $title; ?></h2><?php } ?>
            <div class="about-location__row">
                <?php if ($text_1) { ?><div class="about-location__mess"><?php echo $text_1; ?></div><?php } ?>
                <?php if ($text_2) { ?><p class="about-location__text"><?php echo $text_2; ?></p><?php } ?>
            </div>
            <?php if ($location) { ?>
                <ul class="about-location__locations location-cards">
                    <?php foreach ($location as $item) { ?>
                        <li class="location-cards__item <?php echo $item['size']; ?>">
                            <div class="location-card <?php echo $item['color']; echo ($item['image']) ? ' location-card--img' : ''; ?>">
                                <?php if ($item['flag']) { ?>
                                    <div class="location-card__img-sm">
                                        <img data-src="<?php echo $item['flag']; ?>" data-retina="<?php echo $item['flag']; ?>" data-webp="<?php echo get_webp($item['flag']); ?>" data-webp-retina="<?php echo get_webp($item['flag']); ?>" src="<?php echo (is_admin()) ? $item['flag'] : $src; ?>" class="lazyWebp" alt="flag">
                                    </div>
                                <?php } ?>
                                <?php if ($item['title']) { ?>
                                    <p class="location-card__title"><?php echo $item['title']; ?></p>
                                <?php } ?>
                                <?php if ($item['subtitle']) { ?>
                                    <p class="location-card__subttl"><?php echo $item['subtitle']; ?></p>
                                <?php } ?>
                                <?php if ($item['image']) { ?>
                                    <div class="location-card__img">
                                        <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="location">
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </section>

<?php } ?>