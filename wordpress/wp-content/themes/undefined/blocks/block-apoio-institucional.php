<div class="apoio-institucional_item">
  <div class="row">
    <?php if (!empty(block_value('apoio-institucional_titulo'))) :?>
      <div class="column col-md-12">
        <div class="title">
          <h4><?= block_field('apoio-institucional_titulo'); ?></h4>
        </div>
      </div>
    <?php endif; ?> 
    <div class="column col-md-4">
      <span class="brand brand-image">
        <img src="<?= block_field('apoio-institucional_imagem'); ?>" alt="">
      </span>
    </div>
    <div class="column col-md-8">
      <div class="text">
        <?= block_field('apoio-institucional_descricao'); ?>
      </div>
    </div>
  </div>
</div>