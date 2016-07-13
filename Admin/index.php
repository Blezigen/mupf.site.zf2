<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 11.07.2016
 * Time: 12:46
 */
include_once "Controllers/DesignerController.php";

use Controllers\AdminController as AdminController;


$controller = new AdminController("landing");
$controller->_view();