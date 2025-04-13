<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$text       = get_field('tekst_nad_zagolovkom');
$zagolovok  = get_field('zagolovok');
$image      = get_field('image');
$poslugi    = get_field('poslugi');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/home/preview/4.png">
<?php } else { ?>

    <div class="s-services js-services">
        <div class="s-services__inner">
            <div class="b-main-cases">
                <div class="container">
                    <div class="title-cases">
                        <svg width="1.167em" height="1em" viewbox="0 0 42 36" xmlns="http://www.w3.org/2000/svg" class="icon icon--sound">
                            <path d="M5.83081 13.7168H0V21.7187H5.83081V13.7168Z"></path>
                            <path d="M14.6628 5.99414H8.83203V29.4415H14.6628V5.99414Z"></path>
                            <path d="M23.491 0.0078125H17.6602V35.427H23.491V0.0078125Z"></path>
                            <path d="M32.323 8.63086H26.4922V26.8057H32.323V8.63086Z"></path>
                            <path d="M41.155 11.8555H35.3242V23.5792H41.155V11.8555Z"></path>
                        </svg>
                        <span><?php echo $text; ?></span>
                    </div>
                    <h2><?php echo $zagolovok; ?></h2>
                </div>
                <nav class="s-services__nav">
                    <div class="title-cases">
                        <div>
                            <svg width="1.167em" height="1em" viewbox="0 0 42 36" xmlns="http://www.w3.org/2000/svg" class="icon icon--sound">
                                <path d="M5.83081 13.7168H0V21.7187H5.83081V13.7168Z"></path>
                                <path d="M14.6628 5.99414H8.83203V29.4415H14.6628V5.99414Z"></path>
                                <path d="M23.491 0.0078125H17.6602V35.427H23.491V0.0078125Z"></path>
                                <path d="M32.323 8.63086H26.4922V26.8057H32.323V8.63086Z"></path>
                                <path d="M41.155 11.8555H35.3242V23.5792H41.155V11.8555Z"></path>
                            </svg>
                            <span><?php echo $text; ?></span>
                        </div>
                    </div>
                    <ul>
                        <?php if($poslugi) {
                            foreach ($poslugi as $key => $value) {                          
                                $title_array = explode(' ', $value['zagolovok']); ?>
                                <li>
                                    <a <?php if (!$value['remove']) { ?>  href="<?php echo $value['posilannya']; ?>" <?php } else { echo 'style="pointer-events: none;"'; } ?> class="n-services-card__dbl-link">
                                        <?php for ($i=0; $i < (count($title_array) - 1); $i++) { ?>
                                            <span class="overflow-hidden">
                                                <span class="n-services-card__label n-services-card__label--sm">
                                                    <span><?php echo $title_array[$i].' '; ?></span>
                                                </span>
                                            </span>
                                        <?php } ?>
                                        <span class="overflow-hidden">
                                            <span class="n-services-card__label n-services-card__label--sm">
                                                <span>
                                                    <?php echo end($title_array); ?>
                                                    <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                                        <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>   
                    </ul>
                </nav>
            </div>
            <ul class="n-services-cards">
                <?php if($poslugi) {
                    $color_count = 0; $colors = ['', 'red', 'grey', '', 'red', 'grey'];
                    foreach ($poslugi as $key => $value) {  
                        $title_array = explode(' ', $value['zagolovok']); ?>
                        <li class="n-services-cards__item">
                            <div class="n-services-card">
                                <div class="n-services-card__wrap">
                                <a <?php if (!$value['remove']) { ?>  href="<?php echo $value['posilannya']; ?>" <?php } else { echo 'style="pointer-events: none;"'; } ?> class="n-services-card__header">  
                                    <?php for ($i=0; $i < (count($title_array) - 1); $i++) {  ?>                         
                                    <span class="n-services-card__label">
                                        <span><?php echo $title_array[$i].' '; ?></span>
                                    </span>
                                    <?php } ?>
                                    <span class="n-services-card__label">
                                        <span>
                                            <?php echo end($title_array); ?>
                                            <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                                <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </a>
                                <div class="n-services-card__text">
                                    <?php if ($value['tekst']) { ?><p><?php echo $value['tekst']; ?></p><?php } ?>
                                </div>
                                </div>
                                <nav class="n-services-card__nav">
                                    <ul>
                                        <?php if( $value['poslugi'] ) { 
                                            foreach ($value['poslugi'] as $pos) { ?>
                                                <li>
                                                    <a <?php if (!$pos['remove']) { ?> href="<?php echo $pos['posilannya']; ?>" <?php } else { echo 'style="pointer-events: none;"'; } ?>>
                                                        <span>
                                                            <svg width="1em" height="1em" viewbox="0 0 23 23" xmlns="http://www.w3.org/2000/svg" class="icon icon--star icon--stroke">
                                                                <path d="M11.5 0L12.98 10.02L23 11.5L12.98 12.98L11.5 23L10.02 12.98L0 11.5L10.02 10.02L11.5 0Z"></path>
                                                            </svg>
                                                            <?php echo $pos['zagolovok']; ?>
                                                            <?php if (!$pos['remove']) { ?>
                                                                <span>
                                                                    <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                                                        <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                                                    </svg>
                                                                </span>
                                                            <?php } ?>
                                                        </span>
                                                    </a>
                                                </li> 
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </li>
                        <?php $color_count++; } ?>
                    <?php } ?>
                </ul>
                <div class="s-services__img">                 
                    <img width="100px" height="50px" data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="Services image">
                </div>
            </div>
            <div class="s-services__empty"></div>
        </div>

<?php } ?>