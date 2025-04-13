<footer>
    <div class="container">
        <div class="top">
            <div class="left">
                <div class="footer-logo">
                    <?php pll_e('Simply<br>Contact'); ?>
                </div>
                <div class="footer-soc">
                    <?php if (get_field('facebook_footer', 'options')) { ?>
                        <div class="line">
                            <a href="<?php echo get_field('facebook_footer', 'options'); ?>" target="_blank">
                                <div class="icon">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7858 19.1614V10.7987H14.4885L14.8931 7.53962H11.7858V5.4588C11.7858 4.51524 12.0381 3.87216 13.341 3.87216L15.0026 3.8714V0.956544C14.1984 0.868154 13.3901 0.825331 12.5814 0.828266C10.1857 0.828266 8.54554 2.34701 8.54554 5.13624V7.53972H5.83594V10.7988H8.54546V19.1615L11.7858 19.1614Z" fill="white"></path>
                                    </svg>
                                </div>
                                <span>Faceboook</span>
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.00008 3H20.5001V19.5H18.5001V6.41421L4.70718 20.2071L3.29297 18.7929L17.0859 5H4.00008V3Z" fill="black"></path>
                                </svg>
                            </a>
                            <span><?php echo get_field('facebook_footer_nik', 'options'); ?></span>
                        </div>
                    <?php } ?>
                    <?php if (get_field('twitter_footer', 'options')) { ?>
                        <div class="line">
                            <a href="<?php echo get_field('twitter_footer', 'options'); ?>" target="_blank">
                                <div class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_7576_5519)">
                                            <path d="M11.905 8.46953L19.3512 0H17.5869L11.1184 7.35244L5.95583 0H0L7.80863 11.1192L0 20H1.76429L8.59099 12.2338L14.0442 20H20L11.905 8.46953ZM9.48775 11.2168L8.69536 10.1089L2.40053 1.30146H5.11084L10.1925 8.41196L10.9815 9.51988L17.5861 18.7619H14.8758L9.48775 11.2168Z" fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_7576_5519">
                                                <rect width="20" height="20" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <span>X</span>
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.00008 3H20.5001V19.5H18.5001V6.41421L4.70718 20.2071L3.29297 18.7929L17.0859 5H4.00008V3Z" fill="black"></path>
                                </svg>
                            </a>
                            <span><?php echo get_field('twitter_footer_nik', 'options'); ?></span>
                        </div>
                    <?php } ?>
                    <?php if (get_field('linkedIn_footer', 'options')) { ?>
                        <div class="line">
                            <a href="<?php echo get_field('linkedIn_footer', 'options'); ?>" target="_blank">
                                <div class="icon">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.66406 6.875H5.39115V18.3333H1.66406V6.875ZM15.5432 7.00938C15.5036 6.99688 15.4661 6.98333 15.4245 6.97187C15.3745 6.96055 15.3241 6.95083 15.2734 6.94271C15.0534 6.89771 14.8293 6.87503 14.6047 6.875C12.4318 6.875 11.0536 8.45521 10.5995 9.06563V6.875H6.8724V18.3333H10.5995V12.0833C10.5995 12.0833 13.4161 8.16042 14.6047 11.0417V18.3333H18.3307V10.601C18.3292 9.77827 18.0547 8.97926 17.5502 8.32928C17.0458 7.67929 16.3399 7.21507 15.5432 7.00938Z" fill="white"></path>
                                        <path d="M3.48698 5.31771C4.49375 5.31771 5.3099 4.50156 5.3099 3.49479C5.3099 2.48802 4.49375 1.67188 3.48698 1.67188C2.48021 1.67188 1.66406 2.48802 1.66406 3.49479C1.66406 4.50156 2.48021 5.31771 3.48698 5.31771Z" fill="white"></path>
                                    </svg>
                                </div>
                                <span>LinkedIn</span>
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.00008 3H20.5001V19.5H18.5001V6.41421L4.70718 20.2071L3.29297 18.7929L17.0859 5H4.00008V3Z" fill="black"></path>
                                </svg>
                            </a>
                            <span><?php echo get_field('linkedIn_footer_nik', 'options'); ?></span>
                        </div>
                    <?php } ?>                    
                </div>
                <script type="text/javascript" src="https://widget.clutch.co/static/js/widget.js"></script> <div class="clutch-widget" data-url="https://widget.clutch.co" data-widget-type="1" data-height="40" data-nofollow="true" data-expandifr="true" data-scale="100" data-clutchcompany-id="837921"></div>
            </div>
            <div class="right">
                <div class="footer-menu">
                    <div class="footer-menu-title"><?php pll_e('Company'); ?></div>
                    <div class="footer-line">
                        <div class="col"></div>
                        <div class="col">
                            <ul>
                                <?php if (($locations = get_nav_menu_locations()) && isset($locations['second_menu'])) {
                                    $menu = wp_get_nav_menu_object($locations['second_menu']);
                                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                                    if ($menu_items) {
                                    foreach ($menu_items as $menu_item) {
                                        $id = $menu_item->ID;
                                        $title = $menu_item->title;
                                        $url = $menu_item->url; ?>
                                        <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>                                                    
                                    <?php } }
                                } ?>           
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if( get_field('footer_services', 'options') ) { ?>
                    <div class="footer-menu">
                        <div class="footer-menu-title"><?php pll_e('Services'); ?></div>
                        <?php foreach ( get_field('footer_services', 'options') as $item ) { ?>
                            <div class="footer-line">
                                <?php if ($item['main']) { ?>
                                    <div class="col">
                                        <?php foreach ( $item['main'] as $main ) { ?>
                                            <span><a <?php if (get_post_status($main ) == 'draft') { ?> style="pointer-events: none;" <?php } else { ?> href="<?php echo get_permalink($main ); ?>" <?php } ?> ><?php echo get_the_title($main ); ?></a></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if ($item['other']) { ?>
                                    <div class="col">
                                        <ul>
                                         <?php foreach ( $item['other'] as $other ) { ?>
                                            <li><a <?php if (get_post_status($other) == 'draft') { ?> style="pointer-events: none;" <?php } else { ?> href="<?php echo get_permalink($other); ?>" <?php } ?> ><?php echo get_the_title($other); ?></a></li>   
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
     </div>
 </div>
 <div class="bot">
    <div class="links">
        <?php if (($locations = get_nav_menu_locations()) && isset($locations['third_menu'])) {
            $menu = wp_get_nav_menu_object($locations['third_menu']);
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            if ($menu_items) {
            foreach ($menu_items as $menu_item) {
                $id = $menu_item->ID;
                $title = $menu_item->title;
                $url = $menu_item->url; ?>
                <a href="<?php echo $url; ?>"><?php echo $title; ?></a>                                                  
            <?php } }
        } ?>   
    </div>
    <div class="copyr"><?php pll_e('© 2013 - 2021 Simply contact Inc.'); ?></div>
    <!-- <a href="https://cosmos.studio/" target="_blank" rel="nofollow" class="dev">
        <span><?php pll_e('Website made by'); ?></span>
        <svg width="155" height="30" viewbox="0 0 155 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.21304 29.2918H9.52387C9.94028 29.2918 10.1485 29.2484 10.2266 29.2224C10.2613 29.1443 10.322 28.9448 10.322 28.4936V16.1055H7.06879V26.6285H3.79825V3.37031H7.06879V12.8349H10.322V1.51382C10.322 1.03669 10.2526 0.863185 10.2352 0.837159L10.1745 0.776433C10.1832 0.793783 10.0184 0.707031 9.51519 0.707031H1.21304C0.761933 0.707031 0.553728 0.767758 0.475651 0.802458C0.449626 0.88921 0.40625 1.09741 0.40625 1.51382V28.4936C0.40625 28.884 0.449626 29.1096 0.475651 29.2224C0.597104 29.2484 0.813984 29.2918 1.21304 29.2918Z" fill="white"></path>
            <path d="M14.3988 29.2918H22.9005C23.3343 29.2918 23.5164 29.231 23.5598 29.2137C23.5511 29.1963 23.6379 29.0055 23.6379 28.485V1.51382C23.6379 1.03669 23.5685 0.863185 23.5511 0.837159L23.4904 0.776433C23.4991 0.776433 23.369 0.707031 22.9092 0.707031H14.4075C13.9564 0.707031 13.7482 0.767758 13.6788 0.802458C13.6528 0.880535 13.6094 1.08874 13.6094 1.50515V28.485C13.6094 28.8754 13.6528 29.1009 13.6788 29.2137C13.7829 29.2484 14.0084 29.2918 14.3988 29.2918ZM16.984 3.37031H20.2546V26.6285H16.984V3.37031Z" fill="white"></path>
            <path d="M27.7443 29.2918H36.0551C36.4715 29.2918 36.6797 29.2484 36.7578 29.2224C36.7925 29.1443 36.8532 28.9448 36.8532 28.4936V13.6764C36.8532 13.1993 36.7838 13.0258 36.7665 12.9998L36.7058 12.9477C36.7144 12.9651 36.5496 12.8783 36.0464 12.8783H30.3208V3.37031H33.5914V9.60777H36.8446V1.51382C36.8446 1.03669 36.7752 0.863185 36.7578 0.837159L36.6971 0.776433C36.7144 0.793783 36.5496 0.707031 36.0464 0.707031H27.7356C27.2845 0.707031 27.0763 0.767758 27.0069 0.802458C26.9809 0.880535 26.9375 1.08874 26.9375 1.50515V14.7955C26.9375 15.1512 26.9722 15.3507 27.0069 15.4635C27.1197 15.4982 27.3452 15.5329 27.7443 15.5329H33.4699V26.6198H30.1994V18.8642H26.9462V28.4763C26.9462 28.8667 26.9896 29.0922 27.0156 29.205C27.1197 29.2484 27.3452 29.2918 27.7443 29.2918Z" fill="white"></path>
            <path d="M56.8334 29.2918V1.51382C56.8334 1.03669 56.764 0.863185 56.7466 0.837159L56.6859 0.776433C56.6686 0.767758 56.4777 0.707031 56.096 0.707031H40.125V29.2918H43.517V3.37031H46.7875V29.2918H50.1795V3.37031H53.5195V29.2918H56.8334Z" fill="white"></path>
            <path d="M60.9622 29.2918H69.4639C69.8976 29.2918 70.0798 29.231 70.1232 29.2137C70.1145 29.1963 70.2013 29.0055 70.2013 28.485V1.51382C70.2013 1.03669 70.1319 0.863185 70.1145 0.837159L70.0538 0.776433C70.0538 0.785108 69.9236 0.707031 69.4639 0.707031H60.9622C60.5111 0.707031 60.3029 0.767758 60.2335 0.802458C60.2074 0.880535 60.1641 1.08874 60.1641 1.50515V28.485C60.1641 28.8754 60.2074 29.1009 60.2335 29.2137C60.3462 29.2484 60.5718 29.2918 60.9622 29.2918ZM63.5474 3.37031H66.8179V26.6285H63.5474V3.37031Z" fill="white"></path>
            <path d="M74.2912 29.2918H82.602C83.0791 29.2918 83.2787 29.231 83.3394 29.2137C83.322 29.1963 83.4088 28.9968 83.4088 28.4936V13.6764C83.4088 13.1472 83.322 12.9911 83.3134 12.9911L83.2787 12.9564C83.244 12.939 83.0705 12.8696 82.602 12.8696H76.8764V3.37031H80.1469V9.60777H83.4001V1.51382C83.4001 0.984637 83.3134 0.828484 83.3047 0.828484L83.27 0.793783C83.244 0.776433 83.0705 0.707031 82.5933 0.707031H74.2825C73.8314 0.707031 73.6232 0.767758 73.5538 0.802458C73.5278 0.880535 73.4844 1.08874 73.4844 1.50515V14.7955C73.4844 15.1512 73.5191 15.3507 73.5538 15.4635C73.6666 15.4982 73.8921 15.5329 74.2912 15.5329H80.0168V26.6198H76.7462V18.8642H73.4931V28.4763C73.4931 28.8667 73.5364 29.0922 73.5625 29.205C73.6666 29.2484 73.8921 29.2918 74.2912 29.2918Z" fill="white"></path>
            <path d="M91.8771 29.2918H100.179C100.656 29.2918 100.856 29.231 100.917 29.2137C100.908 29.1963 100.986 28.9968 100.986 28.4936V13.6764C100.986 13.1472 100.899 12.9911 100.891 12.9911L100.856 12.9564C100.821 12.939 100.648 12.8696 100.179 12.8696H94.4536V3.37031H97.7242V9.60777H100.977V1.51382C100.977 0.984637 100.891 0.828484 100.882 0.828484L100.847 0.793783C100.83 0.776433 100.656 0.707031 100.179 0.707031H91.8684C91.4173 0.707031 91.2091 0.776433 91.1397 0.802458C91.1137 0.88921 91.0703 1.08874 91.0703 1.50515V14.7955C91.0703 15.1512 91.105 15.3507 91.1397 15.4635C91.2525 15.4982 91.478 15.5329 91.8771 15.5329H97.6027V26.6198H94.3322V18.8642H91.079V28.4763C91.079 28.8754 91.1224 29.0922 91.1484 29.205C91.2612 29.2484 91.478 29.2918 91.8771 29.2918Z" fill="white"></path>
            <path d="M109.953 0.707031H102.805V3.37031H104.653V29.2918H108.045V3.37031H109.953V0.707031Z" fill="white"></path>
            <path d="M112.526 29.2918H120.897C121.331 29.2918 121.513 29.231 121.556 29.2137C121.548 29.1963 121.634 28.9968 121.634 28.485V0.707031H118.381V26.6285H115.111V0.707031H111.719V28.485C111.719 28.884 111.762 29.1009 111.788 29.2137C111.91 29.2484 112.135 29.2918 112.526 29.2918Z" fill="white"></path>
            <path d="M135.047 2.17314C135.047 1.24489 134.847 0.993312 134.804 0.949936C134.76 0.897885 134.544 0.707031 133.581 0.707031H124.992V29.2918H133.581C134.535 29.2918 134.76 29.1009 134.76 29.0922L134.769 29.0836C134.943 28.9014 135.047 28.4589 135.047 27.8257V2.17314ZM131.655 26.6285H128.384V3.37031H131.655V26.6285Z" fill="white"></path>
            <path d="M141.712 0.707031H138.32V29.2918H141.712V0.707031Z" fill="white"></path>
            <path d="M145.759 29.2909H154.261C154.695 29.2909 154.877 29.2302 154.92 29.2128C154.911 29.1955 154.998 29.0046 154.998 28.4841V1.51296C154.998 1.03583 154.929 0.862322 154.911 0.836296L154.868 0.79292C154.833 0.77557 154.677 0.714844 154.261 0.714844H145.759C145.308 0.714844 145.1 0.784245 145.03 0.810271C145.004 0.897023 144.961 1.09655 144.961 1.51296V28.4928C144.961 28.8918 145.004 29.1087 145.03 29.2215C145.143 29.2475 145.369 29.2909 145.759 29.2909ZM148.344 3.36945H151.615V26.6276H148.344V3.36945Z" fill="white"></path>
        </svg>
    </a> -->
    <div href="/" class="dev">
        <span><?php pll_e('Designed by'); ?></span> &nbsp;
        <a href="https://cosmos.studio/" target="_blank" rel="nofollow">Cosmos Studio</a>
    </div>
</div>
</div>
</footer>
<!-- end footer -->
<div class="popup js-popup" id="popup-form">
    <div class="popup__inner">
        <button class="popup__close js-popup-close" aria-label="Close popup">
            <i></i>
        </button>
        <div class="popup__body">
            <div class="popup__title-wrap">
                <p class="popup__title"><?php pll_e('Get fast answers to any remaining questions'); ?></p>
            </div>
            <div class="popup__form form">
                <?php echo str_replace('aria-required="true"', 'aria-required="true" required', str_replace('method="post" class="wpcf7-form', 'method="post" class="wpcf7-form form-in-modal ', get_field('get_fast_block', 'options')['form'])); ?>                 
                <div class="form__thanks">
                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="62" height="62" rx="31" fill="white" fill-opacity="0.7"/>
                    <path d="M21 30.9727L28.9615 38.5L42.9615 24.5" stroke="#EF404B" stroke-width="4" stroke-linecap="round"/>
                </svg>
                <p>
                    <?php pll_e('Thank you.'); ?>
                    <br>
                    <?php pll_e('Your request has been sent successfully.'); ?>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-window modal-thanks" id="modal_thanks">
 <div class="box">
     <svg width="63" height="62" viewbox="0 0 63 62" fill="none" xmlns="http://www.w3.org/2000/svg">
         <rect x="0.5" width="62" height="62" rx="31" fill="#EF404B" fill-opacity="0.2"></rect>
         <path d="M21 30.4727L28.9615 38L42.9615 24" stroke="#EF404B" stroke-width="4" stroke-linecap="round"></path>
     </svg>
     <div class="h4">
         <?php pll_e('Thank you.'); ?>
         <br>
         <?php pll_e('Your request has been sent successfully.'); ?>
     </div>
 </div>
</div>
<div class="modal-window modal-thanks" id="modal_sub_thanks">
 <div class="box">
     <svg width="63" height="62" viewbox="0 0 63 62" fill="none" xmlns="http://www.w3.org/2000/svg">
         <rect x="0.5" width="62" height="62" rx="31" fill="#EF404B" fill-opacity="0.2"></rect>
         <path d="M21 30.4727L28.9615 38L42.9615 24" stroke="#EF404B" stroke-width="4" stroke-linecap="round"></path>
     </svg>
     <div class="h4">
         <?php echo get_field('subs_block', 'options')['tekst_dlya_vkna_podyaki']; ?>
     </div>
 </div>
</div>
</div>
<?php echo get_field('code_footer', 'options'); ?>
<script>
    var iso_code = '<?php echo get_iso_code(); ?>';
</script>
<script type="text/javascript" defer="defer" src="/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9" id="regenerator-runtime-js"></script>
<?php wp_footer(); ?>
</body>
</html>