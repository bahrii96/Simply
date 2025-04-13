<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$list       = get_field('list');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/4.png">
<?php } else { ?>

    <section class="training with-line">
        <div class="training__content container">
            <h2 class="training__title"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <ol class="training__list about-list">
                    <?php foreach ($list as $item) { ?>
                        <li class="about-list__item about-list-item">
                            <div class="about-list-item__title">
                                <?php echo $item['title']; ?>
                            </div>
                            <div class="about-list-item__content">
                             <?php echo $item['content']; ?>
                         </div>
                     </li>
                 <?php } ?>
             </ol>
         <?php } ?>
     </div>
 </section>

<?php } ?>