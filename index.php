<?php include_once('functions.php') ?>
<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сервис для загрузки изображений на files.mai.ru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="d-flex min-vh-100 justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 py-5 my-5">
          <div class="text-center">
            <img class="d-block mx-auto mb-4" src="https://mai.ru/press/brand/download/Inverse/RU/Inverse.svg" height="60">
            <h1 class="display-6 fw-bold text-body-emphasis">Загрузка изображения</h1>
            <p class="lead mb-5">Сервис для загрузки изображений на files.mai.ru.</p>
          </div>
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
          <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <input type="file" class="form-control form-control-lg" name="image" id="imageInput" required>
            </div>
            <ul class="small my-4">
              <li>Загрузка только JPG, PNG, WEBP.</li>
              <li>Размер файла не должен превышать 1 МБ.</li>
              <li>Разрешение изображение не больше 1920x1080.</li>
            </ul>
            <button class="btn btn-primary btn-lg" type="submit" id="submitButton">Загрузить</button>
          </form>
        </div>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/image-resize-compress@1/dist/index.js"></script>
    <script src="index.js?<?= time() ?>"></script>
  </body>
</html>