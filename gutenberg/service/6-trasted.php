<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/6.png">
<?php } else { ?>

    <div class="b-we-trusted with-line">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <div class="items">
                    <?php foreach ($list as $key => $item) { ?>
                        <div class="item">
                           <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="Image <?php echo $key; ?>">
                       </div>
                   <?php } ?>
               </div>
           <?php } ?>
       </div>
   </div>

<?php } ?>