<ol class="breadcrumb">
  <?php
  $first = true;
  foreach($links as $link) {
    if ($first) {
      $link['title'] = '<i class="fa fa-dashboard"></i>' . $link['title'];
      $first = false;
    }
    echo '<li>' . $this->Html->link($link['title'], $link['href'], array('escape'=>false)) .'</li>';
  }
  ?>
  <li class="active"><?=$title?></li>
</ol>
