<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$text       = get_field('text'); 
$list       = get_field('list'); 
$color      = get_field('color');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/10.png">
<?php } else { ?>

    <div class="b-main-list on-service">
        <div class="b-list <?php echo ($color == '1') ? 'b-list-1 with-line' : 'b-list-3'; ?>">
            <div class="container">
                <div class="box">
                    <div class="b-left">
                        <?php if ($title) { ?><h3><?php echo $title; ?></h3><?php } ?>
                    </div>
                    <div class="b-right">
                        <?php if ($text) { ?><p><?php echo $text; ?></p><?php } ?>
                        <?php if ($list) { ?>
                            <div class="chat js-chat">
                                <?php foreach ($list as $key => $item) { ?>
                                    <?php if ($key == 0) echo '<div class="left">'; ?>
                                    <?php if ($key == 1) echo '<div class="right">'; ?>
                                    <div class="line <?php if (!is_admin()) echo 'line--hidden'; ?>">
                                        <div class="message <?php if ($item['name']) echo 'with-name'; ?>">
                                            <?php if ($item['name']) { ?><div class="name"><?php echo $item['name']; ?></div><?php } ?>
                                            <div class="hero-chat-message__text"><?php echo $item['text']; ?></div>
                                            <div class="hero-chat-message__dots"><i></i></div>
                                            <?php if ($item['image_1']) { ?>
                                                <div class="img">
                                                    <img data-src="<?php echo $item['image_1']; ?>" data-retina="<?php echo $item['image_1']; ?>" data-webp="<?php echo $item['image_1']; ?>" data-webp-retina="<?php echo $item['image_1']; ?>" src="<?php echo (is_admin()) ? $item['image_1'] : $src; ?>" class="lazyWebp" alt="Image 1">
                                                </div>
                                            <?php } ?>
                                            <?php if ($item['image_2']) { ?>
                                                <div class="img">
                                                    <img data-src="<?php echo $item['image_2']; ?>" data-retina="<?php echo $item['image_2']; ?>" data-webp="<?php echo $item['image_2']; ?>" data-webp-retina="<?php echo $item['image_2']; ?>" src="<?php echo (is_admin()) ? $item['image_1'] : $src; ?>" class="lazyWebp" alt="Image 2">
                                                </div>
                                            <?php } ?>
                                        </div>   
                                    </div> 
                                    <?php if ($key == 0) echo '</div>'; ?>
                                    <?php if ($key == (count($list) - 1)) echo '</div>'; ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>