<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
$image_1    = get_field('image_1');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/7.png">
<?php } else { ?>

    <section class="awards">
        <div class="container awards__content with-line">
            <h2 class="awards__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="awards__list awards-list">
                   <?php foreach ($list as $item) { ?>
                    <li class="awards-list__item">
                        <div class="awards-list__photo">
                            <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="<?php echo $item['title']; ?>">
                        </div>
                        <h3 class="awards-list__title h4"><?php echo $item['title']; ?></h3>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="awards__photo">
        <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp awards-photo awards-photo--lg" alt="img">        
    </div>
</section>

<?php } ?>