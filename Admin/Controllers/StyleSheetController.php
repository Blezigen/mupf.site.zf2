<?php
namespace Controllers;

include_once "InputOutputController.php";

use Controllers\InputOutputController as IO;

class StyleSheetController
{
    protected $_stlyle_array;
    protected $_io;

    private function parentToString($parents = array()){
        $parent_str = "";
        if (!empty($parents)) {
            foreach ($parents as $parent) {
                if (empty($parent_str)){
                    $parent_str = $parent;
                }
                else {
                    $parent_str .= " " . $parent;
                }
            }
        }
        return $parent_str;
    }

    private function print_css_rule( $rule_title, $rule_values = array(), $rule_parent = array()){
        $css_rule = "";
        $parents_str = $this->_io->array_to_string($rule_parent);
        if (!empty($parents_str)) {
            $parents_str .= " ";
        }
        $css_rule .= $parents_str.$rule_title . "{". $this->_io->end_str();
        foreach ($rule_values as $rule_key => $rule_value){
            $css_rule .= $this->_io->tab()."{$rule_key}:{$rule_value};".$this->_io->end_str();
        }
        $css_rule .= "}".$this->_io->end_str();
        return $css_rule;
    }

    private function print_rule($css_style,$parent = array()){
        $css_rule = "";
        foreach ($css_style as $key => $style){
            if (isset($style["child"])){
                $css_rule .= $this->print_rule($style["child"],array_merge($parent,array($style["type"].$style["selector"])));
            }
            $css_rule .= $this->print_css_rule($style["type"].$style["selector"],$style["attrs"],$parent);
        }
        return $css_rule;
    }

    public function set_style($style){
        if (is_array($style)){
            $this->_stlyle_array = $style;
        }
        else return false;
    }

    public function get_style(){
        return $this->_stlyle_array;
    }

    function __construct($style = array()) {
        $this->_io = new IO();
        $this->set_style($style);
    }

    public function get_CSS(){
        return $this->print_rule($this->_stlyle_array);
    }

}