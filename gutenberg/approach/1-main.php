<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$text       = get_field('text');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/1.png">
<?php } else { ?>

    <div class="approach-main js-about-hero">
        <div class="approach-main__content container">
            <div class="approach-main__info">
                <h1 <?php echo (is_admin()) ? 'style="font-size:40px;"' : ''; ?>>
                    <span <?php echo (is_admin()) ? 'style="font-size:40px;"' : ''; ?> class="overflow-hidden">
                        <span <?php echo (is_admin()) ? 'style="font-size:40px;"' : ''; ?>><?php echo $title; ?></span>
                    </span>
                </h1>
                <div class="overflow-hidden">
                    <p><?php echo $text; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs__wrap">
        <div class="container">
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div>
    </div>

<?php } ?>