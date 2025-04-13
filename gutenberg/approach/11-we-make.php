<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/11.png">
<?php } else { ?>

    <section class="we-make">
        <div class="container we-make__content">
            <h2 class="we-make__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="we-make__list we-make-list">
                    <?php foreach ($list as $item) { ?>
                        <li class="we-make-list__item">
                            <div class="we-make-list__row">
                                <?php if ($item['image_1']) { ?>
                                    <div class="we-make-list__icon">
                                        <img data-src="<?php echo $item['image_1']; ?>" data-retina="<?php echo $item['image_1']; ?>" data-webp="<?php echo get_webp($item['image_1']); ?>" data-webp-retina="<?php echo get_webp($item['image_1']); ?>" src="<?php echo (is_admin()) ? $item['image_1'] : $src; ?>" class="lazyWebp" alt="img">
                                    </div>
                                <?php } ?>
                                <?php if ($item['image_2']) { ?>
                                    <div class="we-make-list__icon">
                                        <img data-src="<?php echo $item['image_2']; ?>" data-retina="<?php echo $item['image_2']; ?>" data-webp="<?php echo get_webp($item['image_2']); ?>" data-webp-retina="<?php echo get_webp($item['image_2']); ?>" src="<?php echo (is_admin()) ? $item['image_2'] : $src; ?>" class="lazyWebp" alt="img">
                                    </div>
                                <?php } ?>
                            </div>
                            <h3 class="we-make-list__title h4"><?php echo $item['title']; ?></h3>
                            <p class="we-make-list__text"><?php echo $item['text']; ?></p>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </section>

<?php } ?>