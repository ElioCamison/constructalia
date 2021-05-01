<?php


    $controllerFile = "Controllers/".$controller.".php";
    if(file_exists($controllerFile)){
        require_once($controllerFile);
        $controller = new $controller();

        // Miramos si existe el método en el controlador
        if(method_exists($controller, $method)){
            $controller->{$method}($params);
        }else{
            require_once("Controllers/Error.php");
        }

    } else {
        require_once("Controllers/Error.php");
    }


?>
