<?php


    class Controllers {
        public function __construct(){
            // Instanciamos la vista
            $this->views = new Views();
            $this->loadModel();
        }

        public function loadModel(){
            $model = get_class($this)."Model";
            $routClass = "Models/".$model.".php";

            //Validamos si existe el fichero
            if(file_exists($routClass)){
                require_once($routClass);

                //Creamos la instancia de la clase
                $this->model = new $model();

            }
        }
    }

?>