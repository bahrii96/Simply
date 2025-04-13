<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/5.png">
<?php } else { ?>

    <section class="improvement">
        <div class="container improvement__content">
            <h2 class="improvement__title"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <div class="improvement__row">
                    <?php foreach ($list as $key => $item) { ?>
                        <div class="improvement__column">
                            <div class="improvement-card <?php echo ($key == 0) ? 'improvement-card--gray' : 'improvement-card--blue'; ?>">
                                <h3 class="improvement-card__title h4"><?php echo $item['title']; ?></h3>
                                <?php if ($item['content']) { ?>
                                    <ul class="improvement-card__list">
                                        <?php foreach ($item['content'] as $content) { ?>                                            
                                            <li class="improvement-card__list-item"><?php echo $content['text']; ?></li>                          
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>

<?php } ?>