<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/about/preview/6.png">
<?php } else { ?>

    <section class="about-different">
        <div class="container about-different__content">
            <h2 class="about-different__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="about-different__list about-different-list">
                    <?php foreach ($list as $item) { ?>
                        <li class="about-different-list__item">
                            <div class="about-different-list__card">
                                <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp about-different-list__icon" alt="<?php echo $item['title']; ?>">
                                <h3 class="about-different-list__title h4"><?php echo $item['title']; ?></h3>
                                <p class="about-different-list__text"><?php echo $item['text']; ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </section>

<?php } ?>