<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/3.png">
<?php } else { ?>

    <div class="b-what-includ with-line">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <?php if ($list) { ?>
                <div class="cards">
                    <?php foreach ($list as $item) { ?>
                        <div class="card">
                            <div class="cont">
                                <h3 class="h5"><?php echo $item['title']; ?></h3>
                                <p><?php echo $item['text']; ?></p>
                            </div>
                            <?php if (isset($item['link']['url'])) { ?>
                                <a <?php echo ($item['link']['target']) ? 'target="'.$item['link']['target'].'"' : ''; ?> href="<?php echo $item['link']['url']; ?>" class="btn-border">
                                    <span><?php echo $item['link']['title']; ?></span>
                                </a>
                            <?php } ?> 
                        </div>
                    <?php } ?>          
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>