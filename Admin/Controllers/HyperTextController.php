<?php
namespace Controllers;

include_once "InputOutputController.php";

use Controllers\InputOutputController as IO;

class HyperTextController
{
    protected $_hyperText;
    protected $_io;
    protected $_is_one = array(
        "img"=>""
    );
    protected $_is_api_tag = array(
        "text"=>""
    );

    private function forming_attrs_str($array_values, $splitter = " "){
        $array_str = "";
        if (!empty($array_values)) {
            foreach ($array_values as $array_value) {
                if (empty($array_str)){
                    $array_str = "{$array_value["name"]}=\"{$array_value["value"]}\"";
                }
                else {
                    $array_str .= "{$splitter}{$array_value["name"]}=\"{$array_value["value"]}\"";
                }
            }
        }
        return $array_str;
    }

    private function print_html_tag($html_tag, $child_index = 0, $is_close = false, $html_class = null, $html_attrs = null){
        $data = "";
        if (!array_key_exists($html_tag,$this->_is_one)) {
            if ($is_close) {
                $data .= $this->_io->tab($child_index) . "</{$html_tag}>" . $this->_io->end_str();
            } else {
                if (isset($html_class) && is_array($html_class)) {
                    $html_class = " class=\"" . $this->_io->array_to_string($html_class) . "\"";
                }
                if (isset($html_attrs) && is_array($html_attrs)) {
                    $html_attrs = " ".$this->forming_attrs_str($html_attrs);
                }
                $data .= $this->_io->tab($child_index) . "<{$html_tag}{$html_class}{$html_attrs}>" . $this->_io->end_str();
            }
        }
        else{
            if (isset($html_class) && is_array($html_class)) {
                $html_class = " class=\"" . $this->_io->array_to_string($html_class) . "\"";
            }
            if (isset($html_attrs) && is_array($html_attrs)) {
                $html_attrs = " ".$this->forming_attrs_str($html_attrs);
            }
            $data .= $this->_io->tab($child_index) . "<{$html_tag}{$html_class}{$html_attrs}/>" . $this->_io->end_str();
        }
        return $data;
    }

    private function print_grid($html_grids,$child_index = 0){
        $data = "";
        foreach ($html_grids as $key => $html_grid){
            if (array_key_exists($html_grid["tag"],$this->_is_api_tag)) {
                $data .= $this->_io->tab($child_index) . $html_grid["value"].$this->_io->end_str();
            }
            else if (!array_key_exists($html_grid["tag"],$this->_is_one)) {
                $data .= $this->print_html_tag($html_grid["tag"], $child_index, false, $html_grid["class"], $html_grid["attributes"]);
                if (isset($html_grid["children"])) {
                    $data .= $this->print_grid($html_grid["children"], $child_index + 1);
                }
                $data .= $this->print_html_tag($html_grid["tag"], $child_index, true);
            }
            else{
                $data .= $this->print_html_tag($html_grid["tag"], $child_index, false, $html_grid["class"], $html_grid["attributes"]);
            }
        }
        return $data;
    }

    public function set_HyperText($html){
        if (is_array($html)){
            $this->_hyperText = $html;
        }
        else return false;
    }
    public function get_HyperText(){
        return $this->_hyperText;
    }
    function __construct($html = array()) {
        $this->_io = new IO();
        $this->set_HyperText($html);
    }
    public function get_HTML(){
       return $this->print_grid($this->_hyperText);
    }

}