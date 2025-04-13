<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$image      = get_field('image'); 
$title_1    = get_field('title_1'); 
$title_2    = get_field('title_2'); 
$text       = get_field('text'); 
$list       = get_field('list'); 
$link       = get_field('link');  

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/services/preview/1.png">
<?php } else { ?>

    <div class="b-services-main <?php echo ( 'services' == get_post_type() ) ? 'on-service' : ''; ?>">
        <div class="img">
            <img data-src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" data-webp="<?php echo get_webp($image); ?>" data-webp-retina="<?php echo get_webp($image); ?>" src="<?php echo (is_admin()) ? $image : $src; ?>" class="lazyWebp" alt="image">
        </div>
        <div class="container">
            <div class="box">
                <div class="left">
                    <h1 class="h3 <?php echo ( 'services' == get_post_type() ) ? 'service-title' : ''; ?>">
                        <?php echo $title_1; ?>
                        <?php if ($title_2) { ?><span><?php echo $title_2; ?></span><?php } ?>
                    </h3>
                    <?php echo $text; ?>
                    <?php if (isset($link['url'])) { ?>
                        <a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="'.$link['target'].'"' : ''; ?> class="white-btn"><?php echo $link['title']; ?></a>
                    <?php } ?>
                </div>
                <?php if ($list) { ?>
                    <div class="right">
                        <svg width="638" height="375" viewbox="0 0 638 375" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M638 26.6113C219 -77 51.9833 148.389 0 375H638V26.6113Z" fill="#8092A3"></path>
                        </svg>
                        <div class="services-chat">
                            <?php foreach ($list as $item) { ?>
                                <div class="line">
                                    <div class="message <?php if ($item['title']) echo 'with-name'; ?>">
                                        <?php if ($item['title']) { ?><div class="name"><?php echo $item['title']; ?></div><?php } ?>
                                        <?php echo $item['text']; ?>
                                    </div>
                                </div>
                            <?php } ?>                           
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="b-breadcrumbs with-line">
        <div class="container">
            <div class="breadcrumbs2">
                <?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>
            </div>
        </div>
    </div>

<?php } ?>