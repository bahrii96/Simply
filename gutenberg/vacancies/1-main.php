<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancies/preview/1.png">
<?php } else { ?>

    <section class="vacancies-main js-about-hero">
        <div class="vacancies-main__content container">
            <h1 class="h3">
                <span class="overflow-hidden">
                    <span><?php echo $title; ?></span>
                </span>
            </h1>
        </div>
    </section>
    <div class="breadcrumbs__wrap vacancies-breadcrumbs">
        <div class="container">
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div>
    </div>

<?php } ?>