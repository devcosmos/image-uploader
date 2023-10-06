<div class="collapse <?= defined('FILE_URL') ? 'show' : '' ?>" id="collapse">
  <div class="alert <?= defined('FILE_URL') ? 'alert-primary' : 'alert-warning' ?> mb-5" role="alert" id="alert">
    <?php if (defined('FILE_URL')): ?>
      <p>Файл успешно загружен!</p>
      <hr>
      <a class="icon-link icon-link-hover text-decoration-none link-light" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="<?= FILE_URL ?>" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
          <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
        </svg>
        Открыть
      </a>
      <a class="icon-link icon-link-hover text-decoration-none link-light ms-4" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="copyClipboard" href="<?= FILE_URL ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
          <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
          <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
        </svg>
        Скопировать
      </a>
    <?php elseif (defined('ERROR')): ?>
      <p><?= ERROR ?></p>
    <?php endif ?>
  </div>
</div>
