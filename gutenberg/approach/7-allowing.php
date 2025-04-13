<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$title_1    = get_field('title_1');
$list_img   = get_field('list_img');
$title_2    = get_field('title_2');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/7.png">
<?php } else { ?>

    <section class="we-are-allowing with-line">
        <div class="container we-are-allowing__content">
            <h2 class="we-are-allowing__title h3"><?php echo $title; ?></h2>
            <div class="we-are-allowing__row">
                <h3 class="we-are-allowing__sub-title h4"><?php echo $title_1; ?></h3>
                <?php if ($list_img) { ?>
                    <ul class="we-are-allowing__analitics-list analitics-list">
                        <?php foreach ($list_img as $item_i) { ?>
                            <li class="analitics-list__item">
                                <img data-src="<?php echo $item_i['image']; ?>" data-retina="<?php echo $item_i['image']; ?>" src="<?php echo (is_admin()) ? $item_i['image'] : $src; ?>" class="lazyWebp analitics-list__icon" alt="img">
                                <h4 class="analitics-list__title h5"><?php echo $item_i['text']; ?></h4>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
            <?php if ($list) { ?>
                <div class="we-are-allowing__row">
                    <h3 class="we-are-allowing__sub-title h4"><?php echo $title_2; ?></h3>
                    <ul class="we-are-allowing__metrix-list metrix-list">
                        <?php foreach ($list as $item) { ?>
                            <li class="metrix-list__item"><?php echo $item['text']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </section>

<?php } ?>