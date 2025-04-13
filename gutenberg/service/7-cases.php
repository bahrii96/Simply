<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/7.png">
<?php } else { ?>

    <div class="b-main-cases <?php if (!is_front_page()) echo 'on-service'; ?>">        
        <?php if (is_front_page()) { ?>
            <div class="container">
                <div class="title-cases">
                    <svg width="1.167em" height="1em" viewbox="0 0 42 36" xmlns="http://www.w3.org/2000/svg" class="icon icon--sound">
                        <path d="M5.83081 13.7168H0V21.7187H5.83081V13.7168Z"></path>
                        <path d="M14.6628 5.99414H8.83203V29.4415H14.6628V5.99414Z"></path>
                        <path d="M23.491 0.0078125H17.6602V35.427H23.491V0.0078125Z"></path>
                        <path d="M32.323 8.63086H26.4922V26.8057H32.323V8.63086Z"></path>
                        <path d="M41.155 11.8555H35.3242V23.5792H41.155V11.8555Z"></path>
                    </svg>
                    <span><?php pll_e('Cases'); ?></span>
                </div>
                <h2><?php echo $title; ?></h2>
            </div>
        <?php } else { ?>
            <div class="container">
                <h3><?php echo $title; ?></h3>
            </div>
        <?php } ?>
        <?php if($list) { ?>            
            <?php foreach ($list as $item) { ?>
                <div class="b-main-case">
                    <div class="container">
                        <h2 class="h3"><?php echo  get_the_title($item); ?></h2>
                        <div class="box">
                            <div class="left">
                                <?php echo get_field('content', $item); ?>   
                                <?php if (get_field('rezults_list', $item) and $list = array_chunk(get_field('rezults_list', $item), 2)) { ?> 
                                    <div class="results">
                                        <?php if (get_field('content', $item)) { ?>   
                                            <span><b><?php echo get_field('rezults_title', $item); ?></b></span>
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
                                        <a href="<?php echo get_permalink($item); ?>" class="red-btn"><span><?php echo (get_field('bb_text', $item)) ? get_field('bb_text',$item) : pll__('Read the full story'); ?></span></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="right">
                                <?php if (get_field('logo',$item)) { ?>
                                    <div class="img">
                                        <img data-src="<?php echo get_field('logo', $item); ?>" data-retina="<?php echo get_field('logo', $item); ?>" data-webp="<?php echo get_field('logo', $item); ?>" data-webp-retina="<?php echo get_field('logo', $item); ?>" src="<?php echo (is_admin()) ? get_field('logo', $item) : $src; ?>" class="lazyWebp" alt="img">
                                    </div>
                                <?php } ?>
                                <?php echo get_field('text_review', $item); ?>   
                                <div class="inf">
                                    <?php if (get_field('name', $item)) { ?>
                                        <div class="name"><b><?php echo get_field('name', $item); ?></b></div>
                                    <?php } ?>
                                    <?php if (get_field('posada', $item)) { ?>
                                        <div class="spec"><?php echo get_field('posada', $item); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>                            
        <?php } ?>
    </div>

<?php } ?>