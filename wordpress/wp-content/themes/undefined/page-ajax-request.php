<?php /* Template Name: Ajax Request */ ?>
<?php if (!wp_doing_ajax() && !isset($_REQUEST['fancybox'])) : ?>
  <?php get_header();?>
<?php endif; ?>
<?php the_post();?>
<div <?php post_class( 'page-ajax page' ); ?> id="page-ajax">
  <section class="section section-page section-nopadding">
    <div class="container">
      <?php WP_Custom::the_page_title(get_the_ID()); ?>
    </div>
  </section>
  <?php if (!empty(get_field('default_page__banner', get_the_ID() ) ) ) : ?>
    <section class="section section-triangle-content section-page-image section-diversity_image bg-blue" id="diversity-banner">
      <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-topx2.svg" alt=""></div>
      <?php WP_Custom::the_page_image(get_the_ID()); ?>
      <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottomx2.svg" alt=""></div>
    </section>
  <?php endif; ?>
  <section class="section section-page section-content">
    <div class="container">
      <?php WP_Custom::the_page_content(get_the_ID()); ?>
    </div>
  </section>
</div>
<?php if (!wp_doing_ajax() && !isset($_REQUEST['fancybox'])) : ?>
  <?php get_header();?>
<?php endif; ?>