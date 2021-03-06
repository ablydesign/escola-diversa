<div class="fancybox-content">
  <div class="container">
    <div class="row">
      <section class="ajax-content section-more-diversity">
        <div class="ajax-title">
          <span class="icone">
            <svg width="85" height="82" viewBox="0 0 85 82" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22.7933 4.19069C33.4652 -0.303399 49.3867 -2.09308 62.4978 3.46156C75.3703 8.91015 79.3738 18.7998 81.707 24.5533C87.3015 38.3803 87.9643 62.4283 65.759 74.7175C63.7704 75.8178 46.7221 84.965 28.6529 80.5372C6.0101 74.9958 0.150543 52.6447 0.00471652 41.0316C-0.0350542 36.9353 -0.30019 13.9345 22.7933 4.19069Z" fill="#CCC"/>
            </svg>
            <img src="<?= $attr['image']; ?>" alt="<?= $attr['titulo']; ?>">
          </span>
          <h2><?= $attr['titulo']; ?></h2>
        </div>
        <div class="ajax-content-list">
          <?= $attr['content']; ?>
        </div>
      </section>
    </div>
  </div>
</div>