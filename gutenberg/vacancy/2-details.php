<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$content    = get_field('content');
$link_1     = get_field('link_1');
$link_2     = get_field('link_2');
$link       = get_field('link');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancy/preview/2.png">
<?php } else { ?>

    <section class="details">
        <div class="container details__content">
            <h3 class="details__title"><?php echo $title; ?></h3>
            <div class="details__row">
                <div class="details__text">
                    <?php echo str_replace(array('b>', 'strong>'), 'span>', $content); ?>
                </div>
                <div class="details__block details-block">
                    <?php if (isset($link_1['url'])) { ?>
                        <div class="details-block__item details-block__item--red">
                            <div class="details-block__icon">
                                <svg viewbox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M14.5618 0.727295H11.8841V10.0992L5.23856 3.45368L3.34515 5.34709L9.88238 11.8843H0.727051V14.562H9.65267L3.45344 20.7612L5.34685 22.6546L11.8841 16.1174V25.2728H14.5618V16.5637L20.7014 22.7034L22.5948 20.8099L16.3469 14.562H25.2725V11.8843H16.1172L22.7031 5.29839L20.8097 3.40498L14.5618 9.65291V0.727295Z"></path>
                                </svg>
                            </div>
                            <a href="<?php echo $link_1['url']; ?>" <?php echo ($link_1['target']) ? 'target="'.$link_1['target'].'"' : ''; ?>  class="details-block__link">
                                <?php echo $link_1['title']; ?>
                                <svg viewbox="0 0 34 34" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7832 0.427765L33.3554 16.9999L16.7832 33.5721L13.6564 30.4453L24.8908 19.2109L0.211065 19.2109L0.211065 14.7889L24.8908 14.7889L13.6564 3.55459L16.7832 0.427765Z"></path>
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if (isset($link_2['url'])) { ?>
                        <div class="details-block__item details-block__item--dark">
                            <div class="details-block__icon">
                                <svg viewbox="0 0 15 28" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.67875 27.742V15.198H13.7327L14.3396 10.3094H9.67875V7.1882C9.67875 5.77287 10.0572 4.80824 12.0115 4.80824L14.5039 4.8071V0.434815C13.2975 0.302231 12.0851 0.237997 10.872 0.242399C7.27852 0.242399 4.81831 2.52051 4.81831 6.70435V10.3096H0.753906V15.1982H4.81819V27.7422L9.67875 27.742Z"></path>
                                </svg>
                            </div>
                            <a href="<?php echo $link_2['url']; ?>" <?php echo ($link_2['target']) ? 'target="'.$link_2['target'].'"' : ''; ?> class="details-block__link">
                                <?php echo $link_2['title']; ?>
                                <svg viewbox="0 0 34 34" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7832 0.427765L33.3554 16.9999L16.7832 33.5721L13.6564 30.4453L24.8908 19.2109L0.211065 19.2109L0.211065 14.7889L24.8908 14.7889L13.6564 3.55459L16.7832 0.427765Z"></path>
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($link) { ?>
                <ol class="details__list about-list">
                   <?php foreach ($link as $item) { ?>
                    <li class="about-list__item about-list-item">
                        <div class="about-list-item__title"><?php echo $item['title']; ?></div>
                        <div class="about-list-item__content">
                            <?php echo $item['content']; ?>
                        </div>
                    </li>
                <?php } ?>
            </ol>
        <?php } ?>
    </div>
</section>

<?php } ?>