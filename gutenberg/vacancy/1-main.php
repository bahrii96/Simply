<?php $url                      = get_bloginfo('template_directory');
$src                            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

$chastina_zagolovku             = get_field('chastina_zagolovku');
$chastina_zagolovku_kolrova     = get_field('chastina_zagolovku_kolrova');
$tekst_pd_zagolovkom            = get_field('tekst_pd_zagolovkom');
$tekst_na_knopc_pereglyadu_vdeo = get_field('tekst_na_knopc_pereglyadu_vdeo');
$posilannya_na_yutub_dlya_vdeo  = get_field('posilannya_na_yutub_dlya_vdeo');
$spisok_cifr                    = get_field('spisok_cifr');

$category = get_the_terms( $post_id, 'locations' );     

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancy/preview/1.png">
<?php } else { ?>

    <section class="vacancy-main js-about-hero">
        <div class="vacancy-main__content container">
            <div class="vacancy-main__info">
                <?php if (isset($category[0])) { ?>
                    <a class="vacancy-main__city">
                        <img data-src="<?php echo get_field('flag', $category[0]); ?>" data-retina="<?php echo get_field('flag', $category[0]); ?>" src="<?php echo (is_admin()) ? get_field('flag', $category[0]) : $src; ?>" class="lazyWebp" alt="<?php echo $category[0]->name; ?>">
                        <span><?php echo $category[0]->name; ?></span>
                    </a>
                <?php } ?>
                <h1 class="h3"><span><?php echo get_the_title($post_id); ?></span></h1>               
            </div>
        </div>
    </section>
    <div class="breadcrumbs__wrap">
        <div class="container">
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div>
    </div>

<?php } ?>