<?php

// Para rodar este comando basta rodar php bootstrap\make_controller.php NomeDoController

if(count($argv) == 2) {
    $controller_name = $argv[1];
    $controller_path = __DIR__."\..\app\Controllers\" . $controller_name;
    if(!file_exists($controller_path) || !is_file($controller_path)) {
        $file = __DIR__."\..\app\Controllers\default_controller\DefaultController.php";
        $default_controller = file_get_contents($file);
        $customized_controller = str_replace(
            [
                "controller_name",
            ],
            [
                $controller_name,
            ],
            $default_controller
        );
        $fileOpen = fopen($controller_path, "w");
        file_put_contents($controller_path, $customized_controller);
    } else {
        echo "O controller já $controller_name já foi criado";
    }

}