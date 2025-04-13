<?php get_header();
$page_id = get_the_ID();
$page_object = get_page($page_id);
$blocks = parse_blocks($page_object->post_content);
$show_con_bl = get_field('show_con_bl');
$dop_posts = get_field('dop_posts');
$data = get_field('subs_block', 'options');
$last_modified = get_post_meta(get_the_ID(), '_last_modified', true); ?>
<div class="b-article-head">
    <?php if (get_the_post_thumbnail_url()) { ?>
        <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" data-retina="<?php echo get_the_post_thumbnail_url(); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url()); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyWebp"  alt="<?php echo get_the_title(); ?>: №1" title="<?php echo get_the_title(); ?>: №1 | Simply Contact">
    <?php } else { ?>
        <img style="background: #111f2d;">
    <?php } ?>
    <div class="container">
        <div class="box">
            <?php if (!empty( get_the_category())) { ?>
                <?php foreach (get_the_category() as $cat_name) { ?>                   
                    <a href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language().'/' : '/'; ?>blog/<?php echo $cat_name->slug; ?>/" class="tag">
                        <span><?php echo esc_html($cat_name->name); ?></span>
                    </a>
                <?php } ?>                
            <?php } ?>
            <h1><?php echo get_the_title(); ?></h1>
            <article itemscope itemtype="https://schema.org/Article">
                <div class="data">
                    <div class="item">
                        <span itemprop="datePublished" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('d M, Y'); ?></span>
                    </div>
                    <?php if ($last_modified) {
                        $datetime = new DateTime($last_modified);
                        $formatted_date_1 = $datetime->format('d M, Y');
                        $formatted_date_2 = $datetime->format('Y-m-d');
                        ?>
                        <div class="line">|</div>
                        <div class="item">
                            <?php pll_e('Updated:'); ?>
                            <span itemprop="dateModified" datetime="<?php echo esc_html($formatted_date_2); ?>"><?php echo esc_html($formatted_date_1); ?></span>
                        </div>                        
                    <?php } ?>
                </div>
            </article>
        </div>
    </div>
</div>
<div class="b-breadcrumbs with-line">
    <div class="container">
        <div class="breadcrumbs2">
            <?php if (function_exists('get_nav_breadcrumb')) echo str_replace('class="breadcrumbs"', '', get_nav_breadcrumb()); ?>
        </div>
    </div>
</div>
<div class="line-divider">
    <div class="container">
        <div class="line"></div>
    </div>
</div>
<?php if (isset($blocks)) { ?>
    <div class="b-article">
        <div class="container">
            <a href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language().'/' : '/'; ?>blog/" class="link-back">
                <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6062 21.6062L1.13127e-05 11L10.6062 0.393823L12.6074 2.39499L5.41739 9.58497L21.2124 9.58497L21.2124 12.4151L5.41739 12.4151L12.6074 19.605L10.6062 21.6062Z" fill="#EF404B"></path>
                </svg>
                <span><?php pll_e('All articles'); ?></span>
            </a>
            <?php if ($show_con_bl) { ?>
                <div class="haveQuestionWrap">
                    <?php if (get_field('post_autors')) { ?>
                        <div class="writtenBy">
                            <div class="title"><?php pll_e('Written by'); ?></div>
                            <div class="writtenBy__items">
                                <?php foreach (get_field('post_autors') as $author) {
                                    $author_id = $author['ID'];                                    
                                    $author_photo = get_field('mini_img', "user_{$author['ID']}") ? get_field('mini_img', "user_{$author['ID']}") : get_avatar_url($author['ID'], ['size' => '500']);
                                    $author_url = get_author_posts_url($author_id);

                                    //$pozicya_avtora = get_field("pozicya_avtora", "user_{$author['ID']}");
                                    //$author_name = $author['display_name'];

                                    $lang = pll_current_language();
                                    if ($lang == 'ua') {
                                        $author_name = get_field("mya_ua", "user_{$author_id}").' '.get_field("przvishe_ua", "user_{$author_id}");
                                        $pozicya_avtora = get_field("pozicya_avtora_ua", "user_{$author_id}");
                                    } else if ($lang == 'pl') {
                                        $author_name = get_field("mya_pl", "user_{$author_id}").' '.get_field("przvishe_pl", "user_{$author_id}");
                                        $pozicya_avtora = get_field("pozicya_avtora_pl", "user_{$author_id}");
                                    } else {
                                        $author_name = get_field("mya_en", "user_{$author_id}").' '.get_field("przvishe_en", "user_{$author_id}");
                                        $pozicya_avtora = get_field("pozicya_avtora_en", "user_{$author_id}");
                                    }
                                    ?>
                                    <a href="<?php echo esc_url($author_url); ?>" class="writtenBy__item">
                                        <div class="photo">
                                            <img data-src="<?php echo esc_url($author_photo); ?>"
                                            data-retina="<?php echo esc_url($author_photo); ?>"
                                            data-webp="<?php echo esc_url($author_photo); ?>"
                                            data-webp-retina="<?php echo esc_url($author_photo); ?>"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyWebp" alt="<?php echo esc_attr($author_name); ?>">
                                        </div>
                                        <div class="name h6">
                                            <?php echo esc_attr($author_name); ?>
                                            <span class="icon">
                                                <svg width="14" height="14" viewbox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.875511 0H14V13.1245H11.5237V4.22734L1.75102 14L0 12.249L9.77266 2.47632H0.875511V0Z" fill="#111F2D"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="pos"><?php echo esc_attr($pozicya_avtora); ?></div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="have-question">
                        <div class="h5"><?php pll_e('Have questions?'); ?></div>
                        <p><?php pll_e('Drop us a line to get expert consultation.'); ?></p>
                        <?php if (get_field('tip_knopki_kontaktv') == 'popup') { ?>
                            <a href="#popup-form" class="red-btn js-popup-btn">
                                <span><?php pll_e('Contact Us'); ?></span>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo get_field('page_contacts','options'); ?>" class="red-btn">
                                <span><?php pll_e('Contact Us'); ?></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="articleNavWrap">
                <div class="articleNav js-article-nav">
                    <div class="title"><?php pll_e('table of content'); ?></div>
                    <ul class="list"></ul>
                </div>
            </div>
            <div class="box">
                <?php
                foreach ($blocks as $block) {
                    echo render_block($block);
                }
                ?>
                <?php if (get_field('new_cta') and get_field('new_cta')['pokazuvati_blok'] and ($cta = get_field('new_cta')['kontent']) ) { ?>
                    <div class="ctaBlock">
                        <div class="title"><?php echo $cta['title']; ?></div>
                        <div class="text"><?php echo $cta['text']; ?></div>
                        <?php if ($cta['type'] == 'popup') { ?>
                            <a href="#popup-form" class="red-btn js-popup-btn">
                                <span><?php echo $cta['tekst_na_knopc']; ?></span>
                            </a>
                        <?php } else {
                            $link = $cta['link'];
                            if (isset($link['url'])) { ?>
                                <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>" class="red-btn">
                                    <span><?php echo $link['title']; ?></span>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="article-foot">

                    <?php if (!empty( get_the_category())) { ?>
                        <?php foreach (get_the_category() as $cat_name) { ?>                   
                            <a href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language().'/' : '/'; ?>blog/<?php echo $cat_name->slug; ?>/" class="tag">
                                <span><?php echo esc_html($cat_name->name); ?></span>
                            </a>
                        <?php } ?>                
                    <?php } ?>              

                    <div class="h4"><?php pll_e('Was this article helpful for you? Share it with your friends.'); ?></div>
                    <div class="subscribe-soc">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                            <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3208 24.9094V14.0379H18.8342L19.3602 9.80111H15.3208V7.09605C15.3208 5.86943 15.6488 5.03342 17.3425 5.03342L19.5026 5.03243V1.24312C18.4571 1.12821 17.4063 1.07254 16.355 1.07636C13.2406 1.07636 11.1084 3.05072 11.1084 6.67672V9.80124H7.58594V14.038H11.1083V24.9095L15.3208 24.9094Z" fill="white"></path>
                            </svg>
                        </a>
                        <a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;text=<?php echo get_the_title(); ?>" target="_blank">
                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_6965_68220)">
                                    <path d="M16.1039 11.0104L25.784 0H23.4905L15.0814 9.55817L8.37002 0H0.627441L10.7787 14.4549L0.627441 26H2.92102L11.7957 15.9039L18.8849 26H26.6274L16.1039 11.0104ZM12.9615 14.5818L11.9314 13.1415L3.74814 1.6919H7.27154L13.8776 10.9356L14.9034 12.3758L23.4894 24.3905H19.966L12.9615 14.5818Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_6965_68220">
                                        <rect width="26" height="26" fill="white" transform="translate(0.627441)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>" target="_blank">
                            <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.16406 8.9375H7.00927V23.8333H2.16406V8.9375ZM20.207 9.11219C20.1555 9.09594 20.1068 9.07833 20.0526 9.06344C19.9876 9.04872 19.9221 9.03607 19.8563 9.02552C19.5702 8.96703 19.2789 8.93754 18.9869 8.9375C16.1621 8.9375 14.3705 10.9918 13.7801 11.7853V8.9375H8.9349V23.8333H13.7801V15.7083C13.7801 15.7083 17.4418 10.6085 18.9869 14.3542V23.8333H23.8307V13.7814C23.8287 12.7117 23.4718 11.673 22.8161 10.8281C22.1603 9.98308 21.2426 9.37959 20.207 9.11219Z" fill="white"></path>
                                <path d="M4.53385 6.91341C5.84265 6.91341 6.90365 5.85242 6.90365 4.54362C6.90365 3.23482 5.84265 2.17383 4.53385 2.17383C3.22505 2.17383 2.16406 3.23482 2.16406 4.54362C2.16406 5.85242 3.22505 6.91341 4.53385 6.91341Z" fill="white"></path>
                            </svg>
                        </a>
                        <a href="javascript:void(0);" class="copy">
                            <div class="copy-text"><?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?></div>
                            <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0859 1V7.59346H23.6794L17.0859 1ZM5.54673 5.94525H3.89837C2.98847 5.94525 2.25 6.68372 2.25 7.59362V22.4289C2.25 23.3388 2.98847 24.0773 3.89837 24.0773H17.0853C17.9952 24.0773 18.7337 23.3388 18.7337 22.4289V20.7805H5.54673V5.94525ZM15.4371 1V9.24183H23.679V17.4837C23.679 18.3936 22.9405 19.132 22.0306 19.132H7.19531V2.64837C7.19531 1.73847 7.93378 1 8.84368 1H15.4371Z" fill="white"></path>
                                <path d="M9.75026 18.1987L5.20026 13.6487L3.68359 15.1653L9.75026 21.232L22.7503 8.232L21.2336 6.71533L9.75026 18.1987Z" fill="#00B071"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="line-divider">
    <div class="container">
        <div class="line"></div>
    </div>
</div>
<?php if ($dop_posts) { ?>
    <div class="b-blog-more">
        <div class="container">
            <div class="h3"><?php pll_e('Read also'); ?></div>
            <div class="blog-items">
                <?php foreach ($dop_posts as $item) {
                    $categories = get_the_category($item->ID); ?>
                    <div class="item">
                        <a href="<?php echo get_permalink($item->ID); ?>">
                            <div class="img">
                                <img data-src="<?php echo get_the_post_thumbnail_url($item->ID); ?>" data-retina="<?php echo get_the_post_thumbnail_url($item->ID); ?>" data-webp="<?php echo get_webp(get_the_post_thumbnail_url($item->ID)); ?>" data-webp-retina="<?php echo get_webp(get_the_post_thumbnail_url($item->ID)); ?>" src="<?php echo (is_admin()) ? get_the_post_thumbnail_url($item->ID) : $src; ?>" class="lazyWebp" alt="img">
                                <div class="text">
                                    <span><?php pll_e('Read article'); ?></span>
                                    <svg width="19" height="20" viewbox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.88958 0.389585L18.2139 9.71388L8.88958 19.0382L7.13028 17.2789L13.4513 10.9579L-0.434707 10.9579L-0.434707 8.46986L13.4513 8.46986L7.13028 2.14889L8.88958 0.389585Z" fill="white"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="h5"><?php echo get_the_title($item->ID); ?></div>
                        </a>
                        <div class="bot">

                            <?php if (!empty( get_the_category($item->ID))) { ?>
                                <?php foreach (get_the_category($item->ID) as $cat_name) { ?>                   
                                    <a href="<?php echo (pll_current_language() !== 'en') ? '/'.pll_current_language().'/' : '/'; ?>blog/<?php echo $cat_name->slug; ?>/" class="tag">
                                        <span><?php echo esc_html($cat_name->name); ?></span>
                                    </a>
                                <?php } ?>                
                            <?php } ?>   

                            <div class="data"><?php echo get_the_time('Y-m-d', $item->ID); ?></div>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="b-subscribe">
    <div class="container">
        <div class="box">
            <div class="left">
                <?php echo ($data['title']) ? '<div class="h3">'.$data['title'].'</div>' : '';
                echo ($data['text']) ? '<p>'.$data['text'].'</p>' : '';
                echo ($data['form']) ? str_replace('class="wpcf7-form', 'class="wpcf7-form form-subscribe ', $data['form']) : ''; ?>
            </div>
            <div class="right">
                <?php echo ($data['soc_text']) ? '<h3 class="h4">'.$data['soc_text'].'</h3>' : ''; ?>
                <div class="subscribe-soc">
                    <?php if ($data['fb']) { ?>
                        <a href="<?php echo $data['fb']; ?>" target="_blank">
                            <svg width="27" height="26" viewbox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0708 24.9099V14.0384H19.5842L20.1102 9.8016H16.0708V7.09654C16.0708 5.86992 16.3988 5.03391 18.0925 5.03391L20.2526 5.03292V1.2436C19.2071 1.1287 18.1563 1.07303 17.105 1.07684C13.9906 1.07684 11.8584 3.05121 11.8584 6.6772V9.80173H8.33594V14.0385H11.8583V24.91L16.0708 24.9099Z" fill="white"></path>
                            </svg>
                        </a>
                    <?php } ?>
                    <?php if ($data['inst']) { ?>
                        <a href="<?php echo $data['inst']; ?>" target="_blank">
                            <svg width="27" height="26" viewbox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46197 2.6625C10.571 2.61144 10.9246 2.6001 13.7496 2.6001C16.5746 2.6001 16.9282 2.61239 18.0363 2.6625C19.1444 2.71261 19.9007 2.88941 20.5626 3.14562C21.2556 3.40752 21.8843 3.8169 22.4043 4.34635C22.9338 4.86541 23.3422 5.49319 23.6031 6.18715C23.8603 6.84897 24.0362 7.60533 24.0872 8.71152C24.1383 9.82242 24.1496 10.176 24.1496 13.0001C24.1496 15.8251 24.1373 16.1787 24.0872 17.2877C24.0371 18.3939 23.8603 19.1503 23.6031 19.8121C23.3422 20.5061 22.9331 21.135 22.4043 21.6548C21.8843 22.1842 21.2556 22.5927 20.5626 22.8536C19.9007 23.1108 19.1444 23.2866 18.0382 23.3377C16.9282 23.3888 16.5746 23.4001 13.7496 23.4001C10.9246 23.4001 10.571 23.3878 9.46197 23.3377C8.35579 23.2876 7.59943 23.1108 6.93761 22.8536C6.24357 22.5926 5.61475 22.1835 5.09492 21.6548C4.56582 21.1354 4.15638 20.5069 3.89514 19.813C3.63892 19.1512 3.46306 18.3949 3.41201 17.2887C3.36095 16.1778 3.34961 15.8242 3.34961 13.0001C3.34961 10.1751 3.3619 9.82148 3.41201 8.71341C3.46212 7.60533 3.63892 6.84897 3.89514 6.18715C4.15677 5.49327 4.56652 4.86476 5.09586 4.34541C5.61496 3.81643 6.24315 3.40699 6.93666 3.14562C7.59848 2.88941 8.35485 2.71355 9.46103 2.6625H9.46197ZM17.9522 4.5345C16.8554 4.48439 16.5264 4.47399 13.7496 4.47399C10.9728 4.47399 10.6438 4.48439 9.54706 4.5345C8.53259 4.58082 7.98234 4.75006 7.6155 4.89282C7.13048 5.08192 6.7835 5.30599 6.4195 5.66999C6.07445 6.00567 5.80891 6.41433 5.64234 6.86599C5.49957 7.23282 5.33034 7.78308 5.28401 8.79755C5.2339 9.89428 5.2235 10.2233 5.2235 13.0001C5.2235 15.7769 5.2339 16.1059 5.28401 17.2026C5.33034 18.2171 5.49957 18.7674 5.64234 19.1342C5.80874 19.5852 6.07441 19.9946 6.4195 20.3302C6.75514 20.6753 7.16452 20.941 7.6155 21.1074C7.98234 21.2501 8.53259 21.4194 9.54706 21.4657C10.6438 21.5158 10.9719 21.5262 13.7496 21.5262C16.5274 21.5262 16.8554 21.5158 17.9522 21.4657C18.9666 21.4194 19.5169 21.2501 19.8837 21.1074C20.3687 20.9183 20.7157 20.6942 21.0797 20.3302C21.4248 19.9946 21.6905 19.5852 21.8569 19.1342C21.9996 18.7674 22.1689 18.2171 22.2152 17.2026C22.2653 16.1059 22.2757 15.7769 22.2757 13.0001C22.2757 10.2233 22.2653 9.89428 22.2152 8.79755C22.1689 7.78308 21.9996 7.23282 21.8569 6.86599C21.6678 6.38097 21.4437 6.03399 21.0797 5.66999C20.744 5.32497 20.3354 5.05942 19.8837 4.89282C19.5169 4.75006 18.9666 4.58082 17.9522 4.5345ZM12.4212 16.2061C13.1631 16.5149 13.9892 16.5566 14.7583 16.3241C15.5275 16.0915 16.1921 15.5991 16.6385 14.9309C17.085 14.2628 17.2857 13.4604 17.2062 12.6608C17.1268 11.8611 16.7722 11.1139 16.2031 10.5466C15.8402 10.184 15.4015 9.90639 14.9185 9.73369C14.4355 9.56099 13.9202 9.49753 13.4097 9.54788C12.8992 9.59823 12.4063 9.76114 11.9663 10.0249C11.5263 10.2886 11.1503 10.6466 10.8653 11.0731C10.5803 11.4996 10.3934 11.984 10.3181 12.4914C10.2428 12.9988 10.2809 13.5166 10.4297 14.0075C10.5785 14.4984 10.8343 14.9502 11.1787 15.3304C11.523 15.7106 11.9474 16.0097 12.4212 16.2061ZM9.96968 9.22017C10.4661 8.72378 11.0554 8.33003 11.7039 8.06138C12.3525 7.79274 13.0476 7.65447 13.7496 7.65447C14.4516 7.65447 15.1467 7.79274 15.7953 8.06138C16.4439 8.33003 17.0331 8.72378 17.5295 9.22017C18.0259 9.71656 18.4197 10.3059 18.6883 10.9544C18.957 11.603 19.0952 12.2981 19.0952 13.0001C19.0952 13.7021 18.957 14.3972 18.6883 15.0458C18.4197 15.6943 18.0259 16.2836 17.5295 16.78C16.527 17.7825 15.1674 18.3457 13.7496 18.3457C12.3319 18.3457 10.9722 17.7825 9.96968 16.78C8.96718 15.7775 8.40399 14.4178 8.40399 13.0001C8.40399 11.5823 8.96718 10.2227 9.96968 9.22017ZM20.2808 8.45057C20.4038 8.33453 20.5023 8.195 20.5704 8.04022C20.6385 7.88544 20.6749 7.71857 20.6773 7.54949C20.6798 7.3804 20.6483 7.21254 20.5848 7.05585C20.5212 6.89915 20.4268 6.7568 20.3072 6.63723C20.1877 6.51765 20.0453 6.42329 19.8886 6.35971C19.7319 6.29614 19.5641 6.26466 19.395 6.26712C19.2259 6.26959 19.059 6.30595 18.9043 6.37407C18.7495 6.44218 18.6099 6.54065 18.4939 6.66366C18.2682 6.90289 18.1447 7.22065 18.1495 7.54949C18.1543 7.87832 18.287 8.19235 18.5196 8.42489C18.7521 8.65744 19.0661 8.7902 19.395 8.795C19.7238 8.79979 20.0416 8.67624 20.2808 8.45057Z" fill="white"></path>
                            </svg>
                        </a>
                    <?php } ?>
                    <?php if ($data['lkdn']) { ?>
                        <a href="<?php echo $data['lkdn']; ?>" target="_blank">
                            <svg width="27" height="26" viewbox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.91406 8.9375H7.75927V23.8333H2.91406V8.9375ZM20.957 9.11219C20.9055 9.09594 20.8568 9.07833 20.8026 9.06344C20.7376 9.04872 20.6721 9.03607 20.6063 9.02552C20.3202 8.96703 20.0289 8.93754 19.7369 8.9375C16.9121 8.9375 15.1205 10.9918 14.5301 11.7853V8.9375H9.6849V23.8333H14.5301V15.7083C14.5301 15.7083 18.1918 10.6085 19.7369 14.3542V23.8333H24.5807V13.7814C24.5787 12.7117 24.2218 11.673 23.5661 10.8281C22.9103 9.98308 21.9926 9.37959 20.957 9.11219Z" fill="white"></path>
                                <path d="M5.28385 6.91292C6.59265 6.91292 7.65365 5.85193 7.65365 4.54313C7.65365 3.23433 6.59265 2.17334 5.28385 2.17334C3.97505 2.17334 2.91406 3.23433 2.91406 4.54313C2.91406 5.85193 3.97505 6.91292 5.28385 6.91292Z" fill="white"></path>
                            </svg>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();