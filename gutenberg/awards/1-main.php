<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title_1    = get_field('title_1');
$title_2    = get_field('title_2');
$text       = get_field('text');
if (get_field('is_example')) { ?>

    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/awards/preview/1.png">

<?php } else { ?>
    <section class="awardsMain">
        <div class="container">
            <div class="awardsMain__info">
                <h1 <?php echo (is_admin()) ? 'style="font-size:40px;"' : ''; ?>>
                    <span <?php echo (is_admin()) ? 'style="font-size:40px;"' : ''; ?>><?php echo $title_1; ?></span><?php echo $title_2; ?>
                </h1>
                <p><?php echo $text; ?></p>
            </div>
        </div>
        <div class="dec">
            <svg class="pc-dec" width="1247" height="1479" viewbox="0 0 1247 1479" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1153.78 248.794C1029.97 192.064 883.622 246.437 826.892 370.241L803.114 422.131L751.224 398.353C627.42 341.623 481.069 395.997 424.339 519.8C367.608 643.604 421.982 789.955 545.786 846.685L597.676 870.463L573.899 922.353C517.169 1046.16 571.542 1192.51 695.346 1249.24C819.15 1305.97 965.501 1251.59 1022.23 1127.79L1046.01 1075.9L1097.9 1099.68C1221.7 1156.41 1368.05 1102.04 1424.78 978.232C1481.51 854.429 1427.14 708.077 1303.34 651.347L1251.45 627.569L1275.22 575.679C1331.95 451.876 1277.58 305.524 1153.78 248.794Z" fill="#EF404B"></path>
                <circle cx="426.585" cy="110.585" r="308.526" transform="rotate(30 426.585 110.585)" stroke="#3840ED" stroke-width="7.51188"></circle>
                <path d="M549.483 291.258L560.372 383.591L652.145 394.546L560.372 405.502L549.483 497.834L538.594 405.502L446.821 394.546L538.594 383.591L549.483 291.258Z" fill="white"></path>
            </svg>
            <svg class="tab-dec" width="768" height="563" viewbox="0 0 768 563" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M654.859 353.619C574.021 326.984 486.897 370.923 460.262 451.761L449.098 485.642L415.216 474.479C334.379 447.843 247.255 491.783 220.619 572.62C193.984 653.457 237.924 740.581 318.761 767.217L352.643 778.381L341.479 812.262C314.844 893.1 358.783 980.224 439.621 1006.86C520.459 1033.49 607.583 989.555 634.218 908.718L645.382 874.836L679.264 886C760.101 912.635 847.225 868.696 873.861 787.858C900.496 707.021 856.556 619.897 775.719 593.261L741.837 582.098L753.001 548.216C779.636 467.378 735.697 380.254 654.859 353.619Z" fill="#EF404B"></path>
                <circle cx="93.6506" cy="514.109" r="138.87" transform="rotate(6.08087 93.6506 514.109)" stroke="#3840ED" stroke-width="4.21252"></circle>
                <path d="M217.077 526.245L231.701 540.093L248.487 529.179L234.742 543.737L245.744 560.607L231.119 546.759L214.334 557.673L228.079 543.115L217.077 526.245Z" fill="white"></path>
            </svg>
            <svg class="mob-dec" width="375" height="235" viewbox="0 0 375 235" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M390.172 70.938C336.887 53.3811 279.458 82.3441 261.901 135.629L254.543 157.962L232.209 150.604C178.924 133.047 121.496 162.01 103.939 215.294C86.3821 268.579 115.345 326.007 168.63 343.564L190.964 350.923L183.605 373.257C166.048 426.541 195.011 483.97 248.296 501.527C301.581 519.084 359.009 490.121 376.566 436.836L383.925 414.502L406.258 421.861C459.543 439.418 516.972 410.455 534.528 357.17C552.085 303.886 523.122 246.457 469.837 228.9L447.504 221.542L454.863 199.208C472.42 145.923 443.456 88.495 390.172 70.938Z" fill="#EF404B"></path>
                <circle cx="13.2466" cy="193.723" r="91.5374" transform="rotate(6.08087 13.2466 193.723)" stroke="#3840ED" stroke-width="2.77672"></circle>
                <path d="M90.6415 203.214L103.181 215.087L117.573 205.73L105.788 218.212L115.221 232.676L102.682 220.803L88.2898 230.16L100.075 217.678L90.6415 203.214Z" fill="white"></path>
            </svg>
        </div>
    </section>
    <div class="breadcrumbsWrap">
        <div class="container">
            <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div>
    </div>
    <script type="text/javascript">var element = document.querySelector('.wrapper'); element.classList.add('awardsRecPage');</script>
<?php } ?>