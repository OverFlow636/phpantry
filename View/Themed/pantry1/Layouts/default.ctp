<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin');
		echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom');
		echo $scripts_for_layout;
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

</head>
<body>
    <div id="main">

        <div id="header">
            <!-- a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a -->
            <?php echo $this->element('controller_menu'); ?>
        </div>

        <div id="middle">

            <div id="left-column">
				<?php echo $this->element('menu'); ?>
            </div>

            <div id="center-column">
				<?php echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>
            </div>


        </div>
        <div id="footer">

		</div>
    </div>
</body>
</html>
