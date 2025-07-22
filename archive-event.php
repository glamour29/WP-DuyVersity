<?php

get_header();
pageBanner(array(
  'title' => 'Tất cả các sự kiện',
  'subtitle' => 'Xem thử có gì mới ở DuyVersity nhé!'
));
 ?>

<div class="container container--narrow page-section">
<?php
  
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content-event');
   }
  echo paginate_links();
?>

<hr class="section-break">

<p>Xem lại những hoạt động trước đó nhé?<a href="<?php echo site_url('/past-events') ?>">Xem lại những sự kiện trước đây tại DuyVersity</a>.</p>

</div>

<?php get_footer();


?>