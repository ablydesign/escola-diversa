<div class="<?= $attr['class'] ; ?>">
  <div class="documentaries-item documentaries-item_destaque <?= $attr['class'] ; ?>" id="documentario-em-destaque">
    <div class="documentaries-item_inner">
      <div class="video <?= $attr['class_options'] ; ?>">
        <div class="embed-responsive embed-responsive-16by9">
          <span class="youtube-embed" data-youtube="<?= $attr['youtube']; ?>" id="documentario-em-destaque_youtube"></span>
          <span class="embed-responsive-item embed-responsive-item_documentario on-loading" style="background-image: url(<?= $attr['thumb']; ?>);">
            <i class="icon-play"></i>
          </span>
        </div>
      </div>
      <div class="documentaries-item_content">
        <div class="title">
          <h3><?= $attr['title']; ?></h3>
          <a href="<?= $attr['file']; ?>" class="btn btn-download">Baixar video <i class="icon icon-download"></i></a>
        </div>
        <div class="text content">
          <p><?= $attr['excerpts']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>