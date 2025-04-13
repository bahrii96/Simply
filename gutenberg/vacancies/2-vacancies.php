<?php $url = get_bloginfo('template_directory');
$src = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

$locations = isset($_GET['locations']) ? explode(',', sanitize_text_field($_GET['locations'])) : '';
$remote = isset($_GET['remote']) ? true : '';

$page_id = get_the_ID();
$categories = get_categories( [
    'taxonomy'     => 'locations',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => 1, 
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'pad_counts'   => false,
]);  

if ($locations !== '') {  
    $tax_query = array( 'relation' => 'AND');
    if ($locations !== '') {
        $tax_query[] = array (
            'taxonomy' => 'locations',
            'field' => 'slug',
            'terms' => $locations,
        );
    }
    remove_all_filters('posts_orderby');            
    $posts_ed = new WP_Query(
        array(
            "post_type"         => 'vacancies',                        
            'tax_query' => $tax_query,
            "posts_per_page"    => -1,                               
            "orderby"           => 'date',
            "order"             => 'DESC',

            'meta_key'      => 'is_remote',
            'meta_value'    => $remote

        )
    );                 
} else {           
    $posts_ed = new WP_Query(
        array(
            "post_type"         => 'vacancies',                        
            "posts_per_page"    => -1,                               
            "orderby"           => 'date',
            "order"             => 'DESC',

            'meta_key'      => 'is_remote',
            'meta_value'    => $remote

        )
    );  
} 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/vacancies/preview/2.png">
<?php } else { ?>

    <section class="locations">
        <div class="locations__row container">
            <div class="locations__wrap">
                <a href="<?php echo remove_query_arg(array('locations', 'remote'), false); ?>" class="all-locations locations__all-locations <?php echo (($remote == '') and ($locations == '')) ? 'red-btn location-tag--active' : 'location-tag'; ?>">
                    <span><?php pll_e('All locations'); ?></span>
                </a>
                <?php if( $categories ) { ?>                              
                    <?php foreach( $categories  as $cat ) { ?>  
                        <a href="?locations=<?php echo $cat->slug; ?>" class="location-tag locations__tag <?php echo ($locations !== '') ? ((in_array($cat->slug, $locations)) ? 'location-tag--active' : '') : ''; ?>">
                            <img data-src="<?php echo get_field('flag', $cat); ?>" data-retina="<?php echo get_field('flag', $cat); ?>" src="<?php echo (is_admin()) ? get_field('flag', $cat) : $src; ?>" class="lazyWebp location-tag__icon" alt="<?php echo $cat->name; ?>">
                            <span class="location-tag__text"><?php echo $cat->name; ?></span>                           
                        </a>                                                                 
                    <?php } ?>              
                <?php } ?>     
            </div>
            <a href="<?php echo add_query_arg('remote', 'true'); ?>" class="locations__remote <?php echo ($remote !== '') ? 'red-btn' : ''; ?>">
                <span class="locations__remote-text"><?php pll_e('Remote'); ?></span>
            </a>
        </div>
        <div class="container locations__content">
            <ul class="locations__list locations-list">
                <?php if($posts_ed->have_posts()) { ?>
                    <?php while ($posts_ed->have_posts()) {
                        $posts_ed->the_post();
                        $category = get_the_terms( get_the_ID(), 'locations' ); ?>        
                        <li class="locations-list__column">
                            <div class="locations-list__card">
                                <div class="locations-list__tags">
                                    <?php if (isset($category[0])) { ?>
                                        <a href="?locations=<?php echo $category[0]->slug; ?>" class="location-tag locations-list__tag">
                                            <img data-src="<?php echo get_field('flag', $category[0]); ?>" data-retina="<?php echo get_field('flag', $category[0]); ?>" src="<?php echo (is_admin()) ? get_field('flag', $category[0]) : $src; ?>" class="lazyWebp location-tag__icon" alt="<?php echo $category[0]->name; ?>">
                                            <span class="location-tag__text"><?php echo $category[0]->name; ?></span>
                                        </a>
                                    <?php } ?>
                                    <a style="pointer-events: none;" class="location-tag location-tag--date">
                                        <span class="location-tag__text"><?php echo get_the_date('d/m/y'); ?></span>
                                    </a>
                                </div>
                                <h4 class="locations-list__title"><?php the_title(); ?></h4>
                                <?php if (get_field('list', get_the_ID())) { ?>
                                    <ul class="locations-list__list">
                                        <?php foreach (get_field('list', get_the_ID()) as $item) { ?>
                                            <li><?php echo $item['text']; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <a href="<?php echo get_permalink(); ?>" class="red-btn locations-list__details">
                                    <span><?php pll_e('View details'); ?></span>
                                </a>
                            </div>
                        </li>
                    <?php } ?>  
                <?php } ?>
            </ul>
        </div>
    </section>

<?php } ?>