<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 
$dark       = get_field('dark'); 
if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/15.png">
<?php } else { ?>

    <section class="tempSetc <?php echo $dark ? 'dark' : ''; ?>">
        <div class="container">
            <div class="tempSetc__info">
                <h2 class="h2"><?php echo $title; ?></h2>
                <div class="text">
                    <p><?php echo $text; ?></p>
                </div>
            </div>
        </div>
    </section>

<?php } ?>