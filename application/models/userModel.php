<?php
// Start session
//session_start();

class UserModel extends Model {
    public $e_number;
    public $hash;
    public $psw;
    public $new_psw;


    function __constructor() {
        $this->e_number = "";
        $this->hash = "";
        $this->psw = "";
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

    //added test comment for github
    public function changePswUser() {
        $this->hash = $this->hashing();
        $sql = "UPDATE usuario SET contrasena = :contrasena WHERE n_empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':contrasena' => $this->hash, ':n_empleado' => $this->e_number ));
    }

    public function setPassword($psw) {
        $this->psw = $psw;
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function getData(){
        return [
            "user" => $this->e_number,
        ];
    }

}