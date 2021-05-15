<div class="ideas-column column <?= $attr['class']; ?>">
  <div class="card-box ideas-item">
    <div class="ideas-item_inner card-box_inner">
      <div class="smile">
        <svg width="69" height="87" viewBox="0 0 69 87" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M26.3866 29.4768C23.2675 38.1879 20.1764 46.8709 17.0573 55.5819C16.4953 54.8513 15.9614 54.1207 15.3994 53.3901C23.0707 53.5868 30.714 53.7835 38.3854 53.9802C40.6053 54.0364 40.6053 57.4928 38.3854 57.4366C30.714 57.2399 23.0707 57.0431 15.3994 56.8464C14.3597 56.8183 13.3481 55.7505 13.7415 54.6546C16.8606 45.9436 19.9516 37.2606 23.0707 28.5495C23.3798 27.6784 24.2509 27.0883 25.2063 27.3412C26.0212 27.5941 26.6957 28.6057 26.3866 29.4768Z" fill="#F2B704"/>
          <path d="M63.338 74.3815C58.7015 82.1091 49.878 86.8581 40.914 86.9986C38.3569 87.0267 35.7717 86.6614 33.327 85.9308C31.2195 85.2844 32.1187 81.9405 34.2543 82.6149C41.7289 84.9191 50.2433 82.8959 56.0882 77.7255C57.7742 76.2361 59.2073 74.5501 60.3313 72.6393C61.4834 70.7285 64.4902 72.4707 63.338 74.3815Z" fill="#F2B704"/>
          <path d="M65.5862 6.35066C63.8325 6.35066 62.4108 4.92901 62.4108 3.17532C62.4108 1.42163 63.8325 0 65.5862 0C67.3399 0 68.7615 1.42163 68.7615 3.17532C68.7615 4.92901 67.3399 6.35066 65.5862 6.35066Z" fill="#F2B704"/>
          <path d="M3.17524 6.35066C1.42156 6.35066 -9.72748e-05 4.92901 -9.72748e-05 3.17532C-9.72748e-05 1.42163 1.42156 0 3.17524 0C4.92893 0 6.35059 1.42163 6.35059 3.17532C6.35059 4.92901 4.92893 6.35066 3.17524 6.35066Z" fill="#F2B704"/>
        </svg>
      </div>
      <div class="ideas-item_content inner-row">
        <?php if (!empty($attr['atividade'])): ?>
          <div class="activities-rel">
            <a href="javascript:void()">Atividade: <?= $attr['atividade']; ?></a>
          </div>
        <?php endif; ?>
        <div class="title">
          <h2 title="<?= $attr['title']; ?>"><?= $attr['title']; ?></h2>
        </div>
        <div class="authors">
          <p>
            <span class="icon">
              <img src="<?= $attr['authors_icon']; ?>" alt="<?= $attr['title']; ?>"/>
            </span>
            <span class="names">
              <?= $attr['authors']; ?>
            </span>
          </p>
        </div>
        <?php if (!empty($attr['artifacts'])): ?>
          <div class="artifacts-list">
            <?php foreach ($attr['artifacts'] as $item): ?>
              <div class="artifacts-list_item <?= $item['artifacts_tipo']; ?>">
                <a href="<?= $item['artifacts_url']; ?>" <?= $item['artifacts_action']; ?>>
                  <span class="artifacts-icon">
                    <span class="artifacts-icon_background">
                      <svg width="150" height="145" viewBox="0 0 150 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M40.2236 7.39577C59.0562 -0.53498 87.153 -3.69324 110.29 6.10907C133.006 15.7242 140.071 33.1766 144.189 43.3298C154.061 67.7303 155.231 110.168 116.045 131.855C112.536 133.797 82.4507 149.939 50.5639 142.125C10.6061 132.346 0.265663 92.9029 0.00832328 72.4092C-0.0618604 65.1803 -0.529747 24.5908 40.2236 7.39577Z" fill="#F2B704"/>
                      </svg>
                    </span>
                    <img src="<?= $item['artifacts_icon']; ?>" alt="Ideias da juventude - <?= $attr['title']; ?>"/>
                  </span>
                  <span class="artifacts-text">
                    <?= $item['artifacts_text']; ?>
                    <?php if (!empty($item['artifacts_name'])): ?>
                      <br>
                      <small><?= $item['artifacts_name']; ?></small>
                    <?php endif; ?>
                  </span>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>