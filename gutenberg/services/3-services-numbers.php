<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/services/preview/3.png">
<?php } else { ?>

    <div class="b-services-numbers with-line">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <div class="box">
                <div class="left">
                    <?php echo str_replace('strong', 'span', $text); ?>
                </div>
                <?php if ($list) { ?>
                    <div class="right">
                        <div class="items">
                            <?php foreach ($list as $item) { ?>
                                <div class="item">
                                    <span><?php echo $item['title']; ?></span>
                                    <p><?php echo $item['text']; ?></p>
                                </div>
                            <?php } ?>               
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php } ?>