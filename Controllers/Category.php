<?php


class Category extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Category() {
        $data['tag_page'] = "Categoria";
        $data['page_title'] = "Categoria";
        $data['page_name'] = "Categoria";
        $data['icon'] = '<i class="fa fa-list-alt" aria-hidden="true"></i>';
        $this->views->getView($this, "category", $data);
    }

    public function getCategories() {
        $arrData = $this->model->getCategories();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setCategory() {
        if(isset( $_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            if($categoryId) {
                $requestCategory = $this->model->updateCategory($categoryId,$name,$price_hour);
            } else {
                $requestCategory = $this->model->insertCategory($name,$price_hour);
            }

            if ($requestCategory > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado una categoria correctametne');
            } else if ($requestCategory == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado la categoria correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

}


?>
