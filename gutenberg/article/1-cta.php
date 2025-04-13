<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$content    = get_field('content'); 
$image      = get_field('image'); 
$link       = get_field('link'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/article/preview/1.png">
<?php } else { ?>

    <?php if (is_admin()) { ?><div class="b-article" style="padding: 0;"><div class="box"><?php } ?>
    <div class="article-cta">
        <?php echo $content; ?>
        <?php if (isset($link['url'])) { ?>
            <a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="'.$link['target'].'"' : ''; ?> class="red-btn">
                <span><?php echo $link['title']; ?></span>
            </a>
        <?php } ?>
        <?php if ($image) { ?>
            <div class="img">
                <img data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="img">
            </div>
        <?php } ?>
    </div>
    <?php if (is_admin()) { ?></div></div><?php } ?>

<?php } ?>