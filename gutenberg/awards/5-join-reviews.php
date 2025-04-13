<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
$form       = get_field('form'); 
if (get_field('is_example')) { ?>

    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/awards/preview/5.png">

<?php } else { ?>
    <section class="join-our-team awards-page-reviews">
        <div class="join-our-team__content">
            <div class="join-our-team__column">
            <div class="join-our-team__title h3"><?php echo $title; ?></div>
                <div class="swiper-container testimonial-slider">
                    <div class="swiper-wrapper testimonial-slider__wrapper">
                        <?php if ($list) { ?>              
                            <?php foreach ($list as $item) { ?>
                                <div class="swiper-slide testimonial-slider__slide">
                                    <div class="img testimonial-slider__icon">
                                        <img style="width: auto;" data-src="<?php echo $item['image']; ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="swiper-lazy">
                                    </div>
                                    <div class="swiper-lazy-preloader"></div>
                                    <p class="testimonial-slider__text"><?php echo $item['text']; ?></p>
                                    <div class="testimonial-slider__name"><?php echo $item['mya']; ?></div>
                                    <div class="testimonial-slider__position"><?php echo $item['posada']; ?></div>
                                </div>                                
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewbox="0 0 18 17" fill="none">
                            <path d="M0.721825 8.49692H16.2782M16.2782 8.49692L8.5 0.71875M16.2782 8.49692L8.5 16.2751" stroke="white" stroke-width="1.50002"></path>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewbox="0 0 18 17" fill="none">
                            <path d="M0.721825 8.49692H16.2782M16.2782 8.49692L8.5 0.71875M16.2782 8.49692L8.5 16.2751" stroke="white" stroke-width="1.50002"></path>
                        </svg>
                    </div>
                </div>
                <div class="dec">
                    <svg class="svg-pc" xmlns="http://www.w3.org/2000/svg" width="1123" height="1361" viewbox="0 0 1123 1361" fill="none">
                        <path opacity="0.2" d="M-102.227 523.005L-97.2476 521.094L-99.1588 516.115L-125.132 448.447C-185.79 290.42 -86.5247 103.948 98.7646 32.8265C284.054 -38.2954 482.594 33.8669 543.251 191.894L569.225 259.561L571.136 264.54L576.115 262.629L654.627 232.493C839.916 161.371 1038.46 233.533 1099.11 391.56C1159.77 549.587 1060.51 736.059 875.216 807.181L796.704 837.317L791.725 839.229L793.636 844.208L819.61 911.875C880.267 1069.9 781.002 1256.37 595.713 1327.5C410.424 1398.62 211.884 1326.46 151.227 1168.43L125.253 1100.76L123.342 1095.78L118.363 1097.69L39.8509 1127.83C-145.438 1198.95 -343.978 1126.79 -404.635 968.762C-465.293 810.735 -366.028 624.263 -180.738 553.141L-102.227 523.005Z" stroke="#8092A3" stroke-width="10.6667"></path>
                    </svg>
                    <svg class="svg-mob" xmlns="http://www.w3.org/2000/svg" width="375" height="152" viewbox="0 0 375 152" fill="none">
                        <path opacity="0.2" d="M-20.043 207.271L-16.3086 205.838L-17.742 202.104L-27.9483 175.514C-51.3151 114.638 -13.1482 42.3249 58.9366 14.6558C131.021 -13.0134 207.771 15.1899 231.137 76.0659L241.344 102.656L242.777 106.39L246.511 104.957L277.363 93.1147C349.447 65.4456 426.196 93.6488 449.563 154.525C472.93 215.401 434.763 287.714 362.678 315.383L331.827 327.225L328.093 328.658L329.526 332.393L339.733 358.982C363.099 419.858 324.932 492.171 252.848 519.84C180.763 547.51 104.014 519.306 80.6469 458.43L70.4406 431.84L69.0072 428.106L65.2728 429.539L34.4216 441.381C-37.6631 469.051 -114.412 440.847 -137.779 379.971C-161.146 319.095 -122.979 246.783 -50.8942 219.113L-20.043 207.271Z" stroke="#8092A3" stroke-width="8"></path>
                    </svg>
                </div>
            </div>
            <div class="join-our-team__column">
                <div class="form join-our-team__form">
                    <h2 class="h3"><?php echo get_field('zagolovok_formi'); ?></h2>
                    <?php if (is_admin()) { ?>
                        <form>
                            <input type="hidden" class="dialCode">
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="text">
                                    <label class="input__label">Name</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="email" class="input">
                                    <label class="input__label">Email</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin textarea -->
                                <div class="input input--textarea">
                                    <div class="textarea">
                                        <textarea></textarea>
                                    </div>
                                    <label class="input__label">Cover letter</label>
                                </div>
                                <!-- end textarea -->
                            </div>
                            <div class="form__field">
                                <div class="form__captcha">
                                    <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="" data-src="./img/image-5.jpg" data-retina="./img/image-5.jpg" data-webp="./img/image-5.webp" data-webp-retina="./img/image-5.webp">
                                </div>
                            </div>
                            <div class="form__field">
                                <div class="form__footer">
                                    <button class="btn btn--reg">Send Message</button>
                                    <p>
                                        By pressing this button, you agree to our
                                        <a href="#">
                                            Privacy Policy
                                            <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                                <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                            </svg>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    <?php } else { 
                        $form = str_replace('</div>
</div>
</div>', '</div></div>', $form); 
$form = str_replace('aria-required="true"', 'aria-required="true" required', $form);
echo $form;
} ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>