<?php $title    = get_field('title');
$contacts       = get_field('contacts');

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/contacts/preview/2.png">
<?php } else { ?>

    <section class="s-contacts section">
        <div class="container">
            <?php if ($title) { ?>
                <h2 class="s-contacts__title section__title h3"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if ($contacts) { ?>
                <ul class="contacts-list">
                    <?php foreach ($contacts as $item) { ?>
                        <li class="contacts-list__item">
                            <div class="contacts-block">
                                <p class="contacts-block__title"><?php echo $item['title']; ?></p>
                                <ul class="contacts-block__contacts">
                                    <?php if ($item['telefon']) { ?>
                                        <li class="contacts-block__contact contact-item">
                                            <a class="js-copy-text" href="tel:+<?php echo clear_phone($item['telefon']); ?>"><?php echo $item['telefon']; ?></a>
                                            <button type="button" class="js-copy-btn" aria-label="copy">
                                                <svg width="0.869em" height="1em" viewbox="0 0 20 23" xmlns="http://www.w3.org/2000/svg" class="icon icon--copy">
                                                    <path d="M13.7719 0.923096V7.00937H19.8581L13.7719 0.923096ZM3.12028 5.48794H1.59872C0.758811 5.48794 0.0771484 6.1696 0.0771484 7.00951V20.7036C0.0771484 21.5435 0.758811 22.2252 1.59872 22.2252H13.7713C14.6112 22.2252 15.2928 21.5435 15.2928 20.7036V19.1821H3.12028V5.48794ZM12.2499 0.923096V8.53094H19.8577V16.1388C19.8577 16.9787 19.1761 17.6603 18.3362 17.6603H4.64205V2.44466C4.64205 1.60476 5.32371 0.923096 6.16362 0.923096H12.2499Z"></path>
                                                </svg>
                                                <svg width="1.286em" height="1em" viewbox="0 0 18 14" class="icon icon--check" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.9999 11.2L1.7999 6.99998L0.399902 8.39998L5.9999 14L17.9999 1.99998L16.5999 0.599976L5.9999 11.2Z"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    <?php } ?>
                                    <?php if ($item['email']) { ?>
                                        <li class="contacts-block__contact contact-item">
                                            <a class="js-copy-text" href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a>
                                            <button type="button" class="js-copy-btn" aria-label="copy">
                                                <svg width="0.869em" height="1em" viewbox="0 0 20 23" xmlns="http://www.w3.org/2000/svg" class="icon icon--copy">
                                                    <path d="M13.7719 0.923096V7.00937H19.8581L13.7719 0.923096ZM3.12028 5.48794H1.59872C0.758811 5.48794 0.0771484 6.1696 0.0771484 7.00951V20.7036C0.0771484 21.5435 0.758811 22.2252 1.59872 22.2252H13.7713C14.6112 22.2252 15.2928 21.5435 15.2928 20.7036V19.1821H3.12028V5.48794ZM12.2499 0.923096V8.53094H19.8577V16.1388C19.8577 16.9787 19.1761 17.6603 18.3362 17.6603H4.64205V2.44466C4.64205 1.60476 5.32371 0.923096 6.16362 0.923096H12.2499Z"></path>
                                                </svg>
                                                <svg width="1.286em" height="1em" viewbox="0 0 18 14" class="icon icon--check" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.9999 11.2L1.7999 6.99998L0.399902 8.39998L5.9999 14L17.9999 1.99998L16.5999 0.599976L5.9999 11.2Z"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </section>

<?php } ?>