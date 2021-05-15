<div class="diversity-item diversity-item__<?= block_field('numero'); ?>">
  <div class="diversity-item_inner <?= block_field('posicao'); ?>">
    <div class="diversity-item_number">
      <h4><span class="number"><?= block_field('numero'); ?></span></h4>
    </div>
    <div class="diversity-item_subtitulo">
      <h3><?= block_field('subtitulo'); ?></h3>
    </div>
    <div class="diversity-item_content">
      <?= block_field('conteudo'); ?>
    </div>
    <?php if (!empty(block_value('diversidade-item_imagem'))) :?>
      <div class="diversity-item_image">
        <img src="<?= block_field('diversidade-item_imagem'); ?>" alt="" />
      </div>
    <?php endif; ?> 
  </div>
</div>