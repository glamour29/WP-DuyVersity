<?php

get_header();
pageBanner(array(
  'title' => 'Tất cả chương trình đào tạo',
  'subtitle' => 'Luôn có điều gì đó dành cho bạn. Cùng xem thử xung quanh nhé!.'
));
 ?>

<div class="container container--narrow page-section">

<ul class="link-list min-list">

<?php
  while(have_posts()) {
    the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php }
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();


?>