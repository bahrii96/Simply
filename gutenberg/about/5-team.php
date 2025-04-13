<?php $url          = get_bloginfo('template_directory');
$src                = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title              = get_field('title');
$team               = get_field('team');
$kartka_doluchennya = get_field('kartka_doluchennya');
$image              = get_field('image');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/5.png">
<?php } else { ?>

    <section class="leadership-teams">
        <div class="container leadership-teams__content">
            <h2 class="leadership-teams__title h3"><?php echo $title; ?></h2>
        </div>
        <?php if ($team) { ?>
            <div class="container leadership-teams__cards-container">
                <ul class="leadership-teams__list">
                    <?php foreach ($team as $item) { ?>
                        <li class="leadership-teams__list-column">
                            <div class="person-card leadership-teams__list-card">
                                <div class="person-card__photo">
                                    <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="<?php echo $item['mya']; ?>">
                                </div>
                                <h3 class="person-card__name h4"><?php echo $item['mya']; ?></h3>
                                <div class="person-card__position"><?php echo $item['posada']; ?></div>
                                <ul class="social leadership-teams__social">
                                    <?php if ($item['linkedin']) { ?>
                                        <li class="social__item">
                                            <a href="<?php echo $item['linkedin']; ?>" target="_blank" class="social__link">
                                                <svg width="18" height="18" viewbox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.664062 5.875H4.39115V17.3333H0.664062V5.875ZM14.5432 6.00938C14.5036 5.99688 14.4661 5.98333 14.4245 5.97187C14.3745 5.96055 14.3241 5.95083 14.2734 5.94271C14.0534 5.89771 13.8293 5.87503 13.6047 5.875C11.4318 5.875 10.0536 7.45521 9.59948 8.06563V5.875H5.8724V17.3333H9.59948V11.0833C9.59948 11.0833 12.4161 7.16042 13.6047 10.0417V17.3333H17.3307V9.60104C17.3292 8.77827 17.0547 7.97926 16.5502 7.32928C16.0458 6.67929 15.3399 6.21507 14.5432 6.00938Z"></path>
                                                    <path d="M2.48698 4.31771C3.49375 4.31771 4.3099 3.50156 4.3099 2.49479C4.3099 1.48802 3.49375 0.671875 2.48698 0.671875C1.48021 0.671875 0.664062 1.48802 0.664062 2.49479C0.664062 3.50156 1.48021 4.31771 2.48698 4.31771Z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($item['email']) { ?>
                                        <li class="social__item">
                                            <a href="mailto:<?php echo $item['email']; ?>" target="_blank" class="social__link">
                                                <svg width="20" height="14" viewbox="0 0 20 14" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.49992 0.499878C1.30339 0.499878 1.11696 0.541208 0.94518 0.609219L9.52346 8.06248C9.82759 8.32668 10.1887 8.32651 10.4922 8.06248L19.0548 0.609219C18.8831 0.541035 18.6966 0.499878 18.5001 0.499878H1.49992ZM0.0155206 1.78896C0.00610351 1.85732 0 1.92882 0 1.99998V12.0002C0 12.2052 0.0432482 12.4006 0.117189 12.5782L6.0548 7.03127L0.0158483 1.78877L0.0155206 1.78896ZM19.9846 1.78896L13.9609 7.03147L19.8828 12.5865C19.9585 12.4069 20 12.2082 20 12.0005V2.00035C20 1.92938 19.9938 1.8577 19.9845 1.78934L19.9846 1.78896ZM12.8202 8.01586L11.4764 9.18776C10.6402 9.91532 9.37515 9.91411 8.53875 9.18776L7.19489 8.02372L1.34345 13.4926C1.39402 13.4976 1.44773 13.5002 1.4997 13.5002H18.5C18.5494 13.5002 18.6003 13.4969 18.6484 13.4926L12.8202 8.01568L12.8202 8.01586Z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($kartka_doluchennya) { ?>
                        <li class="leadership-teams__list-column">
                            <div class="join-card join-card--pc">
                                <h4 class="join-card__title"><?php echo $kartka_doluchennya['title']; ?></h4>
                                <p class="join-card__text"><?php echo $kartka_doluchennya['text']; ?></p>
                                <?php if (isset($kartka_doluchennya['link']['url'])) { ?>
                                    <a href="<?php echo $kartka_doluchennya['link']['url']; ?>" <?php echo ($kartka_doluchennya['link']['target']) ? 'target="'.$kartka_doluchennya['link']['target'].'"' : ''; ?>  class="join-card__link red-btn">
                                        <span><?php echo $kartka_doluchennya['link']['title']; ?></span>
                                    </a>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <?php if ($kartka_doluchennya) { ?>
                    <div class="container">
                        <div class="join-card join-card--mob">
                            <h4 class="join-card__title"><?php echo $kartka_doluchennya['title']; ?></h4>
                            <p class="join-card__text"><?php echo $kartka_doluchennya['text']; ?></p>
                            <?php if (isset($kartka_doluchennya['link']['url'])) { ?>
                                <a href="<?php echo $kartka_doluchennya['link']['url']; ?>" <?php echo ($kartka_doluchennya['link']['target']) ? 'target="'.$kartka_doluchennya['link']['target'].'"' : ''; ?> class="join-card__link"><?php echo $kartka_doluchennya['link']['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if ($image) { ?>
            <div class="leadership-teams__photo">
                <img data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="image">
            </div>
        <?php } ?>
    </section>

<?php } ?>