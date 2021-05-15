<div class="container">
  <div class="atividade-item atividade-item_posicao atividade-item_<?= block_field('atividade-item_posicao'); ?>">
    <div class="atividade-item_numero">
      <span class="inner">
        <h3><?= block_field('atividade-item_numero'); ?></h3>
      </span>
    </div>
    <div class="atividade-item_titulo">
      <h2><?= block_field('atividade-item_titulo'); ?></h2>
    </div>
    <div class="atividade-item_tempo-proposto">
      <p><span class="icon"></span> Tempo proposto: <?= block_field('atividade-item_tempo-proposto'); ?></p>
    </div>
    <div class="atividade-item_conteudo">
      <div class="content">
        <?= block_field('atividade-item_conteudo'); ?>
      </div>
    </div>
    <?php if (!empty(block_value('atividade-item_imagem'))) :?>
      <div class="atividade-item_imagem"> 
        <img src="<?= block_field('atividade-item_imagem'); ?>" alt="">
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>