<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="atividade-competncias">
        <div class="atividade-competncias_titulo">
          <h2><?= block_field('atividade-competncias_titulo'); ?></h2>
        </div>
        <div class="atividade-competncias_list">
          <div class="content">
            <p><?= block_field('atividade-competncias_list'); ?><a href="javascript:void(0);" class="tooltip" title="<?= block_field('atividade-competncias_tooltip'); ?>"><i class='bx bx-info-circle'></i></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="atividade-competncias_infor" style="display: none;">
    <?= block_field('atividade-competncias_infor'); ?>
  </div>
</div>