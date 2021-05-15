<?php /* Template Name: Jogo da Diversidade */ ?>
<?php get_header(); the_post();?>
  <div class="page-diversity page" id="page-diversity">
    <section class="section section-page section-nopadding">
      <div class="container">
        <?php WP_Custom::the_page_title(get_the_ID()); ?>
      </div>
    </section>
    <?php if (!empty(get_field('default_page__banner', get_the_ID() ) ) ) : ?>
      <section class="section section-triangle-content section-page-image section-diversity_image bg-orange" id="diversity-banner">
        <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
        <?php WP_Custom::the_page_image(get_the_ID()); ?>
        <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
      </section>
    <?php endif; ?>
    <section class="section section-page section-content">
      <div class="container">
        <?php WP_Custom::the_page_content(get_the_ID()); ?>
      </div>
    </section>
    <section class="section section-triangle-content section-page-file section-diversity_file bg-orange" id="diversity-file">
      <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt=""></div>
      <div class="container">
        <?php WP_Custom::the_page_file(get_the_ID()); ?>
      </div>
      <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt=""></div>
    </section>
  </div>
<?php get_footer(); ?>