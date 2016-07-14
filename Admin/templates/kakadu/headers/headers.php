<?php
namespace Controllers;
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 13.07.2016
 * Time: 16:35
 */
include "Controllers/ConfigurateController.php";

use  Controllers\ConfigurateController as CController;
use  Controllers\Controls\TextControl as TextControl;
class HeadersConfigurator extends CController{

    function __construct($name_pack, $name_template)
    {
        $this->_configuration_option = array(
            "text_title" => array(
                "setting_str" => "[html][0][children][0][children][1][children][0][children][0][value]",
                "control" => new TextControl(
                    array (
                        "title" => "Настройка заголовка",
                        "option" => "text_title",
                        "default" => "",
                        "placeholder" => ""
                    )
                )
            ),
            "text_phone" => array(
                "setting_str" => "[html][0][children][0][children][2][children][0][children][0][value]",
                "control" => new TextControl(
                    array (
                        "title" => "Телефон",
                        "option" => "text_phone",
                        "default" => "",
                        "placeholder" => ""
                    )
                )
            ),
            "link_phone" => array(
                "setting_str" => "[html][0][children][0][children][2][children][0][attributes][0][value]",
                "control" => new TextControl(
                    array (
                        "title" => "Ссылка для кнопки телефон",
                        "option" => "link_phone",
                        "default" => "",
                        "placeholder" => ""
                    )
                )
            ),
            "text_modal_button" => array(
                "setting_str" => "[html][0][children][0][children][2][children][1][children][0][children][0][value]",
                "control" => new TextControl(
                    array (
                        "title" => "Подпись под телефоном",
                        "option" => "text_modal_button",
                        "default" => "",
                        "placeholder" => ""
                    )
                )
            ),
            "link_image_logo" => array(
                "setting_str" => "[css][0][child][1][attrs][background-image]",
                "vlaue_str_parce" => "url(\"%value%\")",
                "control" => new TextControl(
                    array (
                        "title" => "Логотип",
                        "option" => "link_image_logo",
                        "default" => "",
                        "placeholder" => ""
                    )
                )
            )
        );
        parent::__construct($name_pack, $name_template);
    }

    public function parse_config($config) {
        $configure = array();
        foreach ($config as $key => $value){
            if (array_key_exists( $value["option"], $this->_configuration_option)) {
                $config_arr["option"] = $this->_configuration_option[$value["option"]]["setting_str"];
                if (array_key_exists("vlaue_str_parce",$this->_configuration_option[$value["option"]])){
                    $config_arr["value"] = str_replace("%value%", $value["value"] , $this->_configuration_option[$value["option"]]["vlaue_str_parce"]);
                }
                else{
                    $config_arr["value"] = $value["value"];
                }
                $configure[] = $config_arr;
            }
            else
                $configure[] = $value;
        }
        return $configure;
    }
}