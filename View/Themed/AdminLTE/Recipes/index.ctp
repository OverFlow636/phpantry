<?php
$this->assign('pageTitle', 'Recipes');

$links = array();
$links[] = array(
  'title'=>'Recipes',
  'href'=>array('action'=>'index')
);
$this->assign('breadcrumbs', $this->element('breadcrumbs', array('links'=>$links, 'title'=>'Index')));

$this->start('css');
echo $this->Html->css('datatables/dataTables.bootstrap.css');
$this->end();
$this->Html->script('plugins/datatables/jquery.dataTables.js', array('inline'=>false));
$this->Html->script('plugins/datatables/dataTables.bootstrap.js', array('inline'=>false));

?>

<table id="example1" class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>Name</th>
      <th>Type</th>
      <th>Rating</th>
      <th>Tags</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($recipes as $recipe): ?>
    <tr>
      <td><?=$this->Html->link($recipe['Recipe']['name'], array('action'=>'view', $recipe['Recipe']['id']))?></td>
      <td><?=$recipe['Type']['name']?></td>
      <td><?=$recipe['Recipe']['rating']?></td>
      <td><?php foreach ($recipe['Tag'] as $tag) { echo $this->element('label', array('options'=>array('text'=>$tag['name']))); } ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>


<?php
$this->Html->scriptStart(array('inline' => false));
echo '$("#example1").dataTable();';
$this->Html->scriptEnd();