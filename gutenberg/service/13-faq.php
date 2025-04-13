<?php $url  = get_bloginfo('template_directory');
$src        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$title      = get_field('title'); 
$list       = get_field('list'); 
if (get_field('is_example')) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/gutenberg/service/preview/13.png">
<?php } else { ?>
    <div class="b-service-faq with-line">
        <div class="container">
            <div class="box">
                <div class="left"><h2 class="h3"><?php echo $title; ?></h2></div>
                <?php if ($list) { ?>           
                    <div class="right">
                        <div class="accordion">
                            <?php foreach ($list as $item) { ?>
                                <div class="item">
                                    <h3 class="head"><?php echo $item['title']; ?><span></span></h3>
                                    <div class="cont"><?php echo $item['text']; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if ($list) { ?>
            <?php $jsonLD = []; ?>
            <?php foreach ($list as $item) { ?>
                <?php $question = [
                    '@type' => 'Question',
                    'name' => esc_textarea(strip_tags($item['title'])),
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => esc_textarea(strip_tags($item['text']))
                    ]
                ]; ?>
                <?php $jsonLD[] = $question; ?>
            <?php } ?>
            <script type="application/ld+json"> 
                {
                    "@context": "https://schema.org",
                    "@type": "FAQPage",
                    "mainEntity": <?php echo json_encode($jsonLD, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?>
                }
            </script>
        <?php } ?>
    </div>
<?php } ?>