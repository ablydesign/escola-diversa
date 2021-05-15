<div class="container">
  <div class="atividade-video">
    <div class="row">
      <div class="column col-md-8">
        <div class="video">
          <a data-fancybox href="<?= (empty(block_value('atividade-video_url'))) ? 'javascript:void(0);' : block_field('atividade-video_url'); ?>" class="embed-responsive embed-responsive-16by9" >
            <span class="display" style="background-image: url(<?= block_field('atividade-video_thumb'); ?>);">
              <span class="embed-responsive-item"></span>
              <i class="icon-play"></i>
            </span>
          </a>
        </div>
        <div class="content">
          <h2><?= block_field('atividade-video_titulo'); ?></h2>
          <?= block_field('atividade-video_conteudo'); ?>
        </div>
      </div>
      <div class="column col-md-4">
        <div class="infor">
          <div class="atividade-video_duracao">
            <p><span class="icon"></span> <?= block_field('atividade-video_duracao'); ?></p>
          </div>
          <div class="atividade-video_informacoes">
            <p><span class="icon"></span> <?= block_field('atividade-video_informacoes'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>