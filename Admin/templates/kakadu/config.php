<?php
namespace Controllers;
include_once "headers/headers.php";
include_once "footer/footer.php";
include_once "container_with_form/container_with_form.php";

/**
 * Created by PhpStorm.
 * User: Blezigen
 * Date: 08.07.2016
 * Time: 16:02
 */
$pack_config = array(
    "config" => array(
        "title" => "Набор элементов Лендинга Какаду.", // Название шаблона
        "name" => "kakadu", // Уникальное наименование шаблона должно совпадать с именем папки
        "custom_template_folder" => "templates",
        "scripts" => array( // Нужные скрипты для работы шаблона
            "style",
            "jquery",
            "bootstrap"
        ),
        "styles" => array( // Нужные скрипты для работы шаблона
            "bootstrap.theme",
            "bootstrap"
        ),
    ),
);
$pack_config["templates"] = array(
    "headers" => new HeadersConfigurator($pack_config["config"]["name"],"headers"),
    "container_with_form" => new ContainerWithFormConfigurator($pack_config["config"]["name"],"container_with_form"),
);
return $pack_config;

