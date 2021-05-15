<div class="banner-item <?= $attr['color']; ?> <?= $attr['class']; ?>" data-count="<?= $attr['count']; ?>" data-bg="<?= $attr['color']; ?>" >
  <div class="banner-item_content">
    <div class="inner-content">
      <div class="video">
        <div class="embed-responsive embed-responsive-16by9">
          <span class="youtube-embed" data-youtube="<?= $attr['link']; ?>" id="letter-<?= $attr['letter']; ?>"></span>
          <span class="embed-responsive-item embed-responsive-item_banner" style="background-image: url(<?= $attr['thumb']; ?>);"></span>
        </div>
        <div class="video-overlay">
          <a href="<?= $attr['rel']; ?>" class="btn btn-link">Saiba Mais</a>
        </div>
      </div>
      <h3><?= $attr['titulo']; ?></h3>
    </div>
  </div>
  <div class="banner-item_header" title="Clique para ver vídeo">
    <span class="letter"><?= $attr['letter']; ?></span>
  </div>
</div>