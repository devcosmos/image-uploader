<?php include_once('functions.php') ?>
<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сервис для загрузки изображений</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="d-flex min-vh-100 justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 py-5 my-5">

          <?php include_once('components/header.php') ?>

          <?php include_once('components/message.php') ?>

          <?php include_once('components/form.php') ?>

          <?php include_once('components/list.php') ?>

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