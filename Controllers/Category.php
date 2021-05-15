<?php


class Category extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Category() {
        $data['tag_page'] = "Categoria";
        $data['page_title'] = "Categoria";
        $data['page_name'] = "Categoria";
        $this->views->getView($this, "category", $data);
    }

    public function getCategories() {
        $arrData = $this->model->getCategories();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

}


?>
