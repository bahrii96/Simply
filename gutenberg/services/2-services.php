<?php if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/services/preview/2.png">
<?php } else { ?>

    <div class="b-services-list">
        <div class="container">
            <?php $type = 'services';
            $posts = new WP_Query( array(
                'post_type' => $type,
                'posts_per_page' => -1,
                'post_parent' => 0,
                'ignore_sticky_posts' => 1, 
                'post_status' => array('publish', 'draft'),
            ) );
            if( $posts->have_posts() ) { $color_count = 0; $colors = ['', 'red', 'grey', '', 'red', 'grey'];
                while( $posts->have_posts() ) : $posts->the_post(); $title_array = explode(' ', get_the_title()); ?>
                    <div class="box">
                        <div class="left <?php echo $colors[$color_count]; ?>">
                            <a <?php if (get_post_status() == 'draft') { echo 'style="pointer-events: none;"'; } else { ?> href="<?php echo get_permalink(); ?>" <?php } ?> >
                                <div>
                                    <span><?php for ($i=0; $i < (count($title_array) - 1); $i++) { echo $title_array[$i].' '; } ?></span>
                                </div>
                                <div>                                    
                                    <span><?php echo end($title_array); ?></span>
                                    <?php if (get_post_status() !== 'draft') { ?>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.00008 3H20.5001V19.5H18.5001V6.41421L4.70718 20.2071L3.29297 18.7929L17.0859 5H4.00008V3Z" fill="white" stroke="white"></path>
                                        </svg>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <div class="right">
                            <?php if (get_the_excerpt()) { ?><p><?php echo get_the_excerpt(); ?></p><?php } ?>
                            <ul>
                                <?php $posts1 = new WP_Query( array(
                                    'post_type' => $type,
                                    'posts_per_page' => -1,
                                    'post_parent' => get_the_ID(),
                                    'ignore_sticky_posts' => 1,
                                    'post_status' => array('publish', 'draft'),
                                ) );
                                if( $posts1->have_posts() ) { 
                                    while( $posts1->have_posts() ) : $posts1->the_post(); ?>
                                        <li>
                                            <a <?php if (get_post_status() == 'draft') { echo 'class="no-link"'; } else { ?> href="<?php echo get_permalink(); ?>" <?php } ?>>
                                                <span><?php echo get_the_title(); ?></span>
                                            </a>
                                            <ul>
                                                <?php $posts2 = new WP_Query( array(
                                                    'post_type' => $type,
                                                    'posts_per_page' => -1,
                                                    'post_parent' => get_the_ID(),
                                                    'ignore_sticky_posts' => 1,
                                                    'post_status' => array('publish', 'draft'),
                                                ) );
                                                if( $posts2->have_posts() ) { 
                                                    while( $posts2->have_posts() ) : $posts2->the_post(); ?>
                                                        <li>
                                                            <a <?php if (get_post_status() == 'draft') { echo 'class="no-link"'; } else { ?> href="<?php echo get_permalink(); ?>" <?php } ?>>
                                                                <span><?php echo get_the_title(); ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php endwhile; ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php $color_count++; endwhile; ?>
            <?php } ?>
        </div>
    </div>

<?php } ?>