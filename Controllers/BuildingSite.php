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
        $data['tag_page'] = "buildingSiteModel";
        $data['page_title'] = "buildingSiteModel";
        $data['page_name'] = "obras";
//        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $this->views->getView($this, "buildingSite", $data);
    }

    public function insertar()
    {
        $data = $this->model->setUser("thelior", md5('1234'), "Elio", "Camison", "email@email.com", "699000000");
        print_r($data);
    }

    public function verusuario($id)
    {
        $data = $this->model->getUser($id);
        print_r($data);
    }

    public function actualizar()
    {
        $data = $this->model->updateUser(5, "Marta");
        print_r($data);
    }

    public function verusuarios()
    {
        $data = $this->model->getUsers();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function eliminarUsuario($id)
    {
        $data = $this->model->deleteUser($id);
        print_r($data);

    }

}


?>
