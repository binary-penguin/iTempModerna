<?php

class accountModel extends Model {
    public $e_number;

    function __constructor() {
        $this->e_number = "";
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function changePicture($imagen) {
        $sql = "UPDATE usuario SET imagen = :img WHERE n_empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':img' => $imagen, ':n_empleado' => $_SESSION['USER']));

        $_SESSION['PP'] = $imagen;
    }
 
    public function getData(){
        return [
            "user" => $this->e_number,
        ];
    }
}