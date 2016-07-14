<?php
/**
 * Created by PhpStorm.
 * User: Front
 * Date: 08.07.2016
 * Time: 16:24
 */
    return array(
        "scripts" => array(
            "jquery" => "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js",
            "bootstrap" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",
        ),

        "styles" => array(
            "style.autogen" => "layout/css/style.autogen.css",
            "bootstrap" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
            "bootstrap.theme" => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css",
        ),

        "seo" => array(
            "title" => "MakeUp Framework",
            "meta_desc" => "gdfgfd",
            "meta_keywords" => "gdfg",
            "favicon" => "ico.png",
        ),
        "suffix" => "lg_",
        "blocks" => array(
            array(
                "name_pack" => "kakadu",
                "name_template" => "headers",
                "options" => array(
                    "active_area" => "",
                    "height"      => 100
                ),
                "configuration" =>array(
                    "text_title" => array(
                        "option" => "text_title",
                        "value" => "<p>Ну ппц</p>"
                    ),
                    "text_modal_button" => array(
                        "option" => "text_modal_button",
                        "value" => "Не_звоните_мне"
                    ),
                    "link_phone" => array(
                        "option" => "link_phone",
                        "value" => "tel:89274361277"
                    ),
                    "text_phone" => array(
                        "option" => "text_phone",
                        "value" => "8 (927) 43-61-277"
                    ),
                    "link_image_logo" => array(
                        "option" => "link_image_logo",
                        "value" => "/public/image/logo.png"
                    )
                )
            ),
            array(
                "name_pack" => "kakadu",
                "name_template" => "container_with_form",
                "options" => array(
                    "active_area" => "",
                    "height"      => 500
                ),
            ),
            array(
                "name_pack" => "kakadu",
                "name_template" => "headers",
                "options" => array(
                    "active_area" => "",
                    "height"      => 100
                ),
            ),
            array(
                "name_pack" => "kakadu",
                "name_template" => "container_with_form",
                "options" => array(
                    "active_area" => "",
                    "height"      => 500
                ),
            ),
            array(
                "name_pack" => "kakadu",
                "name_template" => "headers",
                "options" => array(
                    "active_area" => "",
                    "height"      => 100
                ),

            )
        ),
        "css" => array(

        )
    );