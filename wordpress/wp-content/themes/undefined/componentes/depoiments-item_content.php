<div class="depoiments-column column">
  <div class="box depoiments-item">
    <div class="depoiments-item_inner">
      <div class="depoiments-item_content inner-row">
        <div class="icone left-content">
          <img src="<?= $attr['quote']; ?>" alt="" class="medium">
          <img src="<?= $attr['quote']; ?>" alt="" class="small">
        </div>
        <div class="text content">
          <?= $attr['text']; ?>
        </div>
      </div>
      <div class="depoiments-item_author inner-row">
        <div class="avatar left-content">
          <span class="avatar-image" style="background-image: url(<?= $attr['avatar']; ?>);"><img src="<?= $attr['avatar']; ?>" alt="<?= $attr['name']; ?>"></span> 
        </div>
        <div class="name content">
          <h3><?= $attr['name']; ?></h3>
          <h4><?= $attr['role']; ?></h4>
        </div>
      </div>
    </div>
  </div>
</div>