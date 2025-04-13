<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$vacancy    = get_field('vacancy');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancy/preview/5.png">
<?php } else { ?>

    <section class="similar">
        <div class="container similar__content">
            <h3 class="similar__title"><?php pll_e('Similar vacancies'); ?></h3>
            <?php if ($vacancy) { ?>
                <ul class="similar__list similar-list">
                  <?php $colors = ['red', 'gray', 'blue', 'red', 'gray', 'blue']; foreach ($vacancy as $key => $item) {                   
                    $category = get_the_terms( $item->ID, 'locations' ); ?>
                    <li class="similar-list__item similar-list__item--<?php echo $colors[$key]; ?>"> 
                        <div class="similar-list__row">
                            <?php if (isset($category[0])) { ?>
                                <div class="similar-list__city"><?php echo $category[0]->name; ?></div>
                            <?php } ?>                        
                            <div class="similar-list__date"><?php echo get_the_time('d/m/y', $item->ID); ?></div>
                        </div>
                    <h4 class="similar-list__title">
                        <a href="<?php echo get_permalink($item->ID); ?>"><?php echo get_the_title($item->ID); ?></a>
                        <svg viewbox="0 0 34 34" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7832 0.427765L33.3554 16.9999L16.7832 33.5721L13.6564 30.4453L24.8908 19.2109L0.211065 19.2109L0.211065 14.7889L24.8908 14.7889L13.6564 3.55459L16.7832 0.427765Z"></path>
                        </svg>
                    </h4>
                </li>
            <?php } ?>
        </ul>
        <a href="<?php echo get_field('page_vacancies', 'options'); ?>" class="similar__btn red-btn">
            <span><?php pll_e('View more vacancies'); ?></span>
        </a>
    <?php } ?>
</div>
</section>

<?php } ?>