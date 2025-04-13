<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/services/preview/5.png">
<?php } else { ?>

    <div class="b-how-we-operate">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <?php echo $text; ?>
            <?php if ($list) { ?>
                <div class="box">
                    <?php foreach ($list as $item) { ?>     
                        <div class="item">
                            <div class="left">
                                <h3 class="h4"><?php echo $item['title']; ?></h3>
                            </div>
                            <div class="right">
                                <p><?php echo $item['text']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>