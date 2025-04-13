<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/cases/preview/1.png">
<?php } else { ?>

    <section class="b-main b-main--simple">
        <div class="b-main__bg">
            <img data-src="<?php echo $url; ?>/img/home-02.jpg" data-retina="<?php echo $url; ?>/img/home-02.jpg" data-webp="<?php echo $url; ?>/img/home-02.webp" data-webp-retina="<?php echo $url; ?>/img/home-02.webp" src="<?php echo (is_admin()) ? $url.'/img/home-02.jpg' : $src; ?>" class="lazyWebp" alt="img 1">
            <img data-src="<?php echo $url; ?>/img/home-02-mob.jpg" data-retina="<?php echo $url; ?>/img/home-02-mob.jpg" data-webp="<?php echo $url; ?>/img/home-02-mob.webp" data-webp-retina="<?php echo $url; ?>/img/home-02-mob.webp" src="<?php echo (is_admin()) ? $url.'/img/home-02-mob' : $src; ?>" class="lazyWebp" alt="img 2">
        </div>
        <div class="container">
            <div class="box">
                <h1 class="h3"><?php echo $title; ?></h1>
                <p><?php echo $text; ?></p>
            </div>
        </div>
    </section>

<?php } ?>