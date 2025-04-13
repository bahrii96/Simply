<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/6.png">
<?php } else { ?>

    <section class="our-key">
        <div class="container our-key__content">
            <h2 class="our-key__title h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ul class="our-key__list our-key-list">
                    <?php foreach ($list as $item) { ?>
                        <li class="our-key-list__item">
                            <h3 class="our-key-list__title h4"><?php echo $item['title']; ?></h3>
                            <?php if ($item['content']) { ?>
                                <ul class="our-key-list__block">
                                    <?php foreach ($item['content'] as $content) { ?>                                            
                                        <li class="our-key-list__block-item"><?php echo $content['text']; ?></li>                          
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </section>

<?php } ?>