<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/5.png">
<?php } else { ?>

    <div class="b-fully-covered">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <?php echo $text; ?>
            <?php if ($list) { ?>
                <div class="items">
                    <?php foreach ($list as $item) { ?>
                        <div class="item">
                            <div class="icon">
                                <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="<?php echo $item['title']; ?>">
                            </div>
                            <h3 class="h5"><?php echo $item['title']; ?></h3>
                            <p><?php echo $item['text']; ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>