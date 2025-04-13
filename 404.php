<?php get_header(); 
$url = get_bloginfo('template_directory'); ?>	

<section class="b-main b-main--error">
	<div class="b-main__bg">
		<img data-src="<?php echo $url; ?>/img/home-404.jpg" data-retina="<?php echo $url; ?>/img/home-404.jpg" data-webp="<?php echo $url; ?>/img/home-404.webp" data-webp-retina="<?php echo $url; ?>/img/home-404.webp" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyWebp" alt="img">
		<img data-src="<?php echo $url; ?>/img/home-404-mob.jpg" data-retina="<?php echo $url; ?>/img/home-404-mob.jpg" data-webp="<?php echo $url; ?>/img/home-404-mob.webp" data-webp-retina="<?php echo $url; ?>/img/home-404-mob.webp" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyWebp" alt="img">
		<img data-src="<?php echo $url; ?>/img/home-404-mob-sm.jpg" data-retina="<?php echo $url; ?>/img/home-404-mob-sm.jpg" data-webp="<?php echo $url; ?>/img/home-404-mob-sm.webp" data-webp-retina="<?php echo $url; ?>/img/home-404-mob-sm.webp" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyWebp" alt="img">
	</div>
	<div class="container">
		<div class="box">
			<span class="title-error">404</span>
			<p><?php echo get_field('zagolovok_404', 'options'); ?></p>
			<a href="/<?php echo (pll_current_language() !== 'uk') ? pll_current_language() : ''; ?>" class="white-btn"><?php echo get_field('bb_text', 'options'); ?></a>
		</div>
	</div>
</section>

<?php /* ?>

<div class="b-404">
	<div class="container">
		<div class="box">
			<div class="label">404</div>
			<h5><?php echo get_field('zagolovok_404', 'options'); ?></h5> 
			<a href="/<?php echo (pll_current_language() !== 'uk') ? pll_current_language() : ''; ?>" class="main-btn uppercase-small green">
				<span><?php echo get_field('bb_text', 'options'); ?></span> 
			</a>
		</div>
	</div>
	<div class="img">
		<svg width="1532" height="1548" viewbox="0 0 1532 1548" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle data-aos="zoom-in" cx="578.197" cy="302.662" r="236.197" fill="#41A83E"></circle>
			<path data-aos="zoom-in" d="M549.614 325.497L552.657 336.856L591.719 326.389L595.788 341.574L611.436 337.381L607.367 322.197L616.408 319.774L612.619 305.633L603.578 308.055L589.695 256.243L570.918 261.275L549.614 325.497ZM566.487 317.994L579.203 279.677L587.93 312.248L566.487 317.994Z" fill="black"></path>
			<circle data-aos="zoom-in" data-aos-delay="300" cx="1439.44" cy="92.9091" r="92.5556" fill="#41A83E"></circle>
			<circle data-aos="zoom-in" data-aos-delay="100" cx="852.859" cy="120.556" r="92.5556" fill="#4BAADE"></circle>
			<path data-aos="zoom-in" data-aos-delay="100" d="M821.238 120.414C821.238 146.094 834.078 163.494 852.798 163.494C871.518 163.494 884.358 146.094 884.358 120.414C884.358 94.7342 871.518 77.3342 852.798 77.3342C834.078 77.3342 821.238 94.7342 821.238 120.414ZM838.758 120.414C838.758 103.974 844.398 92.9342 852.798 92.9342C861.198 92.9342 866.838 103.974 866.838 120.414C866.838 136.974 861.198 147.894 852.798 147.894C844.398 147.894 838.758 136.974 838.758 120.414Z" fill="black"></path>
			<circle data-aos="zoom-in" data-aos-delay="400" cx="506.677" cy="1041.3" r="506.051" fill="#4BAADE"></circle>
			<circle data-aos="zoom-in" data-aos-delay="200" cx="1162.38" cy="463.732" r="369.621" fill="#FEBBBC"></circle>
			<path data-aos="zoom-in" data-aos-delay="200" d="M1126.07 468.95L1123.03 480.31L1162.09 490.776L1158.02 505.961L1173.67 510.153L1177.74 494.969L1186.78 497.392L1190.57 483.25L1181.53 480.828L1195.41 429.016L1176.63 423.984L1126.07 468.95ZM1144.43 470.889L1174.61 444.064L1165.88 476.635L1144.43 470.889Z" fill="black"></path>
		</svg>
	</div>
	<div class="img-tablet" data-aos="zoom-in" data-aos-delay="500">
		<svg width="477" height="477" viewbox="0 0 477 477" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle cx="238.141" cy="238.141" r="238.141" fill="#4BAADE"></circle>
		</svg>
	</div>
</div>

<?php	*/ ?>

<?php get_footer();