<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 08.07.2016
 * Time: 16:28
 */
include_once "Package/IndexController.php";

use Package\IndexController as IndexController;

$_config["local"] = include "configs/config.local.php";


$Controller = new IndexController($_config["local"]);
$Controller->save_changes("landing");
$Controller->_view(file_get_contents("index.html"));
