<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 13.07.2016
 * Time: 16:36
 */

namespace Controllers;


class ConfigurateController
{
    protected $_configure;
    protected $_controls;
    function __construct($name_pack,$name_template)
    {
        $this->_configure["ext"] = ".mupf";
        $this->_configure["name_pack"] = $name_pack;
        $this->_configure["name_template"] = $name_template;
    }

    public function _get_option_controls() {
        return $this->_controls;
    }

    public function get_HyperText(){

        $name_pack = $this->_configure["name_pack"];
        $name_template = $this->_configure["name_template"];

        $file_path = "templates/" . $name_pack . "/".$name_template."/". $name_template . $this->_configure["ext"];
        if (file_exists($file_path)) {
            $json_file_template = file_get_contents($file_path);
            $json_file_template = json_decode($json_file_template,true);
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
            return $json_file_template["css"];
        } else {
            return $this->_text["template_not_exist"];
        }
    }
}