<?php get_header(); ?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

.glow {
  font-size: 100px;
  font-weight: 900;
  color: #fff;
  text-align: center;
  animation: glowColor 3s infinite alternate;
}

@keyframes glowColor {
  0% {
    text-shadow: 0 0 10px #ffffffff, 0 0 20px #648DB3;
  }
  50% {
    text-shadow: 0 0 20px #ffffffff, 0 0 40px #ffffffff;
  }
  100% {
    text-shadow: 0 0 15px #fdfdfdff, 0 0 30px #5459AC;
  }
}

</style>
  <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
<h1 class="headline headline--large glow">Hey, chào bạn nhé!</h1>
<h2 class="headline headline--medium">Có nhiều điều hay đang chờ bạn phía trước!</h2>
<h3 class="headline headline--small">Xem thử có <strong>ngành học</strong> nào bạn thích không nè!</h3>
<a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Xem ngành học</a>

    </div>
  </div>

  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Những sự kiện sắp tới</h2>

        <?php 
          $today = date('Ymd');
          $homepageEvents = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            )
          ));

          
          while($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            get_template_part('template-parts/content', 'event');
          }
        ?>
        
        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">Xem toàn bộ sự kiện</a></p>

      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Góc blog của trường</h2>
        <?php
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2
          ));

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
            <div class="event-summary">
              <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                    } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Xem thêm</a></p>
              </div>
            </div>
          <?php } wp_reset_postdata();
        ?> 

        
        
        
        <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">Xem toàn bộ bài viết</a></p>
      </div>
    </div>
  </div>

  <div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Hỗ trợ đưa đón miễn phí</h2>
        <p class="t-center">Nhà trường hỗ trợ vé xe buýt miễn phí không giới hạn cho tất cả sinh viên.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Tìm hiểu thêm</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Mỗi ngày một quả táo</h2>
        <p class="t-center">Chương trình nha khoa khuyên bạn nên ăn táo để bảo vệ răng miệng.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Tìm hiểu thêm</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Thức ăn miễn phí</h2>
        <p class="t-center">DuyVersity hỗ trợ suất ăn trưa cho những bạn có hoàn cảnh khó khăn.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Tìm hiểu thêm</a></p>
      </div>
    </div>
  </div>
    </div>
      <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
      </div>
    </div>
  </div>

  <?php get_footer();

?>