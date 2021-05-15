<?php if (!wp_doing_ajax() && !isset($_REQUEST['fancybox'])) : ?>
  <?php get_header();?>
<?php endif; ?>
<?php the_post(); ?>
<?php $post_id = get_the_ID(); ?>
<div <?php post_class( 'single-wp_ideas' ); ?> id="single-wp_ideas">
  <section class="section section-single section-content">
    <div class="container">
      <div class="meta-atividade">
        <a href="javascript:void(0)">Atividade: <?= get_field('idea_post__atividade', get_the_ID()); ?></a>
      </div>
      <div class="title">
        <h1 title="<?php the_title() ?>"><?php the_title() ?></h1>
      </div>
      <div class="authors">
        <p>
          <span class="icon">
            <img src="<?= __REL_THEME__ ?>/images/icon-autor-single.svg" alt=""/>
          </span>
          <span class="names">
            <?= get_field('idea_post__autores', $post_id); ?>
          </span>
        </p>
      </div>
      <div class="content">
        <?php if (isset($_REQUEST['fancybox']) && isset($_REQUEST['audio'])) : ?>
          <audio controls>
            <source src="<?= get_field('idea_post__audio', get_the_ID()); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        <?php else: ?>
          <?= get_field('idea_post__video', get_the_ID()); ?>
          <?php the_content(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
<?php if (!wp_doing_ajax() && !isset($_REQUEST['fancybox'])) : ?>
  <?php get_header();?>
<?php endif; ?>