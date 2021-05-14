<?php

class permissionModel extends Mysql {
    private $id;
    private $can_create;
    private $can_read;
    private $can_update;
    private $can_delete;
    private $rol;
    private $module;


    public function __construct() {
        parent::__construct();
    }


    public function getModels() {
        $query = "SELECT * FROM MODELS";
        $result = $this->selectAll($query);
        return $result;
    }


    public function getPermissionRols(int $rolId) {
        $this->rol = $rolId;
        $query = "SELECT * FROM PERMISSION WHERE rol ='{$this->rol}'";
        $result = $this->selectAll($query);
        return $result;
    }


    public function getPermissionByRolAndModule(int $rolId, int $moduleId) {
        $this->rol = $rolId;
        $this->module = $moduleId;
        $query = "SELECT * FROM PERMISSION WHERE rol ='{$this->rol}' AND module = '{$this->module}'";
        $result = $this->select($query);
        return $result;
    }


    public function insertPermission($can_create, $can_read, $can_update, $can_delete,$rolId,$moduleId) {
        $response = "";
        $this->can_create = $can_create;
        $this->can_read = $can_read;
        $this->can_update = $can_update;
        $this->can_delete = $can_delete;
        $this->rol = $rolId;
        $this->module = $moduleId;


        $queryInsert = "INSERT INTO PERMISSION(can_create, can_read, can_update, can_delete, rol, module) VALUES(?,?,?,?,?,?)";
        $arrData = array($this->can_create, $this->can_read, $this->can_update, $this->can_delete, $this->rol, $this->module);
        $requestInsert = $this->insert($queryInsert, $arrData);

        $response .= $requestInsert;

        return $response;
    }


    public function updatePermissionRol($can_create, $can_read, $can_update, $can_delete, $rolId, $moduleId) {
        $queryUpdate = "UPDATE PERMISSION SET can_create = ?, can_read = ?, 
                                              can_update = ?, can_delete = ? 
                                          WHERE rol = ".$rolId." AND module = ".$moduleId;
        $arrData = array($can_create, $can_read, $can_update, $can_delete);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    /**
     * Elimina todos los permisos en base al rol
     * @param int $rolId
     * @return mixed
     */
    public function deletePermission(int $rolId) {
        $query = "DELETE FROM PERMISSION WHERE rol =".$rolId;
        $request = $this->delete($query);
        return $request;
    }

} // fin clase permissionModel


?>