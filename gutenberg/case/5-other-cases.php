<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$prev_post  = get_previous_post();
$next_post  = get_next_post();
$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
$page_cases = get_field('page_cases', 'options');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/case/preview/5.png">
<?php } else { ?>

    <section class="s-other-cases section with-line">
        <div class="container">
            <h2 class="s-other-cases__title section__title h3"><?php pll_e('Other cases'); ?></h2>
            <ul class="cases-cards-list">
                <?php if ($prev_post) { ?>
                    <li class="cases-cards-list__item">
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="cases-card cases-card--1">
                            <span class="cases-card__label"><?php pll_e('Previous case'); ?></span>
                            <span class="cases-card__title">
                                <?php echo $prev_title; ?>
                                <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                    <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($next_post) { ?>
                    <li class="cases-cards-list__item">
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="cases-card cases-card--2">
                            <span class="cases-card__label"><?php pll_e('Next case'); ?></span>
                            <span class="cases-card__title">
                                <?php echo $next_title; ?>
                                <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                    <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="s-other-cases__btn section__btn">
                <button class="btn btn--accent btn--lg" style="cursor: pointer;" onclick="window.location='<?php echo $page_cases; ?>'" type="button"><?php pll_e('See all cases'); ?></button>
            </div>
        </div>
    </section>

<?php } ?>