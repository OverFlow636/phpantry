<?php

echo $this->Form->create('Allocation', array(
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
	)
));

echo "<table class=desc>
<tr><th colspan=2 class=head>New allocation for item:<br>".$item['Item']['name']."</th></tr>";

echo $this->Form->input('quantity', array('type'=>'tel', 'label'=>'Allocation Size', 'value'=>$size));
echo $this->Form->input('unit_id', array('label'=>'Size Unit'));
echo $this->Form->input('package_id', array('label'=>'Package Type'));
echo $this->Form->input('servings', array('label'=>'Serving Count', 'type'=>'tel'));

echo $this->Form->input('store_id');
echo $this->Form->input('price');

echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Enter', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";

?>
<script>
    $(document).ready(function () {

        $('#AllocationUnitId').on('change', function() {
            if ($('#AllocationUnitId').val() == 0)
            {
                var newUnit = prompt('Enter the new unit to create.');
                if (newUnit.length > 2)
                {
                    $.ajax({
                        url: '/units/addAjax',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {Unit: {name:  newUnit}},
                        success: function(d) {
                            $('#AllocationUnitId').html('');
                            var opts;
                            for(var i=0;i< d.length; i++)
                                opts += '<option value="'+ d[i]['Unit']['id']+'">'+ d[i]['Unit']['name'] + '</option>';
                            opts += '<option value=0>New Unit</option>';
                            $('#AllocationUnitId').append(opts);
                            $('#AllocationUnitId').val(d[d.length-1]['Unit']['id']);
                        }
                    });
                }
            }
        });

        $('#AllocationPackageId').on('change', function() {
            if ($('#AllocationPackageId').val() == 0)
            {
                var newUnit = prompt('Enter the new package to create.');
                if (newUnit.length > 2)
                {
                    $.ajax({
                        url: '/packages/addAjax',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {Package: {name:  newUnit}},
                        success: function(d) {
                            $('#AllocationPackageId').html('');
                            var opts;
                            for(var i=0;i< d.length; i++)
                                opts += '<option value="'+ d[i]['Package']['id']+'">'+ d[i]['Package']['name'] + '</option>';
                            opts += '<option value=0>New Package</option>';
                            $('#AllocationPackageId').append(opts);
                            $('#AllocationPackageId').val(d[d.length-1]['Package']['id']);
                        }
                    });
                }
            }
        })

    });
</script>

