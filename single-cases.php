<?php get_header();
$page_id = get_the_ID();
$page_object = get_page($page_id);
$blocks = parse_blocks($page_object->post_content); 
if (isset($blocks)) { 
    foreach ($blocks as $block) {       
            echo render_block($block);           
    }
}  
get_footer();