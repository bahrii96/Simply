<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
$text_1     = get_field('text_1');
$text_2     = get_field('text_2');
$steps      = get_field('steps');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/9.png">
<?php } else { ?>

    <section class="quality">
        <div class="container quality__content">
            <h2 class="quality__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="quality__list quality-list">
                    <?php foreach ($list as $item) { ?>
                        <li class="quality-list__item">
                            <div class="quality-list__card">
                                <p class="quality-list__text"><?php echo $item['text']; ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div class="container">
            <div class="quality__block">
                <div class="quality__block-column">
                    <h3 class="quality__block-title h4"><?php echo $text_1; ?></h3>
                </div>
                <div class="quality__steps quality-steps">
                    <div class="quality-steps__circle">
                        <div class="quality-steps__text">
                            <span><?php echo $text_2; ?></span>
                        </div>
                        <?php if ($steps) { ?>
                            <?php foreach ($steps as $key => $_item) { ?>
                                <div class="quality-steps__step quality-steps__step--<?php echo $key + 1; ?>">
                                    <div class="quality-steps__step-text"><?php echo $_item['text']; ?></div>
                                    <span class="quality-steps__step-num">0<?php echo $key + 1; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>