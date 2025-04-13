<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list');   
$page_cases = get_field('page_cases', 'options');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/services/preview/6.png">
<?php } else { ?>

    <div class="b-real-results with-line">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <div class="box">
                    <?php foreach ($list as $item) { ?>    
                        <div class="item">
                            <div class="icon">
                                <img data-src="<?php echo get_field('logo', $item['link']); ?>" data-retina="<?php echo get_field('logo', $item['link']); ?>" data-webp="<?php echo get_field('logo', $item['link']); ?>" data-webp-retina="<?php echo get_field('logo', $item['link']); ?>" src="<?php echo (is_admin()) ? get_field('logo', $item['link']) : $src; ?>" class="lazyWebp" alt="<?php echo $item['title']; ?>">
                            </div>
                            <h3 class="h4"><?php echo $item['title']; ?></h3>
                            <a href="<?php echo get_permalink($item['link']); ?>" class="btn-border">
                                <span><?php pll_e('Read the full story'); ?></span>
                                <span><?php pll_e('Full story'); ?></span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="for-btn">
                <a href="<?php echo $page_cases; ?>" class="red-btn">
                    <span><?php pll_e('See all cases'); ?></span>
                </a>
            </div>
        </div>
    </div>

<?php } ?>