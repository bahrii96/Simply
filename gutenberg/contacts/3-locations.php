<?php $title    = get_field('title');
$location       = get_field('location');
$url            = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$add_img        = get_field('add_img');
$image_1        = get_field('image_1');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/contacts/preview/3.png">
<?php } else { ?>

    <section class="<?php if ($add_img) { echo 'our-offices'; } else { echo 's-location section with-line'; } ?>">
        <div class="container <?php if ($add_img) echo 'our-offices__content'; ?>">
            <?php if ($title) { ?>
                <h2 class="s-location__title section__title h3"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if ($location) { ?>
                <ul class="s-location__locations location-cards">
                    <?php foreach ($location as $item) { ?>
                        <li class="location-cards__item <?php echo $item['size']; ?>">
                            <div class="location-card <?php echo $item['color']; echo ($item['image']) ? ' location-card--img' : ''; ?>">
                                <?php if ($item['flag']) { ?>
                                    <div class="location-card__img-sm">
                                        <img data-src="<?php echo $item['flag']; ?>" data-retina="<?php echo $item['flag']; ?>" data-webp="<?php echo get_webp($item['flag']); ?>" data-webp-retina="<?php echo get_webp($item['flag']); ?>" src="<?php echo (is_admin()) ? $item['flag'] : $src; ?>" class="lazyWebp" alt="<?php echo $item['title']; ?>">
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
                                        <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="<?php echo $item['subtitle']; ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <?php if ($add_img) { ?>
            <?php if ($image_1) { ?>
                <div class="our-offices__photo our-offices__photo--pc">
                    <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp" alt="img photo">
                </div>
            <?php } ?>       
        <?php } ?>
    </section>

<?php } ?>