<?php
echo "<h1>Find food nutrition info</h1>";

echo 'Search:<form><input id="kw" type=text name=kw value="'.$kw.'"><input type=submit></form><br><br>Results:';


echo "<table class=listing>
    <tr>
        <th>Brand</th>
        <th>Name</th>
        <th>Description</th>
        <th>Url</th>
    </tr>";

foreach($results['foods']['food'] as $r)
{
    echo '<tr>';
    echo '<td>'.(!empty($r['brand_name'])?$r['brand_name']:'').'</td>';
    echo '<td>'.$r['food_name'].'</td>';
    echo '<td>'.$this->Html->link($r['food_description'], array('action'=>'viewFatSecretFood', $r['food_id'])).'</td>';
    echo '<td><a target="_blank" href="'.$r['food_url'].'">View</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
<style>
    #kw {
        width:600px;
    }
</style>