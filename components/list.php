<?php $list = get_list() ?>

<?php if (is_array($list) && !empty($list)): ?>
<h5 class="lead mt-5 pt-5 mb-4">Последние загруженные изображения</h5>
<div class="card overflow-hidden">
  <table class="table table-bordered table-hover" style="margin: -1px; width: calc(100% + 2px);">
    <tbody>
      <?php foreach ($list as $count => $element) { $number = $count + 1;
        echo $count % 2 === 0 ? '<tr>' : '';
        echo '<td class="table-active text-center" style="width: 41px;">' . $number . '</td>';                    
        echo '<td><a class="text-decoration-none" href="/uploads/' . $element . '" target="_blank">' . $element . '</a></td>';                    
        echo $count % 2 === 1 ? '</tr>' : '';
      } ?>
    </tbody>
  </table>
</div>
<?php endif ?>
