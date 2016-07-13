<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 08.07.2016
 * Time: 16:24
 */
    return array(
        "title" => "Название Лендинга",
        "template_dir" => "templates",

        "scripts" => array(
            "jquery" => "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js",
            "bootstrap" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",
        ),

        "styles" => array(
            "general" => "style.css",
            "bootstrap" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
            "bootstrap.theme" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css",
        ),

        "seo" => array(
            "title" => "MakeUp Framework",
            "meta_desc" => "gdfgfd",
            "meta_keywords" => "gdfg",
            "favicon" => "ico.png",
        ),
        "folder" => array(
            "headers"   =>  "headers",
            "footers"   =>  "footers",
            "contents"  =>  "contents",
            "modals"    =>  "modals"
        ),

        "landings" => array(
            "landing" => array(
                array(
                    "name_pack" => "kakadu",
                    "name_template" => "headers",
                )
            )
        )
    );