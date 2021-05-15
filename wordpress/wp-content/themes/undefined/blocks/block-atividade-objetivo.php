<section class="section section-triangle-content section-page-image bg-blue atividade-objetivo-section">
  <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-topx2.svg" alt=""></div>
  <div class="container">
    <div class="atividade-objetivo">
      <div class="atividade-objetivo_conteudo">
        <h2>Objetivos</h2>
        <?= block_field('atividade-objetivo_conteudo'); ?>
      </div>
      <?php if (!empty(block_value('atividade-objetivo_imagem'))) :?>
        <div class="atividade-objetivo_imagem">
          <img src="<?= block_field('atividade-objetivo_imagem'); ?>" alt="">
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottomx2.svg" alt=""></div>
</section>