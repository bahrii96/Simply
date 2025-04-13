<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
$link       = get_field('link');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/career/preview/3.png">
<?php } else { ?>

    <section class="what-you-get">
        <div class="container quality__content">
            <h2 class="what-you-get__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="what-you-get__list what-you-get-list">              
                    <?php foreach ($list as $item) { ?>
                        <li class="what-you-get-list__item">
                            <div class="what-you-get-list__card">
                                <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp what-you-get-list__icon" alt="<?php echo $item['text']; ?>">
                                <p class="what-you-get-list__text"><?php echo $item['text']; ?></p>
                                <?php if ($item['list']) { ?>
                                    <ul class="what-you-get__sub-list">
                                        <?php foreach ($item['list'] as $it) { ?>
                                            <li><?php echo $it['text']; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <?php if (isset($link['url'])) { ?>
                <a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="'.$link['target'].'"' : ''; ?> class="what-you-get__btn red-btn"><span><?php echo $link['title']; ?></span></a>
            <?php } ?>
        </div>
    </section>

<?php } ?>