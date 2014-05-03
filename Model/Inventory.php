<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Joey
 * Date: 8/12/13
 * Time: 1:17 AM
 * To change this template use File | Settings | File Templates.
 */

class Inventory extends AppModel
{
    var $belongsTo = array(
        'Item',
        'Unit'
    );
}