<h5 class="lead mt-5 pt-5 mb-4">Последние загруженные изображения</h5>
<div class="card overflow-hidden">
  <table class="table table-bordered table-hover" style="margin: -1px; width: calc(100% + 2px);">
    <tbody>
      <?php if ($handle = opendir('uploads')) {
        $count = 0;
        $maxCount = 10;
        while (false !== ($entry = readdir($handle)) && $count < $maxCount) {
          if ($entry != "." && $entry != "..") { $count++;
            echo $count % 2 === 1 ? '<tr>' : '';
            echo '<td class="table-active text-center" style="width: 41px;">' . $count . '</td>';                    
            echo '<td><a class="text-decoration-none" href="uploads/' . $entry . '" target="_blank">' . $entry . '</a></td>';                    
            echo $count % 2 === 0 ? '</tr>' : '';
          }
        }
        if ($count === 0) {
          echo '<tr><td>Файлов пока нет...</td></tr>';
        }
        closedir($handle);
      } else {
        echo '<tr><td>Ошибка чтения директории</td></tr>';
      } ?>
    </tbody>
  </table>
</div>
