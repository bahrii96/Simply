<?php $url                      = get_bloginfo('template_directory');
$src                            = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title                          = get_field('title');
$text                           = get_field('text');
$position_title                 = get_field('position_title');
$positions                      = get_field('positions');
$service_title                  = get_field('service_title');
$services                       = get_field('services');
$plejsholder_dlya_detalej       = get_field('plejsholder_dlya_detalej');
$zagolovok_dlya_detalej         = get_field('zagolovok_dlya_detalej');
$zagolovok_dlya_men             = get_field('zagolovok_dlya_men');
$zagolovok_dlya_nazvi_kompan    = get_field('zagolovok_dlya_nazvi_kompan');
$zagolovok_dlya_telefonu        = get_field('zagolovok_dlya_telefonu');
$zagolovok_dlya_poshti          = get_field('zagolovok_dlya_poshti');
$tekst_na_knopc_vdpravki        = get_field('tekst_na_knopc_vdpravki');
$error                          = get_field('error');

$form                           = get_field('form');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/request/preview/1.png">
<?php } else { ?>

    <section class="request-quote">
        <div class="request-quote__content">
            <div class="request-quote__column">
                <h1 class="h3 request-quote__title"><?php echo $title; ?></h1>
                <p class="request-quote__text"><?php echo $text; ?></p>
            </div>
            <div class="request-quote__column">
                <div class="form request-quote__form">

                    <?php $form = str_replace('method="post" class="wpcf7-form', 'method="post" class="wpcf7-form request-form', $form);
                    $form = str_replace('<span class="wpcf7-form-control-wrap" data-name="your-position">', '', $form);
                    $form = str_replace('</option></select></span>', '</option></select>', $form);    
                    $form = str_replace('<option value="">---</option>', '<option selected value=""></option>', $form);  
                    $form = str_replace('<span class="wpcf7-form-control-wrap" data-name="your-service">', '', $form);
                    $form = str_replace('<span class="wpcf7-form-control wpcf7-checkbox">', '', $form);
                    $form = str_replace('</span></span></span>', '</span>', $form); 
                    $form = str_replace(array('<span class="wpcf7-list-item first">', '<span class="wpcf7-list-item">', '<span class="wpcf7-list-item last">'), '<label class="input input--checkbox">', $form); 
                    $form = str_replace('</span></span>', '</span></label>', $form);   

                    if (pll_current_language() == 'pl') {
                        $form = str_replace('<input class="wpcf7-form-control has-spinner wpcf7-submit btn btn--reg" type="submit" value="Poproś o wycenę" />', '<button disabled type="submit" class="disabled btn btn--reg wpcf7-form-control wpcf7-submit"><span class="loader-icon"><svg height="24" viewBox="0 0 24 24" fill="#fff" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z" /></svg></span>Poproś o wycenę<span class="form-tooltip">
                                        <span class="form-tooltip__mess">
                                        '.pll__('Fill in all required fields (*)').'
                                        </span>
                                    </span></button>', $form);
                        //$form = str_replace('btn btn--reg" />', 'btn btn--reg"></button>', $form);                        
                    } else if (pll_current_language() == 'ua') {
                        $form = str_replace('<input class="wpcf7-form-control has-spinner wpcf7-submit btn btn--reg" type="submit" value="Відправити запит" />', '<button disabled type="submit" class="disabled btn btn--reg wpcf7-form-control wpcf7-submit"><span class="loader-icon"><svg height="24" viewBox="0 0 24 24" fill="#fff" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z" /></svg></span>Відправити запит<span class="form-tooltip">
                                        <span class="form-tooltip__mess">
                                        '.pll__('Fill in all required fields (*)').'
                                        </span>
                                    </span></button>', $form);
                        //$form = str_replace('<input type="submit" value="Відправити запит"', '<button type="submit"', $form);
                        //$form = str_replace('btn btn--reg" />', 'btn btn--reg">Відправити запит</button>', $form); 
                    } else {
                        $form = str_replace('<input class="wpcf7-form-control has-spinner wpcf7-submit btn btn--reg" type="submit" value="Request a quote" />', '<button disabled type="submit" class="disabled btn btn--reg wpcf7-form-control wpcf7-submit"><span class="loader-icon"><svg height="24" viewBox="0 0 24 24" fill="#fff" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z" /></svg></span>Request a quote<span class="form-tooltip">
                                        <span class="form-tooltip__mess">
                                        '.pll__('Fill in all required fields (*)').'
                                        </span>
                                    </span></button>', $form);
                        //$form = str_replace('<input type="submit" value="Request a quote"', '<button type="submit"', $form);
                        //$form = str_replace('btn btn--reg" />', 'btn btn--reg">Request a quote</button>', $form); 
                    }
                                 
                    echo str_replace('aria-required="true"', 'aria-required="true" required', $form); ?>

                    <?php /* ?>

                    <form class="request-form wpcf7-form">
                        <input type="hidden" class="dialCode" name="dialCode">
                        <div class="form__field input form__field--select">                                   
                            <select name="position" id="career-select">                                        
                                <?php if ($positions) { ?>
                                    <option selected value=""></option>
                                    <?php foreach ($positions as $k => $item) { ?>
                                        <option value="<?php echo $item['text']; ?>"><?php echo $item['text']; ?></option>
                                    <?php } ?>                                   
                                <?php } ?>     
                            </select>
                            <label class="input__label"><?php echo $position_title; ?></label>       
                            <span class="input__error"><?php echo $error; ?></span>                             
                        </div>                    
                        <div class="form__field checkboxes">
                            <span class="input__label"><?php echo $service_title; ?></span>
                            <?php if ($services) { ?>
                                <?php foreach ($services as $key => $ser) { ?>
                                    <label class="input input--checkbox">
                                        <input name="service<?php echo $key; ?>" value="<?php echo $ser['text']; ?>" type="checkbox">
                                        <span><?php echo $ser['text']; ?></span>
                                    </label>                                       
                                <?php } ?>
                            <?php } ?>             
                        </div>
                        <div class="form__field">                            
                            <div class="input input--textarea">
                                <div class="textarea">
                                    <textarea name="details" placeholder="<?php echo $plejsholder_dlya_detalej; ?>"></textarea>
                                </div>
                                <label class="input__label"><?php echo $zagolovok_dlya_detalej; ?></label>   
                                <span class="input__error"><?php echo $error; ?></span>                            
                            </div>                            
                        </div>
                        <div class="form__field">                           
                            <div class="input">
                                <input name="name" type="text">
                                <label class="input__label"><?php echo $zagolovok_dlya_men; ?></label>
                                <span class="input__error"><?php echo $error; ?></span>
                            </div>                         
                        </div>
                        <div class="form__field">                           
                            <div class="input">
                                <input name="company_name" type="text">
                                <label class="input__label"><?php echo $zagolovok_dlya_nazvi_kompan; ?></label>
                                <span class="input__error"><?php echo $error; ?></span>
                            </div>                          
                        </div>
                        <div class="form__field form__field--phone">                                    
                            <div class="input countries-phone">
                                <input name="phone" type="tel" id="phone" inputmode="numeric">
                                <label class="input__label"><?php echo $zagolovok_dlya_telefonu; ?></label>
                                <span class="input__error"><?php echo $error; ?></span>
                            </div>                                  
                        </div>                 
                        <div class="form__field">                           
                            <div class="input">
                                <input name="email" type="email" class="input">
                                <label class="input__label"><?php echo $zagolovok_dlya_poshti; ?></label>
                                <span class="input__error"><?php pll_e('Email is incorrect'); ?></span>
                            </div>
                        	<input type="hidden" value="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; ?>" name="referer">
                        </div>
                     
                        <div class="form__field">
                            <div class="form__footer">
                                <button type="submit" class="btn btn--reg"><?php echo $tekst_na_knopc_vdpravki; ?></button>
                                <p>
                                    <?php pll_e('By pressing this button you agree to our'); ?>
                                    <a href="<?php echo get_field('page_policy', 'options'); ?>">
                                        <?php pll_e('Privacy Policy'); ?>
                                        <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                            <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>

                    <?php */ ?>

                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/inputmask.min.js'></script>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/intlTelInput.js'></script>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/utils.js'></script>


<?php } ?>