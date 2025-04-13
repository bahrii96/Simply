<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$text       = get_field('text');
$image_1    = get_field('image_1');
$image_2    = get_field('image_2'); 
$image_3    = get_field('image_3'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/8.png">
<?php } else { ?>

    <section class="reporting">
        <div class="container reporting__content">
            <h2 class="reporting__title h3"><?php echo $title; ?></h2>
            <p class="reporting__text"><?php echo $text; ?></p>
        </div>
        <div class="reporting__photo reporting__photo--pc">
           <img data-src="<?php echo $image_1; ?>" data-retina="<?php echo $image_1; ?>" data-webp="<?php echo get_webp($image_1); ?>" data-webp-retina="<?php echo get_webp($image_1); ?>" src="<?php echo (is_admin()) ? $image_1 : $src; ?>" class="lazyWebp" alt="img">
       </div>
        <div class="reporting__photo reporting__photo--tab"> 
            <img data-src="<?php echo $image_3; ?>" data-retina="<?php echo $image_3; ?>" data-webp="<?php echo get_webp($image_3); ?>" data-webp-retina="<?php echo get_webp($image_3); ?>" src="<?php echo (is_admin()) ? $image_3 : $src; ?>" class="lazyWebp" alt="img">
        </div>
       <div class="reporting__photo reporting__photo--mob">
        <img data-src="<?php echo $image_2; ?>" data-retina="<?php echo $image_2; ?>" data-webp="<?php echo get_webp($image_2); ?>" data-webp-retina="<?php echo get_webp($image_2); ?>" src="<?php echo (is_admin()) ? $image_2 : $src; ?>" class="lazyWebp" alt="img">
        </div>
    </section>

<?php } ?>