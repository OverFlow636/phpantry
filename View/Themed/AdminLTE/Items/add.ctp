<?php

/*
 * upc              074401744320
pendingUpdates      0
status              success
ean                 0074401744320
issuerCountryCode   us
found               1
description         Texmati Organic WW Couscous
message             Database entry found
size                31.7oz
issuerCountry       United States
noCacheAfter        UTC2013-07-16T00:11:07
lastModified        UTC2005-09-01T14:56:08
name                Texmati Organic WW Couscous
 */

echo $this->Form->create('Item', array(
	'action'=>'add',
	'inputDefaults'=>array(
		'before'=>'<tr><td>',
		'after'=>'</td></tr>',
		'between'=>'</td><td>',
		'div'=>false
)));

echo "<table class=desc>
<tr><th colspan=2 class=head>New Item</th></tr>";

echo $this->Form->input('name');
echo $this->Form->input('upcdatabase_name');
echo $this->Form->input('brand_id');
echo $this->Form->input('serving_size');
echo $this->Form->input('unit_id');
echo $this->Form->input('taxed');
echo $this->Form->input('inventoried');
echo $this->Form->input('category_id');
//echo $this->Form->input('subcategory_id');


echo "<tr><td colspan=2>".$this->Form->end(array('label'=>'Add', 'div'=>false, 'class'=>'submit'))."</td></tr>";

echo "</table>";
?>
<script>
$(document).ready(function () {

    $('#ItemBrandId').on('change', function() {
        if ($('#ItemBrandId').val() == 0)
        {
            var newUnit = prompt('Enter the new unit to create.');
            if (newUnit.length > 2)
            {
                $.ajax({
                    url: '/brands/addAjax',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {Brand: {name:  newUnit}},
                    success: function(d) {
                        $('#ItemBrandId').html('');
                        var opts;
                        for(var i=0;i< d.length; i++)
                                opts += '<option value="'+ d[i]['Brand']['id']+'">'+ d[i]['Brand']['name'] + '</option>';
                            opts += '<option value=0>New Brand</option>';
                            $('#ItemBrandId').append(opts);
                            $('#ItemBrandId').val(d[d.length-1]['Brand']['id']);
                    }
                });
            }
        }
    });
});
</script>