<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$image_1    = get_field('image_1'); 
$image_2    = get_field('image_2'); 
$image_3    = get_field('image_3'); 
$title      = get_field('title'); 
$text       = get_field('text'); 
$link       = get_field('link'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/8.png">
<?php } else { ?>

    <div class="b-main-questions <?php if (!is_front_page()) echo 'on-service'; ?>">
        <div class="container">
            <div class="box">
                <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp desk" alt="img 1">
                <img data-src="<?php echo $image_2; ?>" data-retina="<?php echo $image_2; ?>" data-webp="<?php echo get_webp($image_2); ?>" data-webp-retina="<?php echo get_webp($image_2); ?>" src="<?php echo (is_admin()) ? $image_2 : $src; ?>" class="lazyWebp tablet" alt="img 2">
                <img data-src="<?php echo $image_3; ?>" data-retina="<?php echo $image_3; ?>" data-webp="<?php echo get_webp($image_3); ?>" data-webp-retina="<?php echo get_webp($image_3); ?>" src="<?php echo (is_admin()) ? $image_3 : $src; ?>" class="lazyWebp mobile" alt="img 3">
                <div class="cont">
                    <div class="h3"><?php echo $title; ?></div>
                    <p><?php echo $text; ?></p>
                    <?php if (isset($link['url'])) { ?>
                        <a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="'.$link['target'].'"' : ''; ?> class="white-btn"><?php echo $link['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>