<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$text       = get_field('text');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/career/preview/2.png">
<?php } else { ?>

    <section class="what-todo with-line">
        <div class="container what-todo__content">
            <h2 class="what-todo__title h3"><?php echo $title; ?></h2>
            <div class="what-todo__row">
                <p class="what-todo__text"><?php echo $text; ?></p>
                <?php if ($list) { ?>               
                    <ul class="what-todo__list what-todo-list">
                        <?php $size = ['small','small','small','big','big','small','small','small','big','big'];
                        $color = ['light','gray','black','red','blue','light','gray','black','red','blue'];
                        foreach ($list as $key => $item) { ?>
                            <li class="what-todo-list__item what-todo-list__item--<?php echo $size[$key]; ?> what-todo-list__item--<?php echo $color[$key]; ?>"><?php echo $item['text']; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>