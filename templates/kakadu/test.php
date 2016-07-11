<?php
namespace templates\Kakadu;
include_once "../../Package/StyleSheet.php";
include_once "../../Package/HyperText.php";
include_once "../../Package/InputOutput.php";

/**
 * Created by PhpStorm.
 * User: Ильяс
 * Date: 09.07.2016
 * Time: 14:51
 */
use Package\StyleSheet as CSS;
use Package\HyperText as HTML;
use Package\InputOutput as IO;

$tepm = include "config.php";
$IO = new IO();

header('Content-Type: text/html; charset=utf-8');

$file_name = $tepm["config"]["custom_template_folder"]."/".$tepm["templates"]["0"]["custom_file"];
$template = json_decode(file_get_contents($file_name),true);
$style = new CSS($template["css"]);
$html = new HTML($template["html"]);


$IO->save_file("../../style.css",$style->get_CSS());
$IO->save_file("../../index.html",$html->get_HTML());

echo $html->get_HTML();