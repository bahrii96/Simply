<?php 
/*
* Template Name: Сторінка документів
*/
get_header();
$page_id = get_the_ID();
$page_object = get_page($page_id);
$blocks = parse_blocks($page_object->post_content); ?>

<div class="b-breadcrumbs b-breadcrumbs--first">
    <div class="container">
        <div class="breadcrumbs2">
            <?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>     
        </div>
    </div>
</div>
<div class="line-divider">
    <div class="container">
        <div class="line"></div>
    </div>
</div>
<div class="b-article b-article--text-page with-line">
    <div class="container">
        <div class="box">
            <?php if (isset($blocks)) { foreach ($blocks as $block) { echo render_block($block); } } ?>  
        </div>
    </div>
</div>
<div class="line-divider">
    <div class="line"></div>
</div>

<?php get_footer();

