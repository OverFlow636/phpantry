<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin');
		echo $scripts_for_layout;
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
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

	<!-- div id="sql_debug" style="display:none">
		<?php //echo $this->element('sql_dump'); ?>
	</div -->
</body>
</html>
