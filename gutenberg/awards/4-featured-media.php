<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');
if (get_field('is_example')) { ?>

    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/awards/preview/4.png">

<?php } else { ?>
    <div class="featuredMedia">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <div class="featuredList">
                <?php if ($list) { ?>              
                    <?php foreach ($list as $item) { 
                        $target = (isset($item['link']['target']) and $item['link']['target']) ? 'target="'.$item['link']['target'].'"' : ''; ?>
                        <a <?php echo $target; ?> href="<?php echo $item['link']['url'] ?? ''; ?>" target="_blank" class="featuredItem">
                            <p class="h5"><?php echo $item['title']; ?></p>
                            <div class="featuredItem__bot">
                                <?php if ($item['image']) { ?>
                                    <div class="logo">
                                        <img style="width: auto;" data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
                                    </div>
                                <?php } ?>
                                <div class="tag"><?php echo $item['tag']; ?></div>
                                <span class="date"><?php echo $item['date']; ?></span>
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>