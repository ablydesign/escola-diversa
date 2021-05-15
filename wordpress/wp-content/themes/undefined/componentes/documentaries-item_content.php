<div class="documentaries-column column <?= $attr['class'] ; ?>">
  <div class="documentaries-item">
    <div class="documentaries-item_inner">
      <div class="video">
        <a href="<?= $attr['youtube']; ?>" class="embed-responsive embed-responsive-16by9" data-fancybox>
          <span class="embed-responsive-item" style="background-image: url(<?= $attr['thumb']; ?>);"></span>
          <i class="icon-play"></i>
        </a>
      </div>
      <div class="title">
        <h3><?= $attr['title']; ?></h3>
        <a href="<?= $attr['file']; ?>" class="btn btn-download">Baixar video <i class="icon icon-download"></i></a>
      </div>
      <div class="text excerpt">
        <div class="text-inner">
          <p><?= $attr['excerpts']; ?></p>
        </div>
      </div>
      <div class="permalink-content" style="display: none;">
        <a href="javascript:void(0);" class="btn btn-permalink">Ler Mais <i class='bx bxs-chevron-down'></i></a>
      </div>
    </div>
  </div>
</div>