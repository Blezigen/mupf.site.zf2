<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 13.07.2016
 * Time: 16:36
 */

namespace Controllers;

use Controllers\InputOutputController as IO;

class ConfigurateController
{
    protected $_configure;
    protected $_custom_configuration;
    protected $_configuration_option;
    protected $_controls;
    protected $_io;

    function __construct($name_pack,$name_template)
    {
        $this->_io = new IO();
        $this->_custom_configuration = array();
        $this->_configure["ext"] = ".mupf";
        $this->_configure["name_pack"] = $name_pack;
        $this->_configure["name_template"] = $name_template;
    }



    public function _get_controls(){
        $controls = array();
        if (is_array($this->_configuration_option)) {
            foreach ($this->_configuration_option as $key => $value) {
                if (isset($value["control"])) {
                    $controls[$key] = $value["control"];
                }
            }
        }
        return $controls;
    }

    public function _get_option_controls() {
        return $this->_controls;
    }

    public function parse_config($config) { return $config; } // Виртуальная заглушка переопределяется в темах

    public function _set_configuration($config){
        if (is_array($config)) {
            $this->_custom_configuration = $this->parse_config($config);
        }
    }

    public function get_HyperText(){

        $name_pack = $this->_configure["name_pack"];
        $name_template = $this->_configure["name_template"];

        $file_path = "templates/" . $name_pack . "/".$name_template."/". $name_template . $this->_configure["ext"];
        if (file_exists($file_path)) {
            $json_file_template = file_get_contents($file_path);
            $json_file_template = json_decode($json_file_template,true);
            foreach ($this->_custom_configuration as $key => $value){
                $this->_io->set_value_in_array_as_string($json_file_template,$value["option"],$value["value"]);
            }
            return $json_file_template["html"];
        } else {
            return $this->_text["template_not_exist"];
        }
    }

    public function get_StyleSheet(){

        $name_pack = $this->_configure["name_pack"];
        $name_template = $this->_configure["name_template"];

        $file_path = "templates/" . $name_pack . "/".$name_template."/". $name_template . $this->_configure["ext"];
        if (file_exists($file_path)) {
            $json_file_template = file_get_contents($file_path);
            $json_file_template = json_decode($json_file_template,true);
            foreach ($this->_custom_configuration as $key => $value){
                $this->_io->set_value_in_array_as_string($json_file_template,$value["option"],$value["value"]);
            }
            return $json_file_template["css"];
        } else {
            return $this->_text["template_not_exist"];
        }
    }
}