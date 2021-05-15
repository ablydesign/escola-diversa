<?php /* Template Name: Idéias de Juventude */ ?>
<?php get_header(); the_post();?>
  <div class="page-ideas page" id="page-ideas">
    <div class="container">
      <?php WP_Ideas::the_page_title(get_the_ID()); ?>
      <?php WP_Ideas::the_page_content(get_the_ID()); ?>
    </div>
    <section class="section section-page" id="ideas-content">
      <div class="container">
        <div class="ideas-list">
          <?php WP_Ideas::the_list(); ?>
        </div>
      </div>
    </section>
    <section class="section section-triangle-content section-page-image section-ideas_image bg-yellow" id="ideas-banner">
      <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
        <?php WP_Ideas::the_page_image(get_the_ID()); ?>
      <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
    </section>
  </div>
<?php get_footer(); ?>