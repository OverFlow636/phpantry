<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			//echo $this->Html->css('/theme/mobile/css/themes/Pantry.min.css');
			//<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile.structure-1.0rc2.min.css" />
		?>

		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>

		<script>

jQuery('div').live('pagehide', function(event, ui){
  var page = jQuery(event.target);

  if(page.attr('data-cache') == 'never'){
	page.remove();
  };
});

jQuery('div').live('pagebeforecreate', function(event, ui){
  var page = jQuery(event.target);

  if(page.attr('data-cache') == 'never'){
	var header = page.find('[data-role="header"]');

	if(header.jqmData( "backbtn" ) !== false && header.find('[data-rel="back"]').size() == 0){
	  var back = jQuery('<a href="#" data-icon="back" data-rel="back">Back</a>');
	  header.prepend(back);
	};
  };
});

		</script>
	</head>

	<body>
		<?php echo $content_for_layout; ?>
	</body>
</html>