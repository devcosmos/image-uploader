<?php
function can_upload ($file) {
  if ($file['name'] == '' || $file['size'] === 0) {
    return 'Вы не выбрали файл.';
  }
    
  if ($file['size'] > 3000000) {
    return 'Размер изображения не должен превышать 3 МБ.';
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
  copy($file['tmp_name'], '../../files.mai.ru/uploads/' . $name);
  update_list($name);

  return $name;
}

function update_list ($name) {
  $file = 'list.json';
  
  $json = json_decode(file_get_contents($file), true);
  
  if (isset($json) && is_array($json)) {
    array_unshift($json, $name);
  } else {
    $json = array($name);
  }
  
  file_put_contents($file, json_encode(array_slice($json, 0, 10)));
}

function get_list () {
  return json_decode(file_get_contents('list.json'), true);
}

if (isset($_FILES['image'])) {
  $check = can_upload($_FILES['image']);

  if ($check === true) {
    define('FILE_URL', '/uploads/' . make_upload($_FILES['image']));
  } else {
    define('ERROR', $check);
  }
}
