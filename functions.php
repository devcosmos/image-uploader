<?php
function can_upload ($file) {
  if ($file['name'] == '' || $file['size'] === 0) {
    return 'Вы не выбрали файл.';
  }
    
  if ($file['size'] > 1000000) {
    return 'Размер изображения не должен превышать 1 МБ.';
  }

  $getMime = explode('.', $file['name']);
  $mime = strtolower(end($getMime));
  $types = array('jpg', 'png', 'jpeg', 'svg', 'webp');

  if (!in_array($mime, $types)) {
    return 'Недопустимый тип файла.';
  }

  return true;
}

function make_upload ($file) {
  $getMime = explode('.', $file['name']);
  $mime = strtolower(end($getMime));
  $name = time() . '.' . $mime;
  copy($file['tmp_name'], 'uploads/' . $name);

  return $name;
}

if (isset($_FILES['image'])) {
  $check = can_upload($_FILES['image']);

  if ($check === true) {
    define('FILE_URL', 'uploads/' . make_upload($_FILES['image']));
  } else {
    define('ERROR', $check);
  }
}
