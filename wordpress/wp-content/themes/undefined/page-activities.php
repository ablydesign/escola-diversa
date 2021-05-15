<?php /* Template Name: Atividades */ ?>
<?php get_header(); the_post();?>
  <div class="page-activities page" id="page-activities">
    <div class="container">
      <?php WP_Activities::the_page_title(get_the_ID()); ?>
      <?php WP_Activities::the_page_content(get_the_ID()); ?>
    </div>
    <section class="section section-page" id="activities-content">
      <div class="container">
        <div class="activities-list">
          <?php WP_Activities::the_list(); ?>
        </div>
      </div>
    </section>
    <section class="section section-triangle-content section-page-image section-activities_image bg-blue" id="activities-banner">
      <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
        <?php WP_Activities::the_page_image(get_the_ID()); ?>
      <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
    </section>
  </div>
<?php get_footer(); ?>