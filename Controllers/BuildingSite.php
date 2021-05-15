<?php


class BuildingSite extends Controllers
{
    public function __construct()
    {
        parent::__construct();

    }

    public function buildingSite()
    {
        $data['page_id'] = 2;
        $data['tag_page'] = "Obras";
        $data['page_title'] = "Obras";
        $data['page_name'] = "obras";
        $this->views->getView($this, "buildingSite", $data);
    }

}


?>
