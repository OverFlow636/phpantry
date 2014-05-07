<?php

$menu = array(
  'Groceries'=>array(
    'controller'=>'Items',
    'icon'=>'th',
    'actions'=>array(
      'index'=>array(
        'title'=>'View'
      )
    )
  ),
  'Recipes'=>array(
    'controller'=>'Recipes',
    'icon'=>'folder-o',
    'actions'=>array(
      'index'=>array(
        'title'=>'View'
      ),
      'add'=>array(
        'title'=>'New'
      )
    )
  ),
  'Calendar'=>array(
    'icon'=>'calendar',
    'path'=>array('controller'=>'Calendar', 'action'=>'index')
  )
);

$output = '';

foreach($menu as $main => $conf) {
  $class = $row = '';
  $icon = $this->Html->tag('i', '', array('class'=>'fa fa-' . $conf['icon']));
  $title = $this->Html->tag('span', $main);

  if (!empty($conf['actions'])) {
    //has submenu
    $class = 'treeview';
    if ($this->request->controller == $conf['controller']) {
      $class .= ' active';
    }

    $pullRight = $this->Html->tag('i', '', array('class'=>'fa fa-angle-left pull-right'));
    $row = $this->Html->link($icon . $title . $pullRight, '#', array('escape'=>false));
    $submenus = '';
    foreach ($conf['actions'] as $action => $actionConf) {
      $actionIcon = $this->Html->tag('i', '', array('class'=>'fa fa-' . (isset($actionConf['icon'])?$actionConf['icon']:'angle-double-right')));
      $link = $this->Html->link($actionIcon . ' ' . $actionConf['title'], array('controller'=>$conf['controller'], 'action'=>$action), array('escape'=>false));
      $actionClass = '';
      if ($this->request->controller == $conf['controller'] && $this->request->action == $action) {
        $actionClass = 'active';
      }
      $submenus .= $this->Html->tag('li', $link, array('class'=>$actionClass));
    }
    $row .= $this->Html->tag('ul', $submenus, array('class'=>'treeview-menu'));
  } else {
    //no submenu
    $row = $this->Html->link($icon . $title, $conf['path'], array('escape'=>false));
  }


  $output .= $this->Html->tag('li', $row, array('class'=>$class));
}


echo $this->Html->tag('ul', $output, array('class'=>'sidebar-menu'));

?>


<ul class="sidebar-menu" style="display:none">
  <li class="treeview">
    <?=$this->Html->link('<i class="fa fa-th"></i> <span>Items</span> <i class="fa fa-angle-left pull-right"></i>', '#', array('escape'=>false))?>
    <ul class="treeview-menu">
      <li><?=$this->Html->link('<i class="fa fa-angle-double-right"></i> View', array('controller'=>'Items', 'action'=>'index'), array('escape'=>false))?></li>
    </ul>
  </li>
</ul>


<ul class="sidebar-menu" style="display:none">
  <li class="active">
    <a href="index.html">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>

  <li>
    <a href="pages/widgets.html">
      <i class="fa fa-th"></i> <span>Widgets</span>
      <small class="badge pull-right bg-green">new</small>
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-bar-chart-o"></i>
      <span>Charts</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
      <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
      <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span>UI Elements</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
      <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
      <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
      <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
      <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Forms</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
      <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
      <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span>Tables</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
      <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
    </ul>
  </li>
  <li>
    <a href="pages/calendar.html">
      <i class="fa fa-calendar"></i> <span>Calendar</span>
      <small class="badge pull-right bg-red">3</small>
    </a>
  </li>
  <li>
    <a href="pages/mailbox.html">
      <i class="fa fa-envelope"></i> <span>Mailbox</span>
      <small class="badge pull-right bg-yellow">12</small>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i> <span>Examples</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
      <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
      <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
      <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
      <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
      <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
      <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
    </ul>
  </li>
</ul>