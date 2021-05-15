<?php get_header(); ?>
  <section class="banner banner-home page" id="home_banners">
    <div class="container">
      <?php WP_Custom::the_banner_title(); ?>
    </div>
    <div class="banner-section section section-triangle-content bg-purple">
      <div class="triangle triangle-top">
        <img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt="">
      </div>
      <div class="container">
        <?php WP_Custom::the_banner(); ?>
      </div>
      <div class="triangle triangle-bottom">
        <img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt="">
      </div>
    </div>
  </section>
  <section class="section section-school-diverse" id="home_school-diverse">
    <div class="container">
      <?php WP_Custom::the_school_diverse(); ?>
    </div>
  </section>
  <section class="section section-tool-box" id="home_tool-box">
    <span class="ball ball-left-midle svg-yellow" id="home_tool-box_ball-left-midle"><?= WP_MyTheme::get_icon('full-ball'); ?></span>
    <div class="container">
      <?php WP_Custom::the_tool_box(); ?>
    </div>
  </section>
  <section class="section section-triangle-content section-justification bg-purple" id="home_justification">
    <div class="triangle triangle-top">
      <img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt="">
    </div>
    <div class="container">
      <span class="ball ball-top-left svg-orange" id="home_justification-ball-top-left"><?= WP_MyTheme::get_icon('small-ball'); ?></span>
      <span class="ball ball-top-right svg-blue" id="home_justification-ball-top-right"><?= WP_MyTheme::get_icon('super-ball-right'); ?></span>
      <?php WP_Custom::the_justification(); ?>
      <?php WP_Custom::the_justification_files(); ?>
      <span class="ball ball-bottom-right svg-orange" id="home_justification-ball-bottom-right"><?= WP_MyTheme::get_icon('orange-ball-right'); ?></span>
    </div>
    <div class="triangle triangle-bottom">
      <img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt="">
    </div>
  </section>
  <section class="section section-more-diversity" id="home_more-diversity">
    <div class="container">
      <?php WP_Custom::the_more_diversity(); ?>
    </div>
  </section>
  <section class="section section-depoiments" id="home_depoiments">
    <span class="ball ball-top-left svg-blue" id="home_depoiments-ball-top-left"><?= WP_MyTheme::get_icon('blue-super-ball-left'); ?></span>
    <div class="container">
      <?php WP_Custom::the_depoiments_list(); ?>
    </div>
  </section>
  <section class="section section-support-realization" id="home_support-realization">
    <div class="container">
      <?php WP_Custom::the_support_realization(); ?>
    </div>
  </section>
  <section class="section section-triangle-content section-contact bg-orange" id="home_contact">
    <span class="ball ball-top-right svg-blue" id="home_contact-ball-top-right"><?= WP_MyTheme::get_icon('purple-medium-ball-right'); ?></span>
    <div class="triangle triangle-top">
      <img src="<?= __REL_THEME__ ?>/images/triangle_white-top.svg" alt="">
    </div>
    <div class="container">
      <?php WP_Custom::the_contact(); ?>
    </div>
    <div class="triangle triangle-bottom">
      <img src="<?= __REL_THEME__ ?>/images/triangle_white-bottom.svg" alt="">
    </div>
  </section>
<?php get_footer(); ?>