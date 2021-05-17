<?php

class supplierModel extends Mysql {

    private $id;
    private $name;
    private $code;
    private $email;
    private $address;
    private $phone;

    public function __construct() {
        parent::__construct();
    }

    public function getSupplier() {
        $query = "SELECT * FROM SUPPLIER";
        $result = $this->selectAll($query);
        return $result;
    }

    public function insertSupplier($code,$name,$email,$address,$phone) {
        $response = "";
        $this->code = $code;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;

        if(empty($result)) {
            $queryInsert = "INSERT INTO SUPPLIER(code,name,email,address,phone) VALUES(?,?,?,?,?)";
            $arrData = array($this->code,$this->name,$this->email,$this->address,$this->phone);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateSupplier($id,$code,$name,$email,$address,$phone) {
        $queryUpdate = "UPDATE SUPPLIER SET code = ?, name = ?, email = ?, address = ?, phone = ? WHERE id = ".$id;
        $arrData = array($code,$name,$email,$address,$phone);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function getSupplierById(int $id) {
        $this->id = $id;
        $query = "SELECT * FROM SUPPLIER WHERE id=".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteSupplier(int $id) {
        $query = "DELETE FROM SUPPLIER WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }


}// fin clase supplierModel

?>