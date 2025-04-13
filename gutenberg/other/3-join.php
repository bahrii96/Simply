<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$cont       = get_field('join_block', 'options');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/other/preview/3.png">
<?php } else { ?> 

    <section class="join-our-team" id="join">
        <div class="join-our-team__content">
            <div class="join-our-team__column">
                <div class="join-our-team__title h3"><?php echo $cont['title']; ?></div>
                <?php if ($cont['list']) { ?>
                    <ul class="join-our-team__list join-list">
                        <?php foreach ($cont['list'] as $ls) { ?>
                            <li class="join-list__item"><?php echo $ls['text']; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="join-our-team__recruitment">
                    <h4 class="join-our-team__recruitment-title"><?php echo $cont['zagolovok_telefonu']; ?></h4>
                    <a href="tel:+<?php echo clear_phone($cont['phone']); ?>" class="join-our-team__recruitment-link"><?php echo $cont['phone']; ?></a>
                </div>
            </div>
            <div class="join-our-team__column">
                <div class="form join-our-team__form">
                    <form class="join-form wpcf7-form">
                        <input type="hidden" class="dialCode" name="dialCode">
                        <div class="form__field">
                            <div class="input">
                                <input required name="name" type="text">
                                <label class="input__label"><?php pll_e('Name'); ?></label>
                                <span class="input__error"><?php pll_e('Field is required'); ?></span>
                            </div>                            
                        </div>
                        <div class="form__field form__field--phone">                                    
                            <div class="input countries-phone">
                                <input required name="phone" type="tel" id="phone" inputmode="numeric">
                                <label class="input__label"><?php pll_e('Phone'); ?></label>
                                <span class="input__error"><?php pll_e('Field is required'); ?></span>
                            </div>                                  
                        </div>                           
                        <div class="form__field">
                            <div class="input">
                                <input required name="email" type="email" class="input">
                                <label class="input__label"><?php pll_e('Email'); ?></label>
                                <span class="input__error"><?php pll_e('Email is incorrect'); ?></span>
                            </div>
                        </div>
                        <div class="form__field input form__field--select">                                   
                            <select required name="city" id="career-select">                                        
                                <?php if ($cont['list_city']) { ?>
                                    <option style="display: none;" selected value=""></option>
                                    <?php foreach ($cont['list_city'] as $k => $item) { ?>
                                        <option value="<?php echo $item['text']; ?>"><?php echo $item['text']; ?></option>
                                    <?php } ?>                                   
                                <?php } ?>     
                            </select>
                            <label class="input__label"><?php pll_e('Select a city'); ?></label>       
                            <span class="input__error"><?php pll_e('Field is required'); ?></span>                             
                        </div>                            
                        <div class="form__field">                                   
                            <div class="input input--textarea">
                                <div class="textarea">
                                    <textarea required name="message"></textarea>
                                </div>
                                <label class="input__label"><?php pll_e('Cover letter'); ?></label>
                                <span class="input__error"><?php pll_e('Field is required'); ?></span>
                            </div>                                 
                        </div>                 
                        <div class="form__field">
                            <label class="input-file">
                                <span class="input-file__text"><?php pll_e('Upload your CV'); ?></span>
                                <input class="form-field__input" id="user_file" type="file" name="file">
                                <span class="input__error" style="position: absolute;padding-top: 80px;"><?php pll_e('Please upload a doc, docx, pdf or pages file'); ?></span>
                            </label>
                        </div>   
                        <div class="fomr__field">
                            <div class="form__footer">
                                <button class="disabled btn btn--reg" type="submit">
                                    <?php pll_e('Get in touch'); ?>
                                    <span class="form-tooltip">
                                        <span class="form-tooltip__mess">
                                        Fill in all required fields; they are marked with an asterisk (*).
                                        </span>
                                    </span>                                        
                                    </button>
                                <input type="hidden" name="page_id" value="<?php echo get_the_ID(); ?>">
                                <p>
                                    <?php pll_e('By pressing this button you agree to our'); ?>
                                    <a target="_blank" href="<?php echo $cont['link_pol']; ?>">
                                        <?php pll_e('Privacy Policy'); ?>
                                        <svg width="1em" height="1em" viewbox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" class="icon icon--link-arrow">
                                            <path d="M1.43497 0.716797H11.7471V11.0289H9.80139V4.03828L2.12287 11.7168L0.74707 10.341L8.42559 2.66248H1.43497V0.716797Z"></path>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/inputmask.min.js'></script>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/intlTelInput.js'></script>
    <script type='text/javascript' src='https://simply-back.redlab.site/wp-content/themes/Simply/dist/js/utils/utils.js'></script>

<?php } ?>

