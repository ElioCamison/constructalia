<?php

class Dashboard extends Controllers {
    public function __construct()
    {
        parent::__construct();

    }
    public function dashboard()
    {
        $data['page_id'] = 2;
        $data['tag_page'] = "Dashboard";
        $data['page_title'] = "Dashboard - Constructalia";
        $data['page_name'] = "dashboard";
        $this->views->getView($this,"dashboard", $data);
    }

}

?>
