<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list');  
$image      = get_field('image');  

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/case/preview/2.png">
<?php } else { ?>

    <section class="s-case-about section">
        <div class="container with-line">
            <?php if ($title) { ?>
                <h2 class="h3 s-case-about__title section__title"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if ($list) { ?>
                <ol class="s-case-about__about-list about-list">
                    <?php foreach ($list as $item) { ?>
                        <?php if ($item['tip'] == 'text' and $item['text']) { ?>
                            <li class="about-list__item about-list-item">
                                <div class="about-list-item__title"><?php echo $item['title']; ?></div>
                                <div class="about-list-item__content">
                                    <p><?php echo $item['text']; ?></p>
                                </div>
                            </li>
                        <?php } else if ($item['tip'] == 'list') { ?>
                            <li class="about-list__item about-list-item">
                                <div class="about-list-item__title"><?php echo $item['title']; ?></div>
                                <?php if ($item['item_list']) { ?>
                                    <div class="about-list-item__content">
                                        <ul>
                                            <?php foreach ($item['item_list'] as $it) { ?>
                                                <li><?php echo $it['text']; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ol>
            <?php } ?>
        </div>
        <?php if ($image) { ?>
            <div class="s-case-about__img">
                <img data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="Case">
            </div>
        <?php } ?>
    </section>

<?php } ?>