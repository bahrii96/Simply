<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$content    = get_field('content'); 

if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/article/preview/3.png">
<?php } else { ?>

	<div class="articleBanner">
		<?php echo $content; ?>
	</div>

<?php } ?>	



