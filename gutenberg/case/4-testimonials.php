<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title          = get_field('title'); 
$logo           = get_field('logo'); 
$text_review    = get_field('text_review'); 
$name           = get_field('name'); 
$posada         = get_field('posada'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/case/preview/4.png">
<?php } else { ?>

    <section class="s-testimonials section section--bdb with-line">
        <div class="b-main-case b-main-case--simple">
            <div class="container">
                <div class="box">
                    <div class="left">
                        <?php if ($title) { ?><h2 class="h3"><?php echo $title; ?></h2><?php } ?>
                    </div>
                    <div class="right">
                        <?php if ($logo) { ?>
                            <div class="img">
                                <img data-src="<?php echo $logo; ?>" data-retina="<?php echo $logo; ?>" data-webp="<?php echo $logo; ?>" data-webp-retina="<?php echo $logo; ?>" src="<?php echo (is_admin()) ? $logo : $src; ?>" class="lazyWebp" alt="Logo">
                            </div>
                        <?php } ?>
                        <?php echo $text_review; ?>
                        <div class="inf">
                            <?php if ($name) { ?><div class="name"><b><?php echo $name; ?></b></div><?php } ?>
                            <?php if ($posada) { ?><div class="spec"><?php echo $posada; ?></div><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>