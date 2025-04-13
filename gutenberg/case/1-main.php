<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title          = get_field('title'); 
$text           = get_field('text'); 
$list           = get_field('list'); 
$image_desc     = get_field('image_desc'); 
$image_noth     = get_field('image_noth'); 
$logo           = get_field('logo'); 
$search         = '<p';
$replace        = '<span class="accent"';
$title_final    = str_replace('</p', '</span', str_replace('<p', '<span', strrev(implode(strrev($replace), explode(strrev($search), strrev($title), 2))))); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/case/preview/1.png">
<?php } else { ?>

    <section class="b-main b-main--template">
        <div class="container">
            <div class="box">
                <?php if ($title and $title_final) { ?>
                    <h1 class="h3"><?php echo $title_final; ?></h1>
                <?php } ?>
                <?php echo $text; ?>
                <?php if ($list) { ?>
                    <ul class="case-info-list">
                        <?php foreach ($list as $tt) { ?>
                            <li class="case-info-list__item">
                                <div class="case-info-item">
                                    <?php if ($tt['title']) ?><span class="case-info-item__title"><?php echo $tt['title']; ?></span>
                                    <?php if ($tt['text']) ?><span class="case-info-item__text"><?php echo $tt['text']; ?></span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <div class="b-main__bg">
            <?php if ($image_desc) ?><img data-src="<?php echo $image_desc; ?>" data-retina="<?php echo $image_desc; ?>" data-webp="<?php echo get_webp($image_desc); ?>" data-webp-retina="<?php echo get_webp($image_desc); ?>" src="<?php echo (is_admin()) ? $image_desc : $src; ?>" class="lazyWebp" alt="Background">
            <img data-src="<?php echo $url; ?>/img/case-template-mask.svg" src="<?php echo (is_admin()) ? $url.'/img/case-template-mask.svg' : $src; ?>" class="lazy" alt="img">
            <?php if ($logo) { ?>
                <div class="b-main__bg-logo">
                    <img style="height: auto;" data-src="<?php echo $logo; ?>" data-retina="<?php echo $logo; ?>" data-webp="<?php echo get_webp($logo); ?>" data-webp-retina="<?php echo get_webp($logo); ?>"  src="<?php echo (is_admin()) ? $logo : $src; ?>" class="lazyWebp" alt="logo">
                </div>
            <?php } ?>
        </div>       
    </section>
    <div class="breadcrumbs__wrap">
        <div class="container">
            <?php if (function_exists('get_nav_breadcrumb')) echo get_nav_breadcrumb(); ?>  
        </div>
    </div>

<?php } ?>