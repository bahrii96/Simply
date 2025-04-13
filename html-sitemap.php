<?php /* Template Name: HTML sitemap */
get_header(); ?>
<div class="b-article b-article--text-page">
 <div class="container">
  <div class="box">
   <?php if ( pll_current_language() == 'en') {
    echo '<h1>Sitemap</h1>';
    $content = do_shortcode( '[kwayy-sitemap]' );
    $content = str_replace('Записи', 'Posts', $content);    
    $content = str_replace('Сторінки', 'Pages', $content);
    $content = str_replace('Кейси', 'Cases', $content);
    $content = str_replace('Послуги', 'Services', $content);
    $content = str_replace('Вакансії', 'Vacancies', $content); 
    echo $content;
   } else if ( pll_current_language() == 'pl') { 
    echo '<h1>Mapa strony</h1>';
    $content = do_shortcode( '[kwayy-sitemap]' );
    $content = str_replace('Записи', 'Dokumentacja', $content);    
    $content = str_replace('Сторінки', 'Strony', $content);
    $content = str_replace('Кейси', 'Sprawy', $content);
    $content = str_replace('Послуги', 'Usługi', $content);
    $content = str_replace('Вакансії', 'Wakaty', $content);        
    echo $content;
   } else {
    echo '<h1>Карта сайту</h1>';
    $content = do_shortcode( '[kwayy-sitemap]' );     
    echo $content;
   } ?>
  </div>
 </div>
</div>
<?php get_footer();