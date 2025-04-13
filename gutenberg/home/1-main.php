<?php $url                      = get_bloginfo('template_directory');
$src                            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$chastina_zagolovku             = get_field('chastina_zagolovku');
$chastina_zagolovku_kolrova     = get_field('chastina_zagolovku_kolrova');
$tekst_pd_zagolovkom            = get_field('tekst_pd_zagolovkom');
$tekst_na_knopc_pereglyadu_vdeo = get_field('tekst_na_knopc_pereglyadu_vdeo');
$posilannya_na_yutub_dlya_vdeo  = get_field('posilannya_na_yutub_dlya_vdeo');
$posilannya                     = get_field('posilannya');
$spisok_povdomlen               = get_field('spisok_povdomlen');
$bzhuchij_ryadok                = get_field('bzhuchij_ryadok');
$simple_link                    = get_field('simple_link'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/home/preview/1.png">
<?php } else { ?>

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
    <div class="b-main b-main--home js-home-hero">
        <div class="container">
            <div class="box">
                <h1>
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
                <div class="btns">
                    <a <?php if ( $simple_link ) { ?> href="<?php echo $posilannya_na_yutub_dlya_vdeo; ?>" class="white-btn" <?php } else { ?>  href="#popup-video" class="white-btn js-popup-btn" data-link="<?php echo $posilannya_na_yutub_dlya_vdeo; ?>" <?php } ?> >
                        <span><?php echo $tekst_na_knopc_pereglyadu_vdeo; ?></span>
                    </a>             
                    <?php if (isset($posilannya['url'])) { ?>
                        <a href="<?php echo $posilannya['url'] ? $posilannya['url'] : '#popup-form'; ?>" class="white-btn transparent fancy-btn fancy-btn--transparent <?php if (!$posilannya['url']) echo 'js-popup-btn'; ?>">                        
                            <span><?php echo $posilannya['title']; ?></span>
                            <span>
                                <img data-src="<?php echo $url; ?>/img/sticker.png" data-retina="<?php echo $url; ?>/img/sticker.png" data-webp="<?php echo $url; ?>/img/sticker.webp" data-webp-retina="<?php echo $url; ?>/img/sticker.webp" src="<?php echo (is_admin()) ? $url.'/img/sticker.png' : $src; ?>" class="lazyWebp" alt="sticker 1">
                                <img data-src="<?php echo $url; ?>/img/sticker.png" data-retina="<?php echo $url; ?>/img/sticker.png" data-webp="<?php echo $url; ?>/img/sticker.webp" data-webp-retina="<?php echo $url; ?>/img/sticker.webp" src="<?php echo (is_admin()) ? $url.'/img/sticker.png' : $src; ?>" class="lazyWebp" alt="sticker 2">
                                <img data-src="<?php echo $url; ?>/img/sticker.png" data-retina="<?php echo $url; ?>/img/sticker.png" data-webp="<?php echo $url; ?>/img/sticker.webp" data-webp-retina="<?php echo $url; ?>/img/sticker.webp" src="<?php echo (is_admin()) ? $url.'/img/sticker.png' : $src; ?>" class="lazyWebp" alt="sticker 3">
                            </span>
                            <span><?php pll_e('Let’s do it'); ?></span>
                        </a>
                    <?php } ?>

                </div>
            </div>
            <?php if ($spisok_povdomlen) { ?>
                <div class="hero-chat__wrap">
                    <div class="hero-chat swiper-container">
                        <ul class="hero-chat__list swiper-wrapper">                         
                            <?php foreach ($spisok_povdomlen as $key => $item) { ?>
                                <li class="hero-chat__item swiper-slide">
                                    <div class="hero-chat-message <?php echo ($key % 2 === 0) ? 'hero-chat-message--left' : 'hero-chat-message--right'; ?>">
                                        <?php if ($key % 2 === 0) { } else { ?>
                                            <div class="hero-chat-message__img">
                                                <svg width="1.167em" height="1em" viewbox="0 0 42 36" xmlns="http://www.w3.org/2000/svg" class="icon icon--sound">
                                                    <path d="M5.83081 13.7168H0V21.7187H5.83081V13.7168Z"></path>
                                                    <path d="M14.6628 5.99414H8.83203V29.4415H14.6628V5.99414Z"></path>
                                                    <path d="M23.491 0.0078125H17.6602V35.427H23.491V0.0078125Z"></path>
                                                    <path d="M32.323 8.63086H26.4922V26.8057H32.323V8.63086Z"></path>
                                                    <path d="M41.155 11.8555H35.3242V23.5792H41.155V11.8555Z"></path>
                                                </svg>
                                            </div>
                                        <?php } ?>
                                        <?php if ($item['avatar']) { ?>
                                            <div class="hero-chat-message__img">
                                                <img data-src="<?php echo $item['avatar']; ?>" data-retina="<?php echo $item['avatar']; ?>" data-webp="<?php echo get_webp($item['avatar']); ?>" data-webp-retina="<?php echo get_webp($item['avatar']); ?>" src="<?php echo (is_admin()) ? $item['avatar'] : $src; ?>" class="swiper-lazy webp" alt="Hero chat <?php echo $key; ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="hero-chat-message__body"> 
                                            <p class="hero-chat-message__name">
                                                <?php if ($item['flazhok']) { ?>
                                                    <img data-src="<?php echo $item['flazhok']; ?>" data-retina="<?php echo $item['flazhok']; ?>" data-webp="<?php echo $item['flazhok']; ?>" data-webp-retina="<?php echo $item['flazhok']; ?>" src="<?php echo (is_admin()) ? $item['flazhok'] : $src; ?>" class="swiper-lazy" alt="Flag <?php echo $key; ?>" width="20" height="20">
                                                <?php } ?>
                                                <?php echo $item['mya']; ?>                                                
                                            </p>
                                            <div class="hero-chat-message__message">
                                                <span class="hero-chat-message__dots">
                                                    <i></i>
                                                </span>
                                                <p class="hero-chat-message__text"><?php echo $item['tekst']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if ($bzhuchij_ryadok) { ?>
            <div class="marquee__wrap">
                <div class="trusted-by"><?php pll_e('Trusted by'); ?></div>
                <div class="marquee js-marquee">
                    <div class="marquee__inner">
                        <div class="marquee__body">
                            <?php foreach ($bzhuchij_ryadok as $tekst) { ?>
                                <?php echo $tekst['tekst']; ?>
                                <svg width="1.167em" height="1em" viewbox="0 0 42 36" xmlns="http://www.w3.org/2000/svg" class="icon icon--sound">
                                    <path d="M5.83081 13.7168H0V21.7187H5.83081V13.7168Z"></path>
                                    <path d="M14.6628 5.99414H8.83203V29.4415H14.6628V5.99414Z"></path>
                                    <path d="M23.491 0.0078125H17.6602V35.427H23.491V0.0078125Z"></path>
                                    <path d="M32.323 8.63086H26.4922V26.8057H32.323V8.63086Z"></path>
                                    <path d="M41.155 11.8555H35.3242V23.5792H41.155V11.8555Z"></path>
                                </svg>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <img class="b-main__circle" src="<?php echo $url; ?>/img/home-hero-circle.svg" alt="Circle 1">
        <img class="b-main__rect" src="<?php echo $url; ?>/img/home-hero-rect.svg" alt="Circle 2">
        <img class="b-main__star" src="<?php echo $url; ?>/img/hero-star.svg" alt="Circle 3">
    </div>

    <?php } ?>