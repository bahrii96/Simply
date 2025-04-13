<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text');  
$list       = get_field('list');  

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/case/preview/3.png">
<?php } else { ?>

    <section class="s-results section section--bdb with-line">
        <div class="container">
            <h2 class="s-results__title section__title h3"><?php echo $title; ?></h2>
            <div class="s-results__results-block results-block">
                <div class="results-block__left">
                    <?php echo $text; ?>
                </div>
                <?php if ($list) { ?>
                    <div class="results-block__right">
                        <ul class="results-cards">
                            <?php foreach ($list as $item) { ?>
                                <li class="results-cards__item">
                                    <div class="result-card <?php echo $item['accent'] ? 'result-card--accent' : ''; ?>">
                                        <p class="result-card__title"><?php echo $item['title']; ?></p>
                                        <p class="result-card__text"><?php echo $item['text']; ?></p>
                                    </div>
                                </li>
                            <?php } ?>             
                        </ul>
                    </div>
                <?php } ?>   
            </div>
        </div>
    </section>

<?php } ?>