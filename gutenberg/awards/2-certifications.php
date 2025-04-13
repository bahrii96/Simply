<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
if (get_field('is_example')) { ?>

    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/2.png">
    
<?php } else { ?>
    <section class="certifications">
        <div class="container">
            <h2 class="certifications__title h3"><?php echo $title; ?></h2>
            <div class="certifications__cards">
                <?php if ($list) { ?>
                    <?php foreach ($list as $item) { ?>
                        <div class="col">
                            <div class="certItem">
                                <div class="certItem__icon">
                                    <img style="height: auto;" data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
                                </div>
                                <h3 class="h5"><?php echo $item['title']; ?></h3>
                                <?php echo $item['text']; ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <div class="divider"></div>
<?php } ?>