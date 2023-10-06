<form class="needs-validation" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <input type="file" class="form-control form-control-lg" name="image" id="imageInput" accept="image/jpg, image/jpeg, image/png, image/webp, image/svg+xml" required>
  </div>
  <ul class="small my-4">
    <li>Загрузка только JPG, PNG, WEBP, SVG.</li>
    <li>Размер файла не должен превышать 1 МБ.</li>
  </ul>
  <button class="btn btn-primary btn-lg" type="submit" id="submitButton">Загрузить</button>
</form>
