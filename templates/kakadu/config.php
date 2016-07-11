<?php
/**
 * Created by PhpStorm.
 * User: Blezigen
 * Date: 08.07.2016
 * Time: 16:02
 */
return array(
    "config" => array(
        "title" => "Набор элементов Лендинга Какаду.", // Название шаблона
        "name" => "Kakadu", // Уникальное наименование шаблона должно совпадать с именем папки
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
    "templates" => array(
        "headers" => array(
            "name" => "headers",
            "custom_file" => "headers.mupf"
        ),

        //и.т.д
    )
);