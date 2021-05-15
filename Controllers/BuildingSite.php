<?php


class BuildingSite extends Controllers {
    public function __construct() {
        parent::__construct();

    }

    public function BuildingSite() {
        $data['tag_page'] = "Obras";
        $data['page_title'] = "Obras";
        $data['page_name'] = "obras";
        $this->views->getView($this, "buildingSite", $data);
    }

    public function getBuildingSites() {
        $arrData = $this->model->getBuildingSites();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

}


?>
