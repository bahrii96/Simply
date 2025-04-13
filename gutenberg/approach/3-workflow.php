<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title');
$text       = get_field('text');
$col        = get_field('col');
$cont       = get_field('cont');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/approach/preview/3.png">
<?php } else { ?>

    <section class="workflow">
        <div class="container workflow__content">
            <div class="workflow__info">
                <h2 class="workflow__title"><?php echo $title; ?></h2>
                <p class="workflow__text"><?php echo $text; ?></p>
            </div>
            <div class="workflow__grid workflow-grid">
                <?php if ($col) { ?>
                    <ul class="workflow-grid__times">                      
                        <?php foreach ($col as $item) { ?>
                            <li><?php echo $item['text_1']; ?><?php if ($item['text_2']) { ?><span><?php echo $item['text_2']; ?></span><?php } ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="workflow-grid__block">
                    <?php if ($cont) { ?>                  
                        <?php foreach ($cont as $item_c1) { ?>
                            <div class="workflow-grid__row">
                                <div class="workflow-grid__item workflow-grid__item--<?php echo $item_c1['color']; ?>"><?php echo $item_c1['text']; ?></div>
                            </div>                   
                        <?php } ?>
                    <?php } ?>
                    <div class="lines">
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="workflow-grid__block workflow-grid__block--mob">
                    <div class="workflow-grid__block-column">
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[0]['color']) ? $cont[0]['color'] : ''; ?>"><?php echo isset($cont[0]['text']) ? $cont[0]['text'] : ''; ?></div>
                        </div>
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[2]['color']) ? $cont[2]['color'] : ''; ?>"><?php echo isset($cont[2]['text']) ? $cont[2]['text'] : ''; ?></div>
                        </div>
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[4]['color']) ? $cont[4]['color'] : ''; ?>"><?php echo isset($cont[4]['text']) ? $cont[4]['text'] : ''; ?></div>
                        </div>
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[6]['color']) ? $cont[6]['color'] : ''; ?>"><?php echo isset($cont[6]['text']) ? $cont[6]['text'] : ''; ?></div>
                        </div>
                    </div>
                    <div class="workflow-grid__block-column">
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[1]['color']) ? $cont[1]['color'] : ''; ?>"><?php echo isset($cont[1]['text']) ? $cont[1]['text'] : ''; ?></div>
                        </div>
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[3]['color']) ? $cont[3]['color'] : ''; ?>"><?php echo isset($cont[3]['text']) ? $cont[3]['text'] : ''; ?></div>
                        </div>
                        <div class="workflow-grid__row">
                            <div class="workflow-grid__item workflow-grid__item--<?php echo isset($cont[5]['color']) ? $cont[5]['color'] : ''; ?>"><?php echo isset($cont[5]['text']) ? $cont[5]['text'] : ''; ?></div>
                        </div>
                    </div>
                    <div class="workflow-grid__block-lines">
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                        <div class="workflow-grid__column">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>