<?php

class MasterModel extends Model {
    public $e_number;
    public $hash;
    public $psw;
    private $locations;
    //private $new_psw;

    function __constructor() {
        $this->e_number = "";
        $this->hash = "";
        $this->psw = "";
        $this->locations = [];
        $this->new_psw = "";
    }

    private function encryption() {
        $hash = hash('sha256',$this->psw);
        $this->psw = $hash;
    }

    private function hashing() {
        $this->encryption();
        $salt = uniqid("pm4",random_int(PHP_INT_MIN, PHP_INT_MAX));
        return crypt($this->psw,'$5$rounds=5000$'.$salt.'$');
    }

    //changePswAdmin changes employees password from admin view
    public function changePswAdmin() {
        //Changes user password from admin/master account, no former psw needed
        //sql command not tested, might not work (yet)
        $this->hash = $this->hashing();
        $sql = "UPDATE usuario SET contrasena = :contrasena WHERE n_empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':contrasena' => $this->hash, ':n_empleado' => $this->e_number ));
    }
    
    public function userPermssions() {
        //clear all locations
        //ctrl c foreach
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function setPassword($psw) {
        $this->psw = $psw;
    }
}