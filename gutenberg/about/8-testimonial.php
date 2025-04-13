<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/8.png">
<?php } else { ?>

    <section class="testimonial">
        <div class="container testimonial__content with-line">
            <h2 class="testimonial__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <div class="testimonial__column">
                    <div class="swiper-container testimonial-slider">
                        <div class="swiper-wrapper testimonial-slider__wrapper">
                            <?php foreach ($list as $item) { ?>
                                <div class="swiper-slide testimonial-slider__slide">
                                    <div class="img testimonial-slider__icon">
                                        <img src="<?php echo $item['logo']; ?>" class="swiper-lazy" alt="<?php echo $item['name']; ?>">
                                    </div>
                                    <div class="swiper-lazy-preloader"></div>
                                    <p class="testimonial-slider__text"><?php echo $item['text']; ?></p>
                                    <div class="testimonial-slider__name"><?php echo $item['name']; ?></div>
                                    <div class="testimonial-slider__position"><?php echo $item['posada']; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

<?php } ?>