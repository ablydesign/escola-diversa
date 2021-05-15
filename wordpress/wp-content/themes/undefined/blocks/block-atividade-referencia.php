<?php $id = 'atividade-referencia-' . $block['id']; ?>
<section class="section section-triangle-content section-page-image bg-blue atividade-objetivo-section">
  <div class="triangle triangle-top"><img src="<?= __REL_THEME__ ?>/images/triangle_white-topx2.svg" alt=""></div>
  <div class="container">
    <div class="atividade-referencia">
      <div class="atividade-referencia_bibliografia">
        <h2>Referências bibliográficas</h2>
        <p><?= get_field('atividade-referencia_conteudo'); ?></p>
      </div>
      <div class="atividade-referencia_bibliografia">
        <p><a href="javascript:;" data-fancybox data-src="#<?= $id; ?>" class="btn btn-link btn-link_ghost">Ver bibliografia</a></p>
      </div>
    </div>
  </div>
  <div class="triangle triangle-bottom"><img src="<?= __REL_THEME__ ?>/images/triangle_white-bottomx2.svg" alt=""></div>
  <div class="hidden" style="display: none">
    <div class="fancybox-inline-content" id="<?= $id; ?>" >
      <div class="container">
        <?= get_field('atividade-referencia_modal'); ?>
      </div>
    </div>
  </div>
</section>