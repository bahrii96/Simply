<?php $url      = get_bloginfo('template_directory');
$src            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title          = get_field('title');
$list           = get_field('list');
$tekst_na_knopc = get_field('tekst_na_knopc');
if (get_field('is_example')) { ?>

    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/awards/preview/3.png">

<?php } else { ?>
    <section class="ourAwards">
        <div class="container">
            <h2 class="h3"><?php echo $title; ?></h2>
            <div class="ourAwards__list">
                <?php if ($list) { ?>                   
                    <?php foreach ($list as $key => $item) { ?>     
                        <?php if (isset($item['link']['url'])) {
                            $target = (isset($item['link']['target']) and $item['link']['target']) ? 'target="'.$item['link']['target'].'"' : ''; ?>               
                            <a class="awardsItem" <?php echo $target; ?> href="<?php echo $item['link']['url']; ?>" style="<?php if (($key == 5) or ($key == (count($list)-1))) echo 'border-bottom: none;'; ?> <?php if ($key > 5) echo 'display:none;'; ?>">
                                <div class="awardsItem__icon">
                                    <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
                                </div>
                                <div class="awardsItem__info">
                                    <h3 class="h4"><?php echo $item['title']; ?></h3>
                                    <?php echo $item['text']; ?>
                                </div>
                                <div class="link btn-border">
                                    <span><?php echo $item['link']['title']; ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25073 0H20V18.7493H16.4624V6.03906L2.50146 20L0 17.4985L13.9609 3.5376H1.25073V0Z" fill="#EF404B"></path>
                                    </svg>
                                </div>
                            </a>
                        <?php } else { ?>
                            <div class="awardsItem" style="<?php if (($key == 5) or ($key == (count($list)-1))) echo 'border-bottom: none;'; ?> <?php if ($key > 5) echo 'display:none;'; ?>">
                                <div class="awardsItem__icon">
                                    <img data-src="<?php echo $item['image']; ?>" data-retina="<?php echo $item['image']; ?>" data-webp="<?php echo get_webp($item['image']); ?>" data-webp-retina="<?php echo get_webp($item['image']); ?>" src="<?php echo (is_admin()) ? $item['image'] : $src; ?>" class="lazyWebp" alt="photo">
                                </div>
                                <div class="awardsItem__info">
                                    <h3 class="h4"><?php echo $item['title']; ?></h3>
                                    <?php echo $item['text']; ?>
                                </div>                                
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if (count($list) > 6) { ?>
                <a onclick="$('.ourAwards__list .awardsItem:eq(5)').attr('style', '');$('.awardsItem').show();$('.red-btn.see-all').hide();" class="red-btn see-all">
                    <span><?php echo $tekst_na_knopc; ?></span>   
                </a>
            <?php } ?>
        </div>
    </section>
    <div class="divider"></div>
<?php } ?>