<?php /* Template Name: Documentários */ ?>
<?php get_header(); the_post();?>
  <div class="page-documentaries page" id="page-documentaries">
    <div class="container">
      <?php WP_Documentaries::the_page_title(get_the_ID()); ?>
    </div>
    <section class="section section-triangle-content section-documentaries_banner bg-purple" id="documentaries-banner">
      <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
      <div class="container">
        <div class="row">
          <?php WP_Documentaries::the_page_video_destaque(get_the_ID()); ?>
        </div>
      </div>
      <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
    </section>
    <div class="container">
      <div class="documentaries-list inner-content">
        <div class="documentaries-list-title inner-title">
          <h2>Conheça um pouco mais sobre<br> cada pessoa entrevistada!</h2>
        </div>
        <div class="row">
          <?php WP_Documentaries::the_list(); ?>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-triangle-content section-page-image section-documentaries_image bg-purple" id="documentaries-banner">
    <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
      <?php WP_Documentaries::the_page_image(get_the_ID()); ?>
    <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
  </section>
<?php get_footer(); ?>