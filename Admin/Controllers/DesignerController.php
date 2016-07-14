<?php
namespace Controllers;

include_once "StyleSheetController.php";
include_once "HyperTextController.php";
include_once "InputOutputController.php";
include_once "PackController.php";

use Controllers\StyleSheetController as CSS;
use Controllers\HyperTextController as HTML;
use Controllers\InputOutputController as IO;
use Controllers\PackController as Pack;
use Controllers\Controls\BasicControl as BC;


class AdminController{
    protected $_config;
    protected $_css;
    protected $_html;
    protected $_io;
    protected $_packController;

    function __construct($template)
    {
        $this->_css = new CSS();
        $this->_html = new HTML();
        $this->_io = new IO();
        $this->_packController = new Pack();

        if (file_exists("configs/"."config.".$template.".local.php")){
            $this->_config = include "configs/"."config.".$template.".local.php";
        }
        $this->_io->save_file("../public/css/autogen/style.css", $this->save_changes());
    }

    public function _getBlocks(){
        if (is_array($this->_config["blocks"]))
            return $this->_config["blocks"];
        return array();
    }
    public function _getSuffix(){
        return $this->_config["suffix"];
    }

    public function _view($file){
        $data = $_POST;
        if (file_exists($file))
            include $file;
    }

    public function _getContent($name_pack,$name_template,$config){
        $config_block = $this->_packController->get_PackConfig($name_pack);
        if (array_key_exists($name_template, $config_block["templates"])){
            //echo $this->_packController->get_HyperText($name_template);
            $this->_html->set_HyperText($this->_packController->get_HyperText($name_template, $config));
        }
        return $this->_html->get_HTML();
    }

    public function get_SettingGrid($id_section,$name_pack,$name_template){
        $config_block = $this->_packController->get_PackConfig($name_pack);
        
        $settings = $this->_packController->get_SettingGrid($name_template);
        $grid = "";
        foreach ($settings as $key => $value) {
            $grid .= $value->_set_value($this->_config["blocks"][$id_section][configuration][$key]["value"]);
            $grid .= $value->_get_echo();
        }
        return $grid;
    }
    public function save_changes(){
        $blocks = $this->_config["blocks"];

        foreach ($blocks as $id => $block) {
            $this->_packController->get_PackConfig($block["name_pack"]);
            $this->_config["css"][] = array(
                "selector" => $this->_getSuffix() . $id,
                "type" => "#",
                "attrs" => array(
                    "height" => "{$block["options"]["height"]}px",
                ),
                "child" => $this->_packController->get_StyleSheet($block["name_template"],$block["configuration"])
            );
        }
        $this->_css->set_style($this->_config["css"]);
        return $this->_css->get_CSS();
    }
}