<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 11.07.2016
 * Time: 12:46
 */
include_once "Controllers/DesignerController.php";
include_once "Controllers/Controls/BasicControl.php";
include_once "Controllers/Controls/TextControl.php";

use Controllers\AdminController as AdminController;
$data = $_POST;
$controller = new AdminController("landing");
if ($data){
    for ($i = 0; $i < 10000000; $i++){}
    if ($data["action"] == "option") {
        $controller->_view("view/Designer/get_option.phtml");
//        $controller->get_SettingGrid($data["id_section"],$data["name_pack"], $data["name_template"]);
    }
}
else {
    $controller->_view("view/Designer/index.phtml");
}


