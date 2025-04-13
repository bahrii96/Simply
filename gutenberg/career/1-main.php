<?php $url                  = get_bloginfo('template_directory');
$src                        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$chastina_zagolovku         = get_field('chastina_zagolovku');
$chastina_zagolovku_kolrova = get_field('chastina_zagolovku_kolrova');
$list                       = get_field('list');
$title_tel                  = get_field('title_tel');
$telefon                    = get_field('telefon');
$link                       = get_field('link');
$image_1                    = get_field('image_1');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/career/preview/1.png">
<?php } else { ?>

    <section class="career-main js-about-hero">
        <div class="career-main__content container">
            <div class="career-main__info">
                <h1 class="h3">
                    <span class="overflow-hidden">
                        <span><?php echo $chastina_zagolovku; ?></span>
                    </span>
                    <span class="overflow-hidden">
                        <span class="accent"><?php echo $chastina_zagolovku_kolrova; ?></span>
                    </span>
                </h1>
                <?php if ($list) { ?>
                    <div class="overflow-hidden">
                        <ul class="career-main__list">
                            <?php foreach ($list as $item) { ?>
                                <li><?php echo $item['text']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="career-main__recruitment career-recruitment">
                    <h2 class="career-recruitment__title"><?php echo $title_tel; ?></h2>
                    <div class="career-recruitment__btns">
                        <?php if ($telefon) { ?>
                            <a href="tel:+<?php echo clear_phone($telefon); ?>" class="career-recruitment__tel"><?php echo $telefon; ?></a>
                        <?php } ?>
                        <?php if (isset($link['url'])) { ?>
                            <a href="<?php echo $link['url']; ?>" class="career-recruitment__link white-btn"><?php echo $link['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="career-main__photo">
            <img class="career-main__star lazy" data-src="<?php echo $url; ?>/img/hero-star.svg" src="<?php echo (is_admin()) ? $url.'' : $src; ?>" alt="Star">
            <div class="career-main__photo-in">
                <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp" alt="Hero">
            </div>
        </div>
    </section>
    <div class="breadcrumbs__wrap">
        <div class="container">
            <?php if (function_exists('get_nav_breadcrumb')) echo get_nav_breadcrumb(); ?>
        </div>
    </div>

<?php } ?>