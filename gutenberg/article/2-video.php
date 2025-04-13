<?php $link = get_field('link'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/article/preview/2.png">
<?php } else { ?>

    <div class="video" <?php if (is_admin()) echo 'style="width: 580px;padding: 10px;margin-left: auto;margin-right: auto;"'; ?>>
        <iframe width="560" height="315" src="<?php echo $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

<?php } ?>