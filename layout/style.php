<?php
    header('Content-type: text/css');
    $data = $_GET;
    include_once "../include/IndexController.php";
    $_config = include "../configs/config.local.php";
    $Controller = new IndexController($_config["local"]);

    if ($data["site"] == "landing"){
        $conf = array();
        $template_dir = "../".$_config["template_dir"];
        foreach ($_config["landing"] as $key => $opt) {
            foreach ($opt as $item) {
                $configure = array(
                    "dir" => $template_dir . "/" . $_config["folder"][$key],
                    "id" => $item["id"]
                );
                if (file_exists($configure["dir"] . "/" . $configure["id"] . "/view/" . "style.css")){
                    $configure["style"] = file_get_contents($configure["dir"] . "/" . $configure["id"] . "/view/" . "style.css");
                }
                $conf[] = $configure;
            }
        }
    }
    foreach ($conf as $style){
        echo $style["style"]."\n";
    }

