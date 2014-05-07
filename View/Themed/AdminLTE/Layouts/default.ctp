<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('AdminLTE.css') ?>

    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
  </head>
  <body class="skin-blue">

    <header class="header">
      <a href="/" class="logo">Pantry</a>

      <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-right">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span><?=$this->Session->read('Auth.User.fname')?> <i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header bg-light-blue">
                  <?= $this->Html->image('avatar04.png', array('class' => 'img-circle', 'alt' => 'User Image')) ?>
                  <p>
                    <?=$this->Session->read('Auth.User.fname')?>
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="/users/view/<?=$this->Session->read('Auth.User.id')?>" class="btn btn-default btn-flat">User</a>
                  </div>
                  <div class="pull-right">
                    <a href="/users/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>


    <div class="wrapper row-offcanvas row-offcanvas-left">

      <aside class="left-side sidebar-offcanvas">

        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?=$this->element('sidebar');?>
        </section>

      </aside>

      <aside class="right-side">

        <section class="content-header">
          <h1>
            <?=$this->fetch('pageTitle', 'Title')?>
          </h1>
          <?=$this->fetch('breadcrumbs')?>
        </section>

        <section class="content">
          <?php echo $this->Session->flash(); ?>
          <?php echo $this->fetch('content'); ?>
        </section>
      </aside>
    </div>

    <!-- jQuery 2.0.2 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('AdminLTE/app.js') ?>
    <?= $this->fetch('script') ?>

  </body>
</html>