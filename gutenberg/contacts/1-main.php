<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$form       = get_field('form'); 
$is_bread   = get_field('is_bread'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/contacts/preview/1.png">
<?php } else { ?>

    <section class="b-main b-main--form">
        <div class="b-main__bg">
            <img src="<?php echo $url; ?>/img/home-contacts.svg" class="lazy" alt="img 1">
            <img src="<?php echo $url; ?>/img/home-contacts-1440.svg" class="lazy" alt="img 2">
            <img src="<?php echo $url; ?>/img/home-contacts-mob.svg" class="lazy" alt="img 3">
            <img src="<?php echo $url; ?>/img/home-contacts-mob-sm.svg" class="lazy" alt="img 4">
        </div> 
        <div class="container">
            <div class="b-main__inner">
                <div class="box">
                    <h1 class="h3"><?php echo $title; ?></h1>
                </div>
                <div class="b-main__form form">
                    <?php if (is_admin()) { ?>
                        <form>
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="text" required>
                                    <label class="input__label">Name</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="text" required>
                                    <label class="input__label">Position</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="text" required>
                                    <label class="input__label">Company name</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin input -->
                                <div class="input">
                                    <input type="email" required>
                                    <label class="input__label">Email</label>
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="form__field">
                                <!-- begin textarea -->
                                <div class="input input--textarea">
                                    <textarea style="height: 146px;" required></textarea>
                                    <label class="input__label">How can we help you?</label>
                                </div>
                                <!-- end textarea -->
                            </div>                                                       
                            <div class="form__field form__footer">
                                <button disabled class="btn btn--reg">
                                    Get in touch
                                    <span class="form-tooltip">
                                        <span class="form-tooltip__mess">
                                        Fill in all required fields; they are marked with an asterisk (*).
                                        </span>
                                    </span>
                                </button>
                                <p>Your data is protected and won't be transferred to third parties.</p>
                            </div>
                        </form>
                    <?php } else { echo str_replace('aria-required="true"', 'aria-required="true" required', $form); } ?>                     
                </div>
            </div>
        </div>
    </section>
    <?php if ($is_bread) { ?>
        <div class="breadcrumbs__wrap">
            <div class="container">
                <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>            
            </div>
        </div>
    <?php } ?>

<?php } ?>