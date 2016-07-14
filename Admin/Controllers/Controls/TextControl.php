<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 14.07.2016
 * Time: 14:45
 */

namespace Controllers\Controls;

use Controllers\Controls\BasicControl as BasicControl;

class TextControl extends BasicControl
{
    public function _set_value($value){
        $this->_setting["default"] = $value;
    }

    function __construct($setting)
    {
        parent::__construct($setting);
    }
}