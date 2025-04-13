<?php $url                      = get_bloginfo('template_directory');
$src                            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$chastina_zagolovku             = get_field('chastina_zagolovku');
$chastina_zagolovku_kolrova     = get_field('chastina_zagolovku_kolrova');
$tekst_pd_zagolovkom            = get_field('tekst_pd_zagolovkom');
$tekst_na_knopc_pereglyadu_vdeo = get_field('tekst_na_knopc_pereglyadu_vdeo');
$posilannya_na_yutub_dlya_vdeo  = get_field('posilannya_na_yutub_dlya_vdeo');
$spisok_cifr                    = get_field('spisok_cifr');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/1.png">
<?php } else { ?>

    <?php if ($posilannya_na_yutub_dlya_vdeo) { ?>
        <div class="popup popup--center js-popup" id="popup-video">
            <div class="popup__inner">
                <button class="popup__close js-popup-close" aria-label="Close popup">
                    <i></i>
                </button>
                <div class="video">
                    <iframe width="560" height="315" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    <?php } ?>
    <section class="b-main b-main--about js-about-hero">
        <div class="container">
            <div class="box">
                <h1 class="h3">
                    <span class="overflow-hidden">
                        <span><?php echo $chastina_zagolovku; ?></span>
                    </span>
                    <span class="overflow-hidden">
                        <span class="accent"><?php echo $chastina_zagolovku_kolrova; ?></span>
                    </span>
                    </h1>
                    <div class="overflow-hidden">
                        <p><?php echo $tekst_pd_zagolovkom; ?></p>
                    </div>
                    <?php if ($posilannya_na_yutub_dlya_vdeo) { ?>
                        <div class="btns">
                            <a href="#popup-video" data-link="<?php echo $posilannya_na_yutub_dlya_vdeo; ?>" class="white-btn js-popup-btn"><?php echo $tekst_na_knopc_pereglyadu_vdeo; ?></a>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($spisok_cifr) { ?>
                    <ul class="b-main__stat">
                        <?php foreach ($spisok_cifr as $key => $item) { ?>
                            <li class="b-main__stat-item <?php if ($key == 0) echo 'b-main__stat-item--dark'; ?>">
                                <div class="b-main__stat-info">
                                    <span class="b-main__stat-num"><?php echo $item['cifra']; ?></span>
                                    <div class="b-main__stat-title h3"><?php echo $item['tekst']; ?></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </section>
        <div class="breadcrumbs__wrap">
            <div class="container">
                <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
            </div>
        </div>

<?php } ?>