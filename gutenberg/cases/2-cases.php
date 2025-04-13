<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$cases_industry = isset($_GET['cases_industry']) ? explode(',', sanitize_text_field($_GET['cases_industry'])) : '';
$cases_services = isset($_GET['cases_services']) ? explode(',', sanitize_text_field($_GET['cases_services'])) : '';
$page_id = get_the_ID();
$categories_industry = get_categories( [
    'taxonomy'     => 'cases_industry',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => 1, 
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'pad_counts'   => false,
] );  
$categories_services = get_categories_hierarchical();

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/cases/preview/2.png">
<?php } else { ?>

    <?php if ($cases_industry !== '' or $cases_services !== '') {  
        $tax_query = array( 'relation' => 'AND');
        if ($cases_industry !== '') {
            $tax_query[] = array (
                'taxonomy' => 'cases_industry',
                'field' => 'slug',
                'terms' => $cases_industry,
            );
        }
        if ($cases_services !== '') {
            $tax_query[] = array (
                'taxonomy' => 'cases_services',
                'field' => 'slug',
                'terms' => $cases_services,
            );
        }
        remove_all_filters('posts_orderby');            
        $posts_ed = new WP_Query(
            array(
                "post_type"         => 'cases',                        
                'tax_query' => $tax_query,
                "posts_per_page"    => -1,                               
                "orderby"           => 'date',
                "order"             => 'DESC',

            )
        );                 
    } else {        
        //remove_all_filters('posts_orderby');     
        $posts_ed = new WP_Query(
            array(
                "post_type"         => 'cases',                        
                "posts_per_page"    => -1,                               
                "orderby"           => 'date',
                "order"             => 'DESC',
            )
        );  
    } ?>
    <section class="s-cases">
        <div class="container">
            <div class="s-cases__breadcrumbs">
                <?php if (function_exists('get_nav_breadcrumb')) echo get_nav_breadcrumb(); ?>  
            </div>
            <div class="s-cases__filters">
                <div class="s-cases__dropdowns">
                    <?php if( $categories_industry ) { ?>                              
                        <div class="dropdown dropdown--select js-dropdown">
                            <button class="dropdown__opener" type="button"><?php pll_e('Filter by Industry'); ?></button>
                            <ul class="dropdown__list js-filters" data-chips-order="first">
                                <?php foreach( $categories_industry  as $cat ) { ?>   
                                    <li class="dropdown__item" style="--color-accent: #ef404b;
    --color-accent-rgb: 239, 64, 75;">
                                        <label class="input input--checkbox">                                      
                                            <input type="hidden" name="industry_h" value="<?php echo $cat->slug; ?>">
                                            <input type="checkbox" name="industry" class="js-filters-type" value="<?php echo $cat->slug; ?>" <?php echo ($cases_industry !== '') ? ((in_array($cat->slug, $cases_industry)) ? 'checked' : '') : ''; ?>>
                                            <span><?php echo $cat->name; ?></span>
                                        </label>
                                    </li>
                                <?php } ?>              
                            </ul>
                        </div>
                    <?php } ?>
                    <?php if ($categories_services) { ?>
                        <div class="dropdown dropdown--lg dropdown--service js-dropdown">
                            <button class="dropdown__opener" type="button"><?php pll_e('Filter by Service'); ?></button>
                            <div class="dropdown__list">                      
                                <ul class="dropdown__list-list js-filters">
                                    <?php foreach ($categories_services as $item) { ?>
                                        <li class="dropdown__item" style="--color-accent: #111f2d;
              --color-accent-rgb: 17, 31, 45;
              --color-text: #fff;">
                                            <div class="filter-block">
                                                <div class="filter-block__left">
                                                    <label class="input input--checkbox input--checkbox-accent">
                                                        <input type="hidden" name="services_h" value="<?php echo $item->slug; ?>">
                                                        <input type="checkbox" name="services" class="js-filters-category" value="<?php echo $item->slug; ?>" <?php echo ($cases_services !== '') ? ((in_array($item->slug, $cases_services)) ? 'checked' : '') : ''; ?>>                                                        
                                                        <span><?php echo $item->name; ?></span>
                                                    </label>
                                                </div>
                                                <?php if ($item->child_categories) { ?>
                                                    <div class="filter-block__right">
                                                        <?php foreach ($item->child_categories as $parent) { ?>                                                            
                                                            <label class="input input--checkbox input--checkbox-bg">
                                                                <input type="hidden" name="services_h" value="<?php echo $parent->slug; ?>">
                                                                <input type="checkbox" name="services" class="js-filters-type" value="<?php echo $parent->slug; ?>" <?php echo ($cases_services !== '') ? ((in_array($parent->slug, $cases_services)) ? 'checked' : '') : ''; ?>>                                                                
                                                                <span><?php echo $parent->name; ?></span>
                                                            </label>                                                      
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <li class="dropdown__item">
                                        <button type="button" class="js-filters-clear" id="delete_all_filter"><?php pll_e('clear all'); ?></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="s-cases__chips">
                <ul class="chips"></ul>
                </div>
            </div>
        </div> 
        <div class="field_content">
            <?php if($posts_ed->have_posts()) { ?>
                <?php while ($posts_ed->have_posts()) {
                    $posts_ed->the_post(); ?>
                    <div class="b-main-case">
                        <div class="container">
                            <h2 class="h3"><?php the_title(); ?></h2>
                            <div class="box">
                                <div class="left">
                                    <?php echo get_field('content', get_the_ID()); ?>   
                                    <?php if (get_field('rezults_list', get_the_ID()) and $list = array_chunk(get_field('rezults_list', get_the_ID()), 2)) { ?> 
                                        <div class="results">
                                            <?php if (get_field('content', get_the_ID())) { ?>   
                                                <span><b><?php echo get_field('rezults_title', get_the_ID()); ?></b></span>
                                            <?php } ?>
                                            <div class="cols">                                         
                                                <?php  for ($i=0; $i < count($list); $i++) { ?>
                                                    <div class="col">
                                                        <?php foreach ($list[$i] as $ls) { ?>
                                                            <div class="line">
                                                                <b><?php echo $ls['text_1'] ?></b>
                                                                <?php echo $ls['text_2'] ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php }  ?>                                        
                                            </div>
                                            <a href="<?php echo get_permalink(); ?>" class="red-btn"><span><?php echo (get_field('bb_text', get_the_ID())) ? get_field('bb_text',get_the_ID()) : pll__('Read the full story'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="right">
                                    <?php if (get_field('logo',get_the_ID())) { ?>
                                        <div class="img">
                                            <img style="width: auto;" data-src="<?php echo get_field('logo', get_the_ID()); ?>" data-retina="<?php echo get_field('logo', get_the_ID()); ?>" data-webp="<?php echo get_field('logo', get_the_ID()); ?>" data-webp-retina="<?php echo get_field('logo', get_the_ID()); ?>" src="<?php echo (is_admin()) ? get_field('logo', get_the_ID()) : $src; ?>" class="lazyWebp" alt="Logo">
                                        </div>
                                    <?php } ?>
                                    <?php echo get_field('text_review', get_the_ID()); ?>   
                                    <div class="inf">
                                        <?php if (get_field('name', get_the_ID())) { ?>
                                            <div class="name"><b><?php echo get_field('name', get_the_ID()); ?></b></div>
                                        <?php } ?>
                                        <?php if (get_field('posada', get_the_ID())) { ?>
                                            <div class="spec"><?php echo get_field('posada', get_the_ID()); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>  
            <?php } ?>
        </div>
    </section>
    <input type="hidden" name="page_id" value="<?php echo get_permalink($page_id); ?>">

    <?php } ?>