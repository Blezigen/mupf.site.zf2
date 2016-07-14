<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 12.07.2016
 * Time: 17:42
 */

namespace Controllers;

use Controllers\ConfigurateController as CController;
class PackController
{
    protected $_text;
    protected $_config;
    function __construct()
    {
        $this->_text = array(
            "config_not_exist" => "Извените, но кнфигурация темы отсутчтвует",
            "template_not_exist" => "",
        );
    }

    public function get_SettingGrid($name_template){
        $grid = array();
        if (array_key_exists($name_template, $this->_config["templates"])) {
            $configurator = $this->_config["templates"][$name_template];
            $grid = $configurator->_get_controls();
        }
        return $grid;
    }

    public function get_StyleSheet($name_template, $config = array()){
        if (array_key_exists($name_template, $this->_config["templates"])) {
            $configurator = $this->_config["templates"][$name_template];
            $configurator->_set_configuration($config);
            $style = $configurator->get_StyleSheet();
            return $style;
        }
    }

    public function get_HyperText($name_template, $config = array()){
        if (array_key_exists($name_template, $this->_config["templates"])) {
            $configurator = $this->_config["templates"][$name_template];
            $configurator->_set_configuration($config);
            $style = $configurator->get_HyperText();
            return $style;
        }
    }

    public function get_PackConfig($name_pack){
        $file_path = "templates/".$name_pack."/config.php";
        if (file_exists($file_path)){
            $this->_config = include $file_path;
            return $this->_config;
        }
        else{
            return $this->_text["config_not_exist"];
        }
    }
}