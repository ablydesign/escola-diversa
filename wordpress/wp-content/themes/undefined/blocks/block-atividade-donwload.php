<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="atividade-donwload">
        <div class="atividade-download_titulo">
          <h2><?= get_field('atividade-download_titulo'); ?></h2>
        </div>
        <div class="atividade-download_conteudo">
          <div class="content">
            <?= get_field('atividade-download_conteudo'); ?>
          </div>
        </div>
        <?php if (!empty(get_field('atividade-download_arquivo'))) :?>
          <div class="atividade-download_arquivo">
            <p><a href="<?= get_field('atividade-download_arquivo'); ?>" target="_blank"><span class="icon"><i class="bx bx-download"></i></span>Fazer download da atividade</a></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>