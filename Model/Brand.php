<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Joey
 * Date: 8/19/13
 * Time: 10:11 PM
 * To change this template use File | Settings | File Templates.
 */

class Brand extends AppModel
{
    var $hasMany = array(
        'Item'
    );
}