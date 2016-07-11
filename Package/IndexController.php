<?php
namespace Package;

include_once "StyleSheet.php";
include_once "HyperText.php";
include_once "InputOutput.php";

/**
 * Created by PhpStorm.
 * User: Front
 * Date: 08.07.2016
 * Time: 18:22
 */

use Package\StyleSheet as CSS;
use Package\HyperText as HTML;
use Package\InputOutput as IO;

class IndexController
{
    protected $_config;
    protected $_scripts;
    protected $_io;

    function __construct($config)
    {
        $this->_config = $config;
        $this->_io = new IO();
        //$this->_view();
    }

    function _get_scripts($temlate)
    {
//        $scripts = array();
//        foreach ($this->_config["landings"][$temlate] as $key => $item) {
//            $config = $this->_get_config($key);
//            foreach ($config[""] as $value) {
//                try {
//                    if (file_exists($value["config_file"])) {
//                        $header_option = include $value["config_file"];
//                        $scripts = array_merge($scripts, $header_option["config"]["scripts"]);//array_merge
//                    }
//                } catch (Exception $e) {
//
//                }
//            }
//        }
//        return array_unique($scripts);
    }

    function _get_styles($temlate)
    {
//        $scripts = array();
//        foreach ($this->_config["landings"] as $key => $item) {
//            foreach ($this->_get_config($key) as $value) {
//                try {
//                    if (file_exists($value["config_file"])) {
//                        $header_option = include $value["config_file"];
//                        if (array_key_exists("styles", $header_option["config"])) {
//                            $scripts = array_merge($scripts, $header_option["config"]["styles"]);//array_merge
//                        }
//                    }
//                } catch (Exception $e) {
//
//                }
//            }
//        }
//        return array_unique($scripts);
    }

    function _get_config($template)
    {
        $conf = array();
        $template_dir = $this->_config["template_dir"];
        if (array_key_exists($template, $this->_config["landings"])) {
            foreach ($this->_config["landings"][$template] as $item) {
                $configure = array(
                    "dir" => $template_dir . "/" . $item["name_pack"],
                    "id" => $item["name_template"]
                );
                $configure["config_file"] = $configure["dir"] . "/" . "config.php";
                if (file_exists($configure["config_file"])) {
                    $configure["config"] = include $configure["config_file"];

                } else
                    unset($configure["config_file"]);
                $conf[] = $configure;
            }
        }
        return $conf;
    }

    public function save_changes($landing_name)
    {
        $config = $this->_get_config($landing_name);
        $css = "";
        $htext = "";
        foreach ($config as $item) {
            $file_name = $item["dir"] . "/" . $item["config"]["templates"][$item["id"]]["custom_file"];
            if (file_exists($file_name)) {
                $template = json_decode(file_get_contents($file_name), true);
                $style = new CSS($template["css"]);
                $html = new HTML($template["html"]);

                $css .= $style->get_CSS();
                $htext.= $html->get_HTML();
            }
        }
        $this->_io->save_file("style.css", $css);
        $this->_io->save_file("index.html", $htext);
    }

    public function _connect_scripts()
    {
        foreach ($this->_get_scripts() as $script) {
            if (array_key_exists($script, $this->_config["scripts"])) {
                echo "<script src=\"{$this->_config["scripts"][$script]}\"></script>" . "\n";
            }
        }
    }

    public function _connect_styles()
    {
        echo "<link  rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$this->_config["styles"]["general"]}\"/>" . "\n";
        foreach ($this->_get_styles() as $script) {
            if (array_key_exists($script, $this->_config["styles"])) {
                echo "<link href=\"{$this->_config["styles"][$script]}\"/>" . "\n";
            }
        }
    }

    public function _view($contents)
    {
        $seo_config = $this->_config["local"]["seo"];
        $content = $contents;
        include "layout/index.phtml";
    }
}